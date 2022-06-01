<?php
    function checkLogin($conn){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $query = "select * from account where id = '$id'";

            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result)> 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        header("Location:login.php");
        die;
    }
?>