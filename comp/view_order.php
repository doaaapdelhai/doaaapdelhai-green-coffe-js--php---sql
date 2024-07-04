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
if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header("location:order.php"); 
}
if(isset($_POST['cancle'])){
   $update_order = $conn->prepare("UPDATE `order` SET status = ? WHERE id= ? ");
   $update_order->execute(['canceled' , $get_id]);
   header("location: order.php"); 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>green coffee - order details page</title>
    <style>
        .status {
            font-weight: bold;
        }
        .status.delevered {
            color: green;
        }
        .status.canceled {
            color: red;
        }
        .status.pending {
            color: orange;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class='main'>
<div class="bannar">
    <h1>order details</h1>
</div>
<div class="title2">
    <a href="home.php">home</a><span> / order details</span>
</div>
<section class='order-detail'>
    <div class="title">
            <img src="img/download.png" class='logo' alt="">
            <h1>my orders</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste iusto dolorum nihil culpa animi, ab impedit, ullam hic laborum nulla dignissimos earum saepe! Ea, suscipit molestias deserunt voluptatibus architecto commodi.</p>
        </div>
        <div class="box-container">
            <?php 
            $grand_total = 0;
            $select_orders = $conn->prepare("SELECT * FROM `order` WHERE id = ? LIMIT 1");
            $select_orders->execute([$get_id]);
            if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    $select_product = $conn->prepare("SELECT * FROM `products` WHERE id=? LIMIT 1");
                    $select_product->execute([$fetch_order['product_id']]);
                    if($select_product->rowCount() > 0){
                        while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
                            $sub_total = ($fetch_order['price'] * $fetch_order['qty']);
                            $grand_total += $sub_total;
            ?>
            <div class='box'>
                <div class="col">
                    <img src="<?= $fetch_product['image']; ?>" class='image_order' alt="">
                    <p class='price'><?= $fetch_product['price'];?> * <?= $fetch_order['qty']; ?> </p>
                    <h3 class='name'><?= $fetch_product['name'];?> </h3>
                    <p class='grand-total'> total amount payable : <span><?= $grand_total;?> </span> </p>
                </div>
                <div class='col'>
                    <p class='title'>billing address</p>
                    <p class='user'> <i class='bi bi-person-bounding-box'>        </i><?= $fetch_order['name']; ?> </p>
                    <p class='user'> <i class='bi bi-phone'>         </i><?= $fetch_order['number']; ?> </p>
                    <p class='user'> <i class='bi bi-envelope'>      </i><?= $fetch_order['email']; ?> </p>
                    <p class='user'> <i class='bi bi-pin-map-fill'>     </i><?= $fetch_order['address']; ?> </p>

                    

                    <p class='title'> status </p>
                    <p class='status <?= strtolower($fetch_order['status']); ?>'><?= $fetch_order['status'] ?></p>

                    <?php if($fetch_order['status'] != 'canceled'){  ?>
                        <form method="post">
                            <button type='submit' name='cancle' class='btn-order' onclick="return  confirm('Do you want to cancel this order?')"> cancel order </button>
                        </form>
                    <?php } ?>
                </div>
            </div>
            <?php 
                        }
                    }else{
                        echo '<p class="empty">product not found</p>';
                    }
                }
            }else{
                echo '<p class="empty">no order found </p>';
            }
            ?>
        </div>
</section>

<?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="scripte.js"></script>
    <?php include 'alert.php'; ?>
</body>
</html>
