<?php
//this scipt return all the user information as a JSON array for a specified user id

//get the POST id
$idUser=$_POST['idUser'];

//connect to the db
require_once('dbConnect.php');

$sql = "SELECT * FROM medical_data WHERE idUser ='$idUser'";
$res = mysqli_query($con,$sql);
$result = array();

while($row = mysqli_fetch_array($res)){
	//create the array with all the data
	array_push($result,
		array(
			'date'=>$row[1],
			'time'=>$row[2],
			'air'=>$row[3],
			'temperature'=>$row[4],
			'ecg_value'=>$row[5],
			'blood_pressure_sensor'=>$row[6],
			'systolic_pressure'=>$row[7],
			'disatolic_pressure'=>$row[8],
			'posture'=>$row[9],
			'bpm'=>$row[10],
			'oxygen_saturation'=>$row[11],
			));
}

//encode the array to json and return it
echo json_encode(array("result"=>$result));

mysqli_close($con);
?>