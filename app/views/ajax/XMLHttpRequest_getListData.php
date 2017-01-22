<?php

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$idEditor = (isset($_POST["IdEditor"])) ? htmlentities($_POST["IdEditor"]) : NULL;

if ($idEditor) {

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
	}catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	
	$reponse = $bdd->query("SELECT * FROM ajax_example_softwares WHERE idEditor=" . mysql_real_escape_string($idEditor) . " ORDER BY name");
	while ($donnees = $reponse->fetch()) {
		echo "<item id=\"" . $donnees["id"] . "\" name=\"" . $donnees["name"] . "\" />";
	}
	$reponse->closeCursor();
}

echo "</list>";

?>