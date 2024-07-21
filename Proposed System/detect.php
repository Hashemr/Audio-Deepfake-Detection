<?php
if (isset($_POST['submit']) && isset($_FILES['ref_audio']) && isset($_FILES['test_audio'])) {
    include "db_conn.php";

    // Audio file upload for reference
    $ref_audio_name = $_FILES['ref_audio']['name'];
    $ref_tmp_name = $_FILES['ref_audio']['tmp_name'];
    $ref_error = $_FILES['ref_audio']['error'];

    // Audio file upload for test
    $test_audio_name = $_FILES['test_audio']['name'];
    $test_tmp_name = $_FILES['test_audio']['tmp_name'];
    $test_error = $_FILES['test_audio']['error'];

    if ($ref_error === 0 && $test_error === 0) {
        // Process reference audio
        $ref_audio_ex = pathinfo($ref_audio_name, PATHINFO_EXTENSION);
        $ref_audio_ex_lc = strtolower($ref_audio_ex);
        $allowed_exs = array("mp3", "flac", "wav");

        if (in_array($ref_audio_ex_lc, $allowed_exs)) {
            $new_ref_audio_name = uniqid("ref_audio-", true) . '.' . $ref_audio_ex_lc;
            $ref_audio_upload_path = 'uploads/' . $new_ref_audio_name;
            move_uploaded_file($ref_tmp_name, $ref_audio_upload_path);

            // Process test audio
            $test_audio_ex = pathinfo($test_audio_name, PATHINFO_EXTENSION);
            $test_audio_ex_lc = strtolower($test_audio_ex);

            if (in_array($test_audio_ex_lc, $allowed_exs)) {
                $new_test_audio_name = uniqid("test_audio-", true) . '.' . $test_audio_ex_lc;
                $test_audio_upload_path = 'uploads/' . $new_test_audio_name;
                move_uploaded_file($test_tmp_name, $test_audio_upload_path);

                // Insert audio paths into the database
                $sql = "INSERT INTO audios (audio_url, test_audio) VALUES ('$new_ref_audio_name', '$new_test_audio_name')";
                if (mysqli_query($conn, $sql)) {
                    echo "Audio files uploaded successfully.";
                    $last_inserted_id = mysqli_insert_id($conn);
                    // Call Python script with audio paths as arguments
                    $reference_audio_path = "uploads/" . $new_ref_audio_name;
                    $test_audio_path = "uploads/" . $new_test_audio_name;
                    $python_script = "python total.py $reference_audio_path $test_audio_path";
                    $output = shell_exec($python_script);

                    if (strpos($output, "FAKE") !== false) {
                        $sql_update = "UPDATE audios SET result = 'Fake' WHERE id = $last_inserted_id";
                        mysqli_query($conn, $sql_update);
                        header("Location: falsepage.php");
                    } else if (strpos($output, "REAL") !== false) {
                        $sql_update = "UPDATE audios SET result = 'Real' WHERE id = $last_inserted_id";
                        mysqli_query($conn, $sql_update);
                        header("Location: truepage.php");
                    } else {
                        echo "<pre>ERROR</pre>";
                    }

                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "You can't upload files of this type for test audio.";
            }
        } else {
            echo "You can't upload files of this type for reference audio.";
        }
    } else {
        echo "Error uploading files.";
    }

    mysqli_close($conn);
}

?>
