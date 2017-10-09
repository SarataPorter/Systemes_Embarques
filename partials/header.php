<!-- DÃ©but header -->
<html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="..\vendor\angular\angular.js"></script>
<script type="text/javascript" src="..\vendor\angular\angular-route.js"></script>

<header class="header-fixed">

	<div class="header-limiter">

		<nav>
		<img src='/img/logo1.png' 	alt='logo' id='logo'/>

		<h1><a href="/../index.php">Suivi <span> Med </span></a></h1>

		<a href='#' class="" onclick="document.getElementById('id01').style.display='block'" id="connexion"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Connexion</a><script>console.log("Connexion Failed")</script>
		</nav>
		
	</div>

	<!-- Fait descendre le header lors du scroll de la page -->
	<script>

		$(document).ready(function(){

			var showHeaderAt = 150;

			var win = $(window),
				body = $('body');

			// Affichage du header seulement sur des appareils Ã  resolution supÃ©rieur Ã  600px

			if(win.width() > 600){

				// Quand on scroll Ã  plus de 150px en bas, on attribue la classe "fixed" Ã  l'Ã©lÃ©ment body

				win.on('scroll', function(e){

					if(win.scrollTop() > showHeaderAt) {
						body.addClass('fixed');
					}
					else {
						body.removeClass('fixed');
					}
				});

			}

		});

	
		

	</script>

	<!-- Fin header mobile lors du scroll de la page -->

</header>

<!-- Fin header -->

<div class="header-fixed-placeholder"></div>


</html>