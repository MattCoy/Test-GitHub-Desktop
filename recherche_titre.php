<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
			<input type="text" name='titre'>
			<button type="submit">Rechercher par auteur</button>
		</form>
	<?php
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		if(isset($_POST['titre']) AND !empty($_POST['titre'])){
			//on va chercher tout les articles qui ont pour titre $_POST['titre']
			//comme on va intégrer des variables, on effectue une requête préparée
			$reponse = $bdd->prepare('SELECT * FROM articles WHERE title = :title');
			$reponse->bindValue(':title', $_POST['titre'], PDO::PARAM_STR);
			while($donnees = $reponse->fetch()){
				?>
					<article>
						<h2><?php echo $donnees['title']; ?></h2>
						publié par <strong><?php echo $donnees['author']; ?></strong>,
						le <?php echo $donnees['date_publi']; ?>
						<div>
							<?php echo $donnees['content']; ?>
						</div>
					</article>
				<?php
			}

			//on a fini de traiter la réponse
			$reponse->closeCursor();
		}

	?>
</body>
</html>