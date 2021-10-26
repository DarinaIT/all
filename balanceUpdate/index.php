<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>

<script type="text/javascript">
$(document).ready(function() {
    var valueID = 53;
    var valueBalance = 2;
    var valueProfit = 3;
      $.ajax({
          type: "POST",
          url: 'balanceUpdate.php',
          data: { id: valueID, balance: valueBalance, profit: valueProfit },
          success: function(response)
          {
              var jsonData = JSON.parse(response);
              // user balance is updated successfully in the back-end
              // let's redirect
              if (jsonData.success == "1")
              {
                  alert('The balance is updated successfully!');
              }
              else
              {
                  alert('Invalid Balance!');
              }
         }
     });
});
</script>
</body>
</html>
