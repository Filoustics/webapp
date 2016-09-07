<?php 
require("Authenticate.php");
require("dbconnect.php");
if (isset($_POST["day"]))
{
	//read vars
	$day = htmlspecialchars($_POST["day"]);
	$babyId = 0;
	if (isset($_POST["babyId"]))
	{
		$babyId = htmlspecialchars($_POST["babyId"]);
	}
	$duration = 1;
	if (isset($_POST["duration"]))
	{
		$duration = htmlspecialchars($_POST["duration"]);
	}
	
	//build babies query
	if ($babyId == 0)
	{
		$babiesReq = 'SELECT b.FirstName, b.Id FROM WebAppBaby b WHERE b.Actif = 1 ORDER BY b.FirstName';
	}
	else
	{
		$babiesReq = 'SELECT b.FirstName, b.Id FROM WebAppBaby b WHERE b.Id = ' . $babyId;
	}

	//echo $query; 
	$babiesResults = $mysqli->query($babiesReq);

	$returnString = '';
	if (!$babiesResults) 
	{
	    echo "Echec lors de la requete : (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else
	{
	 	$returnString = "[";
		while ($row = $babiesResults->fetch_array(MYSQLI_NUM))
		{
			$curDay = new DateTime($day);
			for ($i = 0; $i < $duration; $i++)
			{
				$log = 'SELECT l.Entree, l.Sortie FROM WebAppInOutLog l WHERE l.BabyId = '. $row[1] .' AND Jour="'.$curDay->format('Y-m-d').'"';
				$results2 = $mysqli->query($log);
				$entree = "00:00";
				$sortie = "00:00";
				if ($results2 && $row2 = $results2->fetch_array(MYSQLI_NUM))
				{
					$entree = substr($row2[0], 0, -3);
					$sortie = substr($row2[1], 0, -3);
				}
				
				$returnString = $returnString.'{"name":"'.$row[0].'","id":'.$row[1].',"entree":"'.$entree.'","sortie":"'.$sortie.'"},';
				$curDay = $curDay->add(new DateInterval('P1D'));
			}
		}
		$returnString = rtrim($returnString,',');
		$returnString = $returnString . "]";
	}
	echo $returnString;
}
?> 
