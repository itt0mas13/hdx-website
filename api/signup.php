<?php

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include_once('config2.php');

        $email = $_POST['email'];
        $senha=$_POST['senha'];
        $senha=password_hash($senha,PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "INSERT INTO usuarios(email,senha) VALUES ('$email','$senha')");

        header('Location: login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="eSports, Gaming, Tournament" />
    <meta name="description" content="Hydrox eSports é uma equipa amadora de vídeo-jogos fundada em 8 de Setembro de 2019 na Ilha da Madeira, Portugal. " />
    <title>HDX | Register</title>
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
                                <h3>Sign Up</h3>
                                <form action ="signup.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="input-text" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="senha" id="senha" class="input-text" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" id="submit" class="btn-md btn-theme btn-block">Signup</button>
                                    </div>
                                </form>
                                <p>Já tens conta?<a href="login.php"> Login</a></p>
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


