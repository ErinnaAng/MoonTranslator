<?php
include 'dbconfig.php';
include 'formHandler.php';

if (isset($_GET['id'])) {
    $id_title = $_GET['id'];

    // Fetch details of the selected novel
    $query = "SELECT * FROM title WHERE id_title = :id";
    $stmt = $database->pdo->prepare($query);
    $stmt->bindParam(':id', $id_title, PDO::PARAM_INT);
    $stmt->execute();
    $novelDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($novelDetails) {
        $cover = $novelDetails["cover"];
        $title = $novelDetails["title"];
        $synopsis = $novelDetails["synopsis"];
    } else {
        echo "Novel not found";
    }    
} else {
    echo "Invalid request";
}
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
        <a href="#home" class="logo">MT</a>
        <nav>
            <ul>
                <li><a href="homeUser.php#home">Home</a></li>
                <li><a href="novel.php#novels">Novels</a></li>
                <li><a href="homeUser.php#about">About</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <main role="main">
        <article id="novelDetail">
            <header class="novelheader">
                <div class="glassBackground">
                    <img src="image\novels\<?= $cover ?>">
                    <div class="glassShade"></div>
                </div>
                <div class="header-bodyContainer">
                    <div class="fixed-img">
                        <figure class="Cover">
                            <img src="image\novels\<?= $cover ?>">
                        </figure>
                    </div>
                    <div class="novelInfo">
                        <div class="main-head">
                            <h1><?= $title ?></h1>
                        </div>
                        <nav class="links">
                            <a id="readchapter" class="buttonlinks"><button>Read<br><small>Chapter 1</small></button></a>
                        </nav>
                    </div>
                </div>
            </header>
            <div class="novel-body">
                <section id="infoSum">
                    <div class="summary">
                        <h4 class="lined">Summary</h4>
                        <div class="summary-content">
                            <p><?= nl2br($synopsis) ?></p>
                        </div>
                    </div>
                </section>
            </div>
        </article>
    </main>

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

</body>
</html>
