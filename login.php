<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email);
   $pass = $_POST['pass'];
   $pass = filter_var($pass);
   $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
   $res = $conn->prepare($sql);
   $res->execute([$email, $pass]);
   $rowCount = $res->rowCount();  
   $row = $res->fetch(PDO::FETCH_ASSOC);
   if($rowCount > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect email or password!';
   }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fresh Cart - Login Page</title>
   <link rel="stylesheet" href="../css/login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   </head>
<body >
   <?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
}
?>
  <div class="main_div">
    <div class="title">LOGIN NOW</div>
    <form action="" method="POST">
      <div class="input_box">
        <input type="email" name="email" class="box" placeholder="Email" required>
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="password" name="pass" class="box" placeholder="Password" required>
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="input_box button">
         <input type="submit" value="Login now" class="btn" name="submit">
      </div>
      <div class="sign_up">
        Not a member? <a href="register.php">Signup now</a>
      </div>
    </form>
  </div>
</body>
</html>
