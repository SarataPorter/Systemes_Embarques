<?php

	session_start();
	require "../php/dbConnect.php";
	date_default_timezone_set('GMT');

	$idUser=$_SESSION['idUser'];
	//$idUser='4';

	$request2 = "SELECT idData, date1, time1, air, temperature, posture, bpm, oxygen_saturation FROM medical_data WHERE idUser='$idUser' AND date1!='0000-00-00' ORDER BY time1 DESC";  
	$stmt2 = $conn->prepare($request2) ;
	$stmt2->execute();
	$stmt2->bind_result($idData,$date1, $time1, $air, $temperature, $posture, $bpm, $oxygen_saturation);  
	$items = array();		
	while ($stmt2->fetch()) {
		$items[] = array(
	      "x" => $date1." ".$time1, 
	      "y"=> $bpm,	      
		 );
	}
	$result = array(
		"items" => $items
	);
	echo json_encode($result);


?>