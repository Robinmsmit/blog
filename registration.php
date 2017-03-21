<?php 

session_start();
include 'connection.php';

?>

<html>
	<head>
		<title> Login systeem</title>
		  <link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body background="pexels-photo-177577.jpeg">
		<?php
			$voornaam = $_POST['voornaam'];
	    	$achternaam = $_POST['achternaam'];
	    	$wachtwoord = $_POST['wachtwoord'];
	    	$submit = $_POST['submit'];
	    	$bevestiging_wachtwoord = $_POST['bevestiging_wachtwoord'];


	    	 function do_alert_created($msg) 
		    {
		        echo '<script type="text/javascript">confirm("' . $msg . '"); 
		        		location.href = "login.php"; </script>';
		    }
	    	function message($msg) 
		    {
		        echo '<script type="text/javascript">confirm("' . $msg . '"); </script>';
		    }
		   

	    	if ( isset($submit) ) { 

	    		// Check of leeg
	    		if(!empty($voornaam) && !empty($achternaam) && !empty($wachtwoord) && !empty($bevestiging_wachtwoord)){
	    			//Check of ww langer is dan 6 minimaal 7
	    			if($wachtwoord != $bevestiging_wachtwoord){
	    				message("Wachtwoorden komen niet overeen");
	    			}if(strlen($wachtwoord) <= 6 ){
	    				message("Uw wachtwoord moet minimaal 7 caracters bevatten");
	    			}else{
	    				//Registratie
	    				$stmt = $dbh->prepare("INSERT INTO `logins`(voornaam, achternaam, wachtwoord, bevestiging_wachtwoord) VALUES(:voornaam, :achternaam, :wachtwoord, :bevestiging_wachtwoord)");
		    			$stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_INT);
		    			$stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_INT);
		    			$stmt->bindParam(':wachtwoord', $wachtwoord, PDO::PARAM_INT);
		    			$stmt->bindParam(':bevestiging_wachtwoord', $bevestiging_wachtwoord, PDO::PARAM_INT);
		    			$stmt ->execute();
		    		  	do_alert_created("Je bent correct geregistreerd, je kan nu inloggen!");
	    			}
				}else{
					message("Vul alle velden in!");
				}
			}
		

		?>
			

			<div class="login-page">
			  <div class="form">
			    <form class="login-form" method="post">
			      <input class="form-control" type="text" name="voornaam" value="" placeholder="Voornaam">
			      <input class="form-control" type="text" name="achternaam" value="" placeholder="Achternaam">
			      <input class="form-control" type="password" name="wachtwoord" value="" placeholder="Wachtwoord">
			      <input class="form-control" type="password" name="bevestiging_wachtwoord" value="" placeholder="Bevestigings wachtwoord">
			      <input class="submit" name="submit" type="submit" value="Submit">
			      <p class="message">Al een bestaand account? <a href="login.php">Log hier in</a></p>
			    </form>
			  </div>
			</div>

				
			</div>
	</body>
</html>
