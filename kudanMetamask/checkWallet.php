<?php
include_once 'Wallet.php';
$myWallet = new Wallet();


if ($_POST) {
  $walletAddress=$_POST['wallet'];
  $balance=$_POST['kudanAmount'];
  $myWalletInfo = $myWallet->searchForWallet($walletAddress, $balance);
    // based on successful operations
    if($myWalletInfo){
      echo json_encode(array('success' => 1));
    } else{
      echo json_encode(array('success' => 0));
    }

} else {
    echo json_encode(array('success' => 0));
}
 ?>
