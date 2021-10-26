<?php

//upload.php

session_start();

$error = '';

$html = '';

if($_FILES['file']['name'] != '')
{
 $file_array = explode(".", $_FILES['file']['name']);

 $extension = end($file_array);

 if($extension == 'csv')
 {
  $file_data = fopen($_FILES['file']['tmp_name'], 'r');

  $file_header = fgetcsv($file_data);

  $html .= '<table class="table table-bordered"><tr>';

  for($count = 0; $count < count($file_header); $count++)
  {
   $html .= '
   <th>
    <select name="set_column_data" class="form-control set_column_data" data-column_number="'.$count.'">
     <option value="">Set Count Data</option>
     <option value="name">Name</option>
     <option value="description">Description</option>
     <option value="keywords">Keywords</option>
     <option value="category">Category</option>
     <option value="condition">Condition</option>
     <option value="has_variations">Has variations</option>
     <option value="reg_price">Regular Price</option>
     <option value="sale_price">Sale Price</option>
     <option value="quantity">Quantity</option>
     <option value="sku">Sku</option>
     <option value="shipping_cost">Shipping Cost</option>
     <option value="shipping_fee">Shipping Fee</option>
     <option value="shipping_time">Shipping time</option>
     <option value="status">Status</option>
     <option value="last_status">Last Status</option>
     <option value="origin">Origin</option>
     <option value="brand">Brand</option>
     <option value="model_number">Model number</option>
     <option value="weight">Weight</option>
     <option value="length">Length</option>
     <option value="width">Width</option>
     <option value="height">Height</option>
     <option value="poster">Image Poster</option>
     <option value="thumb">Image Thumb</option>
     <option value="variation_type">Variation type</option>
     <option value="sizing_type">Sizing Type</option>
     <option value="user_id">User ID</option>
     <option value="sold">Sold</option>
     <option value="rating">Rating</option>
     <option value="reviews">Reviews</option>
     <option value="profit">Profit</option>
     <option value="activity_status">Activity Status</option>
     <option value="approved">Approved</option>
     <option value="editing_stage">Editing Stage</option>
     <option value="payment_method">Payment method</option>
     <option value="time">Time</option>
     <option value="feed">Feed</option>
     <option value="market">Market</option>
     <option value="currency">Currency</option>
     <option value="promo">Promo</option>
    </select>
   </th>
   ';
  }

  $html .= '</tr>';

  $limit = 0;

  while(($row = fgetcsv($file_data)) !== FALSE)
  {
   $limit++;

   if($limit < 6)
   {
    $html .= '<tr>';

    for($count = 0; $count < count($row); $count++)
    {
     $html .= '<td>'.$row[$count].'</td>';
    }

    $html .= '</tr>';
   }

   $temp_data[] = $row;
  }

  $_SESSION['file_data'] = $temp_data;

  $html .= '
  </table>
  <br />
  <div align="right">
   <button type="button" name="import" id="import" class="btn btn-success" disabled>Import</button>
  </div>
  <br />
  ';
 }
 else
 {
  $error = 'Only <b>.csv</b> file allowed';
 }
}
else
{
 $error = 'Please Select CSV File';
}

$output = array(
 'error'  => $error,
 'output' => $html
);

echo json_encode($output);


?>
