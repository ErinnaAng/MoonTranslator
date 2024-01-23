<?php 
include 'dbconfig.php';
include 'formHandler.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM title WHERE id_title = $id";
    $result = $database->query($query);
    if ($result) {
        header("Location: detailNovel_admin.php");
    } else {
        echo "Failed to delete data.";
    }
} else {
    echo "Invalid request. Please provide an ID.";
}

header("Location: novel_admin.php");
?>
