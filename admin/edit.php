<?php
    include("connection.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $edit_query = "SELECT * FROM information WHERE idNumber = '$id'";

        $edit_result = mysqli_query($conn, $edit_query);

        $row = mysqli_fetch_assoc($edit_result);

        // echo $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <section class="main">
        <nav class="nav-main">
            <div class="name">
                <p>Admin</p>
            </div>
            <div class="img">
                <img src="img/doctor3.png" alt="">
            </div>
        </nav>
    </section>
    <form action="update.php" method="post" enctype="multipart/form" class="info-staff" id="form-edit-staff"> 
        <div class="form__edit__staff">
            <div class="close" id="close-edit-staff">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>EDIT PROFILE</h2>
            <div class="idNumber">
                <input type="hidden" name="idNumber" value="<?php echo $row['idNumber']; ?>" />
            </div>
            
            <div class="avatar">
                <input type="hidden" id="img" name="image" value="<?php echo $row['image'];?>">
            </div>
            <div class="id">
                <input type="text" id="numberIndividual" name="numberIndividual" placeholder="Nhập mã số (*)" value="<?php echo $row['numberIndividual']; ?>">
            </div>
            <div class="name">
                <input type="text" id="name" name="name" placeholder="Nhập họ tên (*) " value="<?php echo $row['name'] ?>">
            </div>
            <div class="number">
                <input type="number" id="number" name="numberPhone" placeholder="Nhập số điện thoại (*)" value="<?php echo $row['numberPhone']; ?>">
            </div>
            <div class="khoa">
                <input type="text" id="khoa" name="majors" placeholder="Nhập khoa (*)" value="<?php echo $row['majors']; ?>">
            </div>
            <div class="info">
                <textarea name="info" id="info" cols="30" rows="3" placeholder="Nhập thông tin chi tiết..."><?php echo $row['info']; ?></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new" name="btnEditStaff">EDIT PROFILE
                </button>
            </div>
        </div>
    </form>

</body>
</html>