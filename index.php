<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Fresh Eye</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="PracticeNext" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="public/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="public/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="public/css/component.css" />
		<script src="public/js/modernizr.custom.js"></script>	
	</head>
	<body>
		<div class="container">
			
			<div class="man">
			  <div id="left-eye"><div id="left-pupil"></div></div>
			  <div id="right-eye"><div id="right-pupil"></div></div>
			</div>
			
			<header class="fresheye-header">
				<h1>
					Get a UX designer to comb through your live website 
					<span> <br/>
						or in-progress designs to critique and provide actionable feedback.
					</span>	
				</h1>
			</header>

			<section>
				<form id="theForm" class="simform" autocomplete="off">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">Your Website's Domain Name</label></span>
								<input id="q1" name="q1" type="text" placeholder="www.website.com" />
							</li>
							<li>
								<span><label for="q2">Your Name</label></span>
								<input id="q2" name="q2" type="text" placeholder="First & Last Name" />
							</li>
							<li>
								<span><label for="q3">Your Email</label></span>
								<input id="q3" name="q3" type="text" placeholder="email@address.com" />
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
		</div><!-- /container -->

		
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	
		<script src="public/js/classie.js"></script>
		<script src="public/js/stepsForm.js"></script>
		<script>
			var theForm = document.getElementById( 'theForm' );

			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

					var domainname = $('#q1').val();
					var fullname = $('#q2').val();
					var emailid = $('#q3').val();

					var formData = {domainname:domainname,fullname:fullname,emailid:emailid}; 
					console.log(formData);
					/*
					form.submit()
					or
					AJAX request (maybe show loading indicator while we don't have an answer..)
					*/
					$.ajax({
					    url: 'http://fresheye.in/',
					    type: 'POST',
					    data : formData,
					    async: false,
					    cache: false,
					    timeout: 30000,
					    error: function(){
					        return true;
					    },
					    success: function(msg){ 
					    	console.log("success");
					        console.log(msg);
					    }
					});


					// let's just simulate something...
					var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
					classie.addClass( messageEl, 'show' );
				}
			} );
		</script>

		
		<script>
		var DrawEye = function(eyecontainer, eyepupil, speed, interval){
		  var mouseX = 0, mouseY = 0, xp = 0, yp = 0;
		  var limitX = $(eyecontainer).width() - $(eyepupil).width(),
		      limitY = $(eyecontainer).height() - $(eyepupil).height(),
		      offset = $(eyecontainer).offset();

		  $(window).mousemove(function(e){
		    mouseX = Math.min(e.pageX - offset.left, limitX);
		    mouseY = Math.min(e.pageY - offset.top, limitY);
		    if (mouseX < 0) mouseX = 0;
		    if (mouseY < 0) mouseY = 0;
		  });

		  var follower = $(eyepupil);
		  var loop = setInterval(function(){
		    xp += (mouseX - xp) / speed;
		    yp += (mouseY - yp) / speed;
		    follower.css({left:xp, top:yp});
		  }, interval);
		};

		//create eyes
		var eye1 = new DrawEye("#left-eye",  "#left-pupil", 8, 30);
		var eye2 = new DrawEye("#right-eye", "#right-pupil", 8, 30);  
		//# sourceURL=pen.js
		</script>

	</body>
</html>