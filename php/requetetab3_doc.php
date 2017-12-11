	
<?php 
	session_start();

	require "dbConnect.php";

	//$idUser=$_SESSION["idUser"];
	$idUser=$_REQUEST['idUser'];

	//$idUser='4';
	echo $idUser;

	$request2 = "SELECT idData, date1, time1, air, temperature, posture, bpm, oxygen_saturation FROM medical_data WHERE idUser='$idUser' AND date1!='0000-00-00' ORDER BY time1 DESC";  
	$stmt2 = $conn->prepare($request2) ;
	$stmt2->execute();
	$stmt2->bind_result($idData,$date1, $time1, $air, $temperature, $posture, $bpm, $oxygen_saturation);  
	$items = array();		
	while ($stmt2->fetch()) {
		echo "<tr>
              <td> $idData </br>  </td>
              <td> $date1 </td>
              <td> $time1 </td>
              <td> $air </td>
              <td> $temperature</td>
              <td> $posture</td>
              <td> $bpm</td>
              <td> $oxygen_saturation</td>
              </tr>";

};

	?>