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
                <h2>Popular</h2>
            </div>

            <div class="list">
                <div class="article">
                    <a href="#"><img src="image\novels\tcf.jpg"></a>
                    <h3><a href="#">Trash of the Count's Family</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\rim.jpg"></a>
                    <h3><a href="#">Regressor Instruction Manual</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\omv.jpg"></a>
                    <h3><a href="#">Omniscient Reader's Viewpoint</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\twsb.jpg"></a>
                    <h3><a href="#">What Happens When the Second Male Lead Powers Up</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\sss.jpg"></a>
                    <h3><a href="#">The S-Classes That I Raised</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\sl.jpg"></a>
                    <h3><a href="#">Solo Leveling</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\htlep.jpg"></a>
                    <h3><a href="#">How to Live as the Enemy Prince</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\sf0.jpg"></a>
                    <h3><a href="#">Superstar From Age 0</a></h3>
                </div>

                <div class="article">
                    <a href="#"><img src="image\novels\twgn.jpg"></a>
                    <h3><a href="#">Trapped in a Webnovel as a Good-For-Nothing</a></h3>
                </div>
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
