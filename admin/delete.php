<?php
    include("connection.php");
    if(isset($_GET['id'])){
        $idNumber = $_GET['id'];
        $query = "DELETE FROM information WHERE idNumber = '$idNumber'";

        $result = mysqli_query($conn, $query);
        header('location:index.php');
        die;
    }
    if(isset($_GET['idNews'])){
        $idNews = $_GET['idNews'];
        $queryNews = "DELETE FROM news WHERE id = '$idNews'";

        $resultNews = mysqli_query($conn, $queryNews);
        header('location:index.php');
        die;
    }
?>
