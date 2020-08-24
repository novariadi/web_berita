<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/whatsapp.cs">
    <style>
        * {
            margin :0;
        }
        .header {
            background-color: rgb(87, 79, 139);
            height: 70px;
        }
        .header-logo {
            float: left;
            margin: 10px;
        }
        
        .menu-list li a {
            color: rgb(255, 255, 255);
            margin-top: 14px;
        }

        .content {
            margin-top: 90px;
        }

        p {
            padding: 15px 15px;
        }

        .text1 {
            background-color: rgb(88, 113, 158);
            color: white;
        }
        .text2 {
            background-color: rgb(91, 130, 139);
            color: white;
        }

        .text3 {
            background-color: rgb(114, 86, 126);
            color: white;
        }

        footer {
            background-color: rgb(87, 79, 139);
            height: 180px;
        }

        footer li {
            list-style: none;
        }

        .logo-footer {
            padding: 70px 60px;
        }

        .media-list {
            display: flex;
            padding: 80px 240px;
        }

        .media-list a {
            margin-right: 50px;
        }

        .footer-list li {
            float: left;
        }

        .fixed-whatsapp {
    position: fixed;
    bottom: 0px;
    right: 20px;
    width: 50px;
    height: 50px;
    z-index: 9999;
}

.fixed-whatsapp:before {
    content:"";
    background-repeat:no-repeat;
    background-size: 25px 25px;
    background-position:center center;
    width : 40px;
    height: 40px;
    background-image:url("img/whatsapp.png");
    background-color: black;
    position: absolute;
    top:0;
    left:0;
    border-radius:100%;
    box-shadow: 0 1px 1.5px 0 blank;
}

.fixed-whatsapp:after {
    content:"Hallo guys udah pada ngopi belum";
    width: 250px;
    padding:10px 10px;
    position: absolute;
    bottom: 20%;
    margin-bottom: 0px;
    right: 100px;
    left:-260px;
    text-align:right;
    color: black;
    border:1px solid white;
    background: white;
    border-radius:4px;
    opacity: 0;
    transition:all .4s ease-in-out;
    font-size: 90%;
    line-height:1.1;
}

.fixed-whatsapp:after {
    opacity:1;
    right:0;
}
        
    
    </style>
</head>
<body>
    <!-- Awal header -->
    <div class="header">
        <div class="header-logo">
            <a href="#"> <img src="img/logo.png" alt="" width="90px"> </a>
        </div>
        <div class="menu-list">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i>    Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-address-book"></i>        Contact</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#">profil</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Akhir Header -->

    <!-- Awal content -->
    <div class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="img/facebook.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/gambar1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/gambar2.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="text-content">
            <div class="row">
                <div class="text1 col-md-4">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem optio molestiae aliquid, ipsam nisi cupiditate, minima modi fuga, dolores asperiores a ipsum! Pariatur reprehenderit accusantium velit inventore quod veritatis quis.</p>
                </div>
                <div class="text2 col-md-4">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem optio molestiae aliquid, ipsam nisi cupiditate, minima modi fuga, dolores asperiores a ipsum! Pariatur reprehenderit accusantium velit inventore quod veritatis quis.</p>
                </div>
                <div class="text3 col-md-4">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem optio molestiae aliquid, ipsam nisi cupiditate, minima modi fuga, dolores asperiores a ipsum! Pariatur reprehenderit accusantium velit inventore quod veritatis quis.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir content -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- awal footer -->
    <footer>
        <div class="row">
            <div class="logo-footer col-md-4">
                <img src="img/logo.png" alt="" width="90px">
            </div>

                <!-- <br> -->
            <div class="media-list col-md-4">
                <!-- awal Instaram -->
                <a href="http://www.instagram.com/novariadi1">
                    <img src="img/instagram.png" width="30px" class="media"></a>
                <!-- akhir instagram -->

                <!-- awal facebook -->
                <a href="http://www.facebook.com">
                    <img src="img/facebook.png" width="30px" class="media"></a>
                <!-- akhir facebook -->

                <!-- awal whatsapp -->
                <a href="http://www.whatsapp.com">
                    <img src="img/whatsapp.png" width="30px" class="media"></a>
                <!-- akhir whatsapp -->
            </div>
            
            <div class="footer-list col-md-4">
                <ul>
                    <li>link1</li>
                    <li>link2</li>
                    <li>link3</li>
                    <li>link4</li>
                </ul>
            </div>
        </div>

        <!-- awal copyright -->
        <div class="row">
            <div class="col-md-12 text-center">
                <h6 class="footer-copyright">&copy; copyright 2020 | built by. Muhammad Novariadi</h6>
            </div>
        </div>
        <!-- akhir copyright -->

        <a class="fixed-whatsapp" href="https://api.whatsapp.com/send?phone=+62361001252 & text=Hallo guys udah pada ngopi belum" rel="nofollow noopener" target="blank" title="whatsapp"></a>

    </footer>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="vendor/fontawesome/js/all.js"></script>
</body>
</html>