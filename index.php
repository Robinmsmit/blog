<!DOCTYPE html>
<html>

<?php

$countdown = date("h:i:s");

?>


<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="https://use.fontawesome.com/956de693bd.js"></script>
</head>
<body>

<div class="col-md-3 left_col">
  <div id="mySidenav" class="sidenav">

      <div class="profile clearfix">
        <div class="profile_pic">
            <img src="http://placehold.it/350x150" alt="Smiley face" align="middle"> 
        </div>
        <div class="profile_info">
            <span>Hallo, </span>
            <h2> Robin Smit</h2>
        </div>
      </div>
        <!-- Hier komt welkomsbericht !! -->
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

</div>

<div class="right_col" role="main" style="min-height: 1704px;">
  <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 title_stats">
          <span class="count_title">
            <i class="fa fa-check" aria-hidden="true"></i> Aantal logins
          </span>
          <div class="count"> 10000 </div>
          <span class="bottom_title">Bottom Title</span>
    </div>
   <div class="col-md-2 col-sm-4 col-xs-6 title_stats">
          <span class="count_title">
            <i class="fa fa-clock-o" aria-hidden="true"></i> Ingelogde tijd
          </span>
          <div class="count"> 10000 </div>
          <span class="bottom_title">Bottom Title</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 title_stats">
          <span class="count_title">
            <i class="fa fa-hourglass-half" aria-hidden="true"></i> Actuele tijd
          </span>
          <div class="count"> <div id='time'></div><script>

           </script> </div>
          <span class="bottom_title">Bottom Title</span>
    </div>
     <div class="col-md-2 col-sm-4 col-xs-6 title_stats">
          <span class="count_title">
            <i class="fa fa-calendar-o" aria-hidden="true"></i> Datum
          </span>
          <div class="count"> <?php echo date("Y-m-d");?> </div>
          <span class="bottom_title">Bottom Title</span>
    </div>
  </div>
</div>
<script>
setInterval(function(){var date = new Date();
var time = date.toLocaleTimeString();

document.getElementById('time').innerHTML =  time;}, 500);
</script>
     
</body>
</html> 
