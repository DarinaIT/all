<?php
include_once 'lib/Question.php';

$question = new Question();
$resultQuestions = $question->getQuestionsData();
$i = 1;
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $( document ).on( "click", ".next", function() {
      $(this).parent('.hideShow').hide().next().show();
  });
</script>

<title>Bool</title>
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h2>Quiz</h2>

<form id="theForm" method="post" enctype="multipart/form-data" action="/mailQuiz.php">
<?php foreach($resultQuestions as $q): ?>
  <?php
    if ($i==1){
      $style = "";
    } else{
      $style = "display:none;";
    }
  ?>

  <div class="hideShow" style="<?php echo $style; ?>">
    <label for="q<?php echo $q['id'] ?>"><?php echo $q['question'] ?></label><br>
    <input type="text" id="a<?php echo $q['id'] ?>" name="a<?php echo $q['id'] ?>" value="..."><br>
    <?php if ($q['id'] != $resultQuestions[array_key_last($resultQuestions)]['id']): ?>
      <input type="button" class="next" value="Next">
    <?php else: ?>
      <input type="submit" value="Submit">
    <?php endif; ?>
  </div>


  <?php $i++; ?>
<?php endforeach; ?>

</form>

<script type="text/javascript">
$(document).ready(function() {
    $('#theForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'mailQuiz.php',
            data: $(this).serialize(),
            success: function(response)
            {
                //var jsonData = JSON.parse(response);

                if (response)
                {
                    alert('Success!');
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
</script>

</body>
</html>
