<?php
define("CONTACT_FORM", 'darina@booll.bg');
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;

if($post) {


  foreach($_POST as $k=>$v){
    $_POST[$k] = stripslashes($v);
  }

  $name = "Quiz";
  $email = "darina@booll.bg";
  $subject = "Quiz";
  $message = $_POST;

  require_once dirname(__FILE__) . '/vendor/autoload.php';
  $from = 'dzvetanova@idar.bg';
  // Create the Transport
  $transport = (new Swift_SmtpTransport('bono.superhosting.bg', 25))
    ->setUsername($from)
    ->setPassword('darinada777')
  ;

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message('Wonderful Subject'))
    ->setFrom([$from => 'booll.bg'])
    ->setTo([$from])
    ->setBody($message)
    ;

  // Send the message
  $mail = $mailer->send($message);



  if($mail) {
    echo 'OK';
  } else {
    echo 'server error';
  }


} else {
  echo '<div class="notification_error">'.$error.'</div>';
}

?>
