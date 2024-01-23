<?php
    require_once "upload.php";
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
	        // cek apakah yang mengakses halaman ini sudah login
	        if($_SESSION['usertype']==""){
		        header("location:index.php?pesan=gagal");
	        }
        ?>

        <header id="home">
            <a href="Home.php" class="logo">MT</a>
            <nav>
                <ul>
                    <li><a href="homeAdmin.php#home">Home</a></li>
                    <li><a href="#">Upload</a></li>
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
        
        <hr><hr><hr><hr><hr><hr><hr>

        <div id="novels" class="bigbox">
            <div>
                <a href="#popupU"><button id="upload" class="upload-button">Upload</button></a>
            </div>

            <div class="list">
                <?php
                $query = "SELECT * FROM title";
                $result = $database->query($query);

                while ($row = $database->fetchAssoc($result)) {
                    ?>
                    <div class="article">
                        <a href="detailNovel_admin.php?id=<?= $row['id_title'] ?>">
                            <img src="image/novels/<?= $row['cover'] ?>">
                        </a>
                        <h3><a href="detailNovel_admin.php?id=<?= $row['id_title'] ?>"><?= $row['title'] ?></a></h3>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div id="popup" class="popupU">
            <div class="popup-content">
                <h2>Upload</h2>
                <form action="upload.php" method="post" name="formUpload" enctype="multipart/form-data">
                    <img src="image/icon/icon-close.png" alt="close" id="closeU" class="close">
                    <input type="text" name="title" id="title" class="formUpload" placeholder="Input title"><br>
                    <textarea name="synopsis" id="synopsis" class="formUpload" placeholder="Summary..."></textarea><br><br><br>
                    <label for="cover">Foto:</label>
                    <input type="file" id="cover" name="cover"><br><br>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>

        <footer>
            <div class="links">
            <a href="homeAdmin.php#home">Home</a>
            <a href="#">Upload</a>
            </div>
    
            <div class="credit">
                <p>Created by <a href="">ErinnaAng</a>. | &copy; 2023.</p>
            </div>
        </footer>

        <script src="scriptUpload.js"></script>
    </body>
</html>
