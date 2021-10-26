<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Minimal Form Interface</title>
		<meta name="description" content="Minimal Form Interface: Simplistic, single input view form" />
		<meta name="keywords" content="form, minimal, interface, single input, big form, responsive form, transition" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/3DGridEffect/"><span>Previous Demo</span></a>
				<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=18780"><span>Back to the Codrops Article</span></a></span>
			</div>
			<header class="codrops-header">
				<h1>Minimal Form Interface <span>Simplistic, single input view form</span></h1>
			</header>
			<section>
				<form id="theForm" class="simform">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">What's your email?</label></span>
								<input id="q1" name="q1" type="email"/>
							</li>
							<li>
								<span><label for="q2">Where do you live?</label></span>
								<input id="q2" name="q2" type="text"/>
							</li>
							<li>
								<span><label for="q3">What time do you go to work?</label></span>
								<input id="q3" name="q3" type="text"/>
							</li>
							<li>
								<span><label for="q4">How do you like your veggies?</label></span>
								<input id="q4" name="q4" type="text"/>
							</li>
							<li>
								<span><label for="q5">What book inspires you?</label></span>
								<input id="q5" name="q5" type="text"/>
							</li>
							<li>
								<span><label for="q6">What's your profession?</label></span>
								<input id="q6" name="q6" type="text"/>
							</li>
						</ol><!-- /questions -->
						<button class="submit" type="submit">Send answers</button>
						<div class="controls">
							<button class="next"></button>
							<div class="progress"></div>
							<span class="number">
								<span class="number-current"></span>
								<span class="number-total"></span>
							</span>
							<span class="error-message"></span>
						</div><!-- / controls -->
					</div><!-- /simform-inner -->
					<span class="final-message"></span>
				</form><!-- /simform -->
			</section>
			<section class="related">
				<p>If you enjoyed this demo you might also like:</p>
				<a href="http://tympanus.net/Tutorials/NaturalLanguageForm/">
					<img src="http://tympanus.net/codrops/wp-content/uploads/2013/05/NaturalLanguageForm2-300x162.png" />
					<h3>Natural Language Form</h3>
				</a>
				<a href="http://tympanus.net/Development/AnimatedCheckboxes/">
					<img src="http://tympanus.net/codrops/wp-content/uploads/2013/10/AnimatedCheckboxes-300x162.png" />
					<h3>Animated Checkboxes with SVG</h3>
				</a>
			</section>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/stepsForm.js"></script>




		<script>

			var theForm = document.getElementById( 'theForm' );
                        //disable form autocomplete
                        theForm.setAttribute( "autocomplete", "off" );

			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

					$.ajax({
	            type: "POST",
	            url: 'mail.php',
	            data: $(this).serialize(),
	            success: function(response)
	            {
	                var jsonData = JSON.parse(response);

	                if (jsonData.success == "1")
	                {
	                    alert('Success!');
	                }
	                else
	                {
	                    alert('Invalid Credentials!');
	                }
	           }
	       });

					// let's just simulate something...
					var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
					classie.addClass( messageEl, 'show' );
				}
			} );
		</script>
	</body>
</html>
