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

      <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
  </head>

  <body >

    <form method="post" name="myform" id="myform">
        Wallet address:
        <input type="text" id="wallet" name="wallet" class="form-control" readonly ><br>
        Minimal Kudan Amout:
        <input type="text" id="kudanAmount" name="kudanAmount" class="form-control"  ><br>
        <button id="search" type="button" class="search-button">
              Search
        </button>
        <div id="result"></div>

    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
      window.addEventListener('load', async () => {
        if (window.ethereum) {
          window.web3 = new Web3(ethereum);
          try {
            await ethereum.enable();
            var bscacc = ethereum.selectedAddress;
            $('#wallet').val(bscacc);
            initSearchButton()
          } catch (err) {
            $('.search-button').html('User denied account access', err)
            $('.search-button').attr("disabled", true);
          }
        } else if (window.web3) {
          window.web3 = new Web3(web3.currentProvider)
          initPayButton()
        } else {
          $('.search-button').html('No Metamask installed')
          $('.search-button').attr("disabled", true);
        }
      })

      const initSearchButton = () => {
        $('.search-button').attr("disabled", false);
        $('.search-button').click(() => {


            $.ajax({
                type: "POST",
                url: 'checkWallet.php',
                data: $("#myform input").serialize(),
                dataType: "json",
                success: function(response)
                {
                  //var jsonData = JSON.parse(response);
                  if (response.success == 1)
                  {
                    $('#result').html('YES');
                  }
                  else
                  {
                    $('#result').html('NO');
                  }
               }

             });
        })
      }



  </script>
  </body>
</html>
