	
<?php 
	require "dbConnect.php";

	$id_doctor='1';

	$request4 = "SELECT user_lastname, user_firstname, idUser FROM users WHERE id_doctor='$id_doctor' ORDER BY user_lastname DESC";  
	$stmt4 = $conn->prepare($request4) ;
	$stmt4->execute();
	$stmt4->bind_result($user_lastname, $user_firstname, $idUser);  
	$items = array();	

	//echo "<select id='menu' name='id'>";
	while ($stmt4->fetch()) {
        echo '<option value="'.$idUser.'">'.$user_lastname.'</option>';
	};
	//echo "</select>";
	?>
