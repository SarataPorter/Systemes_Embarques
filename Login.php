<?php

$success = mysqli_connect("localhost","root","","Database");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<?php

$error = FALSE;
$connectionOK = FALSE;

if(isset($_POST["connection"])){
  echo "1";


  if($_POST["login"] == NULL OR $_POST["pass"] == NULL){
    echo "2";


    $error = TRUE;

    $errorMSG = "Tout les champs doivent être remplis !";
  }

  if($_POST["login"] != $_POST["pass"]){
    echo "3";


    $sql = mysqli_query($success, "SELECT login FROM users WHERE login = '".$_POST["login"]."' ");
    $row = mysqli_num_rows($sql);

    if($sql == FALSE){
      echo "4";

      $sql = mysqli_query($success, "SELECT pass FROM users WHERE pass = '".$_POST["pass"]."' ");
      $row = mysqli_num_rows($sql);
      if($sql == FALSE){
        echo "5";


        $connectionOK = TRUE;
        $connectionMSG = "Connexion réussie !";
              }
      else{
        echo "6";


        $error = TRUE;

        $errorMSG = "Erreur dans la requête SQL";

      }
    }}

    else{
      echo "7";


      $error = TRUE;
      $errorMSG = "Couple Identifiant/Mot de passe invalide";

    }
  }

  ?>

  <?php

  $BDD=null;

  ?>

  <?php
  if($error == TRUE){ echo "<p align='center' style='color:red;'>".$errorMSG."</p>"; }
    ?>
    <?php
    if($connectionOK == TRUE){ echo "<p align='center' style='color:green;'><strong>".$connectionMSG."</strong></p>"; }?>

