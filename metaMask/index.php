<?php
include_once 'User.php';

session_start();
$_SESSION['loggin_user'] = 1100;
$loggedUserID = $_SESSION['loggin_user'];
$till_date = '2021-08-25';
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
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
</head>
<body>
  <div>
    <?php if($logged_user_info): ?>
      <?php if( strtotime($till_date) > strtotime($current_date) ): ?>
    <form id="loggedUserInfoForm" method="post">
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
      <button type="button" class="pay-button">Pay</button>
    </form>
  <?php else: ?>
    <?php if(in_array($loggedUserID, $fulfilledUsersIds)): ?>
      <p>Some specific wallet</p>
    <?php else: ?>
       <p>ENDED</p>
    <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>
	<div id="status"></div>
  </div>
  <script type="text/javascript">
    window.addEventListener('load', async () => {
      if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          await ethereum.enable();
          initPayButton()
        } catch (err) {
          $('#status').html('User denied account access', err)
        }
      } else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider)
        initPayButton()
      } else {
        $('#status').html('No Metamask (or other Web3 Provider) installed')
      }
    })

    const initPayButton = () => {
      $('.pay-button').click(() => {
        // paymentAddress is where funds will be send to
        const paymentAddress = '0x73A1E3357f6FE7AD617c27364506811A99328674'
        const amountEth = <?php echo json_encode("1", JSON_HEX_TAG); ?>;

        web3.eth.sendTransaction({
		  from: ethereum.selectedAddress,
          to: paymentAddress,
          value: web3.utils.toWei(amountEth, 'ether')
        }, (err, transactionId) => {
          if  (err) {
            console.log('Payment failed', err)
            $('#status').html('Payment failed')
          } else {
            console.log('Payment successful', transactionId)
            $('#status').html('Payment successful')
            function updateTextInput(val) {
              document.getElementById('investment').value=val;
            }
            $('#loggedUserInfoForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'wallet.php',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);

                        if (jsonData.success == $("#investment").val())
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
          }
        })
      })
    }

  </script>
</body>
</html>
