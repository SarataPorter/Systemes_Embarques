<!DOCTYPE html>
<html ng-app="" lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Inscription</title>

  <link rel="shortcut icon" href="../img/logo.ico">

  <!-- Fichiers css -->
  <link rel="stylesheet" href="../vendor\bootstrap\css\bootstrap.css"/>
  <!--<link rel="stylesheet" href="../css\back.css"> -->
  <link rel="stylesheet" href="../css\style.css">
  <link rel="stylesheet" href="../css\head.css" >
  <link rel="stylesheet" href="../css\login.css">
  <link rel="stylesheet" href="../fonts\font-awesome-4.7.0\css\font-awesome.min.css">  
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


  <!-- Fichiers js -->
  <script type="text/javascript" src="../vendor\angular\angular.js"></script>
  <script type="text/javascript" src="../vendor\angular\angular-route.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

    function adpaterALaTailleDeLaFenetre(){
      var largeur = document.documentElement.clientWidth,
      hauteur = document.documentElement.clientHeight;

      var source = document.getElementById('monDiv'); // récupère l'id source
      source.style.height = hauteur+'px'; // applique la hauteur de la page
      source.style.width = largeur+'px'; // la largeur
    }

    // Une fonction de compatibilité pour gérer les évènements
    function addEvent(element, type, listener){
      if(element.addEventListener){
        element.addEventListener(type, listener, false);
      }else if(element.attachEvent){
        element.attachEvent("on"+type, listener);
      }
    }

    // On exécute la fonction une première fois au chargement de la page
    addEvent(window, "load", adpaterALaTailleDeLaFenetre);
    // Puis à chaque fois que la fenêtre est redimensionnée
    addEvent(window, "resize", adpaterALaTailleDeLaFenetre);

  </script>

  <script>
    $(document).ready(
      function(){
        $("#login").click(function () {
          $("#Signin").css({'display':'none'});
          $("#Login").css({'display':'block'});
          $("#Login_doc").css({'display':'none'});


          var hash = '#mastfoot';
          $('html, body').animate({
            scrollTop: $('#mastfoot').offset().top
          }, 1200, function(){
            window.location.hash = '#mastfoot';
          });
        });
      });

    $(document).ready(
      function(){
         $("#signin").click(function () {
         $("#Login").css({'display':'none'});
         $("#Signin").css({'display':'block'});
         $("#Login_doc").css({'display':'none'});

         var hash = '#mastfoot';
         $('html, body').animate({
          scrollTop: $('#mastfoot').offset().top
        }, 1200, function(){
          window.location.hash = '#mastfoot';
        });
       });
      });

      $(document).ready(
      function(){
        $("#login_doc").click(function () {
          $("#Signin").css({'display':'none'});
          $("#Login").css({'display':'none'});
          $("#Login_doc").css({'display':'block'});
          var hash = '#mastfoot';
          $('html, body').animate({
            scrollTop: $('#mastfoot').offset().top
          }, 1200, function(){
            window.location.hash = '#mastfoot';
          });
        });
      });

  </script>

  
  <div class='header'>
     <ul>
     <li class='sizeLogo'><img src='../img/logo1.png'  alt='logo' id='logo'/></li>
     <li><a href='../index.php'>Accueil</a></li>
     <!--
     <li style='float:right'><button id='login' style='margin-top: -5px'>Connexion Patient</button></li>
     <li style='float:right'><button id='login_doc' style='margin-top: -5px'>Connexion Docteur</button></li>
     <li style='float:right'><button id='signin' style='margin-top: -5px'>Inscription</button></li>
      -->
     </ul>
  </div>

</head>

<body>

  <?php
      require "../php/dbConnect.php"
  ?>


<?php

if(isset($_POST["submit"])){

  if($_POST["login"] == NULL OR $_POST["pass"] == NULL OR $_POST["pass2"] == NULL){

    $error = TRUE;    
    $errorMSG = "Tous les champs doivent être remplis !";
    
  }
  
  elseif($_POST["pass"] == $_POST["pass2"]){

    if($_POST["login"] != $_POST["pass"]){

      $newUsername = mysqli_real_escape_string($conn, $_POST['login']); 
      $newPassword = mysqli_real_escape_string($conn, $_POST['pass']); 
      $newPassword2 = mysqli_real_escape_string($conn, $_POST['pass2']); 

      $result = $conn->query("SELECT * FROM users WHERE account_name ='$newUsername' AND password='$newPassword'");
      
      if(mysqli_num_rows($result)){

       $error = TRUE;
       $errorMSG = "Le nom de compte <strong>".$_POST["login"]."</strong> est déjà utilisé !";
       $login = NULL;

      }

      else{
      $pass = $_POST["pass"];

        if(strlen($_POST["pass"] < 60)){

            if(strlen($_POST["login"] < 60)){

              if($_POST["login"] != $_POST["pass"]){

                $firstname1=$_POST["firstname"];
                $lastname1=$_POST["lastname"];
                $pass1=$_POST["pass"];
                $login1=$_POST["login"];
                $medecin=$_POST["medecin"];

                $username = "root";
                $password = "";
                $hostname = "localhost";
                $mainDB = "test"; 

                // Connection to mysql Server
                $conn = mysqli_connect($hostname, $username, $password, $mainDB)
                or die("Unable to connect to MySQL");

                // Check connection
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = mysqli_query($conn, "INSERT INTO users (account_name,user_lastname,user_firstname,password,id_doctor) VALUES ('$login1','$lastname1','$firstname1','$pass1','$medecin')");

                if($sql){

                  $registerOK = TRUE;
                  $error=FALSE;
                  $registerMSG = "Inscription réussie ! Vous êtes maintenant membre du site.";
                  
                  $_SESSION["account_name"] = $_POST["login"];
                  $_SESSION["password"] = $_POST["pass"];
                  $_SESSION["user_lastname"] = $_POST["lastname"];
                  $_SESSION["user_firstname"] = $_POST["firstname"];    
                }

                else{

                  $error = TRUE;              
                  $errorMSG = "Erreur dans la requête SQL<br/>".$sql."<br/>";                
                }          
              }

              else{

               $error = TRUE;
               $errorMSG = "Votre nom compte ne doit pas dépasser <strong>60 caractères</strong> !";         
               $login = NULL;         
               $pass = $_POST["pass"];
               
              }       
            }     
        }

        else{

           $error = TRUE;     
           $errorMSG = "Votre mot de passe ne doit pas dépasser <strong>60 caractères</strong> !";     
           $login = $_POST["login"];     
           $pass = NULL;
           
        }

      }

    }

    else{

      $error = TRUE;  
      $errorMSG = "Le nom de compte et le mot de passe doivent êtres différents !";
      
    }

  }

  elseif($_POST["pass"] != $_POST["pass2"]){

   $error = TRUE;
   
   $errorMSG = "Les deux mots de passes sont différents !";
   
   $login = $_POST["login"];
   
   $pass = NULL;
   
  }

  elseif($_POST["login"] == $_POST["pass"]){

   $error = TRUE;
   
   $errorMSG = "Le nom de compte et le mot de passe doivent être différents !";
   
  }





}


$BDD=null;

if($error == TRUE){ 
  echo"<div id='monDiv' style='background-color:#719AAC; width:200px; height:300px;'>
  <p style='color:white; font-size:46px; text-shadow: 0px 0px 9px #777;'><br><br>Oops...</p>
  <p style='color:white; font-size:36px; text-shadow: 0px 0px 9px #777;'>".$errorMSG."</p>
  <div class='row text-center'>
  <div class='col-sm-3 hidden-xs'></div>
  <div class='col-sm-2 hidden-xs'></div>
  <div class='col-sm-2 hidden-xs'><button style='margin-top:80px; font-size:26px;' id='back' onclick='history.go(-1)'>Retour</button></div>
  <div class='col-sm-2 hidden-xs'></div>
  <div class='col-sm-3 hidden-xs'></div>
  </div>
  </div>";
 }

else{

  echo"<div id='monDiv' style='background-color:#719AAC; width:200px; height:300px;'>
  <p style='color:white; font-size:46px; text-shadow: 0px 0px 9px #777;'><br><br>".$registerMSG."</p>
  <div class='row text-center'>
  <div class='col-sm-3 hidden-xs'></div>
  <div class='col-sm-2 hidden-xs'></div>
  <div class='col-sm-2 hidden-xs'><button style='margin-top:80px; font-size:26px;' id='back' onclick='history.go(-1)'> Accueil </button></div>
  <div class='col-sm-2 hidden-xs'></div>
  <div class='col-sm-3 hidden-xs'></div>
  </div>
  </div>";
}

?>

