<?php 
include 'conection.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}
if(isset($_POST['logout'])){
    session_destroy();
    header("location:login.php"); 
}
?>
<style type="text/css">
    <?php include 'style.css' ?>

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css">

    <title>green coffee - home page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>
<section class='home-section'>
<div class='slider'>
    <div class='slider__slider slide1'>
        <div class='overlay'></div>
        <div class='slide-detail'>
            <h1>Welcome to my shop tea</h1>
            <p>Lorem ipsum dolor sit amet consectetur animi cupiditate laudantium incidunt vel sit.</p>
            <a href="view_products.php" class='btn'> Shop Now </a>
        </div>
        <div class='hero-dec-top'></div>
        <div class='hero-dec-bottom'></div>
    </div>
<!-- slide end -->
<div class='slider__slider slide2'>
        <div class='overlay'></div>
        <div class='slide-detail'>
            <h1>Wolcome to my shope</h1>
            <p>Lorem ipsum dolor sit amet consectetur animi cupiditate laudantium incidunt vel sit.</p>
            <a href="view_products.php" class='btn'> Shop Now </a>
        </div>
        <div class='hero-dec-top'></div>
        <div class='hero-dec-bottom'></div>
    </div>
    <!-- slide end -->
<div class='slider__slider slide3'>
        <div class='overlay'></div>
        <div class='slide-detail'>
            <h1>Wolcome to my shope</h1>
            <p>Lorem ipsum dolor sit amet consectetur animi cupiditate laudantium incidunt vel sit.</p>
            <a href="view_products.php" class='btn'> Shop Now </a>
        </div>
        <div class='hero-dec-top'></div>
        <div class='hero-dec-bottom'></div>
    </div>
    <!-- slide end -->
<div class='slider__slider slide4'>
        <div class='overlay'></div>
        <div class='slide-detail'>
            <h1>Wolcome to my shope</h1>
            <p>Lorem ipsum dolor sit amet consectetur animi cupiditate laudantium incidunt vel sit.</p>
            <a href="view_products.php" class='btn'> Shop Now </a>
        </div>
        <div class='hero-dec-top'></div>
        <div class='hero-dec-bottom'></div>
    </div>
    <!-- slide end -->
<div class='slider__slider slide5'>
        <div class='overlay'></div>
        <div class='slide-detail'>
            <h1>Wolcome to my shope</h1>
            <p>Lorem ipsum dolor sit amet consectetur animi cupiditate laudantium incidunt vel sit.</p>
            <a href="view_products.php" class='btn'> Shop Now </a>
        </div>
        <div class='hero-dec-top'></div>
        <div class='hero-dec-bottom'></div>
    </div>
    <!-- slide end -->
    <div class='left-arrow'><i class='bx bxs-left-arrow'></i></div>
    <div class='right-arrow'><i class='bx bxs-right-arrow'></i></div>
</div>
</section>

    <!--home  slide end  -->
    <section class='thumb'>
        <div class='box-container'>

            <div class='box'>
                <img src="img/thumb2.jpg" alt="">
                <h3>green tea</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <i class='bx bxs-chevron-right'></i>
            </div>
            <div class='box'>
                <img src="img/thumb0.jpg" alt="">
                <h3>lemon tea</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <i class='bx bxs-chevron-right'></i>
            </div>
            <div class='box'>
                <img src="img/thumb1.jpg" alt="">
                <h3>green coffee</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <i class='bx bxs-chevron-right'></i>
            </div>
            <div class='box'>
                <img src="img/thumb.jpg" alt="">
                <h3>green tea</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <i class='bx bxs-chevron-right'></i>
            </div>
        </div>
    </section>
    <!-- start  adv imgs -->
    <section class='container_ads'>
        <div class='box-container_ads'>

            <div class='box'>
                <img src="img/about-us.jpg" class='img_about' alt="">
            </div>

            <div class='box'>
                <img src="img/download.png" alt="">
                <span>helthy tea</span>
                <span class='b'>save up to 50% off</span>
                <p>Lorem ipsum dolor sit amet consectetur Natus, eius ab! Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>

             </div>
    </section>
  
<!-- start shop   -->
    <section class='shop'>
        <div class='title'>
            <img src="img/download.png" alt="">
            <h1>Trending Products</h1>
        </div>
        <div class='row'>
            <img  src="img/about.jpg"class='row-imgAbout'> 

            <div class="row-detail">
                <img src="img/basil.jpg" alt="">
                <div class="top-footer">
                    <h1>a cup of green tea makes you helthy</h3>
                </div>

            </div>
        </div>
        <!-- =============== items products  ================= -->
         
        <div class='box-container_trending'>

            <div class="box_trending">
                <img src="img/card.jpg" class='img-product' alt="">
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>
            <div class="box_trending">
                <img  src="img/d8.jpg"class='img-product' alt="">
                
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>
            <div class="box_trending">
                <img src="img/card2.jpg"class='img-product' alt="">
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>
            <div class="box_trending">
                <img src="img/d10.jpg" class='img-product' alt="">
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>
            <div class="box_trending">
                <img src="img/card0.jpg" class='img-product' alt="">
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>
            <div class="box_trending">
                <img src="img/d8.jpg"  class='img-product' alt="">
                <a href="view_products.php" class='btn' > Shop Now</a>
            </div>     
        </div>
    </section>
    <!-- end items -->









    <!-- start category_bannar -->
    <section class='shop-category_bannar2'> 
        <div class="box-container_bannar2">
            <div class="box_bannar2">
                <img src="img/6.jpg" class='photo-cat' alt="">
                 <div class='detail'>
                    <span>BIG OFFERS </span>
                    <h1>Extea 15% off </h1>
                    <a href="view_products.php" class='btn' > Shop Naw </a>
                 </div>
            </div>

            <div class="box_bannar2">
                <img src="img/7.jpg"  class='z' alt="">
                 <div class='detail'>
                    <span>new in test </span>
                    <h1>coffe house </h1>
                    <a href="view_products.php" class='btn' > Shop Naw </a>
                 </div>
            </div>
        </div>
    </section>
        <!-- end category_bannar  -->













        <!-- start services-->
        <section class='services'>
            <div class="box_container_services">
                <div class="box_services">
                    <img src="img/icon2.png" alt="">
                 <div class="detail">
                    <h4>grate saving </h4>
                    <p>save big every order</p>
                 </div>
                </div>
                <div class="box_services">
                    <img src="img/icon1.png" alt="">
                 <div class="detail">
                    <h4>24*7 support  </h4>
                    <p>one one one support</p>
                 </div>
                </div>
                <div class="box_services">
                    <img src="img/icon0.png" alt="">
                 <div class="detail">
                    <h4>gvouchers </h4>
                    <p>gvouchers one festival</p>
                 </div>
                </div>
                <div class="box_services">
                    <img src="img/icon.png" alt="">
                 <div class="detail">
                    <h4>worldwid delivery  </h4>
                    <p>dropship worldwide</p>
                 </div>
                </div>
            </div>
        </section>
             <!-- brands -->
        <section class='brand'>
         <div class='box-container_brand'>
            <div class="box_brand">
                <img src="img/brand (1).jpg" alt="">
            </div>
            <div class="box_brand">
                <img src="img/brand (2).jpg" alt="">
            </div>
            <div class="box_brand">
                <img src="img/brand (3).jpg" alt="">
            </div>
            <div class="box_brand">
                <img src="img/brand (4).jpg" alt="">
            </div>         
        </div>    
        </section>
        <!-- end  services-->
    <?php include 'footer.php'; ?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <?php include 'alert.php'; ?>

</body>
</html>