	
<?php 
	require "dbConnect.php";

	$request4 = "SELECT * FROM doctor";  
	$stmt4 = $conn->prepare($request4) ;
	$stmt4->execute();
	$stmt4->bind_result($id_doctor, $surname, $name, $password ,$account_name);  
	$items = array();	

	//echo "<select id='menu' name='id'>";
	while ($stmt4->fetch()) {
        echo '<option value="'.$id_doctor.'">'.$surname.' '.$name.'</option>';
	};
	//echo "</select>";
?>
