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

    <title>green coffee - home page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>

<div class="bannar">
        <h1>contact us </h1>
    </div>
    <div class="title2">
        <a href="home.php">home</a><span> / contact</span>
    </div>

    <section class='services_contact'>
            <div class="box-container_contact">
                <div class="box_contact">
                    <img src="img/icon2.png" alt="">
                 <div class="detail">
                    <h3>grate saving </h3>
                    <p>save big every order</p>
                 </div>
                </div>
                <div class="box_contact">
                    <img src="img/icon1.png" alt="">
                 <div class="detail">
                    <h3>24*7 support  </h3>
                    <p>one one one support</p>
                 </div>
                </div>
                <div class="box_contact">
                    <img src="img/icon0.png" alt="">
                 <div class="detail">
                    <h3>gvouchers </h3>
                    <p>gvouchers one festival</p>
                 </div>
                </div>
                <div class="box_contact">
                    <img src="img/icon.png" alt="">
                 <div class="detail">
                    <h3>worldwid delivery  </h3>
                    <p>dropship worldwide</p>
                 </div>
                </div>
            </div>
        </section>
      
        <div class='form-container'>
            <form action="" method='post'>
                <div class='title'>
                    <img src="img/download.png" class='logo'>
                    <h1>leave a message</h1>
                </div>

                <div class='input-field'>
                    <p>your name <span>*</span></p>
                    <input type="text" name="name">
                </div>
                <div class='input-field'>
                    <p>your email <span>*</span></p>
                    <input type="email" name="email">
                </div>
                <div class='input-field'>
                    <p>your number<span>*</span></p>
                    <input type="text" name="number">
                </div>
                <div class='input-field'>
                    <p>your message <span>*</span></p>
                    <textarea name="message" id=""></textarea>
                </div>
                <button type='submit' name='submit-btn' class='btn'>send message</button>
            </form>
            <!--  -->
 

        </div>


        <div class='address'>
            <div class='title'>
                    <img src="img/download.png" class='logo'>
                    <h1>contact detail</h1>
                    <p>Lorem ipsum dolor sit amet, Lorem, ipsum dolor amet, Lorem, ipsum dolor..</p>
                </div>


                <div class="box-container_contact_details">
                    <div class="box_contact_details">
                        <i class='bx bxs-map-pin'></i>
                        <div>
                             <h4>address</h4>
                             <p>Egypt</p>
                        </div>
                    </div>
                    <div class="box_contact_details">
                        <i class='bx bx-phone-call'></i>
                        <div>
                             <h4>phone</h4>
                             <p>+20 01285765185</p>
                        </div>
                    </div>
                    <div class="box_contact_details">
                        <i class='bx bx-message'></i>
                        <div>
                             <h4>email</h4>
                             <p>doaaapdelhai@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

    <?php include 'footer.php'; ?>


</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <?php include 'alert.php'; ?>

</body>
</html>