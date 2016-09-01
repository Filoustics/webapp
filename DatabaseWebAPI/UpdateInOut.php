<?php 
require ("Authenticate.php");
require("dbconnect.php");

if (isset($_POST["babyid"]) && isset($_POST["entree"]) && isset($_POST["sortie"]) && isset($_POST["day"]))
{
	//read vars
	$babyid = htmlspecialchars($_POST["babyid"]);
	$entree = htmlspecialchars($_POST["entree"]);
	$sortie = htmlspecialchars($_POST["sortie"]);
	$day = htmlspecialchars($_POST["day"]);
	//build query
	$query = 'SELECT Id FROM WebAppInOutLog WHERE BabyId = '. $babyid.' AND Jour = "'. $day.'"';

	$results = $mysqli->query($query);

	if (!$results) 
	{
	    echo "Echec lors de la requete : (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else
	{
		if ($row = $results->fetch_array(MYSQLI_NUM))
		{
			$query2 = 'UPDATE WebAppInOutLog SET Entree ="'. $entree .'", Sortie = "'. $sortie .'" WHERE Id = '.$row[0].';';
		}
		else
		{
			$query2 = 'INSERT INTO WebAppInOutLog(BabyId,Entree,Sortie,Jour) VALUES ('. $babyid .',"' . $entree . '","'. $sortie .'","'.$day.'")';			
		}

		//echo $query; 
		if (!$mysqli->query($query2)) 
		{
		    echo "Echec lors de la requete : (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else
		{
			echo "OK";
		}
	}
}
else
{
	echo "missing vars";
}
?> 
