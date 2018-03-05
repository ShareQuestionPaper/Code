<?php
	$con=mysqli_connect("localhost","root","password","data");
	$query = "SELECT filename from questionpapers where";
	if ($isset($_POST['sem'])){
		$query = $query + ' semester = ' + $_POST['semester'];
	}
	if ($isset($_POST['branch'])){
		$query = $query + ' branch = ' + $_POST['branch'];
	}
	if ($isset($_POST['school'])){
		$query = $query + ' subject = ' + $_POST['subject'];
	}
	if ($isset($_POST['subject'])){
		$query = $query + ' school = ' + $_POST['school'];
	}
	$result = mysqli_query($con,$query);
	$array = array();
	while (mysqli_num_rows($result) > 0){
		array_push($array,$result['filename']);
	}
	echo json_encode($array);
?>