<?php 
    session_start(); 
    
    $login = '
      <li class="nav-item">
        <a class="btn btn-primary ml-lg-3" href="http://localhost/clinicaaf/html/login.php">Login / Registro</a>
      </li>';

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Antero & Filhos - Clínica Médica</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  <link rel="stylesheet" href="../assets/css/login.css">

  <link rel="stylesheet" href="../assets/css/bootstap.min.css">

  <script src="../assets/js/jquery-3.6.3.min.js"></script>
  <script src="../assets/js/jquery.mask.min.js"></script>

  <script>
    $(document).ready(
      function () {
          $("#telefone").mask("999 999 999");
      }
    );
  </script>

  <style>
    li {
      font-size: 15px !important;
    }

    .pesquisa {
      font-size: 15px;
    }
  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +244 928-644-655</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> clinicaanterofilhos@gamail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

  