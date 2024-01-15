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
                    <li><a href="#">Project</a></li>
                    <li><a href="#">Upload</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <img src="image\header\stars.png" id="stars">
            <img src="image\header\moon.png" id="moon">
            <img src="image\header\mountains_behind.png" id="mountains_behind">
            <h2 id="textLogin"> Hi, Admin <?php echo $_SESSION['username']; ?>! </h2>
            <a href="novel.php" id="btn">Upload Stories</a>
            <img src="image\header\mountains_front.png" id="mountains_front">
        </section>
        <hr><hr><hr>

        <div id="novels" class="bigbox">
            <div class="releases">
                <h2>Latest Update</h2>
                <a href="novel.php"><button>view all</button></a>
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
                    <a href="#"><img src="image\novels\twsb.jpg"></a>
                    <h3><a href="#">What Happens When the Second Male Lead Powers Up</a></h3>
                </div>
            </div>
        </div>

        <footer>
            <div class="links">
            <a href="#home">Home</a>
            <a href="#">Project</a>
            <a href="#">upload</a>
            </div>
    
            <div class="credit">
                <p>Created by <a href="">ErinnaAng</a>. | &copy; 2023.</p>
            </div>
        </footer>

        <script src="script.js"></script>
    </body>
</html>
