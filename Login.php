<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Database";
$error = FALSE;
$connectionOK = FALSE;

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST["submit"])){

  if ($conn->connect_error) {
    $error = TRUE;
    $errorMSG = "Connection failed: ". $conn->connect_error;
    die();
  }


  $newUsername = mysqli_real_escape_string($conn, $_POST['login']); 
  $newPassword = mysqli_real_escape_string($conn, $_POST['pass']);   

  $result = $conn->query("SELECT * FROM users WHERE login ='$newUsername' AND pass='$newPassword'");


  if (mysqli_num_rows($result)) {
    $connectionOK = TRUE;
    $connectionMSG = "Connexion réussie !";    
  } 
  else
  {  
    $error = TRUE; 
    $errorMSG = "Erreur lors de la saisie des informations"; 
    if($_POST["login"] == NULL OR $_POST["pass"] == NULL){
      $error = TRUE;
      $errorMSG = "Tout les champs doivent être remplis !";
    }   
  }
  $conn->close();
}
?>

<?php
if($error == TRUE)
  { echo "<p align='center' style='color:red;'>".$errorMSG."</p>"; }
?>

<?php
if($connectionOK == TRUE)
  { echo "<p align='center' style='color:green;'><strong>".$connectionMSG."</strong></p>"; }
?>


