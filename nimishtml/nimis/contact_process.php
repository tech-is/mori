<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NIMIS</title>
	<!-- fonts files -->
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- CSS files -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="thank_page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="thank_box">
						<?php 
						if(isset($_POST['submit'])){
							$to = "sscp.info2@gmail.com"; // this is your Email address
							$from = $_POST['email']; // this is the sender's Email address
							$first_name = $_POST['name'];
							$subject = "Form submission";
							$subject2 = "Copy of your form submission";
							$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

							$headers = "From:" . $from;
							$headers2 = "From:" . $to;
							mail($to,$subject,$message,$headers);
							mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
							echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
							// You can also use header('Location: thank_you.php'); to redirect to another page.
							// You cannot use header and echo together. It's one or the other.
							}
						?>
						<br>
						<a href="contact.html"><i class="fa fa-arrow-left"></i>Go to contact page</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>