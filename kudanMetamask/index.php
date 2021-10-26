<?php
// $apiKey = "HCE5Q57KCHBH5DTCW66D4KZJKSV77HNAN4";
// $contractAddress = "0x49d843dfdc54a3db7d5de9243caeabe39ad493ff";
// $address = "0x34a87Db2F21F069869f63E74135EF873cE8aC896";
// function get_balance($apiKey, $contractAddress, $address){
//   $url = "https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=".$contractAddress."&address=".$address."&tag=latest&apikey=".$apiKey;
//
//   $resultUrl = json_decode(file_get_contents($url));
//
//   $status = "";
//   $message = "";
//   $result = "";
//
//   foreach ($resultUrl as $key => $value) {
//     if ($key == "status") {
//       $status = $value;
//     } else if ($key == "message") {
//       $message = $value;
//     } else {
//       $result = $value;
//     }
//   }
//
//
//   function get_percentage($total, $number)
// {
//   if ( $total > 0 ) {
//    return round(($number * 100) / $total, 9);
//   } else {
//     return 0;
//   }
// }
// $progress=(100-get_percentage(200000000000000,$result/1000000000));
// return $progress;
// }
// $progres=(get_balance($apiKey, $contractAddress, $address)+1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kudan</title>
    <!-- Favicon icon -->
    <link rel="icon" href="https://bitbooll.io/img/core-img/favicon.ico">
	<link rel="apple-touch-icon" href="https://bitbooll.io/img/core-img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://bitbooll.io/img/core-img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://bitbooll.io/img/core-img/favicon-16x16.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
</head>

<body class="@@dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper">

    <div class="header landing bg-dark light">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="navigation">
                    <nav class="navbar navbar-light">
                        <div class="brand-logo">
                            <a href="https://bitbooll.io">
                                <img width="60px" src="https://bitbooll.com/asset/images/logo_1622545756.png" alt="" class="logo-primary">
                                <img width="60px" src="https://bitbooll.com/asset/images/logo_1622545756.png" alt="" class="logo-white">
                            </a>
                        </div>
                        <div class="signin-btn">
                            <a href="index.html" class="btn btn-primary" href="#">Binance Smart Chain</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="intro2 section-padding bg-dark" id="intro">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-xl-6 col-lg-6 col-12">
				<div class="intro-form-exchange">
                    <form method="post" name="myform" class="currency_validate trade-form row g-3">
                        <div class="col-12">
                            <label class="form-label">Connected BSC Address</label>
                            <div class="input-group">
                                <input type="text" id="wallet" disabled name="wallet" class="form-control"  >
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Enter Ethereum Address to receive your NFT</label>
                            <div class="input-group">
                                <input type="text" id="ethereumAddress" name="ethereumAddress" class="form-control" placeholder="Enter an ethereum address">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">BNB</label>
                            <div class="input-group">
                                <select disabled class="form-control" style="padding:0px 0px 0px 45px;background-repeat:no-repeat;background-size: 30px 30px;background-position: left;background-position-x: 5px;background-image:url(images/bnb.png);" name="method">
                    <option value="bank">BNB</option>
                                </select>
                                <input type="number" min="0.01" step="0.01" id="bnbAmount" name="bnbAmount" class="form-control" placeholder="Enter a BNB amount">
                            </div>
                        </div>




                        <div class="successfrm" style="display: none;">
                            <div class="ui-success">
                                <svg viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Group-3" transform="translate(2.000000, 2.000000)">
                                <circle id="Oval-2" stroke="rgba(165, 220, 134, 0.2)" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
                                    <circle  class="ui-success-circle" id="Oval-2" fill="#000" stroke="#A5DC86" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
                                    <polyline class="ui-success-path" id="Path-2" stroke="#A5DC86" stroke-width="4" points="19 38.8036813 31.1020744 54.8046875 63.299221 28"></polyline>
                                </g>
                                </g>
                                </svg>
                            </div>
                        </div>
                       <div class="failform" style="display: none;">
                            <div class="ui-error">
                                <svg  viewBox="0 0 87 87" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Group-2" transform="translate(2.000000, 2.000000)">
                                    <circle id="Oval-2" stroke="rgba(252, 191, 191, .5)" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
                                    <circle fill="#000" class="ui-error-circle" stroke="#F74444" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
                                    <path class="ui-error-line1" d="M22.244224,22 L60.4279902,60.1837662" id="Line" stroke="#F74444" stroke-width="3" stroke-linecap="square"></path>
                                    <path class="ui-error-line2" d="M60.755776,21 L23.244224,59.8443492" id="Line" stroke="#F74444" stroke-width="3" stroke-linecap="square"></path>
                                    </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
						<button id="buy-button" type="button" class="btn btn-primary pay-button">
                            Pay
                        </button>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="./js/plugins/sparkline-init.js"></script>
<script src="./js/scripts.js"></script>
<script type="text/javascript">
    window.addEventListener('load', async () => {
      if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          await ethereum.enable();
          var bscacc = ethereum.selectedAddress;
          document.getElementById("wallet").setAttribute('value',bscacc);
          initPayButton()
        } catch (err) {
          $('.pay-button').html('User denied account access', err)
          $('.pay-button').attr("disabled", true);
        }
      } else if (window.web3) {
        window.web3 = new Web3(web3.currentProvider)
        initPayButton()
      } else {
        $('.pay-button').html('No Metamask installed')
        $('.pay-button').attr("disabled", true);
      }
    })

    const initPayButton = () => {
      $('.pay-button').attr("disabled", false);
      $('.pay-button').click(() => {

        const chainId = parseInt(ethereum.chainId, 16);
        //console.log(chainId); // = 3
        if(chainId === 56 || chainId === 1337 || chainId === 97 || chainId === 3 ){
            const paymentAddress = '0x34a87Db2F21F069869f63E74135EF873cE8aC896'
            const bnbAmount = $("#bnbAmount").val();
            if(bnbAmount ===""){
                alert("Please enter BNB amount")
                return;
            }
            web3.eth.sendTransaction({
                  from: ethereum.selectedAddress,
              to: paymentAddress,
              value: web3.utils.toWei(bnbAmount, 'ether'),
              gasLimit: 191328
            }, (err, transactionId) => {
              if  (err) {
                console.log('Payment failed', err)
                $('.successfrm').hide();
                $('.failform').show().delay(2000).fadeOut();
              } else {

var wallet = $("#wallet").val();
var ethereumAddress = $("#ethereumAddress").val();
var bnbAmountVal = $("#bnbAmount").val();
var info = [];
info["wallet"] = wallet;
info["ethereumAddress"] = ethereumAddress;
info["bnbAmount"] = bnbAmountVal;
console.log(info);
                    $.ajax({
                        type: "POST",
                        url: 'wallet.php',
                        data: info,
                        dataType: "json",
                        success: function(response)
                        {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == 1)
                            {
                                location.href = '/';
                                $('.successfrm').show().delay(2000).fadeOut();
                               $('.failform').hide();
                               console.log('Payment successful', transactionId);
                            }
                            else
                            {
                              $('.failform').show().delay(2000).fadeOut();
                             $('.successfrm').hide();
                             console.log('Payment successful', transactionId)
                                alert('Invalid Operations! Please, try again.');
                            }
                       }

                 });

                //  $('.successfrm').show().delay(2000).fadeOut();
                // $('.failform').hide();
                // console.log('Payment successful', transactionId)
              }
            })
        } else {
            alert("Please Connect to BinanceSmart Chain on Metamask");
        }
      })
    }

    //function updateKudanAmount(event){
    //     $("#kudan_receive").val(getKudanAmount(event.target.value).toFixed(0));
    // }
    //
    // function getKudanAmount(bnbAmount){
    //     const bnb_to_kudan_ratio=1509200002.7833333
    //     return bnbAmount*bnb_to_kudan_ratio;
    // }
    //
    //  function renderQrCode(){
    //     let bnbAmount = $("#bnb_amount").val();
    //     if(bnbAmount ===""){
    //         alert("Please enter BNB amount")
    //         return;
    //     }
        $("#amount-label").html("Send " + bnbAmount + " BNB to:");
        // $("#qrcode").show();
    //}
</script>
</body>

</html>
