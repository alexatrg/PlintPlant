<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title dan Icon -->
    <title>PlintPlant</title>
    <link rel="icon" type="x-icon" href="images/IKLC.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap File -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sc/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="sc/font-awesome/css/font-awesome.min.css">

    <!-- Fancy Box -->
    <link rel="stylesheet" href="sc/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vidaloka">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500">

    <!-- OwlCarousel -->
    <link rel="stylesheet" href="sc/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="sc/OwlCarousel/dist/assets/owl.theme.default.min.css">

    <!-- CSS File -->
    <link rel="stylesheet" href="css/default.css">

    <!-- Internal Stylesheet -->
    <style></style>

    <!-- PHP -->
    <?php
    session_start();
    include 'koneksi.php';
    if (isset($_SESSION["username"])) {
        $uname = $_SESSION["username"];

        $query = "SELECT * FROM user WHERE username='$uname'";
        $statement = $dbConn->prepare($query);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $status = $data['status'];
    }
    ?>
</head>

<body>
    <!-- Top Navbar -->
    <div class="top-bar">
        <div class="container">
            <div class="content-holder d-flex justify-content-between">
                <div class="info d-flex">
                    <div class="contact d-flex">
                        <p><a href="mailto:plintplant@company.com" target="blank"><i
                                    class="fa fa-envelope-o text-success"></i><span
                                    class="d-none d-md-inline">plintplant@company.com</span></a></p>
                        <p><a href="https://api.whatsapp.com/send?phone=6282173154102" target="blank"><i
                                    class="fa fa-phone text-success"></i><span class="d-none d-md-inline">+62
                                    821-731-541-02</span></a></p>
                    </div>
                </div>
                <div class="CTAs">
                    <?php
                        if(!empty($uname)){
                            echo '<a href="profil.php" class="login"> <i class="fa fa-user"></i><span class="d-none d-md-inline">'. $uname .'</span></a>';
                            echo '<a href="keluar.php" class="login"> <i class="fa fa-sign-out"></i><span class="d-none d-md-inline">Keluar</span></a>';
                        }
                        else{
                            echo '<a href="masuk.php" class="login"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline ">Masuk</span></a>';
                            echo '<a href="daftar.php" class="login"> <i class="fa fa-user"></i><span class="d-none d-md-inline">Daftar</span></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Gambar Navbar -->
            <a href="index.php" class="navbar-brand"><img src="images/plintplant.png" alt="..."></a>

            <!-- Toggle Responsive -->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span>Menu</span><i
                    class="fa fa-bars"></i></button>

            <!-- Bagian Navbar -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownMenuLink" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                        <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <?php include_once './endpoint/navbar.php'?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>

    <!-- Section Atas -->
    <section class="pt-5">
        <div class="container">
            <div class="pb-5">
                <?php $item = $_GET['item'];
                echo '<h1>Deskripsi <span class="text-primary">tumbuhan </span> '; echo $item; echo '</h1>';
                ?>
            </div>
            <div class="row">
                <?php include_once './endpoint/peritem.php' ?>
            </div>
        </div>
    </section>



    <!-- Page Footer-->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="about col-md-4">
                    <div class="logo"><img src="images/plintplant-w.png" alt="..."></div>
                    <p>PlintPlant adalah web yang menyediakan berbagai macam informasi tentang tumbuhan. Dibagi
                        berdasarkan kategori, anda dapat menemukan tanaman yang anda cari.</p>
                </div>
                <div class="site-links col-md-4">
                    <h3>Link tersedia</h3>
                    <div class="menus d-flex">
                        <ul class="list-unstyled">
                            <li> <a href="index.html">Homepage</a></li>
                            <li> <a href="category.html">Listings detail</a></li>
                            <li> <a href="detail.html">Listing detail</a></li>
                            <li> <a href="#">Privacy policy </a><span
                                    class="badge badge-secondary text-uppercase ml-1">Soon</span></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li> <a href="text.html">Text page</a></li>
                            <li> <a href="404.html">404 - Not found</a></li>
                            <li> <a href="contact.html">Contact</a></li>
                            <li> <a href="#">Pricing </a><span
                                    class="badge badge-secondary text-uppercase ml-1">Soon</span></li>
                        </ul>
                    </div>
                </div>
                <div class="contact col-md-4">
                    <h3>Hubungi kami</h3>
                    <div class="info">
                        <p>Villa Setiabudi Abadi 1</p>
                        <p>Telepon: +62 821-731-541-02</p>
                        <p>Email: <a href="mailto:plintplant@company.com">plintplant@company.com</a></p>
                        <ul class="social-menu lisy-inline">
                            <li class="list-inline-item"><a href="#" target="_blank" title="Facebook"><i
                                        class="fa fa-facebook"> </i></a></li>
                            <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><i
                                        class="fa fa-twitter"> </i></a></li>
                            <li class="list-inline-item"><a href="#" target="_blank" title="Pinterest"><i
                                        class="fa fa-pinterest"> </i></a></li>
                            <li class="list-inline-item"><a href="#" target="_blank" title="Instagram"><i
                                        class="fa fa-instagram"> </i></a></li>
                            <li class="list-inline-item"><a href="#" target="_blank" title="Vimeo"><i
                                        class="fa fa-vimeo"> </i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>&copy; 2019<span class="text-primary"> PlintPlant.</span> All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JS File -->
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/jquery/jquery.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/bootstrap-select/js/bootstrap-select.min.js">
    </script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/vendor/@fancyapps/fancybox/jquery.fancybox.min.js">
    </script>
    <script src="https://d19m59y37dris4.cloudfront.net/places/1-1-3/js/front.js"></script>

</body>
</html>