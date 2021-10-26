<?php
include_once 'User_Order.php';
include_once 'User.php';
include_once 'secure/api_key.php';

$key=$_GET['key'];
if ($key == $api_key){
    $new_user = new User_Order();
    $new_user_order = $new_user->get_user_information((int)$_GET['id']);

  if ($new_user_order) {
    $new_user = new User();
    $new_user_info = $new_user->addUser($new_user_order);
    $result_table = $new_user->getUserData();
  } else {
    $result_table = '';
  }
}
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
<?php if ($key != $api_key): ?>
  <div class="isa_error">
    <i class="fa fa-times-circle"></i>
    Please, provide the correct Api Key.
  </div>
<?php else: ?>
  <?php if (!$result_table): ?>
    <div class="isa_error">
      <i class="fa fa-times-circle"></i>
      No valid user order.
    </div>
  <?php else: ?>
  <table id="customers">
    <tr>
      <th>User Name</th>
      <th>Email</th>
      <th>Password</th>
    </tr>
    <?php foreach($result_table as $value): ?>
      <tr>
        <td><?php echo $value['username']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['password']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>
