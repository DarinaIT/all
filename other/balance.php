<?php
//function get_holders_and_transfers($contract){
//  $html = file_get_contents('https://bscscan.com/token/'.$contract);
//  $start = stripos($html, 'id="ContentPlaceHolder1_tr_tokenHolders"');
//  $end = stripos($html, '</li>', $offset = $start);
//  $length = $end - $start;
//  $htmlDOM = substr($html, $start, $length);
  //echo $htmlDOM;

  //$start = stripos($htmlDOM, 'Holders:');
  //$end = stripos($htmlDOM, 'addresses', $offset = $start);
  //$length = $end - $start;
  //$holders = substr($htmlDOM, $start, $length);
  //echo $holders;

  //$start = stripos($htmlDOM, 'Transfers:');
  //$end = stripos($htmlDOM, '-', $offset = $start);
  //$length = $end - $start;
  //$transfers = substr($htmlDOM, $start, $length);
  //echo $transfers;

  //$result=[];
  //$result['holders']=$holders;
  //$result['transfers']=$transfers;
  //return $result;

//}
//get_holders_and_transfers($contract);




function get_list_ERC721_token_transfer_events($address){
  $url = "https://api.bscscan.com/api?module=account&action=tokennfttx&address=".$address."&startblock=0&endblock=999999999&sort=asc";
  $result = json_decode(file_get_contents($url));

  $resultData = [];
$i=0;
  foreach ($result as $key => $value) {
    if($key=="result"){
      foreach($value as $vValue){
        $i++;
        foreach ($vValue as $kk => $vv) {
            $resultData[$i][$kk] = $vv;
        }
      }
    }
  }

  //print_r($resultData);
  return $resultData;
}


//$address = "0x7bb89460599dbf32ee3aa50798bbceae2a5f7f6a";
//$apiKey = "HCE5Q57KCHBH5DTCW66D4KZJKSV77HNAN4";
function get_list_BEP20_token_transfer_events($apiKey, $address){
  $url = "https://api.bscscan.com/api?module=account&action=tokentx&address=".$address."&startblock=0&endblock=2500000&sort=asc&apikey=".$apiKey;
  $result = json_decode(file_get_contents($url));

  $resultData = [];
$i=0;
  foreach ($result as $key => $value) {
    if($key=="result"){
      foreach($value as $vValue){
        $i++;
        foreach ($vValue as $kk => $vv) {
            $resultData[$i][$kk] = $vv;
        }
      }
    }
  }

  //print_r($resultData);
  return $resultData;
}

//get_list_BEP20_token_transfer_events($apiKey, $address); exit;






function check_transaction_receipt($apiKey, $startDay, $endDay){
  $url = "https://api.bscscan.com/api?module=stats&action=dailytxnfee&startdate=".$startDay."&enddate=".$endDay."&sort=asc&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
  //echo "The transaction receipt is: ".$result;
  return $result;
}


function get_blockNumber_by_timestamp($apiKey, $timestamp){
  $url = "https://api.bscscan.com/api?module=block&action=getblocknobytime&timestamp=".$timestamp."&closest=before&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
  //echo "The block number is: ".$result;
  return $result;
}


function get_countdown_time_by_blockNumber($apiKey, $blockNumber){
  $url = "https://api.bscscan.com/api?module=block&action=getblockcountdown&blockno=".$blockNumber."&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
  //echo "The block countdown time is: ".$result;
  return $result;
}



function get_bnb_last_price($apiKey){
  $url = "https://api.bscscan.com/api?module=stats&action=bnbprice&apikey=".$apiKey;
  $result = json_decode(file_get_contents($url));


  $ethbtc="";
  $ethbtc_timestamp="";
  $ethusd="";
  $ethusd_timestamp="";


  foreach ($result as $key => $value) {
    if($key=="result"){
      foreach($value as $kk=>$vv){
        if($kk =="ethbtc"){
          $ethbtc = $vv;
        } else if($kk == "ethbtc_timestamp"){
          $ethbtc_timestamp = $vv;
        } else if($kk=="ethusd"){
          $ethusd = $vv;
        }else{
          $ethusd_timestamp=$vv;
        }
      }
    }

  }

  $resultData = [];
  $resultData["ethbtc"]=$ethbtc;
  $resultData["ethbtc_timestamp"]=$ethbtc_timestamp;
  $resultData["ethusd"]=$ethusd;
  $resultData["ethusd_timestamp"]=$ethusd_timestamp;

  return$resultData;
}




function get_token_circulating_supply($apiKey, $contractAddress){
  $url = "https://api.bscscan.com/api?module=stats&action=tokenCsupply&contractaddress=".$contractAddress."&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
  //echo "The token circulating supply is: ".$result;
  return $result;
}


function get_token_total_supply($apiKey, $contractAddress){
  $url = "https://api.bscscan.com/api?module=stats&action=tokensupply&contractaddress=".$contractAddress."&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
  //echo "The token total supply is: ".$result;
  return $result;
}

function get_balance($apiKey, $contractAddress, $address){
  $url = "https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=".$contractAddress."&address=".$address."&tag=latest&apikey=".$apiKey;

  $resultUrl = json_decode(file_get_contents($url));

  $status = "";
  $message = "";
  $result = "";

  foreach ($resultUrl as $key => $value) {
    if ($key == "status") {
      $status = $value;
    } else if ($key == "message") {
      $message = $value;
    } else {
      $result = $value;
    }
  }
//  echo "The balance for this contract and address is: ".$result;
  //return $result;

  function get_percentage($total, $number)
{
  if ( $total > 0 ) {
   return round(($number * 100) / $total, 9);
  } else {
    return 0;
  }
}
//echo get_percentage(200000000000000,$result/1000000000);
$progress=(100-get_percentage(200000000000000,$result/1000000000));
return $progress;
}

// $apiKey = "HCE5Q57KCHBH5DTCW66D4KZJKSV77HNAN4";
// $contractAddress = "0xaeef03f3ea8d0c2d4abc2aa45224f224d107ce68";
// $address = "0x076be92b7f1d6b03958396aeb17eafcc482e3438";
//
// $timestamp = "1601510400";
// $startDay = "2020-10-01";
// $endDay = "2020-10-31";
//
// get_balance($apiKey, $contractAddress, $address);
?>
