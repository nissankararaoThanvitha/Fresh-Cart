<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
};
if(isset($_POST['order'])){
   $name = isset($_POST['name']) ? $_POST['name'] : '';
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = isset($_POST['number']) ? $_POST['number'] : '';
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = isset($_POST['email']) ? $_POST['email'] : '';
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = isset($_POST['method']) ? $_POST['method'] : '';
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $flat = isset($_POST['flat']) ? $_POST['flat'] : '';
   $street = isset($_POST['street']) ? $_POST['street'] : '';
   $city = isset($_POST['city']) ? $_POST['city'] : '';
   $province = isset($_POST['province']) ? $_POST['province'] : '';
   $country = isset($_POST['country']) ? $_POST['country'] : '';
   $pin_code = isset($_POST['pin_code']) ? $_POST['pin_code'] : '';
   $address = 'flat no. '. $flat .' '. $street .' '. $city .' '. $province .' '. $country .' - '. $pin_code;
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $placed_on = date('d-M-Y');
   $cart_total = 0;
   $cart_products[] = '';
   $cart_query = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
   $cart_query->execute([$user_id]);
   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };
   $total_products = implode(', ', $cart_products);
   $order_query = $conn->prepare("SELECT * FROM orders WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
   $order_query->execute([$name, $number, $email, $method, $address, $total_products, $cart_total]);
   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'Order Placed Already!';
   }else{
      $insert_order = $conn->prepare("INSERT INTO orders(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $cart_total, $placed_on]);
      $delete_cart = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      $message[] = 'Order Placed Successfully!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fresh Cart - Checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/checkout.css">
</head>
<body> 
<?php include 'header.php'; ?>
<section class="display-orders">
   <?php
      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['name']; ?> <span>(<?= 'Rs.'.$fetch_cart_items['price'].'/- x '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty">your cart is empty!</p>';
   }
   ?>
   <div class="grand-total">Grand total : <span>Rs.<?= $cart_grand_total; ?>/-</span></div>
</section>
<section class="checkout-orders">
<div class="container">
   <form action="checkout.php" method="POST">
        <div class="row">
            <div class="col">
                <h3 class="title">Billing address</h3>
                <div class="inputBox">
                    <span>Full name :</span>
                    <input type="text" placeholder="your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" placeholder="email" name="email" required>
                </div>
                <div class="inputBox">
                    <span>Phone number :</span>
                    <input type="text" placeholder="your number" name="number" required>
                </div>
                <div class="inputBox">
                    <span>Payment method :</span>
                    <select name="method" class="box" required>
                       <option value="cash on delivery">Cash on delivery</option>
                       <option value="credit card">Credit card</option>
                       <option value="paypal">PayPal</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Flat no. :</span>
                    <input type="text" placeholder="flat no." name="flat" required>
                </div>
                <div class="inputBox">
                    <span>Street :</span>
                    <input type="text" placeholder="street name" name="street" required>
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" placeholder="your city" name="city" required>
                </div>
                <div class="inputBox">
                    <span>Country :</span>
                    <input type="text" placeholder="country" name="country" required>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <select name="province" class="box" required>
                           <option value="AP">AP</option>
                           <option value="CHENNAI">CHENNAI</option>
                           <option value="MUMBAI">MUMBAI</option>
                           <option value="KERALA">KERALA</option>
                           <option value="TELANGANA">TELANGANA</option>
                           <option value="UP">UP</option>
                        </select>
                     </div>
                        <div class="inputBox">
                        <span>Zip code :</span>
                        <input type="text" placeholder="123456" name="pin_code" required>
                        </div>
                </div>
            </div>
            <div class="col">
                <h3 class="title">Payment</h3>
                <div class="inputBox">
                    <span>Name on card :</span>
                    <input type="text" placeholder="name" required>
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="number" placeholder="1111 2222 3333 4444" required>
                </div>
                <div class="inputBox">
                    <span>Exp Month :</span>
                    <input type="text" placeholder="january" required>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" placeholder="2022" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" required>
                    </div>
                </div>
            </div>
        </div>
      <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="Place Order">
   </form>
</div>
</section>
<?php include 'footer.php'; ?>
</body>
</html>