import numpy as np
from tensorflow.keras.models import Model
from tensorflow.keras.layers import Input, Conv2D, Flatten, Dense, BatchNormalization, MaxPooling2D, Dropout, Lambda
from tensorflow.keras import backend as K
import librosa
import sys
import codecs
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.buffer)
# Define the necessary functions
def build_base_network(input_shape):
    input = Input(shape=input_shape)
    x = Conv2D(32, (3, 3), activation='relu')(input)
    x = BatchNormalization()(x)
    x = MaxPooling2D((2, 2))(x)
    x = Dropout(0.25)(x)

    x = Conv2D(64, (3, 3), activation='relu')(x)
    x = BatchNormalization()(x)
    x = MaxPooling2D((2, 2))(x)
    x = Dropout(0.25)(x)

    x = Flatten()(x)
    x = Dense(128, activation='relu')(x)
    x = Dense(64, activation='relu')(x)
    return Model(input, x)

def euclidean_distance(vects):
    x, y = vects
    sum_square = K.sum(K.square(x - y), axis=1, keepdims=True)
    return K.sqrt(K.maximum(sum_square, K.epsilon()))

def build_siamese_model(input_shape):
    left_input = Input(input_shape)
    right_input = Input(input_shape)

    base_network = build_base_network(input_shape)
    
    left_output = base_network(left_input)
    right_output = base_network(right_input)

    distance = Lambda(euclidean_distance)([left_output, right_output])

    prediction = Dense(1, activation='sigmoid')(distance)

    siamese_net = Model(inputs=[left_input, right_input], outputs=prediction)

    siamese_net.compile(optimizer='adam', loss='binary_crossentropy', metrics=['accuracy'])

    return siamese_net

def load_and_transform_audio_to_mfcc(filepath, target_duration, sample_rate, n_mfcc, n_fft=2048, hop_length=512, time_steps=109):
    try:
        audio, sr = librosa.load(filepath, sr=sample_rate, duration=target_duration)
        
        mfccs = librosa.feature.mfcc(y=audio, sr=sr, n_mfcc=n_mfcc, n_fft=n_fft, hop_length=hop_length)
        
        if mfccs.shape[1] < time_steps:
            mfccs = np.pad(mfccs, ((0, 0), (0, time_steps - mfccs.shape[1])), 'constant')
        elif mfccs.shape[1] > time_steps:
            mfccs = mfccs[:, :time_steps]
        
        return mfccs.reshape((n_mfcc, time_steps, 1))
    except Exception as e:
        print(f"Error processing {filepath}: {str(e)}")
        return None

def analyze_audio(reference_audio_path, test_audio_path):
    input_shape = (13, 109, 1) 
    # Load the saved weights into the Siamese model
    siamese_model = build_siamese_model(input_shape)
    siamese_model.load_weights("siamese_model_f.weights.h5")

    # Adjusted loading and reshaping of MFCC features
    ref_mfcc_db = load_and_transform_audio_to_mfcc(reference_audio_path, DURATION, SAMPLE_RATE, n_mfcc=N_MELS)
    test_mfcc_db = load_and_transform_audio_to_mfcc(test_audio_path, DURATION, SAMPLE_RATE, n_mfcc=N_MELS)

    # Ensure the reshape operation adds the required channel dimension correctly
    ref_mfcc_db = ref_mfcc_db.reshape(-1, N_MELS, time_steps, 1)  # Reshape to (batch_size, n_mfcc, time_steps, channels)
    test_mfcc_db = test_mfcc_db.reshape(-1, N_MELS, time_steps, 1)  # Reshape similarly for test data

    # Prediction using the Siamese network model trained on MFCC inputs
    prediction = siamese_model.predict([ref_mfcc_db, test_mfcc_db])

    # Interpret the prediction
    score = prediction[0][0]
    if score >= 0.5:
        result = "The test audio is considered REAL relative to the reference."
    else:
        result = "The test audio is considered FAKE relative to the reference."
    
    return score, result

# Constants for audio processing
SAMPLE_RATE = 16000
DURATION = 5
N_MELS = 13
time_steps = 109

# Retrieve paths from command-line arguments
if len(sys.argv) != 3:
    print("Usage: python your_script.py reference_audio_path test_audio_path")
    sys.exit(1)

reference_audio_path = sys.argv[1]
test_audio_path = sys.argv[2]
print(sys.argv[1])
print(sys.argv[2])
# Perform audio analysis
score, result = analyze_audio(reference_audio_path, test_audio_path)

# Return the score and result
print(score, result)