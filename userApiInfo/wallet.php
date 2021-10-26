<?php
include_once 'User.php';
$logged_user = new User();

if ($_POST) {
    if(!$_POST['sales_agreement']){
      $_POST['sales_agreement'] = 0;
    }
    // do user`s info update and insert
    $logged_user_update = $logged_user->updateUser($_POST);
    $logged_user_add = $logged_user->addUserSales($_POST);

    // based on successful operations
    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('success' => 0));
}
 ?>
