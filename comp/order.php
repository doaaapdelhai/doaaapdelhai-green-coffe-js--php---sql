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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->

    <title>green coffee - order page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class=' main'>
<div class="bannar">
    <h1> my order</h1>
</div>
<div class="title2">
    <a href="home.php">home</a><span> / order</span>
</div>

<section class='orders'>
    <div class="box-container">
        <div class="title">
            <img src="img/download.png" class='logo' alt="">
            <h1>my orders</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste iusto dolorum nihil culpa animi, ab impedit, ullam hic laborum nulla dignissimos earum saepe! Ea, suscipit molestias deserunt voluptatibus architecto commodi.</p>
        </div>
        <div class="box-container">

<?php 
$select_orders = $conn->prepare("SELECT * FROM `order` WHERE user_id = ? ORDER BY date DESC");
$select_orders->execute([$user_id]);
if($select_orders->rowCount() > 0){
    while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $select_products->execute([$fetch_order['product_id']]);
        if($select_products->rowCount() > 0){
            while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
?>

<div class='box' <?php if($fetch_order['status'] == 'canceled'){ echo 'style="border:2px solid red;"'; } ?>>
    <a href="view_order.php?get_id=<?= $fetch_order['id']; ?>">
        <img src="<?=$fetch_product['image']; ?>" class='image_order' alt="">
        <div class='row'>
            <h3 class='name'><?= $fetch_product['name']; ?></h3>
            <p class='price'>Price: $<?= $fetch_order['price']; ?> * <?= $fetch_order['qty']; ?></p>
            <p class='status' style="color:<?php 
                if($fetch_order['status'] == 'delivered'){
                    echo 'green'; 
                } elseif($fetch_order['status'] == 'canceled'){ 
                    echo 'red'; 
                } else {  
                    echo 'orange'; 
                } ?>"> <?= ucfirst($fetch_order['status']); ?></p>
        </div>
    </a>
</div>
<?php 
            }
        }
    }
} else {
    echo '<p class="empty">No order takes placed yet!</p>';
}
?>
</div>


    </div>
</section>


<?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
    <script src="scripte.js">  </script>
    <?php include 'alert.php'; ?>
</body>
</html>


