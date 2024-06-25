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
    header("location: login.php"); 
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

    <title>green coffee - about page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>
    <div class="bannar">
        <h1>about us </h1>
    </div>
    <div class="title2">
        <a href="home.php">home</a><span> / about</span>
    </div>
    <div class="about-category">
        <div class="box_about_cat">
            <img src="img/3.webp" alt="">
            <div class="detail">
                <span>coffee</span>
                <h1>lemon green</h1>
                <a href="view_products.php" class='btn'> shop now </a>
            </div>
        </div>
        <div class="box_about_cat">
            <img src="img/about.png" alt="">
            <div class="detail">
                <span>coffee</span>
                <h1>lemon teaname</h1>
                <a href="view_products.php" class='btn'> shop now </a>
            </div>
        </div>
        <div class="box_about_cat">
            <img src="img/about.png" alt="">
            <div class="detail">
                <span>coffee</span>
                <h1>lemon teaname</h1>
                <a href="view_products.php" class='btn'> shop now </a>
            </div>
        </div>
        <div class="box_about_cat">
            <img src="img/1.webp" alt="">
            <div class="detail">
                <span>coffee</span>
                <h1>lemon green</h1>
                <a href="view_products.php" class='btn'> shop now </a>
            </div>
        </div>
    </div>
    <!--  -->
           
    <section class='services'>
        <div class="title">
            <img src="img/download.png" class='logo' alt="">
            <h1>why choose us</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, delectus.</p>
        </div>

            <div class="box-container_about">
                <div class="box_about">
                    <img src="img/icon2.png" alt="">
                 <div class="detail">
                    <h3>grate saving </h3>
                    <p>save big every order</p>
                 </div>
                </div>
                <div class="box_about">
                    <img src="img/icon1.png" alt="">
                 <div class="detail">
                    <h3>24*7 support  </h3>
                    <p>one one one support</p>
                 </div>
                </div>
                <div class="box_about">
                    <img src="img/icon0.png" alt="">
                 <div class="detail">
                    <h3>gvouchers </h3>
                    <p>gvouchers one festival</p>
                 </div>
                </div>
                <div class="box_about">
                    <img src="img/icon.png" alt="">
                 <div class="detail">
                    <h3>worldwid delivery  </h3>
                    <p>dropship worldwide</p>
                 </div>
                </div>
            </div>
        </section>
        <!-- ============== img showroom in about bage============== -->
        <div class="about">
            <div class="row">
                <div class="img-box_about">
                    <img src="img/3.png" alt="">
                </div>
                <div class="detail_about">
                    <h1>visit our beautiful showroom! </h1>
                  <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quas, provident magnam dolorum illum impedit quae tenetur itaque reprehenderit aut vel illo officiis odio, aspernatur eligendi quam voluptatem incidunt possimus.</p> 

                <a href="view_products.php" class='btn'> shop now</a>
          
                </div>
            </div>
        </div>
        <!--  -->
        <div class="testimonial-container">
            <div class="title">
                <img src="img/download.png" class='logo' alt="">
                <h1>what pepole say about us</h1>
               <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, eius dic</p>

               </div>
               <div class='container'>
                <div class='testimonial-item active'>
                    <img src="img/01.jpg" alt="">
                    <h1>sara smith</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, totam voluptatum odio enim accusantium mollitia assumenda deleniti veniam rem ratione blanditiis error alias corporis! Facere unde error dolore eligendi ducimus!</p>
                </div>
                <div class='testimonial-item  '>
                    <img src="img/02.jpg" alt="">
                    <h1>john  smith</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, totam voluptatum odio enim accusantium mollitia assumenda deleniti veniam rem ratione blanditiis error alias corporis! Facere unde error dolore eligendi ducimus!</p>
                </div>

                <div class='testimonial-item '>
                    <img src="img/03.jpg" alt="">
                    <h1>selen smith</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, totam voluptatum odio enim accusantium mollitia assumenda deleniti veniam rem ratione blanditiis error alias corporis! Facere unde error dolore eligendi ducimus!</p>
                </div>


                <div class="left-arrow" onclick="nextSlide()"> <i class='bx bx-left-arrow-alt'> </i></div>
                <div class="right-arrow" onclick="prevSlide()"> <i class='bx bx-right-arrow-alt'> </i></div>

                <!--  -->
               </div>

        </div>

    <?php include 'footer.php'; ?>


</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <script type='text/javascript'>
        let slides = document.querySelectorAll('.testimonial-item ');
let index = 0;

function nextSlide(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prevSlide(){
    slides[index].classList.remove('active');
    index = (index- 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

        </script>


<!--  -->
    <?php include 'alert.php'; ?>

</body>
</html>