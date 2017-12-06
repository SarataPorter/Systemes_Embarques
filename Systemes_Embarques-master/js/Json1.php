<?php

	require "../php/dbConnect.php";
	date_default_timezone_set('GMT');

	//$idUser=$_POST['idUser'];
	$idUser='4';

	$request4 = "SELECT idData, date1, time1, air, temperature, systolic_pressure, posture, bpm, oxygen_saturation FROM medical_data WHERE idUser='$idUser' AND date1!='0000-00-00' ORDER BY time1 DESC";  
	$stmt4 = $conn->prepare($request4) ;
	$stmt4->execute();
	$stmt4->bind_result($idData,$date1, $time1, $air, $temperature, $systolic_pressure, $posture, $bpm, $oxygen_saturation);  
	$items = array();		
	while ($stmt4->fetch()) {
		$items[] = array(
	      "x" => $date1." ".$time1, 
	      "y"=> $systolic_pressure,	      
		 );
	}
	$result = array(
		"items" => $items
	);
	echo json_encode($result);


?>