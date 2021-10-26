<?php
session_start();

if($_POST['climeCoins']){
  include_once 'User.php';
  $logged_user = new User();
  $logged_user_update = $logged_user->updateClaimCoin($_SESSION['loggin_user']);
}
 ?>
 <!DOCTYPE html>
 <html>
 <body>
   <p>You fulfilled successfully the form</p>
   <form method="post">
     <button type="submit" name="climeCoins" id="climeCoins" value="1">Clime coins</button>
   </form>
   <?php if($_POST['climeCoins']){
     echo $logged_user_update;
   }

     ?>

 </body>
 </html>
