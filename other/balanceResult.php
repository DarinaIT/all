<?php
include_once 'balance.php';

$apiKey = "HCE5Q57KCHBH5DTCW66D4KZJKSV77HNAN4";
$contractAddress = "0x49d843dfdc54a3db7d5de9243caeabe39ad493ff";
$address = "0x34a87Db2F21F069869f63E74135EF873cE8aC896";

$timestamp = "1601510400";
$startDay = "2021-08-01";
$endDay = "2021-08-31";

 ?>
<?php echo get_balance($apiKey, $contractAddress, $address); ?>
