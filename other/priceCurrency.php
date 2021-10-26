<?php
include_once 'Price.php';

$priceInfo = new Price();

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
$parameters = [
  'symbol' => 'BNB'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: 224d5baa-096e-4e1c-a5ad-b8b9657a496d'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
//print_r(json_decode($response)); // print json decoded response
curl_close($curl); // Close request



//  Binance
function get_rate($symbol){
  $result = json_decode(file_get_contents("https://api.binance.com/api/v3/avgPrice?symbol=".$symbol));
  //print_r($result);
  if($result){
    foreach ($result as $key=>$value) {
      if($key == "price"){
        return $value;
      }
    }
  }
}


$priceRate = [];

$priceRate['busd_usd']=get_rate('BNBBUSD');
$priceRate['btc_usd']=get_rate('BNBUSDT');
$priceRate['usdt_usd']=get_rate('BNBUSDC');
$priceRate['bnb_busd']=get_rate('BNBETH');

$priceInfo->updatePrice($priceRate);
//setInterval(function(){
//  $priceRate = [];
//  $priceRate['busd_usd']=get_rate('BNBBUSD');
//  $priceRate['btc_usd']=get_rate('BNBUSDT');
//  $priceRate['usdt_usd']=get_rate('BNBUSDC');
//  $priceRate['bnb_busd']=get_rate('BNBETH');

//  $priceInfo->updatePrice($priceRate);
//}, 1200000);

?>
<p>BNB/BUSD: <?php echo get_rate('BNBBUSD');?><p>
<p>BNB/USDT: <?php echo get_rate('BNBUSDT');?><p>
<p>BNB/USDT: <?php echo get_rate('BNBUSDC');?><p>
<p>BNB/ETH: <?php echo get_rate('BNBETH');?><p>
