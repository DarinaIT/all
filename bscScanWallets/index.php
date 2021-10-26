<?php
include_once 'Wallet.php';
$wallets = new Wallet();
$kudanAmount=900000000;
$walletsWithMinimumKudans = $wallets->getWalletsWithMinimumValue($kudanAmount);

 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>All Wallets with value bigger than...</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>All Wallets with value bigger than <?php echo $kudanAmount;?></h1>
      <table>
      <thead>
        <tr>
          <th>Holder Address</th>
          <th>Balance</th>
          <th>Pending Balance Update</th>
        </tr>
      <thead>
      <tbody>
        <?php foreach($walletsWithMinimumKudans as $value): ?>
        <tr>
          <td><?php echo $value['holderAddress']; ?></td>
          <td><?php echo $value['balance']; ?></td>
          <td><?php echo $value['pendingBalanceUpdate']; ?></td>
        </tr>
      <?php endforeach; ?>

      </tbody>
    <table/>

</body>
</html>
