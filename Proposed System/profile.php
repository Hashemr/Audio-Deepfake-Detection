<?php
session_start(); 
include 'config.php';

$errors = [];

// Fetch the most recently added user from the database
$dbinfo = "SELECT firstName, lastName, email, mobile FROM user ORDER BY id DESC LIMIT 1";
$dbresult = mysqli_query($conn, $dbinfo);

// Check if the query was successful and if it returned any rows
if($dbresult && mysqli_num_rows($dbresult) > 0) {
    // Fetch user data
    $userData = mysqli_fetch_array($dbresult);
    $firstName = $userData['firstName'];
    $lastName = $userData['lastName'];
    $email = $userData['email'];
    $mobile = $userData['mobile'];
} else {
    // Handle case where user data is not found
    $firstName = "N/A";
    $lastName = "N/A";
    $email = "N/A";
    $mobile = "N/A";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="icon" type="images/x-icon" href="./images/logo graduation.jpg">
    <script src="https://kit.fontawesome.com/505ac9c513.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--nav bar-->
    <nav class="navbar">
    <div class="div-main-logo">
        <div class="div-logo">
        <img class="img-1" src="./images/final2.png" width="70" height="50">
        <a style="text-decoration: none; font-weight:700;" href="index.php" class="text-logo">Trus<span style="text-decoration: none; font-weight:700;" class="text-logo-tone">Tone</span></a>
        </div>
    </div>
    <div class="link">
        <div>
        <a class="link-text" href="index.php">Home</a>
        </div>
        <div>
            <a class="link-text" href="view.php">History</a>
        </div>
        <div style="background-color:#79CBF3; height:100%; padding:5px; border-radius: 4px;">
            <a class="link-text" style="color:white;" href="profile.php">Profile</a>
        </div>       
    </div>
    <div class="nav-btn-div">
    <div class="nav-btn-div-login">
        <button style="margin-left:90px;" class="btn1">
            <a href="welcome.php" class="alink1" style="text-decoration: none;">Log out</a>
        </button>
    </div>
    </div>
    </nav>

    <section>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <div class="card-text"><label style="color:#ffff">First Name : <span style="color:#F38E02"><?php echo $firstName;?></span></label></div>
                <br>
                <div class="card-text"><label style="color:#ffff">Second Name : <span style="color:#F38E02"><?php echo $lastName;?></span></label></div>
                <br>
                <div class="card-text"><label style="color:#ffff">Email : <span style="color:#F38E02"><?php echo $email;?></span></label></div>
                <br>
                <div class="card-text"><label style="color:#ffff">Mobile :<span style="color:#F38E02"><?php echo $mobile;?></span></label></div>
            </div>
            <div class="user">
                <div class="profile">
                    <img src="images\pp.png" class="rounded-avatar" width="80">
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>