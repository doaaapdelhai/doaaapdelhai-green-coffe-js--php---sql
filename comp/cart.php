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

 //delete item from wishlist
 if (isset($_POST['delete_item'])) {
    $wishlist_id = filter_var($_POST['wishlist_id'], FILTER_SANITIZE_STRING);

   $varify_delete_items = $conn->prepare("SELECT COUNT(*) FROM wishlist WHERE id = ?");
   $varify_delete_items->execute([$wishlist_id]);
    $count =$varify_delete_items->fetchColumn();

    if ($count > 0) {
        $delete_wishlist_id  = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
        $delete_wishlist_id ->execute([$wishlist_id]);
        $success_msg[] = "Wishlist item deleted successfully";
    } else {
        $warning_msg[] = "Wishlist item already deleted";
    }
}
 ?>
 <!-- end delete item from wishlist -->

<style type="text/css">
    <?php include 'style.css' ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css">
    <title>green coffee - cart </title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>
<div class="bannar">
    <h1> my cart</h1>
</div>
<div class="title2">
    <a href="home.php">home</a><span> /cart </span>
</div>

<section class='products'>
    <h1 class='title'> product added to cart </h1>
    <div class="box-container">

    <?php
$grand_total = 0;
$select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
$select_cart->execute([$user_id]);

if ($select_cart->rowCount() > 0) {
    while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        $select_cart = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $select_products->execute([$fetch_cart['product_id']]);

        if ($select_products->rowCount() > 0) {
            $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);

  
            ?>
            <form action="" method='post' class='box'>
                <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                <img src="<?php echo $fetch_products['image']; ?>" class="img">
                <h3 class='name'><?= $fetch_products['name'];  ?></h3>
                <div class="flex">
                        <p class='price'> price <?= $fetch_products['price']; ?>  $ </p>
                     </div>


            </form>
            <?php
               $grand_total+=$fetch_cart['price'];  
        }
    }
    }else{
        echo '<p class="empty"> no products added yet !  </p>';
    }
 ?>



</section>

<?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <?php include 'alert.php'; ?>
</body>
</html>


