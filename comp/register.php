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
    $id=unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = $_POST['cpass'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
     
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if($select_user->rowCount() > 0){
      $message[] = 'email already exist';  
          echo 'email already exist';
    }else{
        if($pass != $cpass){
            $message[] = 'confirm your password';  
            echo 'email already exist';

        }else{
            $insert_user = $conn->prepare("INSERT INTO `users` (id,name,email,password) VALUES(?,?,?,?)");
            $insert_user->execute([$id,$name,$email,$pass]);
                  header("location:home.php");

            $insert_user = $conn->prepare("SELECT * FROM  `users` WHERE email = ? AND password = ? ");
            $insert_user->execute([$email,$pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if($select_user->rowCount() > 0){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];



            }
        }
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
    <title>green tea - register</title>
</head>
<body>
    <div class="form-container tow">
        <section class='form-container'></section>
        <div class="title">
            <img src="img/download.png" alt="">
            <h1>register now</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,  adipisicing elit. Quas accusantium</p>
        </div>
        <form action="" method='post'>
            <div class='input-field'>
                <p>your name <span>*</span></p>
                <input type="text" name='name' required placeholder="enter your name" maxlength="50">
            </div>
            <div class='input-field'>
                <p>your email <span>*</span></p>
                <input type="email" name='email' required placeholder="enter your email" maxlength="50" oninput="this.value =this.value.replace(/\s\g, '')  ">
            </div>
            <div class='input-field'>
                <p>your password <span>*</span></p>
                <input type="password" name='pass' required placeholder="enter your password" maxlength="50"  oninput="this.value =this.value.replace(/\s\g, '')  ">
            </div>
            <div class='input-field'>
                <p>confirem password <span>*</span></p>
                <input type="password" name='cpass' required placeholder="enter your password" maxlength="50"  oninput="this.value =this.value.replace(/\s\g, '')  ">
            </div>
            <input type="submit" name='submit' value='register now'  class=' btnr'>
            <p>alerdey have an acount ? <a href="login.php">login now</a></p>
        </form>


    </div>
    
</body>
</html>