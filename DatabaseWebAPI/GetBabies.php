<?php 
$providedKey = htmlspecialchars($_POST["key"]);
require ("Authenticate.php");
require("dbconnect.php");
	//build query
	$babies = 'SELECT * FROM WebAppBaby';
	//echo $query; 
	$results = $mysqli->query($babies);
	$returnString = '';
	if (!$results) 
	{
	    echo "Echec lors de la requete : (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else
	{
		 while ($row = $results->fetch_array(MYSQLI_NUM))
		 {
		 	$returnString = $returnString.$row[1].';';
		 }
	}
	echo $returnString;
?> 
