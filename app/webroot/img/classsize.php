<?php
	
	include_once('dblogin.php');
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

	$min = $_GET['min'];
	$max = $_GET['max'];
	
	$stmt = $db_connection->stmt_init();
	
	if($stmt->prepare("select deptId, courseNum, courseName, semester, seatsTaken from section where seatsTaken >= ? and seatsTaken <= ? and meetingType = 'Lecture' order by deptID asc, courseNum asc")) {
	
		//set parameters
		$stmt->bind_param("ss", $min, $max);
		
		//run the query
		$stmt->execute();
		
		//bind the result
		$stmt->bind_result($deptID, $courseNum, $courseName, $semester, $seatsTaken);
		
		//fetch the rows
		while($stmt->fetch()) {
			echo $deptID . " " . $courseNum . "<br>\n";
		}		
	}
	
	$stmt->close();
	
	$db_connection->close();
	
?>