<?php
include_once 'Product_Order.php';
include_once 'Product.php';

$product_info = new Product_Order();
$new_product_order = $product_info->get_product_order_information((int)$_GET['id']);
//print_r($new_product_order);

if ($new_product_order) {
  $new_product = new Product();
  $new_product_info = $new_product->addProduct($new_product_order);
  $result_table = $new_product->getProductData();
} else {
  $result_table = '';
}

// print_r($result_table);
?>
<!DOCTYPE html>
<html>
<head>
<style>
@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

.isa_info, .isa_success, .isa_warning, .isa_error {
margin: 10px 0px;
padding:12px;

}
.isa_error {
    color: #D8000C;
    background-color: #FFD2D2;
}
.isa_info i, .isa_success i, .isa_warning i, .isa_error i {
    margin:10px 22px;
    font-size:2em;
    vertical-align:middle;
}


#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<?php if (!$result_table): ?>
<div class="isa_error">
  <i class="fa fa-times-circle"></i>
  No valid product order.
</div>
<?php else: ?>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Origin</th>
  </tr>
  <?php foreach($result_table as $value): ?>
    <tr>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $value['price']; ?></td>
      <td><?php echo $value['origin']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
