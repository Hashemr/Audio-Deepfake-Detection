<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrusTone</title>
    <link rel="stylesheet" href="./css/about.css">
    <link rel="icon" type="images/x-icon" href="./images/logo graduation.jpg">
    <script src="https://kit.fontawesome.com/505ac9c513.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!--nav bar-->
    <nav class="navbar">
        <div class="div-main-logo">
            <div class="div-logo">
                <img class="img-1" src="./images/final2.png" width="70" height="50">
                <a style="text-decoration: none; font-weight:700;" href="index.php" class="text-logo">Trus<span
                        style="text-decoration: none; font-weight:700;" class="text-logo-tone">Tone</span></a>
            </div>
        </div>
        <div class="link">
            <div>
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
                <button style="margin-left:90px;" class="btn1">
                    <a href="welcome.php" class="alink1" style="text-decoration: none;">Log out</a>
                </button>
            </div>
        </div>
    </nav>
    <!--nav bar-->
    <div class="main-content-container">
        <button class="slide-left"><ion-icon name="arrow-back-outline"></ion-icon></button>
        <div class="slider">
            <div class="track">
                <div class="card">
                    <h1 style="color:#79CBF3;">Welcome to <spam style="color:#F38E02;">TrusTone</span> </h1>
                    <div style="color:black; margin:10px;">
                        Welcome to TrusTone, your ultimate ally in the fight against deep fake audio. With TrusTone, you
                        can rest assured that your audio content remains authentic and trustworthy. Our state-of-the-art
                        platform utilizes advanced deep learning algorithms to detect and neutralize deceptive audio
                        manipulation. Whether you're a media professional, content creator, or concerned individual.
                    </div>
                </div>
                <div class="card">
                    <h1 style="color:#79CBF3;">Our <spam style="color:#F38E02;">Approach</span> </h1>
                    <div style="color:black; margin:10px;">
                        At TrusTone, we use advanced computer algorithms to carefully examine audio files, examining
                        different parts of the audio spectrum in order to identify any changes or manipulations. </div>
                </div>
                <div class="card">
                    <h1 style="color:#79CBF3;">Why <spam style="color:#F38E02;">Choose TrusTone</span> </h1>
                    <div style="color:black; margin:10px;">
                        TrusTone is unique in that it is exceptionally efficient at identifying fake audio. We are at
                        the cutting edge of creativity, always developing our technology and adjusting to new techniques
                        that others try to get through.</div>
                </div>
                <div class="card">
                    <h1 style="color:#79CBF3;">Join <spam style="color:#F38E02;">Our Mission</span> </h1>
                    <div style="color:black; margin:10px;">
                        We gladly urge you to work with us to protect the audio content's integrity. Let's work together
                        to make sure that the digital environment is still a place where the truth is important.</div>
                </div>
            </div>
        </div>

        <button class="slide-right"><ion-icon name="arrow-forward-outline"></ion-icon></button>
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
            <li class="menu__item" style="background-color:#79CBF3; height:100%; padding:5px; border-radius: 4px;"><a class="menu__link" style="color:white;" href="about.php">About</a></li>
            <li class="menu__item"><a class="menu__link" href="team.php">Team</a></li>
        </ul>
        <p>&copy;TrustTone Team | All Rights Reserved</p>
    </footer>
    <script>
        let slideIndex = 0;
        document.querySelector('.slide-right').addEventListener('click', function () {
            const track = document.querySelector('.track');
            const cardCount = document.querySelectorAll('.card').length;
            if (slideIndex < cardCount - 1) {
                slideIndex++;
                track.style.transform = `translateX(-${slideIndex * 100}%)`;
            }
        });

        document.querySelector('.slide-left').addEventListener('click', function () {
            const track = document.querySelector('.track');
            if (slideIndex > 0) {
                slideIndex--;
                track.style.transform = `translateX(-${slideIndex * 100}%)`;
            }
        });
    </script>
    <script src="home.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>


</html>