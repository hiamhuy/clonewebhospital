<?php
include("connection.php");

if(isset($_POST["btnEditStaff"])){

    $id = $_POST["idNumber"];
    $image = $_POST["image"];
    $numberIndividual = $_POST['numberIndividual'];
    $name = $_POST['name'];
    $numberPhone = $_POST['numberPhone'];
    $majors = $_POST['majors'];
    $info = $_POST['info'];

    $update_query = "UPDATE information SET image = '$image', numberIndividual = '$numberIndividual', name = '$name',numberPhone = '$numberPhone', majors = '$majors', info = '$info' WHERE idNumber = '$id'"; 

    $update_staff_result = mysqli_query($conn, $update_query);
    header("Location: index.php");
    die();
}

?>