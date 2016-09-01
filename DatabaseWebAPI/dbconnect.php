<?php 
$mysqli = new mysqli("db624165429.db.1and1.com", "dbo624165429", "huPafsIXRdfFeTkhCNdZ", "db624165429");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?> 
