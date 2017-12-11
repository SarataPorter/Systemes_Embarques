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
       <?php
       $User2=$_SESSION["User"];
        echo"<div class='header'>
       <div>
         <ul>
           <li class='sizeLogo'><img src='../img/logo1.png'  alt='logo' id='logo'/></li>
           <li><a href='../index.php'>Accueil</a></li>
           <li><a href='mapage_doc.php'>Ma Page</a></li>
           <li style='float:right'><input type=\"button\" id=\"logout\" style='margin-top: -5px' value=\"Déconnexion\" OnClick=\"window.location.href='../php/deconnexion.php'\"/>
            <li style='float:right'><a> Bonjour ".$User2."</a></li>
           </li>
         </ul>
       </div>
       </div>"; 
       ?>
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

    
    <form method='post' action="../php/requetetab3_doc.php" style="margin:0px">
      Selectionnez un client : 
      <select id='menu' name='id'>
      <?php 
        require "../php/requetetab4.php"
      ?>
      </select>

      <div class="btn-group">
        <button id="submit" type="button" class="">Go</button>
      </div>
    </form>

    <div class="w3-row">

      <div class="w3-col s4 w3-left" style="width: 33%"><p> <br/> Tension moyenne par jour :</p>
        <div class="tab1">
            <div id="visualization1"></div>
            <script src="../js/tab1_doc.js"></script>
        </div> 
      </div>

      <div class="w3-col s4  w3-left" style="width: 33%"><p> <br/>Fréquence cardiaque détaillée par jour :</p>
        <div class="tab1">
          <div id="visualization2"></div>
          <script src="../js/tab2_doc.js"></script>
        </div> 
      </div>

      <div class="w3-col s4 w3-left" style="width: 33%"><p> <br/>Température détaillé par jour :</p>
        <div class="tab1">
          <div id="visualization3"></div>
          <script src="../js/tab3_doc.js"></script>
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
            <script src="../js/tab0_doc.js"></script>
          </tbody>
        </table> 
      </div>
    </div>
           


  </div>

  </body>

</html>
