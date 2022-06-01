<?php
    include("admin/connection.php");
    if(isset($_GET['idr'])){
        $idr = $_GET['idr'];
        
        $queryR = "SELECT * FROM information WHERE idNumber = '$idr'";
        $resultR = mysqli_query($conn, $queryR);

        $rowR = mysqli_fetch_assoc($resultR);

        $image = $rowR['image'];
        $name = $rowR['name'];
        $numberPhone= $rowR['numberPhone'];
        $majors = $rowR['majors'];
        $info = $rowR['info'];
        // echo($image);
        // echo($name . ' ' . $numberPhone . ' ' . $majors . ' ' .$info);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bệnh Viên Đa Khoa Tỉnh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <link rel="stylesheet" href="infomation/info.css"/>
    <script src="infomation/info.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body>
    <div class="ar-contact">
        <div class="ar-contact-us">
            <div class="icon-1">
                <i class="fa-solid fa-headset"></i>
            </div>
        </div>
        <div id="hotline">
            <p><i class="fa-solid fa-phone"></i> Hotline: 0325.181.115</p>
            <p><i class="fa-solid fa-truck-medical"></i> Cứu Thương: 0944.288.115</p>
        </div>
    </div>
    <header class="header">
        <a href="index.php" class="logo">
            <img src="image/logo.png" alt="Bệnh Viện Đa Khoa Tỉnh">
        </a>
        <nav class="navbar">
                <ul>
                <li>
                    <a href="index.php">Trang Chủ</a>
                </li>
                <li>
                    <a href="#intro">Giới Thiệu</a>
                </li>
                <li>
                    <a href="#team">Đội Ngũ Bác Sĩ</a>
                </li>
                <li>
                    <a href="#news">Tin Tức</a>
                </li>
                <li>
                    <a href="#contact">Liên Hệ</a>
                </li>
            </ul>
        </nav>
        <i id="icon" class="fa-solid fa-bars"></i>
    </header>

    <form method="" action="" class="main" id="main">
        
        <div class="content">
            <div class="img">
                <img src="image/<?php echo ($image)?>" alt="">
            </div>
            <div class="content-info">
                <div class="name">
                    <p><i class="fa-solid fa-user-doctor"></i> Bác sĩ:  <?php echo $name; ?></p>
                </div>
                <div class="numberPhone">
                    <p><i class="fa-solid fa-mobile"></i> Số Điện Thoại: <?php echo $numberPhone; ?></p>
                </div>
                <div class="majors">
                    <p><i class="fa-solid fa-book-medical"></i> Khoa: <?php echo $majors; ?></p>
                </div>
                <div class="info">
                    <p><i class="fa-solid fa-file-invoice"></i> Thông Tin:</br></br> <?php echo $info; ?></p>
                </div>
            </div>
        </div>
    </form>
    <footer class="about-us" id="about-us">
        <div class="about__us">
            <h2>Về Chúng Tôi </h2>
            <ul>
                <li>Địa chỉ: Đồng Quán- Bố Hạ- Yên Thế- Bắc Giang</li>
                <li>Hotline: 0325.181.115</li>
                <li>Cứu thương: 0944.288.115</li>
                <li>Email: ctcpyttamphuc@gmail.com</li>
                <li>Giờ làm việc: Sáng từ 6h45’ - 11h15’. Chiều từ 13h30’ - 17h</li>
                <li>Trực cấp cứu 24/7</li>
            </ul>
        </div>
        
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29707.977550560427!2d106.19552722324065!3d21.44899958296298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31354023a3f2975f%3A0x6fcca5248f633c98!2zQuG7kSBI4bqhLCBZw6puIFRo4bq_LCBC4bqvYyBHaWFuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1653757683311!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </footer>
</body>
</html>