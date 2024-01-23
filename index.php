<?php
include "dbconfig.php";
include "formHandler.php";

$query = "SELECT * FROM title";
$result = $database->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Moon'Edge Translator</title>
        <link rel="icon" href="image\header\icon-moon.png" type="image/icon type">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php 
    	if(isset($_GET['pesan'])){
	    	if($_GET['pesan']=="gagal"){
                echo "<div id='alertPopup' class='alert'>Username and password are wrong! Please try again.</div>";
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.querySelector('.popupL').style.display = 'flex';
                        });

                        document.getElementById('closeL').addEventListener('click', function () {
                            document.querySelector('.popupL').style.display = 'none';
                        });
                    </script>";
                }
            }
        ?>

        <header id="home">
            <a href="#home" class="logo">MT</a>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="novel.php#novels">Novels</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#popupL" id="login">Login</a></li>
                    <li><a href="#popupS" id="signup">Signup</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <img src="image\header\stars.png" id="stars">
            <img src="image\header\moon.png" id="moon">
            <img src="image\header\mountains_behind.png" id="mountains_behind">
            <h2 id="text">Hello Moon!</h2>
            <a href="novel.php" id="btn">Let's Read</a>
            <img src="image\header\mountains_front.png" id="mountains_front">
        </section>
        <hr><hr><hr>

        <div id="novels" class="bigbox">
            <div class="releases">
                <h2>Latest Update</h2>
                <a href="novel.php"><button>View All</button></a>
            </div>

            <div class="list">
                <?php
                $query = "SELECT * FROM title";
                $result = $database->query($query);

                while ($row = $database->fetchAssoc($result)) {
                    ?>
                    <div class="article">
                        <a href="detailNovel.php?id=<?= $row['id_title'] ?>">
                            <img src="image/novels/<?= $row['cover'] ?>">
                        </a>
                        <h3><a href="detailNovel.php?id=<?= $row['id_title'] ?>"><?= $row['title'] ?></a></h3>
                    </div>
                <?php } ?>
            </div>
        </div>

        
        <div id="about" class="sec">
            <div class="releases">
                <h2>About Us</h2>
            </div>
            <p>Welcome to Moon'Edge, where we open a window to the world of
                Korean novels and weave a bridge between language and culture.
                Moon'Edge is a Korean novel translation platform that not only 
                provides access to popular Korean novels but also offers a diverse 
                range of merchandise inspired by the beautiful world of novels.
                From Here I'll call you Moon. Welcome to Moon'Edge Moon
                <br><br><br>
            </p>

            <div class="releases">
                <h2>Recruitment</h2>
            </div>
            <p>We're currently recruiting <b>Korean Translator ONLY.</b>
                <br><br>
                If you're interested and want to apply you can read more
                about how for the specific position roles below
                <br><br>
            </p>
            <ul>
                <li><a href="#">Korean Translator</a></li>
            </ul>
        </div>

        <div id="popup" class="popupL">
            <div class="popup-content">
                <h2>Log In</h2>
                <form action="login.php" method="post" name="FormLogin">
                    <img src="image/icon/icon-close.png" alt="close" id="closeL" class="close">
                    <input type="text" name="username" id="username" class="formLogin" placeholder="Username" required>
                    <input type="password" name="password" id="passwordL" class="formLogin" placeholder="Password" required>
                    <button type="submit">Log In</button>
                </form>
            </div>
        </div>

        <div id="popup" class="popupS">
            <div class="popup-content">
                <h2>Sign Up</h2>
                <form method="post" action="register.php" name="FormSignup" id="signForm" class="signForm" onsubmit="validateform()">
                    <img src="image/icon/icon-close.png" alt="close" id="closeS" class="close">
                    <input type="text" name="username" id="name" class="required" placeholder="Username" required>
                    <input type="email" name="email" id="email" class="required-email" placeholder="Email" required>
                    <input type="password" name="password" id="password" class="required-password" placeholder="Password" required>
                    <input type="password" name="confirm_password" id="Cpassword" class="required-Cpassword" placeholder="Confirm Password" required>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>

        <footer>
            <div class="links">
            <a href="#home">Home</a>
            <a href="novel.php">Novels</a>
            <a href="#about">About</a>
            </div>
    
            <div class="credit">
                <p>Created by <a href="">ErinnaAng</a>. | &copy; 2023.</p>
            </div>
        </footer>

        <script src="script.js"></script>
    </body>
</html>
