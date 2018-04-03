	<?php
	require 'connection.php';
	$conn = connect();
	$myquery = "SELECT filename FROM `questionpapers` WHERE";
	$flag=0;
	if (isset($_POST['semester'])){
		//echo "1";
		if($flag==0)
		{
				$myquery = $myquery . ' semester = ' ."'".$_POST['semester']."'" ;
				$flag=1;
		}else {
				$myquery = $myquery. ' AND' . ' semester = ' ."'". $_POST['semester']."'"  ;
		}
	}
	if (isset($_POST['branch'])){
		//echo "2";
		if($flag==0)
		{
			$myquery = $myquery . ' branch = ' ."'".$_POST['branch']."'";
			$flag=1;
		}else{
			$myquery = $myquery .' AND'. ' branch = ' ."'". $_POST['branch']."'";
		}
	}
	if (isset($_POST['subject'])){
		//echo "3";
		if($flag==0)
		{
			$myquery = $myquery . ' subject = ' ."'". $_POST['subject']."'";
			$flag=1;
		}else {
			$myquery = $myquery .' AND'. ' subject = ' ."'". $_POST['subject']."'";
		}
	}
	if(isset($_POST['school'])){
		if($flag==0)
		{
				$myquery = $myquery . ' school = ' ."'". $_POST['school']."'";
				$flag=1;
		}else {
				$myquery = $myquery .' AND'. ' school = ' ."'". $_POST['school']."'";

		}
	}
	$result = $conn->query($myquery);
	$array = array();
	while (mysqli_num_rows($result) > 0){
		array_push($array,$result['filename']);
	}
	echo json_encode($array);
?>
