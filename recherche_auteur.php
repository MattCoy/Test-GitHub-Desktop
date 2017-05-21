<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		if(isset($_GET['author'])){
			//on va chercher tout les articles écrits par cet auteur
			//comme on va intégrer des variables, on effectue une requête préparée
			$reponse = $bdd->prepare('SELECT * FROM articles WHERE author = :author');
			$reponse->execute(array('author'=>$_GET['author']));
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