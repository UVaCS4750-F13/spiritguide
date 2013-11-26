<!DOCTYPE html>
<html>

<head>
  <title>My Homework 3</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ui-darkness/jquery-ui-1.10.3.custom.min.css" />
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <link rel="stylesheet" href="css/style.css"/>
 
</head>

<body>

<div id="frame">

<?php

	$db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750baw4ux', 'fall2013', 'cs4750baw4ux');
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

	$type = $_GET['planet_type'];

	$stmt = $db_connection->stmt_init();
	
	if($stmt->prepare("select name, influence from planets where type = ? order by influence asc")) {
	
		//set parameters
		$stmt->bind_param("s", $type);
		
		//run the query
		$stmt->execute();
		
		//bind the result
		$stmt->bind_result($name, $influence);
		
		//fetch the rows
		echo "Name | Influence Points<br><br>\n";
		while($stmt->fetch()) {
			echo $name . " | " . $influence . "<br>\n";
		}		
	}
	
	$stmt->close();
	
	$db_connection->close();
	
?>

</div>
   
  </body>
</html><!--close footer-->  
