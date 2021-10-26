<?php

// Where will you get the forms' results?
define("CONTACT_FORM", 'darina@booll.bg');

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

var_dump($post);exit;
$result = json_encode(jsonData);

$q1 = stripslashes($_POST['q1']);
$q2 = trim($_POST['q2']);
$q3 = stripslashes($_POST['q3']);
$q4 = stripslashes($_POST['q4']);
$q5 = stripslashes($_POST['q5']);
$q6 = stripslashes($_POST['q6']);


$error = '';


// Check message (length)

if(!$q1 || strlen($q1) < 2)
{
$error .= "Моля, въведете вашето съобщение. То трябва да съдържа поне 2 символа.<br />";
}


if(!$error)
{
    require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
    $from = 'darina@booll.bg';
    // Create the Transport
    $transport = (new Swift_SmtpTransport('bono.superhosting.bg', 25))
      ->setUsername($from)
      ->setPassword('darinada777')
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Wonderful Subject'))
      ->setFrom([$from => 'darina.targovec.bg'])
      ->setTo([$from])
      ->setBody($message)
      ;

    // Send the message
    $mail = $mailer->send($message);
// $mail = mail(CONTACT_FORM, $subject, $message,
    //  "From: ".$name." <".$email.">\r\n"
    // ."Reply-To: ".$email."\r\n"
    // ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}
else {
    echo 'server error';
    }


}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>
