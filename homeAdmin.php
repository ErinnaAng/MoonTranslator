<?php
include "dbconfig.php";
include "formHandler.php";

$query = "SELECT * FROM title";
$result = $database->query($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Moon'Edge Admin</title>
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
                    <li><a href="novel_admin.php">Upload</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <img src="image\header\stars.png" id="stars">
            <img src="image\header\moon.png" id="moon">
            <img src="image\header\mountains_behind.png" id="mountains_behind">
            <h2 id="textLogin"> Hi, Admin <?php echo $_SESSION['username']; ?>! </h2>
            <a href="upload.html" id="btn">Upload Stories</a>
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


        <footer>
            <div class="links">
            <a href="#home">Home</a>
            <a href="novel_admin.php">Upload</a>
            </div>
    
            <div class="credit">
                <p>Created by <a href="">ErinnaAng</a>. | &copy; 2023.</p>
            </div>
        </footer>

        <script src="script.js"></script>
    </body>
</html>
