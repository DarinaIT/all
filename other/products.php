<?php
include_once 'Product.php';
include_once 'ParseCSV.php';

$productInfo = new Product();
$parser = new ParseCSV($filname);
$resultArray = $parser->parse();



if ($resultArray){
  foreach($resultArray as $singleProduct){
    if(empty($productInfo->getSingleProductData($singleProduct['id']))){
      $productInfo->addProduct($singleProduct);
    } else {
      $productInfo->updateProduct($singleProduct);
    }
  }
}


?>
