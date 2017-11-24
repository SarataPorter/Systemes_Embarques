<?php
session_start();
?>

<!DOCTYPE html>
<html ng-app="" lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Syst Embarqués</title>

  <link rel="shortcut icon" href="..\img\logo.ico">

  <!-- Fichiers css -->
  <link rel="stylesheet" href="..\vendor\bootstrap\css\bootstrap.css"/>
  <link rel="stylesheet" href="..\css\mapage.css">
  <link rel="stylesheet" href="..\css\login.css">
  <link rel="stylesheet" href="..\font-awesome-4.7.0\css\font-awesome.min.css">  
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Fichiers js -->
  <script type="text/javascript" src="..\vendor\angular\angular.js"></script>
  <script type="text/javascript" src="..\vendor\angular\angular-route.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>

  <!-- Fait descendre le header lors du scroll de la page -->
  <script>
    (function($){
      $(document).ready(function(){
        var offset = $(".header").offset().top;
        $(document).scroll(function(){
          var scrollTop = $(document).scrollTop();
          if(scrollTop > offset){
            $(".header").css("position", "fixed");
          }
          else {
            $(".header").css("position", "static");
          }
        });
      });
    })(jQuery);


  </script>


  <!-- Fin header mobile lors du scroll de la page -->

</head>

<script>
  $(document).ready(
    function(){
      $("#login").click(function () {
        $("#Login").css({'display':'block'});
      });
    });
    </script>
    <script>
  $(document).ready(
    function(){
      $("#signin").click(function () {
        $("#Signin").css({'display':'block'});
      });
    });

  </script>


  <!-- Header -->

    <div class="header">
    <ul>
      <li class="sizeLogo"><img src='../img/logo1.png'  alt='logo' id='logo'/></li>
      <li><a href="../index.php">Accueil</a></li>
      <li><a href="mapage.php">Ma page</a></li>
    </ul>
  </div>
 <!-- Fin header -->


<body>

<!--
  <div class="row">
    <div class="menu">
      <a href="../index.html">Patient</a></br></br></br>
      <a href="../index.html">Paramètres</a>
    </div>
-->

  <div class="menu">
    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card-2" style="margin-top:63px;">
      <a href="#" class="w3-bar-item w3-button w3-color w3-green">Menu :</a> 
      <a href="#" class="w3-bar-item w3-button">Patient</a> 
      <a href="#" class="w3-bar-item w3-button">Médecin</a> 
      <a href="#" class="w3-bar-item w3-button">Paramètres</a> 
    </div>
  </div> 


    <div class="contenu">
      <h1> Tableau de Bord : </h1>

<div class="w3-row">
  <div class="w3-col s4 w3-left" style="width: 33%"><p>Tension moyenne par jour :</p>
    <div class="tab1">
        <div id="visualization"></div>
        <script type="text/javascript">
          var container = document.getElementById('visualization');
        var items = [
          {x: '2014-06-11', y: 10},
          {x: '2014-06-12', y: 25},
          {x: '2014-06-13', y: 30},
          {x: '2014-06-14', y: 10},
          {x: '2014-06-15', y: 15},
          {x: '2014-06-16', y: 30}
        ];

        var dataset = new vis.DataSet(items);
        var options = {
          start: '2014-06-10',
          end: '2014-06-18',
          height: '200px'
        };
        var graph2d = new vis.Graph2d(container, dataset, options);
        </script>
    </div> 
  </div>

<div class="w3-col s4  w3-left" style="width: 33%"><p>Fréquence cardiaque moyenne par jour :</p>

    <div class="tab1">
        <div id="visualization1"></div>
        <script type="text/javascript">
          var container = document.getElementById('visualization1');
        var items = [
          {x: '2014-06-11', y: 10},
          {x: '2014-06-12', y: 25},
          {x: '2014-06-13', y: 27},
          {x: '2014-06-14', y: 10},
          {x: '2014-06-15', y: 15},
          {x: '2014-06-16', y: 30}
        ];

        var dataset = new vis.DataSet(items);
        var options = {
          start: '2014-06-10',
          end: '2014-06-18',
          height: '200px'
        };
        var graph2d1 = new vis.Graph2d(container, dataset, options);
        </script>
    </div> 

</div>
<div class="w3-col s4 w3-left" style="width: 33%"><p>Température moyenne par jour :</p>

    <div class="tab1">
        <div id="visualization2"></div>
        <script src="../js/tab1.js"></script>
    </div> 
</div>

</div>
<div  class="w3-col s4 " style="width: 100%; margin-top: 50px">

  Tableau des données Capteurs du patient : <br><br>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="thead-inverse">
        <tr>
          <th>idData: </th>
          <th>Date :</th>
          <th>Heure :</th>
          <th>Air :</th>
          <th>Température :</th>
          <th>Posture :</th>
          <th>BPM :</th>
          <th>Oxygene :</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
            require "../php/requetetab3.php"
        ?>
      </tbody>
    </table> 
  </div>
</div>
           


  </div>

  </body>

</html>
