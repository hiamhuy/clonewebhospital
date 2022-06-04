<?php
    include("connection.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $edit_query = "SELECT * FROM news WHERE id = '$id'";

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
    <link rel="stylesheet" href="edit_news.css">
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
    <form action="update_news.php" method="post"class="info-news" id="form-edit-news"> 
        <div class="form__edit__news">
            <div class="close" id="close-edit-news">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>EDIT NEWs</h2>
            <div class="id__news">
                <input type="hidden" name="id" id="id-news" placeholder="Nhập ID" value="<?php echo $row["id"]?>">
            </div>
            <div class="title">
                <input type="text" name="title" id="title" placeholder="Nhập tiêu đề (*)" value="<?php echo $row['title']?>">
            </div>
            <div class="content">
                <textarea name="content" id="content" cols="30" rows="3" placeholder="Ghi nội dung tin tức...(*)"><?php echo $row['content']?></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new" name = "btnEditNews">EDIT NEW
                </button>
            </div>
        </div>
    </form>
</body>
</html>