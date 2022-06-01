<?php
    session_start();
    include("admin/connection.php");

    $query = "SELECT * FROM information";
    $result = mysqli_query($conn, $query);

    $queryNews = "SELECT * FROM news";
    $resultNews = mysqli_query($conn, $queryNews);
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
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src = "js/script.js"></script>
</head>
<body class="preLoading">
    <div class="load">
        <img src="img/loading.gif" alt=" ">
    </div>
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
        <a href="#home" class="logo">
            <img src="image/logo.png" alt="Bệnh Viện Đa Khoa Tỉnh">
        </a>
        <nav class="navbar">
                <ul>
                <li>
                    <a href="#home">Trang Chủ</a>
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
    <section class="home" id = "home">
        <div class="image" id = "image">
            <img src="image/about-doctor.png" alt="">
        </div>
        <div class="content" id="content">
            <h3 id="nameHospital">Bệnh Viện Đa Khoa Tỉnh</h3>
            <p id="text">" Thiện Tâm Vì Người Bệnh - Hạnh Phúc Cho Mọi Nhà "</p>
            <a id="en" href="#contact" class="btn">Liên Hệ Ngay <span><i class="fa-solid fa-angle-right"></i></span></a>
        </div>
    </section>
    <section class="intro" id="intro">
        <div class="content">
            <h2>VỀ CHÚNG TÔI +</h2>
            <p>
                Phòng khám đa khoa chất lượng cao Bố Hạ chính thức khai trương ngày 15 tháng 08 năm 2010. Trên chặng đường hình thành và phát triển của phòng khám chất lượng khám chữa bệnh luôn là tiêu chí được ưu tiên hàng đầu. Bên cạnh việc đầu tư vào cơ sở vật chất, thiết bị y tế, phòng khám còn luôn chú trọng đào tạo đội ngũ nhân viên y tế giỏi chuyên môn, giàu Y đức. Đến nay, phòng khám trở thành điểm đến tin cậy cho nhu cầu chăm sóc sức khỏe của bà con nhân dân tỉnh Bắc Giang nói riêng và các tỉnh khu vực phía Bắc nói chung.Có thể nói rằng bên cạnh rất nhiều cơ hội cũng là không ít khó khăn thử thách đối với tập thể cán bộ nhân viên trong toàn phòng khám
            </p>
            <a href="#" class="btn">Xem chi tiết <span><i class="fa-solid fa-angle-right"></i></span></a>
        </div>
        <div class="image">
            <img src="image/about-us.jpg" alt="">
        </div>
    </section>
    <section class="team" id="team">
        <div class="title">
            <h2>Đội Ngũ Bác Sĩ</h2>
            <span><img src="image/dauthap.png" alt=""></span>
        </div>
        <div class="carousel" data-flickity='{ "groupCells": true }'>
            <?php while($row = mysqli_fetch_assoc($result)){?> 
                <div class="carousel-cell">
                    <div class="img">
                            <img src="image/<?php echo $row['image'];?>" alt=" ">
                        </div>
                        <div class="details">
                            <div class="name"><?php echo $row['name'];?></div>
                        </div>
                        <div class="button">
                            <a href="info.php?idr=<?php echo $row['idNumber']?>" class="btn" id="button">Xem Thông Tin <span><i class="fa-solid fa-circle-info"></i></span></a>
                    </div>
                </div>
            <?php } ?> 
        </div>

    </section>
    <section class="news" id="news">
        <h2>Tin Tức</h2>
        <span><img src="image/dauthap.png" alt=""></span>
        <div class="content">
            <?php while ($row = mysqli_fetch_assoc($resultNews)) {?>
            <ul>
                <li>
                    <a href="#"><?php echo $row['title'];?></a>
                </li>
            </ul>
            <?php }?>
            <div class="image">
                <img src="image/Medical.png" alt="">
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="img">
            <img src="image/doctor10.png" alt="">
        </div>
        <form action="#">
            <h2>Đặt Lịch Khám Ngay Hôm Nay</h2>
            <p>Vui lòng nhập đầy đủ thông tin để gửi mail, và nhân viên tư vấn sẽ điện lại ngay cho bạn sau ít phút</p>
            <div class="contact__mail">
                <div class="name">
                    <input type="text" id="name" placeholder="Nhập họ tên của bạn (*)">
                </div>
                <div class="number">
                    <input type="number" id="number" placeholder="Nhập số điện thoại của bạn (*)">
                </div>
                <div class="email">
                    <input type="email" id="email" placeholder="Nhập email của bạn (*)">
                </div>
                <div class="time">
                    <input type="date" id="time" placeholder=" ">
                </div>
                <div class="list">
                    <select id="list">
                        <option value="1" selected>Chọn chuyên khoa</option>
                        <option value="2">Khoa Nội</option>
                        <option value="3">Khoa Ngoại</option>
                        <option value="4">Răng-Hàm-Mặt</option>
                        <option value="5">Chuẩn Đoán Hình Ảnh</option>
                        <option value="6">Tai-Mũi-Họng</option>
                        <option value="7">Chuẩn Đoán Hình Ảnh</option>
                        <option value="8">Xét Nghiệm</option>
                        <option value="9">Y Học Cổ Truyền</option>
                    </select>
                </div>
                <div class="address">
                    <input type="text" id="address" placeholder="Nhập địa chỉ của bạn (*)">
                </div>
                <div class="note">
                    <textarea name="note" id="note" cols="30" rows="3" placeholder="Ghi chú ... "></textarea>
                </div>
                <div class="btn-submit">
                    <input type="submit" id="btn">
                </div>
            </div>
        </form>
    </section>
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