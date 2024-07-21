<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="images/x-icon" href="./images/logo graduation.jpg">
    <script src="https://kit.fontawesome.com/505ac9c513.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/history.css">
    <title>View</title>
    
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
        <div style="background-color:#79CBF3; height:100%; padding:5px; border-radius: 4px;">
            <a class="link-text" style="color:white;" href="view.php">History</a>
        </div>
        <div>
            <a class="link-text" href="profile.php">Profile</a>
        </div>       
    </div>
    <div class="nav-btn-div">
    <div class="nav-btn-div-login">
        <button style="margin-left:90px;" class="btn-logout">
            <a href="welcome.php" class="alink1" style="text-decoration: none;">Log out</a>
        </button>
    </div>
    </div>
    </nav>
    <!--nav bar-->
    <div class="main-content">
    <?php
    include "db_conn.php";
    $sql = "SELECT * FROM audios ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($audio = mysqli_fetch_assoc($res)) {
            ?>
                            <div class="audio-container">
                                <h2 style="color:white; margin:5px;">Reference Audio</h2>
                                <div class="audio-col">
                                    <audio style="color:white; margin:5px;" src="uploads/<?= $audio['audio_url'] ?>" controls></audio>
                                </div>
                            </div>

                            <div class="middle-column">
                                <h1 style="color:white;"><?= $audio["result"] ?></h1>
                            </div>

                            <div class="test-audio-container">
                                <h2 style="color:white; margin:5px;">Test Audio</h2>
                                <div class="test-audio-col">
                                    <audio style="color:white; margin:5px;" src="uploads/<?= $audio['test_audio'] ?>" controls></audio>
                                </div>
                            </div>
                <?php
        }
    } else {
        echo "<h1>Empty</h1>";
    }
    ?>
</div>


    
     <!--Footer-->
     <footer class="footer">
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
        <li class="menu__item"><a class="menu__link" href="index.php">Home</a></li>
        <li class="menu__item"><a class="menu__link" href="about.php">About</a></li>
        <li class="menu__item"><a class="menu__link" href="team.php">Team</a></li>
    </ul>
    <p>&copy;TrustTone Team | All Rights Reserved</p>
  </footer>


  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>