<html>

	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="..\vendor\angular\angular.js"></script>
		<script type="text/javascript" src="..\vendor\angular\angular-route.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>

<link href="../css/head.css" rel="stylesheet">

	<script>
		$(document).ready(
    function(){
        $("#connex").click(function () {
            $("#coucou").css({'display':'block'});
        });

    });
		
	</script>

<div class="header">
<ul>
  <li class="sizeLogo"><img src='/img/logo1.png' 	alt='logo' id='logo'/></li>
  <li><a href="../test.php">Accueil</a></li>
  <li><a href="../test.php">Ma page</a></li>
  <li style="float:right"><button id="connex" style="margin-top:-5px;">Connexion</button></li>
</ul>
</div>

</html>