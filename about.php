<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fresh Cart - About Us</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/about.css">
</head>
<body>
<?php include 'header.php'; ?>
<section class="about">
   <div class="row">
      <div class="box">
         <img src="../images/about-img-1.png" alt="">
         <h3>Why to choose us?</h3>
         <p>Fresh Cart Provides Complete Organic And Healthy Food Solutions, Which Allows The Customers To Grow And Eat Organic, Fresh And Healthy Food With The Best Quality And Items In Town.Further, Fresh Cart Provides Features For Quick And Easy Payments Services Aiming To Deliver Goods In Secure Ways To Pay.Quick, Easy And Efficient!</p>
         <a href="contact.php" class="btn">Contact us</a>
      </div>
      <div class="box">
         <img src="../images/about-img-2.png" alt="">
         <h3>What do we provide?</h3>
         <p>We Have Island Wide Delivery Services 24/7 To Engage Our Customers.No Extra-Charge Added Just A Free Way For More Convenience And Provides An Effortless Shopping Experience.</p>
         <a href="shop.php" class="btn">Our shop</a>
      </div>
   </div>
</section>
<section class="reviews">
   <h1 class="title">Client Reivews</h1>
   <div class="box-container">
      <div class="box">
         <p>Highly satisfied with the products highly recommended. Fresh fruits, fresh vegies, fresh meat really satisfied with the goodies.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>Thanvitha</h3>
      </div>
      <div class="box">
         <p>Convenient Shopping and easy collaboration with the grocery! good job! The meat and the vegetables were really fresh as mentioned.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>            
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>Nikitha </h3>
      </div>
      <div class="box">
         <p>The experience was really worthy the products were sold out for reliable prices easy and fresh products. Highly recommended!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>RV</h3>
      </div>
      <div class="box">
         <p>The products were delivered really fast than expected. Reccommends the quality and humbleness and cooperation of the staff of the grocery.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Narendra</h3>
      </div>
      <div class="box">
         <p>Highly satisfied with the products highly recommended. Fresh fruits, fresh vegies, fresh meat really satisfied with the goodies.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>Neelima</h3>
      </div>
      <div class="box">
         <p>The experience was really worthy the products were sold out for reliable prices easy and fresh products. Highly recommended!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Olive</h3>
      </div>
   </div>
</section>
<?php include 'footer.php'; ?>
</body>
</html>