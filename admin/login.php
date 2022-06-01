<?php
    session_start();
    include("connection.php");
    include("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css" type="text/css" media="all"/>
    <script src="login.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="login-title">
                ADMIN ĐĂNG NHẬP
            </div>
            <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="user_name">
                            <input type="text" name="user_name" required="" placeholder="Tài Khoản">
                        </div>
                        <div class="password">
                            <input type="password" name="password" required="" placeholder="Mật Khẩu">
                        </div>
                    </div>
                    <div class="login-btn">
                        <div class="login-button">
                            <button type="submit" name="btn-login">Đăng Nhập</button>
                        </div>
                        <div class="login-text">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST');
                                {
                                    if(isset($_POST['btn-login'])){
                                        $user_name = $_POST['user_name'];
                                        $password = $_POST['password'];
                                        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
                                            $query = "SELECT * FROM account WHERE userName ='$user_name'";
                                            $result = mysqli_query($conn, $query);
                                            if($result)
                                            {
                                                if($result && mysqli_num_rows($result)> 0){
                                                    $user_data = mysqli_fetch_assoc($result);
                                                     
                                                    if($user_data['userName'] === $user_name &&$user_data['passWord'] === $password)
                                                    {
                                                        $_SESSION['id'] = $user_data['id'];
                                                        
                                                        header('Location:index.php');
                                                        die;
                                                    }
                                                }
                                            }
                                            $errorTitle = "Sai tài khoản hoặc mật khẩu. Vui lòng kiểm tra lại !";
                                            echo $errorTitle;
                                        }
                                         else{
                                            echo "Hãy nhập đúng định dạng tài khoản hoặc mật khẩu!";
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>