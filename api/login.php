<?php
    include 'config2.php';
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $select_user="SELECT * FROM usuarios WHERE email='$email'";
        $run_qry=mysqli_query($conn,$select_user);
        if(mysqli_num_rows($run_qry)>0){
            while ($row=mysqli_fetch_assoc($run_qry)){
                if(password_verify($senha,$row['senha'])){
                    $email=$row['email'];
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    header("location:index.php");
                }
                else{
                   header("location:login.php");
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="eSports, Gaming, Tournament" />
    <meta name="description" content="Hydrox eSports é uma equipa amadora de vídeo-jogos fundada em 8 de Setembro de 2019 na Ilha da Madeira, Portugal. " />
    <title>HDX | Login</title>
    <!--font-awesome icons link-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/venobox.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!--main style file-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="/hdxwebsite/images/logohdx.png">
</head>

<body id="darkmode">

    <!-- preloader part start -->
    <div class="loader_screen preloader" id="preloader2">
        <img src="images/hdx gif.gif"> 
   </div>
    <!-- preloader part start -->

    <!-- Login start -->
    <div class="login-12">
        <div class="container">
            <div class="col-md-12 pad-0">
                <div class="row login-box-12">
                    <div class="col-lg-7 col-sm-12 col-pad-0 align-self-center">
                        <div class="login-inner-form">
                            <div class="details">
                                <h3>Login</h3>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="input-text" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" id ="senha"class="input-text" placeholder="Password">
                                    </div>
                                    <div class="checkbox clearfix">
                                        <div class="form-check checkbox-theme">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">
                                                Lembrar-me
                                            </label>
                                        </div>
                                        <a href="#">Forgot Password</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="login" id="login" class="btn-md btn-theme btn-block">Login</button>
                                    </div>
                                </form>
                                <p>Não tens conta?<a href="signup.php"> Criar conta</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-pad-0 bg-img align-self-center none-992">
                        <a href="index.html" class="logoss">
                            <img src="images/logohdx.png" alt="game-img" class="img-fluid">
                        </a>
                        <ul class="social-list clearfix">
                            <li><a href="https://www.facebook.com/profile.php?id=100063784740539"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/hydrox_e_sports"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCi9Q-AGEJZ0ZFYXZOa5ml3w"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="https://www.instagram.com/hydrox_e_sports/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login end -->

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/venobox.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
