<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare("INSERT INTO minichat 
				(Pseudo,Message,date) VALUES (:Pseudo,:Message,NOW())");
$req->bindValue(':Pseudo', $_POST['Pseudo']);
$req->bindValue(':Message', $_POST['Message']);
$req->execute();

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>


