<?php 

if (isset($_POST['submit']) && isset($_FILES['ref_audio']) && isset($_FILES['test_audio'])) {
	include "db_conn.php";
    $audio_name = $_FILES['ref_audio']['name'];
    $tmp_name = $_FILES['ref_audio']['tmp_name'];
    $error = $_FILES['ref_audio']['error'];
	$test_name = $_FILES['test_audio']['name'];
    $tmp_test_name = $_FILES['test_audio']['tmp_name'];
    $error_test = $_FILES['test_audio']['error'];

    if ($error === 0 && $error_test === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);
		$test_ex = pathinfo($test_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);
		$test_ex_lc = strtolower($test_ex);

    	$allowed_exs = array("mp3", 'flac', 'wav');

    	if (in_array($audio_ex_lc, $allowed_exs)&& in_array($test_ex_lc, $allowed_exs)) {
    		
    		$new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
    		$audio_upload_path = 'uploads/'.$new_audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

			$new_test_name = uniqid("audio-", true). '.'.$test_ex_lc;
    		$test_upload_path = 'uploads/'.$new_test_name;
    		move_uploaded_file($tmp_test_name, $test_upload_path);

    		// Now let's Insert the audio path into database
            $sql = "INSERT INTO audios(audio_url, test_audio) 
                   VALUES('$new_audio_name' , '$new_test_name')";
            mysqli_query($conn, $sql);
			$ref_audio = 'uploads/'+$audio_upload_path;
			$test_audio = 'uploads/'+$test_upload_path;
			// Define the path to your Python script
			// $pythonScript = "detect.py"; // Replace "/path/to/load_h5.py" with the actual path
			

			// Call the Python script using exec() and capture the output
			//$output = exec("python $pythonScript");
			
			// $output = passthru("python hello.py $ref_audio $test_audio");
			$command = escapeshellcmd("python hello.py $ref_audio $test_audio ");
			$output = shell_exec($command);
			


			// Display the output
			log($output);
		

           // header("Location: view.php");
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: index.php?error=$em");
    	}
    }
	



}else{
	header("Location: index.php");
}