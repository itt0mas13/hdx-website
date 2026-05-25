<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="eSports, Gaming, Tournament" />
    <meta name="description" content="Hydrox eSports é uma equipa amadora de vídeo-jogos fundada em 8 de Setembro de 2019 na Ilha da Madeira, Portugal. " />
    <title>HDX | Hydrox eSports</title>

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
    <?php

        session_start();
    ?> 

    <!-- Preloader -->
    <div class="loader_screen preloader" id="preloader2">
        <img src="images/hdx gif.gif"> 
   </div>
    <!-- Preloader -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Carrinho <b>.</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <a href="cart.html" class="main-btn model-btn">Finalizar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Modal -->
    <div class="modal fade" id="contact-model-large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Contactos <b>.</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row contact-box">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome completo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Mensagem"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="main-btn model-btn">Enviar mensagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- HEADER AREA START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navber">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="images/logohdx.png" alt="game-img" class="img-fluid" width="120"></a>
            <div class="menu-main" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu-item">
                    <li class="nav-item">
                        <a class="nav-link nl-m-top abc mobile-content-hide"><i class="fa fa-search" aria-hidden="true" style="position: relative;left: 43px;"></i></a>
                        <div class="search top-search">
                            <button type="button" class="close fix-close">×</button>
                            <form>
                                <input type="search" value="" placeholder="Procurar aqui">
                                <button type="submit" class="btn btn-primary">Procurar</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="login.php"><i class="fa fa-user" aria-hidden="true" style="position: relative;left: 38px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="conta.html"><i class="fa fa-cog" aria-hidden="true" style="position: relative;left: 32px;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="custom-menubar">
            <ul class="nav-link-block">
                <li>
                    <a href="index.html" class="menu-link">Home</a>
                </li>
                <li>
                    <a href="sobre nos.html" class="menu-link">Sobre nós</a>
                </li>
                <li>
                    <a href="equipas.html" class="menu-link">Equipas</a>
                </li>
                <li>
                    <a href="streamers.html" class="menu-link">Streamers</a>
                </li>
                <li>
                    <a href="index.html#blog" class="menu-link">Últimas notícias</a>
                </li>
                <li>
                    <a class="menu-link" data-toggle="modal" data-target="#contact-model-large">Contactos</a>
                </li>   
            </ul>
            <ul class="responsive-nav">
                <li>
                    <a class="nav-link nl-m-top abc"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="search top-search">
                        <button type="button" class="close fix-close">×</button>
                        <form>
                            <input type="search" value="" placeholder="Procurar aqui" />
                            <button type="submit" class="btn btn-primary">Procurar</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="nav-link cart nl-m-top" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>2</span></a>
                </li>
                <li>
                    <a class="nav-link nl-m-top" href="login.html"><i class="fa fa-user" aria-hidden="true"></i></a>
                </li>
            </ul>
            <div class="menu-close">
                <a class="hide-menu-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </nav>
    <!-- HEADER AREA END -->

    <!-- BANNER AREA START -->
    <div class="follow-us">
        <span>SEGUE-NOS</span>
        <a href="https://www.twitch.tv/hdxesports"><i class="fa fa-twitch" aria-hidden="true"></i></a>
        <a href="https://twitter.com/hydrox_e_sports"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/profile.php?id=100063784740539"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/channel/UCi9Q-AGEJZ0ZFYXZOa5ml3w"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
    </div>

    
    <!-- BANNER AREA END -->

    <!-- GAMES AREA START -->
    
    <!-- GAMES AREA END -->

    <!-- ABOUT AREA START -->
    
    <!-- ABOUT AREA END -->

    <!-- COUNTER AREA START -->
    
    <!-- COUNTER AREA END -->

    <!-- MATCH AREA START -->
    
    <!-- MATCH AREA END -->

    <!-- WATCH AREA START -->


    <section id="equipas" style="margin-top: 205px ;margin-bottom: 140px;"> 
        <div class="col-lg-6">
            <div class="match-item2">
                <div class="row">
                    <div class="about-txt6">  
                        <span> <?php 
                            print $_SESSION ['email']

                        ?>
                        </span>
                    </div>
                </div>
            </div>
            
        </div>  
    </section>
    <!-- WATCH AREA END -->

    <!-- BRAND AREA START -->
    
    <!-- BRAND AREA END -->

    <!-- PLAYER AREA START -->
    
    <!-- PLAYER AREA END -->

    <!-- PRODUCT AREA START -->
    
    <!-- PRODUCT AREA END -->

    <!-- JOIN AREA START -->
    <!-- JOIN AREA END -->

    <!-- BLOG AREA START -->
    
    <!-- BLOG AREA END -->

    <!-- SUBSCRIBE AREA START -->
 
    <!-- SUBSCRIBE AREA END -->

    <!-- FOOTER AREA START -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 footer-logo">
                    <a href="index.html"><img src="images/logohdx.png" alt="game-img" class="img-fluid" width="200"></a>
                    <p>A Hydrox eSports é uma equipa amadora de vídeo-jogos fundada em 8 de Setembro de 2019 na Ilha da Madeira, Portugal, com o âmbito de desenvolver jogadores e triunfar pelo mundo. A equipa conta com uma staff dedicada, podendo dar o máximo aos seus jogadores esperando em troca bons resultados.</p>
                    <div class="footer-social">
                        <a href="https://www.twitch.tv/hdxesports"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/hydrox_e_sports"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100063784740539"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://www.youtube.com/channel/UCi9Q-AGEJZ0ZFYXZOa5ml3w"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Menu</h3>
                    <a href="index.html">Home</a>
                    <a href="">Torneios</a>
                    <a href="sobre nos.html">Sobre nós</a>
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Links</h3>
                    <a href="candidaturas.html">Junta-te à comunidade</a> 
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Informação</h3>
                    <a href="privacy policy.html">FAQ</a>
                    <a href="privacy policy.html">Privacy Policy</a>
                    <a href="sobre nos.html">Contactos</a>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER AREA END -->
    <!-- COPY_RIGHT AREA START -->
    <section id="copy_right">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-7 copy-right-txt">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023 Hydrox eSports powerd by  <a href="https://www.instagram.com/jtomasfreitas/?hl=pt">Tomás Freitas.</a></p>
                        </div>
                        <div class="col-lg-6 col-sm-5 text-right copy-right-txt">
                            <p>All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- COPY_RIGHT AREA END -->
    <!-- JavaScript -->
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
