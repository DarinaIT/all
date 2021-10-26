<!DOCTYPE html>
<html>
   <head>
     <title>CSV Column Mapping in PHP</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <style>
      .table tbody tr th
      {
        min-width: 200px;
      }

      .table tbody tr td
      {
        min-width: 200px;
      }

      </style>
   </head>
   <body>
    <div class="container">
     <br />
     <br />
      <h1 align="center">CSV Column Mapping in PHP</h1>
      <br />
        <div id="message"></div>
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Select CSV File</h3>
          </div>
          <div class="panel-body">
            <div class="row" id="upload_area">
              <form method="post" id="upload_form" enctype="multipart/form-data">
                <div class="col-md-6" align="right">Select File</div>
                <div class="col-md-6">
                  <input type="file" name="file" id="csv_file" />
                </div>
                <br /><br /><br />
                <div class="col-md-12" align="center">
                  <input type="submit" name="upload_file" id="upload_file" class="btn btn-primary" value="Upload" />
                </div>
              </form>

            </div>
            <div class="table-responsive" id="process_area">

            </div>
          </div>
        </div>
     </div>

   </body>
</html>

<script>
$(document).ready(function(){

  $('#upload_form').on('submit', function(event){

    event.preventDefault();
    $.ajax({
      url:"upload.php",
      method:"POST",
      data:new FormData(this),
      dataType:'json',
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
        if(data.error != '')
        {
          $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
          $('#process_area').html(data.output);
          $('#upload_area').css('display', 'none');
        }
      }
    });

  });

  var total_selection = 0;

  var name = 0;
  var description = 0;
  var keywords = 0;
  var category = 0;
  var condition = 0;
  var has_variations = 0;
  var reg_price = 0;
  var sale_price = 0;
  var quantity = 0;
  var sku = 0;
  var shipping_cost = 0;
  var shipping_fee = 0;
  var shipping_time = 0;
  var status = 0;
  var last_status = 0;
  var origin = 0;
  var brand = 0;
  var model_number = 0;
  var weight = 0;
  var length = 0;
  var width = 0;
  var height = 0;
  var poster = 0;
  var thumb = 0;
  var variation_type = 0;
  var sizing_type = 0;
  var user_id = 0;
  var sold = 0;
  var rating = 0;
  var reviews = 0;
  var profit = 0;
  var activity_status = 0;
  var approved = 0;
  var editing_stage = 0;
  var payment_method = 0;
  var time = 0;
  var feed = 0;
  var market = 0;
  var currency = 0;
  var promo = 0;


  var column_data = [];

  $(document).on('change', '.set_column_data', function(){

    var column_name = $(this).val();

    var column_number = $(this).data('column_number');

    if(column_name in column_data)
    {
      alert('You have already define '+column_name+ ' column');

      $(this).val('');

      return false;
    }

    if(column_name != '')
    {
      column_data[column_name] = column_number;
    }
    else
    {
      const entries = Object.entries(column_data);

      for(const [key, value] of entries)
      {
        if(value == column_number)
        {
          delete column_data[key];
        }
      }
    }

    total_selection = Object.keys(column_data).length;

    if(total_selection == 3)
    {
      $('#import').attr('disabled', false);

      name = column_data.name;
      description = column_data.description;
      keywords = column_data.keywords;
      category = column_data.category;
      condition = column_data.condition;
      has_variations = column_data.has_variations;
      reg_price = column_data.reg_price;
      sale_price = column_data.sale_price;
      quantity = column_data.quantity;
      sku = column_data.sku;
      shipping_cost = column_data.shipping_cost;
      shipping_fee = column_data.shipping_fee;
      shipping_time = column_data.shipping_time;
      status = column_data.status;
      last_status = column_data.last_status;
      origin = column_data.origin;
      brand = column_data.brand;
      model_number = column_data.model_number;
      weight = column_data.weight;
      length = column_data.length;
      width = column_data.width;
      height = column_data.height;
      poster = column_data.poster;
      thumb = column_data.thumb;
      variation_type = column_data.variation_type;
      sizing_type = column_data.sizing_type;
      user_id = column_data.user_id;
      sold = column_data.sold;
      rating = column_data.rating;
      reviews = column_data.reviews;
      profit = column_data.profit;
      activity_status = column_data.activity_status;
      approved = column_data.approved;
      editing_stage = column_data.editing_stage;
      payment_method = column_data.payment_method;
      time = column_data.time;
      feed = column_data.feed;
      market = column_data.market;
      currency = column_data.currency;
      promo = column_data.promo;

    }
    else
    {
      $('#import').attr('disabled', 'disabled');
    }

  });

  $(document).on('click', '#import', function(event){

    event.preventDefault();

    $.ajax({
      url:"import.php",
      method:"POST",
      data:{name:name, description:description, keywords:keywords,
            category:category, condition:condition, has_variations:has_variations,
            reg_price:reg_price, sale_price:sale_price, quantity:quantity,
            sku:sku, shipping_cost:shipping_cost, shipping_fee:shipping_fee,
            shipping_time:shipping_time, status:status, last_status:last_status,
            origin:origin, brand:brand, model_number:model_number,
            weight:weight, length:length, width:width,
            height:height, poster:poster, thumb:thumb,
            variation_type:variation_type, sizing_type:sizing_type, user_id:user_id,
            sold:sold, rating:rating, reviews:reviews,
            profit:profit, activity_status:activity_status, approved:approved,
            editing_stage:editing_stage, payment_method:payment_method, time:time,
            feed:feed, market:market, currency:currency,
            promo:promo},
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').text('Importing...');
      },
      success:function(data)
      {
        $('#import').attr('disabled', false);
        $('#import').text('Import');
        $('#process_area').css('display', 'none');
        $('#upload_area').css('display', 'block');
        $('#upload_form')[0].reset();
        $('#message').html("<div class='alert alert-success'>"+data+"</div>");
      }
    })

  });

});
</script>
