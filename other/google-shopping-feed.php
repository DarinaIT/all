<?php
$user = $_GET['user'];
$pass = $_GET['pass'];

if($user == "bllgfeed"
&& $pass == "lkdjsd3kmfamc23wmaskndns32332ne")
{
include_once 'secure/Product.php';

// required headers
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

$productInfo = new Product();
$productsData = $productInfo->getProductData();

//SET SHOP VARIABLES ???
$shop_name = "Booll UK";
$shop_link = "https://booll.co.uk";

$gf_product = [];

foreach ($productsData as $product) {
  if ($product['status'] == "active") {
    //feed attributes
    $gf_product['g:id'] = $product['id'];
    //    $gf_product['g:sku'] = $product['sku'];
    $gf_product['g:title'] = $product['name'];
    $gf_product['g:description'] = $product['description'];
    $gf_product['g:link'] = "booll.co.uk/product/" . $product['id'];
    $gf_product['g:image_link'] = $product['poster'];
    $gf_product['g:availability'] = $product['activity_status'];
    $gf_product['g:price'] = $product['reg_price'];
    $gf_product['g:sale_price'] = $product['sale_price'];

    if($gf_product['g:sale_price']){
      $dateToday=date("Y-m-d");
      $date = date_create($dateToday);
      date_add($date,date_interval_create_from_date_string("30 days"));
      $last_day = date_format($date,"Y-m-d");
    }

    $gf_product['g:sale_price_effective_date'] = $dateToday."/".$last_day;
    $gf_product['g:google_product_category'] = "1270";
    $gf_product['g:product_type'] = $product['category'];
    $gf_product['g:brand'] = $product['brand'];
  }


  // ?????
  // Use the gtin attribute to submit Global Trade Item Numbers (GTINs). A GTIN uniquely identifies your product. This specific number helps us make your ad or unpaid listing richer and easier for users to find. Products submitted without any unique product identifiers are difficult to classify and may not be eligible for all Shopping programs or features.
  $gf_product['g:gtin'] = $product['id'];
  // $gf_product['g:mpn'] = $product['id'];
  // if (($gf_product['g:gtin'] == "") && ($gf_product['g:mpn'] == "")) { $gf_product['g:identifier_exists'] = "no"; };

// 1,2,3 -> which one is new and which one is old
//  $gf_product['g:condition'] = $product['condition']; //must be NEW or USED

header("Content-type: text/xml");
$feed_products[] = $gf_product;



//CREATE XML
$doc = new DOMDocument('1.0', 'UTF-8');

$xmlRoot = $doc->createElement("rss");
$xmlRoot = $doc->appendChild($xmlRoot);
$xmlRoot->setAttribute('version', '2.0');
$xmlRoot->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', "http://base.google.com/ns/1.0");

$channelNode = $xmlRoot->appendChild($doc->createElement('channel'));
$channelNode->appendChild($doc->createElement('title', $shop_name));
$channelNode->appendChild($doc->createElement('link', $shop_link));

}

foreach ($feed_products as $product) {
  $itemNode = $channelNode->appendChild($doc->createElement('item'));
foreach($product as $key=>$value) {
  if ($value != "") {
      if (is_array($product[$key])) {
        $subItemNode = $itemNode->appendChild($doc->createElement($key));
        foreach($product[$key] as $key2=>$value2){
          $subItemNode->appendChild($doc->createElement($key2))->appendChild($doc->createTextNode($value2));
        }
      } else {
        $itemNode->appendChild($doc->createElement($key))->appendChild($doc->createTextNode($value));
      }

    } else {
      $itemNode->appendChild($doc->createElement($key));
    }

  }
}


$doc->formatOutput = true;
echo $doc->saveXML();

}else{
  echo "Wrong Whole";
}


// KEY ???
// $key=$_GET['key'];
// if ($key != $api_key){
//   http_response_code(404);
// }else{
//   http_response_code(200);
// }


?>
