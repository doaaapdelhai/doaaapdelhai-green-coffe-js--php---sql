<header class='header '>
    <div class='flex'>
        <a href="home.php" class="logo"> <img src="img/logo.jpg" alt=""> </a>
        <nav class='navbar'>
            <a href="home.php">home</a>
            <a href="view_products.php">products</a>
            <a href="order.php">order</a>
            <a href="about.php">about</a>
            <a href="contact.php">contact</a>
        </nav>
        <div class='icons'>
            <i class='bx bx-user' id='user-btn'> </i>

            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM  `wishlist` WHERE  user_id = ?  ");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_items = $count_wishlist_items->rowCount();
            ?>

            <a href="wishlist.php" class='cart-btn'> <i class='bx bx-heart'>  </i> <sup><?=$total_wishlist_items ?></sup></a>
            <?php
            $count_cart_items = $conn->prepare("SELECT * FROM  `cart` WHERE  user_id = ?  ");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
            ?>

            <a href="cart.php" class='cart-btn'> <i class='bx bx-cart-alt'>  </i> <sup><?=$total_cart_items ?></sup></a>
            <i class='bx bx-list-plus' id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class='user-box'>
            <p>Username : <span><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?></span></p>
            <p>Email : <span><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Not logged in'; ?></span></p>
            <div class='flex'>
                <a href="login.php" class='btn'>login</a>
                <a href="register.php" class='btn'>register</a>
            </div>
            <form method='post'>
                <button type="submit" name="logout" class='logout-btn'>log out</button>       
            </form>
        </div>
    </div>
</header>
