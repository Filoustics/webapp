<?php 
require ("Authenticate.php");
require("dbconnect.php");
if (isset($_POST["day"]))
{
	//read vars
	$day = htmlspecialchars($_POST["day"]);
	//build query
	$babies = 'SELECT b.FirstName, b.Id FROM WebAppBaby b  WHERE b.Actif = 1 ORDER BY b.FirstName';
	//echo $query; 
	$results = $mysqli->query($babies);
	$returnString = '';
	if (!$results) 
	{
	    echo "Echec lors de la requete : (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else
	{
	 	$returnString = "[";
		 while ($row = $results->fetch_array(MYSQLI_NUM))
		 {
			$log = 'SELECT l.Entree, l.Sortie FROM WebAppInOutLog l WHERE l.BabyId = '. $row[1] .' AND Jour="'.$day.'"';
			$results2 = $mysqli->query($log);
			$entree = "00:00";
			$sortie = "00:00";
			if ($results2 && $row2 = $results2->fetch_array(MYSQLI_NUM))
			{
				$entree = substr($row2[0], 0, -3);
				$sortie = substr($row2[1], 0, -3);
			}
			
		 	$returnString = $returnString.'{"name":"'.$row[0].'","id":'.$row[1].',"entree":"'.$entree.'","sortie":"'.$sortie.'"},';
		 }
		 $returnString = rtrim($returnString,',');
		 $returnString = $returnString . "]";
	}
	echo $returnString;
}
?> 
