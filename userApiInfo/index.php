<?php
include_once 'User.php';

session_start();
$_SESSION['loggin_user'] = 1100;
$loggedUserID = $_SESSION['loggin_user'];
$till_date = '2021-07-25';
$current_date = date('Y-m-d');

$logged_user = new User();
$logged_user_info = $logged_user->getSingleUserData($loggedUserID);
$fulfilledFormUsersIds = $logged_user->getAddedFormUsers();
$fulfilledUsersIds = [];

if($fulfilledFormUsersIds){
  $i=0;
  foreach($fulfilledFormUsersIds as $v){
    $i++;
     $fulfilledUsersIds[$i] = $v["hex_users_id"];
  }
}


?>
<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<?php if($logged_user_info): ?>
  <?php if( strtotime($till_date) > strtotime($current_date) ): ?>
<form id="loggedUserInfoForm" method="post">
    <div>
        <input type="hidden" name="id" id="id" value="<?php echo $logged_user_info['id']; ?>" readonly required />
        First name:
        <input type="text" name="fname" id="fname" value="<?php echo $logged_user_info['fname']; ?>" required /><br>
        Last name:
        <input type="text" name="lname" id="lname" value="<?php echo $logged_user_info['lname']; ?>" required /><br>
        Email address:
        <input type="email" name="email" id="email" value="<?php echo $logged_user_info['email']; ?>" required /><br>
        Phone number:
        <input type="text" name="phone" id="phone" value="<?php echo $logged_user_info['phone']; ?>" required /><br>

        Amount to invest:
        <input type="range" name="rangeInput" min="500" max="1000" onchange="updateTextInput(this.value);">
        <input type="text" id="investment" name="investment" value="767" readonly required><br>

        Agree with terms of sale:
        <input type="checkbox" id="sales_agreement" name="sales_agreement" value="1"><br>

        <input type="submit" name="loginBtn" id="loginBtn" value="Save" />
    </div>
</form>
<?php else: ?>
  <?php if(in_array($loggedUserID, $fulfilledUsersIds)): ?>
    <p>Some specific wallet</p>
  <?php else: ?>
     <p>ENDED</p>
  <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<script type="text/javascript">
function updateTextInput(val) {
  document.getElementById('investment').value=val;
}
$(document).ready(function() {
    $('#loggedUserInfoForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'wallet.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1")
                {
                    location.href = 'coins.php';
                }
                else
                {
                    alert('Invalid Operations! Please, try again.');
                }
           }
       });
     });
});
</script>
</body>
</html>
