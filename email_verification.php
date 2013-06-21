<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="azadi" />
	<title>Azadi</title>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">

	<link href='http://fonts.googleapis.com/css?family=Lekton|Magra:400,700' rel='stylesheet' type='text/css'>
	
	<!--
    I would suggest using these for production, because of better caching
	-->
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    
	
	<script type="text/javascript" src="jquery-version.js"></script>
	<script type="text/javascript" src="ajaxform.js"></script>
	
	
	<script>
	var randomnumber=Math.floor(Math.random()*10000);
	$(document).ready(function(){
	
	//sliding up gray cover text boxes to expose text below
	$(".content_frame_background").hover(function(){
				$height = $(this).children(":first").height();
				$(this).animate({top:'-=' + $height + 'px'}, 200,'swing');
		},
		function(){
				$(this).animate({top:'0px'}, 500,'swing');
		});
		
	//input field focus
	$("input").focus(function(){
		$(this).css("color","black");
	});
	//input field blur
	$("input").blur(function(){
		$(this).css("color","#7B7B7B");
	});
	

	//prevent submit button from showing in form
    $('form').each(function() {
        $('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });
        $('input[type=submit]').hide();
    });
	
	});
		
</script>
	

		
</head>

<body id="emailv">


	<div class="container">
	
		<br/><br/>
		
		<h1 style="font-family:sans-serif;">Azadi</h1>
		
		<h4>a free textbook pdf sharing website</h4>
		
		<br/><br/>
		
		<div class="form">
		<form ACTION="send_email.php" METHOD="POST" id="create" name="inputform" <!--class='ajaxform'-->>
				<input type="text" name="uni[0]" value="your_uni"
					style="background-color: lightgray; border-color: lightblue; border: none;
					width: 300px; height: 40px; padding: 4px; font-size: 20px; opacity: .5;
					font-family: 'Magra', sans-serif; color: #7B7B7B;" />
					@columbia.edu
				<script>
					document.write('<input type="hidden" name="uni[1]" value="'+randomnumber+'"/>');
				</script>
				<input type="submit" name="submit" value="Submit" />
		</form>
		</div>
		
		<br/><br/>
		
		<div class="second" style="display:none;" id="passcode">
		You have been sent an email with a passcode. To continue into Azadi, enter the
		passcode here:
		<form action="check.php" method="POST">
				<input type="text" name="passcode[0]" value="passcode (a four-digit number)"
					style="background-color: lightgray; border-color: lightblue; border: none;
					width: 300px; height: 40px; padding: 4px; font-size: 20px; opacity: .5;
					font-family: 'Magra', sans-serif; color: #7B7B7B;" />
				<script>
					document.write('<input type="hidden" name="passcode[1]" value="'+randomnumber+'"/>');
				</script>
				<input type="submit" name="submit" value="Submit" />
		</div>
		
	</div> <!--end container-->

</body>


</html>