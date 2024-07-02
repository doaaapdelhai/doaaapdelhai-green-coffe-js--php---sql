<?php 
include 'conection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php"); 
    exit();
} 

if (isset($_POST['place_order'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $address = filter_var($_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ', ' . $_POST['pincode'], FILTER_SANITIZE_STRING);
    $address_type = filter_var($_POST['address_type'], FILTER_SANITIZE_STRING);
    $method = filter_var($_POST['method'], FILTER_SANITIZE_STRING);

    // Check if the orders table exists
    $check_table = $conn->prepare("SHOW TABLES LIKE 'order'");
    $check_table->execute();

    if ($check_table->rowCount() == 0) {
        // Create the orders table if it doesn't exist
        $create_table = $conn->prepare("
            CREATE TABLE `order` (
                id VARCHAR(255) PRIMARY KEY,
                user_id VARCHAR(255) NOT NULL,
                name VARCHAR(255) NOT NULL,
                number VARCHAR(20) NOT NULL,
                email VARCHAR(255) NOT NULL,
                address TEXT NOT NULL,
                address_type VARCHAR(50) NOT NULL,
                method VARCHAR(50) NOT NULL,
                product_id VARCHAR(255) NOT NULL,
                price DECIMAL(10, 2) NOT NULL,
                qty INT NOT NULL
            )
        ");
        $create_table->execute();
    }

    $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
    $verify_cart->execute([$user_id]);

    if (isset($_GET['get_id'])) {
        $get_product = $conn->prepare("SELECT * FROM `products` WHERE id=? LIMIT 1");
        $get_product->execute([$_GET['get_id']]);
        
        if ($get_product->rowCount() > 0) {
            while ($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)) {
                $insert_order = $conn->prepare("INSERT INTO `order` (id, user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insert_order->execute([unique_id(), $user_id, $name, $number, $email, $address, $address_type, $method, $fetch_p['id'], $fetch_p['price'], 1]);
                header('Location: order.php');
                exit();
            }
        } else {
            $warning_msg[] = 'Something went wrong';
        }
    } elseif ($verify_cart->rowCount() > 0) {
        while ($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)) {
            $insert_order = $conn->prepare("INSERT INTO `order` (id, user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_order->execute([unique_id(), $user_id, $name, $number, $email, $address, $address_type, $method, $f_cart['product_id'], $f_cart['price'], $f_cart['qty']]);
        }
        
        if ($insert_order) {
            $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $delete_cart_id->execute([$user_id]);
            header('Location: order.php');
            exit();
        } else {
            $warning_msg[] = 'Something went wrong';
        }
    } else {
        $warning_msg[] = 'Something went wrong';
    }
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
    <title>green coffee - checkout page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class='main'>
<div class="bannar">
    <h1>checkout  </h1>
</div>
<div class="title2">
    <a href="home.php">home</a><span> / checkout summary</span>
</div>

<section class='checkout'>
    <div class="title"> 
        <img src="img/download.png" class='logo' alt="">
        <h1>checkout summary</h1>
        <p>Lorem ipsum dolor sit, amet consectetur aing elit. Voluptas dolo alias! Veniam ad perferendis at dolores officiis?</p>
        <h3>My Bag</h3> 

    </div>

    <div class='row'>
        <form action="" method="post">
            <h3>Billing Details</h3>
            <div class="flex">
                <div class="box">
                    <div class="input-filed">
                        <p>Your Name <span>*</span></p>
                        <input type="text" name='name' required maxlength='50' placeholder='Enter your name' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Your Number <span>*</span></p>
                        <input type="text" name='number' required maxlength='10' placeholder='Enter your number' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Email <span>*</span></p>
                        <input type="email" name='email' required maxlength='50' placeholder='Enter your email' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Payment Method <span>*</span></p>
                        <select name="method" class="input">
                            <option value="cash on delivery">Cash on Delivery</option>
                            <option value="credit or debit card">Credit or Debit Card</option>
                            <option value="net banking">Net Banking</option>
                            <option value="upi or rupay">UPI or Rupay</option>
                            <option value="paytm">Paytm</option>
                        </select>
                    </div>
                    <div class="input-filed">
                        <p>Address Type <span>*</span></p>
                        <select name="address_type" class="input">
                            <option value="home">Home</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                </div>
                <div class="box">
                    <div class="input-filed">
                        <p>Address Line 01 <span>*</span></p>
                        <input type="text" name='flat' required maxlength='10' placeholder='e.g. Flat & Building Number' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Address Line 02 <span>*</span></p>
                        <input type="text" name='street' required maxlength='10' placeholder='Street Name' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>City Name <span>*</span></p>
                        <input type="text" name='city' required maxlength='10' placeholder='Enter your city name' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Country <span>*</span></p>
                        <input type="text" name='country' required maxlength='10' placeholder='Enter your country' class='input'>
                    </div>
                    <div class="input-filed">
                        <p>Pincode <span>*</span></p>
                        <input type="text" name='pincode' required maxlength='6' placeholder='001122' class='input'>
                    </div>
                </div>
            </div>
            <button type='submit' name='place_order' class='btn'>Place Order</button>
        </form>
        <div class="summary">

<div class="box-container">
    <?php 
    $grand_total = 0;
    if(isset($_GET['get_id'])){ 
        $select_get = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $select_get->execute([$_GET['get_id']]);
        while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
            $sub_total = $fetch_get['price'];
            $grand_total += $sub_total;
    ?>
    <div class='flex'> 
        <img src="<?=$fetch_get['image']; ?>" class='image' alt="<?=$fetch_get['name']; ?>">
        
        <div>
            <h3 class='name'><?=$fetch_get['name']; ?></h3>
            <p class='price'><?=$fetch_get['price']; ?>/-</p>
        </div>
    </div>
    <?php 
        }
    } else {
        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
        $select_cart->execute([$user_id]);
        while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id=?");
            $select_products->execute([$fetch_cart['product_id']]);
            while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
                $sub_total = ($fetch_cart['qty'] * $fetch_product['price']);
                $grand_total += $sub_total;
    ?>
    <div class='flex'> 
        <img src="<?=$fetch_product['image']; ?>" class='image' alt="<?=$fetch_product['name']; ?>">
        <div>
            <h3 class='name'><?=$fetch_product['name']; ?></h3>
            <p class='price'><?=$fetch_product['price']; ?>/-</p>
            <p class='qty'>Qty : <?=$fetch_cart['qty']; ?></p>
        </div>
    </div>
    <?php
            }
        }
    }
    ?>
    <div class="grand-total"><span>grand total :</span><span>₹<?=$grand_total; ?>/-</span></div>
</div>

</div>


</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">  </script>
<script src='js/script.js'></script>
<?php include 'footer.php'; ?>
<?php include 'alert.php'; ?>
</body>
</html>
