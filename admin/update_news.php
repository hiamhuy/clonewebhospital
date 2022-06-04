<?php 
include("connection.php");
if(isset($_POST["btnEditNews"])){
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $update_query = "UPDATE news SET title = '$title', content = '$content' WHERE id = '$id'";
    $update_news_result= mysqli_query($conn, $update_query); 
    // echo $update_query; exit;
    header('Location:index.php');
    die();
}
?>