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

	$stmt = $db_connection->stmt_init();
	
	if($stmt->prepare("select brand from ingredient")) {
	

		
		//run the query
		$stmt->execute();
		
		//bind the result
		$stmt->bind_result($brand);
		
		//fetch the rows
		echo "Name | Influence Points<br><br>\n";
		while($stmt->fetch()) {
			echo $brand . "<br>\n";
		}		
	}
	
	$stmt->close();
	
	$db_connection->close();
	
?>

</div>
   
  </body>
</html><!--close footer-->  
