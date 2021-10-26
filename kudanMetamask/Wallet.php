<?php
include_once 'MetamaskPayment.php';
$metamaskPayment = new MetamaskPayment();


if ($_POST) {
  $allVouchers = $metamaskPayment->saveMetamaskPaymentInfo($_POST);
    // based on successful operations
    if($allVouchers){
      echo json_encode(array('success' => 1));
    } else{
      echo json_encode(array('success' => 0));
    }

} else {
    echo json_encode(array('success' => 0));
}
 ?>
