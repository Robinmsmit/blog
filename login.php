
<?php
  session_start();
  require_once 'connection.php';
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


         function notInDatabase($msg) 
        {
            echo '<script type="text/javascript">confirm("' . $msg . '"); 
                location.href = "registration.php"; </script>';
        }
         function GoOnMeassage($msg) 
        {
            echo '<script type="text/javascript">confirm("' . $msg . '"); 
                location.href = "index.php"; </script>';
        }
        function message($msg) 
        {
            echo '<script type="text/javascript">confirm("' . $msg . '"); </script>';
        }


        if(isset($submit)){
          if(!empty($voornaam) && !empty($achternaam) && !empty($wachtwoord)){
            
            $stmt = $dbh->prepare("SELECT * FROM `logins` WHERE voornaam = :voornaam AND achternaam = :achternaam AND wachtwoord = :wachtwoord"); 
            $stmt->execute([
            ':voornaam' => $voornaam,
            ':achternaam' => $achternaam,
            ':wachtwoord' => $wachtwoord
          ]);
          $result = $stmt->fetchObject();

          $user_id = $result->id;
          
          if($result == false) {
            // Bestaat niet
            notInDatabase("Dit account is niet bekend bij ons.");

          }
          else {

            // Bestaat wel

            $stmt = $dbh->prepare("UPDATE `logins` SET start_time = :start_time WHERE id = :id"); 
            $stmt->execute([
              ':start_time' => time(),
              ':id' => $user_id
            ]);
            

            if($stmt) {

              // Zet de user in de sessie
              $_SESSION['logged_in'] = true;
              $_SESSION['user_id'] = $user_id;

              // Updaten gelukt
              GoOnMeassage("Klik hier dan kunt u verder");

            }
            else {

              // Error
              message("Onbekende fout");

            }
          }

          }else{
            message("Vul alle velden in !");
          }
        }





// $timestamp=1333699439;
// echo gmdate("Y-m-d\TH:i:s\Z", $timestamp);



  ?>

<div class="background">
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="post">
        <input class="form-control" type="text" name="voornaam" value="" placeholder="Voornaam">
        <input class="form-control" type="text" name="achternaam" value="" placeholder="Achternaam">
        <input class="form-control" type="password" name="wachtwoord" value="" placeholder="Wachtwoord">
        <input class="submit" name="submit" type="submit" value="Submit">
        <p class="message">Nog geen account ? <a href="registration.php">Maak een account</a></p>
      </form>
    </div>
  </div>
</div>
</body>

</html>