<?php
include_once 'User.php';
include_once 'Profit.php';
$userInfo = new User();
$profitInfo = new Profit();
$newBalance=[];

if ($_POST['balance'] && $_POST['id']) {
    $newBalance['id'] = $_POST['id'];
    $newBalance['balance'] = $_POST['balance'];
    $newBalance['profit'] = $_POST['profit'];
    $resultUpdate = $userInfo->updateUser($newBalance);
    $resultUpdateProfit = $profitInfo->updateProfit($newBalance);
    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('success' => 0));
}


?>
