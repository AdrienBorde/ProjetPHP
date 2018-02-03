<?php
//Fichier permettant de parser les données de la base de données en XML

// Connexion Ã  la base de donnÃ©es
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Selectionne toutes les lignes dans la table stade
$req = $bdd->query("SELECT * FROM markers");

$filename="marker.xml";
if (file_exists($filename)) {
	unlink($filename);
}
else {
	echo "Le fichier xml n'existe pas";
}

header("Content-type: text/xml");

//Parsing des données
$xml = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>';
$xml .= '<markers>';
while ($marker = $req->fetch(PDO::FETCH_OBJ)) {
        $xml .= "<marker name='".$marker->name."' address='".$marker->address."' lat='".$marker->lat."' lng='".$marker->lng."' type='".$marker->type."' />";
}
$xml .= '</markers>';

file_put_contents("$filename", $xml);

?>