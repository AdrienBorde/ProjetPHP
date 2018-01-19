<?php

// Connexion Ã  la base de donnÃ©es
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Selectionne toutes les lignes dans la table stade
$req = $bdd->query("SELECT * FROM markers");

$filename="../CONTROLEUR/marker.xml";
if (file_exists($filename)) {
	unlink($filename)
} 
else {
	echo "Le fichier xml n'existe pas";
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

while ($row = $req->fetch()){


// Iterate through the rows, printing XML nodes for each
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

$req->closeCursor();

// End XML file
echo '</markers>';

?>