<?php

	require "../php/dbConnect.php";
	date_default_timezone_set('GMT');

	//$idUser=$_POST['idUser'];
	$idUser='4';

	$request3 = "SELECT idData, date1, time1, air, temperature, posture, bpm, oxygen_saturation FROM medical_data WHERE idUser=idUser AND date1!='0000-00-00' ORDER BY time1 DESC";  
	$stmt3 = $conn->prepare($request3) ;
	$stmt3->execute();
	$stmt3->bind_result($idData,$date1, $time1, $air, $temperature, $posture, $bpm, $oxygen_saturation);  
	$items = array();		
	while ($stmt3->fetch()) {
		$items3[] = array(
	      "x" => $date1." ".$time1, 
	      "y"=> $temperature,	      
		 );
	}
	$result = array(
		"items3" => $items3
	);
	echo json_encode($result);

?>