<?php
//composer require statickidz/php-google-translate-free
//
//require_once ('/vendor/autoload.php');
//use \Statickidz\GoogleTranslate;

// $source = 'es';
// $target = 'en';
// $text = 'buenos días';

//$trans = new GoogleTranslate();
//$result = $trans->translate($source, $target, $text);

// Good morning
// echo $result;
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booll.com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
				<img style="max-width: 180px;" src="images/revertlogo.png" alt="#">
			</h3>


			<p class="txt-center l1-txt2 p-b-60">
				You can choose one of the following countries:
			</p>

			<div class="flex-w flex-c cd100 p-b-82">
				<div class="flex-col-c-m size2 how-countdown">
					<a href="https://www.booll.bg/"><button type="button">Bulgaria</button></a>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<a href="https://www.booll.co.uk/"><button type="button">United Kingdom</button></a>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<a href="https://www.booll.de/"><button type="button">Germany</button></a>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<a href="https://www.booll.it/"><button type="button">Italy</button></a>
				</div>

        <div class="flex-col-c-m size2 how-countdown">
          <a href="https://www.booll.pl/"><button type="button">Poland</button></a>
        </div>

        <div class="flex-col-c-m size2 how-countdown">
          <a href="https://www.booll.fr/"><button type="button">France</button></a>
        </div>

        <div class="flex-col-c-m size2 how-countdown">
          <a href="https://www.booll.es/"><button type="button">Espagne</button></a>
        </div>

        <div class="flex-col-c-m size2 how-countdown">
          <a href="https://www.booll.com/"><button type="button">USA</button></a>
        </div>
			</div>

<?php


// Language
if ($_SESSION['country'] == "Bulgaria") {
	$text = "Ние доставяме до България";
	$text2 = "Ние Не доставяме до България";
} else if($_SESSION['country'] == "United States"){
	$text = "We deliver to ". $_SESSION['country'];
	$text2 = "We Don`t deliver to ". $_SESSION['country'];
} else {
	$text = "We deliver to " . $_SESSION['country'];
	$text2 = "We Don`t deliver to " . $_SESSION['country'];
}
 ?>

			<?php if (in_array($_SESSION['country'], array('Albania','Armenia','Austria','Bosnia and Herzegovina','Belgium','Belarus','Canada','Switzerland','China','Cyprus','Czech Republic','Germany','Bulgaria','Denmark','Estonia','Spain','Finland','France','United Kingdom','Georgia','Greece','Croatia','Hungary','Ireland','Israel','Iceland','Italy','Jersey','Lithuania','Luxemburg','Latvia','Monaco','Moldova','Montenegro','Macedonia','Malta','Netherlands','Norway','Poland','Portugal','Romania','Serbia','Sweden','Slovenia','Slovakia','San Marino','United States'))): ?>
			 		<a class="mobile-hide" onMouseOver="this.style.background='none'"
			 style="color:white"><?php echo $text; ?> <i class="fas fa-truck"></i></a>
			 	<?php else : ?>
			 		<a class="mobile-hide" onMouseOver="this.style.background='none'"
			 style="color:white"><?php echo $text2; ?> <i class="fas fa-ban"
			 style="color:#ff5722;"></i></a>
			 	<?php endif; ?>


		</div>

		<span class="s1-txt3 txt-center">
			@ 2021 booll.com
		</span>

	</div>





<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/moment.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 0,
			endtimeHours: 6,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: ""
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
