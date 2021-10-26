<?php

//import.php

if(isset($_POST["name"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=targfdgs_test_business", "targfdgs_test_business", "qweQWE00!");

 session_start();

 $file_data = $_SESSION['file_data'];

 unset($_SESSION['file_data']);

 foreach($file_data as $row)
 {
  $data[] = '("'.$row[$_POST["name"]].'", "'.$row[$_POST["description"]].'", "'.$row[$_POST["keywords"]]
              .'", "'.$row[$_POST["category"]].'", "'.$row[$_POST["condition"]].'", "'.$row[$_POST["has_variations"]]
              .'", "'.$row[$_POST["reg_price"]].'", "'.$row[$_POST["sale_price"]].'", "'.$row[$_POST["quantity"]]
              .'", "'.$row[$_POST["sku"]].'", "'.$row[$_POST["shipping_cost"]].'", "'.$row[$_POST["shipping_fee"]]
              .'", "'.$row[$_POST["shipping_time"]].'", "'.$row[$_POST["status"]].'", "'.$row[$_POST["last_status"]]
              .'", "'.$row[$_POST["origin"]].'", "'.$row[$_POST["brand"]].'", "'.$row[$_POST["model_number"]]
              .'", "'.$row[$_POST["weight"]].'", "'.$row[$_POST["length"]].'", "'.$row[$_POST["width"]]
              .'", "'.$row[$_POST["height"]].'", "'.$row[$_POST["poster"]].'", "'.$row[$_POST["thumb"]]
              .'", "'.$row[$_POST["variation_type"]].'", "'.$row[$_POST["sizing_type"]].'", "'.$row[$_POST["user_id"]]
              .'", "'.$row[$_POST["sold"]].'", "'.$row[$_POST["rating"]].'", "'.$row[$_POST["reviews"]]
              .'", "'.$row[$_POST["profit"]].'", "'.$row[$_POST["activity_status"]].'", "'.$row[$_POST["approved"]]
              .'", "'.$row[$_POST["editing_stage"]].'", "'.$row[$_POST["payment_method"]].'", "'.$row[$_POST["time"]]
              .'", "'.$row[$_POST["feed"]].'", "'.$row[$_POST["market"]].'", "'.$row[$_POST["currency"]]
              .'", "'.$row[$_POST["promo"]].'")';
 }

 if(isset($data))
 {
  $query = "
  INSERT INTO hex_products
  (name, description, keywords, category, condition, has_variations, reg_price, sale_price, quantity,
  sku, shipping_cost, shipping_fee, shipping_time, status, last_status, origin, brand, model_number,
  weight, length, width, height, poster, thumb, variation_type, sizing_type, user_id, sold, rating, reviews,
  profit, activity_status, approved, editing_stage, payment_method, time, feed, market, currency, promo)
  VALUES ".implode(",", $data)."
  ";

  $statement = $connect->prepare($query);

  if($statement->execute())
  {
   echo 'Data Imported Successfully';
  }
 }
}



?>
