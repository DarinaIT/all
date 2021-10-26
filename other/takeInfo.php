<?php
// $token = "0x43C37e8240d0fCCEF747d12e201Bf295e4226388";
// get_info($token);

function get_info($token){
  include_once 'Info.php';
  $dataInfo = new Info();

  $url = "https://api.pancakeswap.info/api/v2/tokens/".$token;
  $result = json_decode(file_get_contents($url));

  $updated_at="";
  $name ="";
  $symbol="";
  $price="";
  $price_BNB="";

  //print_r($result);

  foreach ($result as $key => $value) {
    if($key=="updated_at"){
      $updated_at = $value;
    }
    else{
      foreach($value as $kk=>$vv){
        if($kk =="name"){
          $name = $vv;
        } else if($kk == "symbol"){
          $symbol = $vv;
        } else if($kk=="price"){
          $price = $vv;
        }else{
          $price_BNB=$vv;
        }
      }
    }

  }

  $dataInfoResult = $dataInfo->addInfo($updated_at, $name, $symbol, $price, $price_BNB);
}


?>
