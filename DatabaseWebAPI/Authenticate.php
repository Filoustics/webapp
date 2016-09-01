<?php
	$providedKey = htmlspecialchars($_POST["key"]);
	$key = date("mYdYmmYd");
	if ($providedKey != $key)
		header('Location: build.php');
?>