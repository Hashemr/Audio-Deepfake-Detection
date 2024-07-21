<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="icon" type="images/x-icon" href="./images/logo graduation.jpg">
    <script src="https://kit.fontawesome.com/505ac9c513.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/team.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div >
        <a class="link-text" href="index.php">Home</a>
        </div>
        <div>
            <a class="link-text" href="view.php">History</a>
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
            
            <div class="main-content-container" action="detect.php" method="post" enctype="multipart/form-data">
                    <img src="images\Our Team.png" alt="Kind Robot">
            </div>
    </div>
    
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
        <li class="menu__item" style="background-color:#79CBF3; height:100%; padding:5px; border-radius: 4px;"><a class="menu__link"  style="color:white;" href="team.php">Team</a></li>
    </ul>
    <p>&copy;TrustTone Team | All Rights Reserved</p>
  </footer>
    <script src="home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>