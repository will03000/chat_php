<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form method="POST" action="minichat_post.php" style="text-align: center;">
	
<input type="text" name="Pseudo" placeholder="Pseudo">
<input type="text" name="Message" placeholder="Message">
<button type="submit">Envoyer</button>


</form>

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

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT Pseudo,Message,date FROM minichat ORDER BY id DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo htmlspecialchars($donnees['date']) . '<p><strong>' . htmlspecialchars($donnees['Pseudo']) . '</strong> : ' . htmlspecialchars($donnees['Message']) . '</p>';
}

$reponse->closeCursor();

?>

</body>
</html>