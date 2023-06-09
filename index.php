<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>MalaScienza</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading">
                    
    <?php
      if (isset($_POST['mood']) && isset($_POST['style']) && isset($_POST['instrument'])) {        
        $generator = new SongGenerator();
        $lyrics = $generator->generateSong($_POST['mood'], $_POST['style'], $_POST['instrument']);
        echo "<h2 style='font-size:16px; margin:10px;'>Testo Canzone Elaborata Da A.I.</h2>";
        echo "<p style='color:white; margin:10px;'>$lyrics</p>";
      }
    ?>


                </div>
                <div class="card-body">
                    <h2 class="title" style="font-size: 16px;">MalaScienza </h2>
                    <img style="width:100px; margin-bottom:10px;" src="images/malascienza.jpeg">
                    <h2 class="title" style="font-size: 16px;">Generatore di canzoni</h2>
                        <form  method="POST">
      <label for="mood">Mood:</label>

 <div class="input-group">
<div class="rs-select2 js-select-simple select--no-search">
      <select name="mood" id="mood">
        <option value="happy">Happy</option>
        <option value="sad">Triste</option>
        <option value="love">Romantica</option>
      </select>
  <div class="select-dropdown"></div>
  </div>
</div>
      <label for="style">Style:</label>
 <div class="input-group">
<div class="rs-select2 js-select-simple select--no-search">
      <select name="style" id="style">
        <option value="rock">Rock</option>
        <option value="pop">Pop</option>
        <option value="rap">Rap</option>
      </select>
  <div class="select-dropdown"></div>
  </div>
</div>
      <label for="instrument">Instrument:</label>
 <div class="input-group">
<div class="rs-select2 js-select-simple select--no-search">
      <select name="instrument" id="instrument">
        <option value="guitar">Chitarra</option>
        <option value="piano">Piano</option>
        <option value="drums">Drums</option>
      </select>
  <div class="select-dropdown"></div>
  </div>
</div>
      <input type="submit" value="Genera Testo">
    </form>

                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->