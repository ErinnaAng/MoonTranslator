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
	        session_start();
    
	        // cek apakah yang mengakses halaman ini sudah login
	        if($_SESSION['usertype']==""){
		        header("location:index.php?pesan=gagal");
	        }
        ?>
        
        <header id="home">
            <a href="#home" class="logo">MT</a>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="novel.php#novels">Novels</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <img src="image\header\stars.png" id="stars">
            <img src="image\header\moon.png" id="moon">
            <img src="image\header\mountains_behind.png" id="mountains_behind">
            <h2 id="textLogin"> Hi, <?php echo $_SESSION['username']; ?>! </h2>
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
