<?php
include "dbconfig.php";
include "formHandler.php";

$query = "SELECT * FROM title";
$result = $database->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Moon'Edge Novels</title>
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
            <a href="Home.php" class="logo">MT</a>
            <nav>
                <ul>
                    <li><a href="homeUser.php">Home</a></li>
                    <li><a href="#novels">Novels</a></li>
                    <li><a href="homeUser.php#about">About</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
                <div class="search-container">
                    <div class="search-box">
                        <input type="search" id="novelSearch" class="search" placeholder="Search...">
                        <div class="search-results" id="searchResults"></div>
                    </div>
                </div>
            </nav>
        </header>

        <hr><hr><hr><hr><hr>

        <div id="novels" class="bigbox">
            <div class="releases">
                <h2>Latest Update</h2>
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

        <footer>
            <div class="links">
            <a href="homeUser.php">Home</a>
            <a href="#novels">Novels</a>
            <a href="homeUser.php#about">About</a>
            </div>
    
            <div class="credit">
                <p>Created by <a href="">ErinnaAng</a>. | &copy; 2023.</p>
            </div>
        </footer>

        <script src="script.js"></script>
    </body>
</html>
