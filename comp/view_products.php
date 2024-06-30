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
// ================add_to_wishlist===================
if(isset($_POST['add_to_wishlist'])){
    $id = unique_id();
    $product_id = $_POST['product_id'];

    $varify_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ? AND product_id = ? ");
    $varify_wishlist->execute([$user_id, $product_id]);

    $cart_num = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ? ");
    $cart_num->execute([$user_id, $product_id]);

    if($varify_wishlist->rowCount() > 0){
        $warning_msg[] = 'Product Alerdy Exist in Your Wishlist';
    } else if ($cart_num->rowCount() > 0){
        $warning_msg[] = 'Product Alerdy Exist in Your cart';
    } else {
        $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1 ");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (id, user_id, product_id, price) VALUES (?, ?, ?, ?) ");
        $insert_wishlist->execute([$id, $user_id, $product_id, $fetch_price['price']]);
        $success_msg[] = 'Product Added To Wishlist successfully';
    }
}
// ===============================add_to_cart========================
if(isset($_POST['add_to_cart'])){
    $id = unique_id();
    $product_id = $_POST['product_id'];

    $qty = $_POST['qty'];
    $qty = filter_var($qty , FILTER_SANITIZE_STRING);

    
    $varify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ? ");
    $varify_cart->execute([$user_id, $product_id]);

    $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? ");
    $max_cart_items->execute([$user_id]);


    if($varify_cart->rowCount() > 0){
        $warning_msg[] = 'Product Alerdy Exist in Your cart';
    } else if ($max_cart_items->rowCount() > 20){
        $warning_msg[] = ' cart is full ';
    } else {
        $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1 ");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        $insert_cart = $conn->prepare("INSERT INTO `cart` (id, user_id, product_id, price , qty) VALUES (?, ?, ?, ? , ?) ");
        $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'],$qty]);
        $success_msg[] = 'Product Added To cart successfully';
    }
}
// =============================== end add_to_cart===================
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
    <title>green coffee - shope page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>
<div class="bannar">
    <h1>shope us</h1>
</div>
<div class="title2">
    <a href="home.php">home</a><span> / our shope</span>
</div>
<section class='products'>
    <div class="box-container">
        <?php
        $select_products = $conn->prepare("SELECT * FROM `products`");
        $select_products->execute();
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <form action="" method='post' class='box'>
                    <div class="product-image">
                        <img src="<?php echo $fetch_products['image']; ?>" class="img">
                        <div class='button-container'>
                        <h3 class='name'><?= $fetch_products['name']; ?></h3>
                        <div class='flex'>
                     <p class='price'>price $<?= $fetch_products['price']; ?>/-</p>
                      <input type="number"  name='qty' required class='q' min="1" max="99" value="1"  maxlength="2">
                 </div>
                 <div class='icons_div'>
                 <button type='submit' name='add_to_cart'><i class='bx bx-cart ic'></i></button>
<<<<<<< HEAD
                 <button type='submit' name='add_to_wishlist'><i class='bx bx-heart ic'></i></button>
                  <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class='bx bxs-show ic'></a>
=======
                            <button type='submit' name='add_to_wishlist'><i class='bx bx-heart ic'></i></button>
                            <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class='bx bxs-show ic'></a>
>>>>>>> 0e47ffe912a83289512b157d3a2cefc50871d7a6
                 </div>
                           

                        </div>
                    </div>
                    <input type="hidden" name='product_id' value="<?= $fetch_products['id']; ?>">
               <!-- flex -->
                    <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class='btn'>buy now</a>
                </form>
        <?php
            }
        } else {
            echo '<p class="empty">no product added yet!</p>';
        }
        ?>
    </div>
</section>
<?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <?php include 'alert.php'; ?>
</body>
</html>


