<?php
 include 'conection.php' ;
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

//register user
if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   
     
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? ");
    $select_user->execute([$email , $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC); 

    if($select_user->rowCount() > 0){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        header("location:home.php");

    }else{
        $message[]='incorrect username or password';
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
    <title>green tea - login</title>
</head>
<body>
    <div class="form-container tow">
        <section class='form-container'></section>
        <div class="title">
            <img src="img/download.png" alt="">
            <h1>login now</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,  adipisicing elit. Quas accusantium</p>
        </div>
        <form action="" method='post'>
           
            <div class='input-field'>
                <p>your email <span>*</span></p>
                <input type="email" name='email' required placeholder="enter your email" maxlength="50" oninput="this.value =this.value.replace(/\s\g, '')  ">
            </div>
            <div class='input-field'>
                <p>your password <span>*</span></p>
                <input type="password" name='pass' required placeholder="enter your password" maxlength="50"  oninput="this.value =this.value.replace(/\s\g, '')  ">
            </div>
         
            <input type="submit" name='submit' value='register now'  class=' btnr'>
            <p>do not an acount ? <a href="register.php">register now</a></p>
        </form>


    </div>
    
</body>
</html>