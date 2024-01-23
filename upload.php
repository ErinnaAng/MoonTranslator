<?php
session_start();  // Start the session once at the beginning

include_once "dbconfig.php";
include_once "formHandler.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture data upload
    $title = $_POST['title'];
    $synopsis = $_POST['synopsis'];
    $cover = $_FILES['cover']['name'];
    $ukuran = $_FILES['cover']['size'];
    $file_tmp = $_FILES['cover']['tmp_name'];

    // Check if the required form fields are set
    if (isset($_POST['title'], $_POST['synopsis'], $_FILES['cover'])) {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $nama = $_FILES['cover']['name'];  // Use 'cover' instead of 'file'
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['cover']['size'];
        $file_tmp = $_FILES['cover']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, 'file/' . $nama);

                // Insert data into the database
                $query = $pdo->prepare("INSERT INTO title (title, cover, synopsis) VALUES (:title, :cover, :synopsis)");
                $query->bindParam(':title', $title);
                $query->bindParam(':cover', $cover);
                $query->bindParam(':synopsis', $synopsis);

                // Ensure that title, cover, and synopsis are not null
                if (!empty($title) && !empty($cover) && !empty($synopsis)) {
                    // Execute the query
                    $query->execute();
                    echo "Data has been uploaded. <a href='Home.php'>View Data</a>";
                } else {
                    // Handle the case where required values are missing
                    echo "Error: Title, cover, and synopsis are required.";
                }
            } else {
                echo "Failed to upload data";
            }
        }
    }

    header("location:novel_admin.php#popupU");
    exit();
}
