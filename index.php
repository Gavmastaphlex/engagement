<html>
<head>
	<meta charset="UTF-8">
	<title>Sara and Gavin's Engagement site</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

</head>
<body>

			<?php

				if(isset($_POST['submit'])) {

				$startHide = "";
				$endHide = "";
				$thankYou = "";
			     
			    // EDIT THE 2 LINES BELOW AS REQUIRED
			    $email_to = "sara_brasington@msn.com";
			    $email_subject = "Engagement RSVP";

			    // validation expected data exists
			    if(!isset($_POST['name']) ||
			        !isset($_POST['rsvpRadio']) ||
			        !isset($_POST['danceSongs'])) {
			    }
			     
			    $name = $_POST['name']; // required
			    $rsvpoption = $_POST['rsvpRadio']; // required
			    $danceSongs = $_POST['danceSongs']; // notrequired
			    
			    $name_msg = "";
			    $rsvpoption_msg = "";

			    $string_exp = "/^[A-Za-z .'-,!?]+$/";

			    if(!$name) {
			    $name_msg .= 'Please enter your name!<br />';
			  } else if(!preg_match($string_exp,$name)) {
			    $name_msg .= 'Please enter a valid name!<br />';
			  }

			  if(!isset($_POST['rsvpRadio'])) {
			    $rsvpoption_msg .= 'Please let us know if you\'re attending or not!<br />';
			  }
			  
			  if(!$name_msg && !$rsvpoption_msg) {

				$email_message = "RSVP details below.\n\n";
			     
			    function clean_string($string) {
			      $bad = array("content-type","bcc:","to:","cc:","href");
			      return str_replace($bad,"",$string);
			    }
			     
				    $email_message .= "Name: ".clean_string($name)."\n";
				    $email_message .= "Attending: ".clean_string($rsvpoption)."\n";

				    if($rsvpoption == 'yes') {
					   $email_message .= "Song suggestions: ".clean_string($danceSongs)."\n";	
					  }

					mail($email_to, $email_subject, $email_message); 

					$name = ""; // required
					$rsvpoption = ""; // required
			    	$danceSongs = ""; // not required

			    	$startHide = "<div style=\"display:none;\">";
					$endHide = "</div>";
					$thankYou = "<p style=\"margin-bottom:19px;\">Thanks for submitting your RSVP!</p>";

				  }  
			}

		?>

	<div id="content">

		<p id="names">Gavin McGruddy &amp; Sara Brasington</p>

		<p id="invite">INVITE YOU TO CELEBRATE THEIR ENGAGEMENT</p>

		<p id="date">Saturday, 10th September 2016, 7:30pm</p>

		<p id="location">Thistle Inn, 3 Mulgrave St, Wellington <a id="map" href="https://www.google.co.nz/maps/place/Thistle+Inn+Tavern/@-41.277766,174.779681,15z/data=!4m5!3m4!1s0x0:0xa3f878dc4c208b97!8m2!3d-41.277766!4d174.779681" target="_blank"> (Click to view map)</a></p>

		<p id="food">Join us for laughter, nibbles and dancing!</p>
		
		<p id="dress">Smart casual dress</p>

		<div id="rsvp-details">

			<?php echo $startHide; ?>

			<p id="makeItTitle">CAN YOU MAKE IT?</p>

			<form method="post" action="index.php">
				<label for="name">Name(s):</label>
			  <input type="text" name="name" id="name" style="width:250px;" value="<?php echo $name; ?>">
			  <div class="error"><?php echo $name_msg; ?></div>
			
			<p id="rsvp">RSVP:  <span id="yes" class="rsvp-option"><span class="plural">I</span>'d love to attend!</span> / <span id="no" class="rsvp-option"><span class="plural">I</span> regretfully decline...</span></p>

				<div style="display:none;">
				  <input type="radio" name="rsvpRadio" value="yes"> Yes<br>
				  <input type="radio" name="rsvpRadio" value="no"> No
			     </div>

			    <div class="error"><?php echo $rsvpoption_msg; ?></div>

				<div class="hiddenSection" id="yesSection">

					<p>Great one! Any songs that you would like to dance to?</p>

					<!-- <label for="danceSong">Song(s) you'd like to dance to:</label> -->
				  	<input type="text" name="danceSongs" id="danceSong" style="width:250px; margin:10px 0px;">

			 	</div>

			 	<div class="hiddenSection" id="noSection">

					<p>We're very sorry to hear you can't make it...</p>

			 	</div>

			 	<p id="submitButton">Submit</p>

			 	<input id="properSubmitButton" style="display:none;" type="submit" type="submit" name="submit" value="Submit" />
		
			 </form> 

			 <?php echo $endHide; ?>

			 <?php echo $thankYou; ?>

		</div>

	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>