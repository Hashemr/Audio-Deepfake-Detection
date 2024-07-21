# Audio-Deepfake-Detection
# Siam-CNNnet: Audio Deepfake Detection

This repository contains the implementation of **Siam-CNNnet**, a novel deep learning model for detecting audio deepfakes. The model combines Convolutional Neural Networks (CNN) and Siamese Networks to effectively classify real and fake audio samples based on features extracted from Mel-Frequency Cepstral Coefficients (MFCCs).

## Overview

Audio deepfake technology has advanced significantly, enabling the creation of highly realistic manipulated audio. Siam-CNNnet addresses the need for robust detection methods by leveraging the strengths of CNNs in feature extraction and Siamese Networks in similarity learning.

## Features

- **MFCC Feature Extraction**: Utilizes MFCCs to capture essential audio features.
- **CNN Architecture**: Employs a CNN for extracting high-level characteristics from MFCC images.
- **Siamese Network**: Combines two identical CNN branches with shared weights to learn discriminative features for identifying real and fake audio.
- **Transfer Learning**: Trained on the ASV Spoof 2019 dataset and evaluated on the DEEP-VOICE dataset to ensure strong generalization and stability.

## Performance

The model achieves state-of-the-art performance on benchmark datasets:
- **ASV Spoof 2019**: 99.9% accuracy
- **ASV Spoof 2021**: 95.3% accuracy
- **DEEP-VOICE**: 96.9% accuracy

## Getting Started

### Prerequisites

- Python 3.7+
- TensorFlow 2.x
- NumPy
- Librosa (for audio processing)
