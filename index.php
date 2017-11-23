<!DOCTYPE html>
<html ng-app="" lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Syst Embarqués</title>

  <link rel="shortcut icon" href="img/logo.ico">

  <!-- Fichiers css -->
  <link rel="stylesheet" href="vendor\bootstrap\css\bootstrap.css"/>
  <link rel="stylesheet" href="css\style.css">
  <link rel="stylesheet" href="css\head.css" >
  <link rel="stylesheet" href="css\login.css">
  <link rel="stylesheet" href="fonts\font-awesome-4.7.0\css\font-awesome.min.css">  
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


  <!-- Fichiers js -->
  <script type="text/javascript" src="vendor\angular\angular.js"></script>
  <script type="text/javascript" src="vendor\angular\angular-route.js"></script>
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

  </script>


  <!-- Fin header mobile lors du scroll de la page -->
</head>
  <!--   Gestion des Bouton Connexion/Inscription   -->


  <script>
    $(document).ready(
      function(){
        $("#login").click(function () {
          $("#Signin").css({'display':'none'});
          $("#Login").css({'display':'block'});
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
         var hash = '#mastfoot';
         $('html, body').animate({
          scrollTop: $('#mastfoot').offset().top
        }, 1200, function(){
          window.location.hash = '#mastfoot';
        });
       });
      });
    </script>

    <?php 
    session_start();
    if (isset($_SESSION['idUser']) && isset($_SESSION['user_lastname']) && isset($_SESSION['user_firstname'])){
           echo"<div class='header'>
     <ul>
     <li class='sizeLogo'><img src='img/logo1.png'  alt='logo' id='logo'/></li>
     <li><a href='index.php'>Accueil</a></li>
     <li><a href='partials/mapage.php'>Ma page</a></li>
     <li style='float:right'><button id='login' style='margin-top: -5px'>Déconnexion</button></li>
     </ul>
     </div>
     </head>"   
   ;}
   else {
     echo"<div class='header'>
     <ul>
     <li class='sizeLogo'><img src='img/logo1.png'  alt='logo' id='logo'/></li>
     <li><a href='index.php'>Accueil</a></li>
     <li style='float:right'><button id='login' style='margin-top: -5px'>Connexion</button></li>
     <li style='float:right'><button id='signin' style='margin-top: -5px'>Inscription</button></li>
     </ul>
     </div>
     </head>" 
   ;}
     ?>



  <!-- Appel du header

  <div ng-include src="'partials/head.html'"></div>

  Fin header -->

  <body>

    <!-- Contenu de la page d'accueil -->

    <!-- Sliders d'images = carousel -->

    <div id="my_carousel" class="carousel slide" data-ride="carousel">
      <!-- Bulles -->
      <ol class="carousel-indicators">
        <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my_carousel" data-slide-to="1"></li>
      </ol>
      <!-- Slides -->
      <div class="carousel-inner">
        <!-- Page 1 -->
        <div class="item active">  
          <div class="carousel-page">
            <img src="img/sante1.jpg" id="muscu" class="img-responsive"  style="margin:0px auto;" />
          </div> 
          <div id="msg" class="carousel-caption">
            <h1> Suivi médical </h1>
            Ce site a pour but le suivi en ligne de patients équipés de capteurs. <br> Il est accessible 7j/7, 24h/24 aussi bien par les patients que par leur medecin !
          </div>
        </div>   
        <!-- Page 2 -->
        <div class="item"> 
          <div class="carousel-page">
            <img src="img/esante.jpg" id="workout" class="img-responsive img-rounded" style="margin:0px auto;"  />
          </div> 
          <div class="carousel-caption">Pour consulter Facilement ses données / les données d'un patient !</div>
        </div>      
      </div>
      <!-- Contrôles -->
      <a class="left carousel-control" href="#my_carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#my_carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>  

    <!-- Fin Carousel -->

    <div id="Login" class="form" style="display:none;">

      <form action="php/Login.php" method="POST" style="border: none !important;" >
      </br> Se connecter :  </br>  
      <table>

        <tr>                        
          <td><label for="login">Identifiant :  </label></td>
          <td><input type="text" name="login" id="login"/></td>                        
        </tr>

        <tr>                  
          <td><label for="pass">Mot de passe :  </label></td>
          <td><input type="password" name="pass" id="pass"/></td>                        
        </tr>

      </table>

      <input id="submit" type="submit" name="submit" value="Connexion" style="color: black"/><br/><br/>

    </form>

  </div>

  <div id="Signin" class="form" style="display:none;">

    <form action="php/SignIn.php" method="POST" style="border: none !important;" >
    </br> Inscription :  </br>  
    <table>

      <tr>                        
        <td><label for="lastname"><strong>Nom :  </strong></label></td>
        <td><input type="text" name="lastname" id="lastname"/></td>     
      </tr>
      <tr>                        
        <td><label for="firstname"><strong>Prénom :  </strong></label></td>
        <td><input type="text" name="firstname" id="firstname"/></td>     
      </tr>
      <tr>                        
        <td><label for="login"><strong>Identifiant :  </strong></label></td>
        <td><input type="text" name="login" id="login"/></td>     
      </tr>
      <tr>
        <td><label for="pass"><strong>Mot de passe :  </strong></label></td>
        <td><input type="password" name="pass" id="pass"/></td>
      </tr>
      <tr>
        <td><label for="pass2"><strong>Confirmez le mot de passe :</strong></label></td>
        <td><input type="password" name="pass2" id="pass2"/></td>                        
      </tr>
    </table>

    <input id="submit" type="submit" name="submit" value="Inscription" style="color: black"/><br/><br/>

  </form>

</div>


<!-- Appel du footer -->

<div id ="mastfoot" class="mastfoot">          
  <p> </br> Créé et developpé par ©EPF - E-Santé - Promotion 2018 </br> </p>    
</div>

<!-- Fin footer -->


</body>

</html>
