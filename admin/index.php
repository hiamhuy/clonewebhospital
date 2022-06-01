<?php
    session_start();
    include("connection.php");
    include("function.php");
    include("delete.php");


    $user_data = checkLogin($conn);

    $query = "SELECT * FROM information";
    $result = mysqli_query($conn, $query);

    $queryNews = "SELECT * FROM news";
    $resultNews = mysqli_query($conn, $queryNews);
    /* add */
    if(isset($_POST['btn-add-new'])){
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $numberIndividual = $_POST['numberIndividual'];
        $name = $_POST['name'];
        $numberPhone = $_POST['numberPhone'];
        $majors = $_POST['majors'];
        $info = $_POST['info'];
        $queryAdd = "INSERT INTO information (image, numberIndividual, name, numberPhone, majors, info) 
        VALUES ('$image', '$numberIndividual', '$name', '$numberPhone', '$majors', '$info')";

        $resultAdd = mysqli_query($conn, $queryAdd);

        move_uploaded_file($image_tmp, 'img/'.$image);
        header('Location:index.php');
        die;
    }

    if(isset($_POST['btn-add-news'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $queryNews = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
        $resultNews = mysqli_query($conn, $queryNews);
        header('Location:index.php?m-news');
        die;
    }
    /* end */
    /* lay du lieu */
 
    if (isset($_GET['idNumber'])){
        $idNumber = $_GET['idNumber'];
 
        $queryEdit = "SELECT * FROM information WHERE idNumber = $idNumber";
        $resultEdit = mysqli_query($conn, $queryEdit);
        $row_up = mysqli_fetch_assoc($resultEdit);
     }

    /* end */
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="main.js"></script>
    <title>ADMIN</title>
</head>
<body>
    <form action="" class="info-staff" id="form-staff" method="post" enctype="multipart/form-data"> 
        <div class="form__staff">
            <div class="close" id="close">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>ADD NEW</h2>
            <div class="avatar">
                <input type="file" id="avatar" name="image"accept="image/png, image/jpeg">
            </div>
            <div class="id">
                <input type="text" name="numberIndividual" id="id" placeholder="Nhập mã số cá nhân (*)" required=" ">
            </div>
            <div class="name">
                <input type="text" name="name" id="name" placeholder="Nhập họ tên (*)" required=" ">
            </div>
            <div class="number">
                <input type="number" name="numberPhone" id="number" placeholder="Nhập số điện thoại (*)" required=" ">
            </div>
            <div class="khoa">
                <input type="text" name= "majors" id="khoa" placeholder="Nhập khoa (*)" required=" ">
            </div>
            <div class="info">
                <textarea name="info" id="info" cols="30" rows="3" placeholder="Nhập thông tin chi tiết..."></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new" name = "btn-add-new" >ADD NEW
                    <span><i class="fa-solid fa-circle-plus"></i></span>
                </button>
            </div>
        </div>
    </form>
    
    <form action="" method="get" class="info-staff" id="form-edit-staff"> 
        <div class="form__edit__staff">
            <div class="close" id="close-edit-staff">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>EDIT PROFILE</h2>
            
            <div class="idNumber">
                    <input type="hidden" name = "id" value="<?php echo $row_up['idNumber'];?>" id="idNumber">
            </div>
            <div class="avatar">
                <input type="file" id="avatar" name="avatar"accept="image/png, image/jpeg">
            </div>
            <div class="id">
                <input type="text" id="id" placeholder="Nhập mã số (*)" value="<?php echo $row_up['numberIndividual'];?>">
            </div>
            <div class="name">
                <input type="text" id="name" placeholder="Nhập họ tên (*)" required=" " value="<?php echo $row_up['name']; ?>">
            </div>
            <div class="number">
                <input type="number" id="number" placeholder="Nhập số điện thoại (*)"required=" " value="<?php echo $row_up['numberPhone']; ?>">
            </div>
            <div class="khoa">
                <input type="text" id="khoa" placeholder="Nhập khoa (*)"required=" " value="<?php echo $row_up['majors']; ?>">
            </div>
            <div class="info">
                <textarea name="info" id="info" cols="30" rows="3" placeholder="Nhập thông tin chi tiết..." ><?php echo $row_up['info']; ?></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new" name ="btnEditStaff">EDIT PROFILE
                </button>
            </div>
        </div>
    </form>

    <header class="header">
        <h2>ADMIN</h2>
        <nav class="navbar">
            <div class="function">
                <ul>
                    <li class="active"><a href="#m-staff">
                        <span><i class="fa-solid fa-circle-info">
                        </i></span> Quản Lý Thông Tin</a>
                    </li>
                </ul>
                 <ul>
                   <li><a href="#m-news">
                        <span><i class="fa-solid fa-newspaper"></i></span>
                        Quản Lý Tin Tức</a>
                    </li>
                </ul>
                <ul>
                <li><a href="../index.php">
                        <span><i class="fa-solid fa-pager"></i></span>
                        Page</a>
                    </li>
                </ul>
            </div>
            <div class="log-out">
                <ul>
                    <li><a href="logout.php">
                        <span><i class="fa-solid fa-right-from-bracket"></i></span>
                        Thoát</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="main">
        <nav class="nav-main">
            
            <div class="name">
                <?php
                     echo "Hi, " .$user_data['displayName'];
                ?>
            </div>
            <div class="img">
                <img src="img/<?php echo $user_data['avatar']?>" alt="">
            </div>
        </nav>
    </section>
    <div class="tab-content">
        <div id="m-staff" class="tab-content-item">
            <h2>Thông Tin</h2>
            <div class="btn-btn">
                <button id="btn-add-staff" class="btn-add">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </button>
            </div>
            <form action="" method="post" id="table" class="form-table">
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>ID</th>
                            <th>Mã số cá nhân</th>
                            <th>Họ Và Tên</th>
                            <th>Số Điện Thoại</th>
                            <th>Khoa</th>
                            <th>Thông Tin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <img src="img/<?php echo $row['image']?>" alt="">
                                    </td>
                                    <td>
                                        <?php echo $row['idNumber']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['numberIndividual']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['numberPhone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['majors']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['info']; ?>
                                    </td>  
                                    <td>
                                    <a href="#form-edit-staff&idNumber=<?php echo $row['idNumber'];?>" id="btn-edit-staff">
                                        <span><i class="fa-solid fa-user-pen"></i></span> 
                                    </a>
                                    <a onclick="return confirm ('Bạn chắc chắn xóa <?php echo $row['name'] ?> ?')" href="index.php?delete&id=<?php echo $row['idNumber'];?>" id="btn-del-staff">
                                        <span>
                                        <i class="fa-solid fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>                                              
                            <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="m-news" class="tab-content-item">
            <h2>Cập nhập tin tức</h2>
            <div class="btn-btn">
                <button id="btn-add-news"  class="btn-add">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </button>
            </div>
            <form action="" method="post" id="table" class="form-table">
                <table>
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Nội Dung</th>
                        <th></th>
                    </tr>
                    </thead>
                  <tbody>
                      <?php $j = 1; 
                        while($row = mysqli_fetch_assoc($resultNews))
                      {?>
                        <tr>
                            <td>
                                <p><?php echo $j++; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['id'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['title'] ?></p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $row['content']?>
                                </p>
                            </td>
                            <td>
                                <a href="#form-edit-news" id="btn-edit-news">
                                <span><i class="fa-solid fa-user-pen"></i></span> 
                                </a>
                                <a onclick="return confirm ('Bạn chắc chắn xóa <?php echo $row['title'] ?> ?')" href="index.php?delete&idNews=<?php echo $row['id'];?>" id="btn-del-news">
                                    <span>
                                    <i class="fa-solid fa-trash-can"></i>
                                    </span> 
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                  </tbody>
                  
                </table>
            </form>    
        </div>
    </div>
</form>
    <form action="" method="post" class="info-news" id="form-news"> 
        <div class="form__news">
            <div class="close" id="close-news">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>ADD NEWs</h2>
            <div class="title">
                <input type="text" name="title" id="title" placeholder="Nhập tiêu đề (*)" required=" ">
            </div>
            <div class="content">
                <textarea name="content" id="content" cols="30" rows="3" required=" " placeholder="Ghi nội dung tin tức...(*)"></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new" name="btn-add-news">ADD NEWs
                    <span><i class="fa-solid fa-circle-plus"></i></span>
                </button>
            </div>
        </div>
    </form>

    <form action="" class="info-news" id="form-edit-news"> 
        <div class="form__edit__news">
            <div class="close" id="close-edit-news">
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <h2>EDIT NEWs</h2>
            <div class="id__news">
                <input type="text" id="id-news" placeholder="Nhập ID">
            </div>
            <div class="title">
                <input type="text" id="title" placeholder="Nhập tiêu đề (*)">
            </div>
            <div class="content">
                <textarea name="content" id="content" cols="30" rows="3" placeholder="Ghi nội dung tin tức...(*)"></textarea>
            </div>
            <div class="btn-btn-add">
                <button id="btn-add-new">EDIT NEWs
                    <span><i class="fa-solid fa-circle-plus"></i></span>
                </button>
            </div>
        </div>
    </form>

 
</body>
</html>