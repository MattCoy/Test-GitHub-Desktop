<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		// à partir de la bdd fournie
		/*
		créer une page (index.php) qui affiche les 5 derniers articles (du plus récent au plus ancien)
		
		Le header et le footer doivent être contenus dans deux fichiers header.php et footer.php (placés dans un dossier include) insérés dans les pages grâce à include.

		créer sur cette page un formulaire qui va nous permettre de choisir l'auteur des articles que l'on veut afficher (grâce à une liste déroulante)
		Ce formulaire doit pointer vers une autre page (par exemple recherche_auteur.php) avec la methode GET

		Créer une autre page (par exemple recherche_titre.php) dans laquelle un formulaire va nous permettre de faire une recherche par titre (grâce à un champ input text) et d'afficher les articles trouvés (l'affichage se fait sur la même page) avec la méthode POST

		Créer une autre page (ajouter_article.php) qui contient un formulaire qui va nous permettre de créer un article.
		Le titre ne doit pas compter plus de 150 caracteres
		Si l'article est bien crée, un message de confirmation est envoyé sinon un message d'erreur est affiché, les champs remplis par l'utilisateur ne sont pas effacés

		Créer une page qui permette de supprimer un article grâce à un formulaire (select avec option qui affiche titre - auteur)

		*/
		
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		//on récupère les 5 derniers articles du plus récent au plus ancien grâce au mot clé DESC
		$reponse = $bdd->query('SELECT * FROM articles ORDER BY date_publi DESC LIMIT 0,5 ');
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
		
		//on récupère tout les noms d'auteur
		$reponse = $bdd->query('SELECT DISTINCT author FROM articles ORDER BY author');

	?>
	<div>
		<form action="recherche_auteur.php">
			<select name="author">
			<?php
			while($donnees = $reponse->fetch()){
				echo '<option value="' . $donnees['author'] . '">' . $donnees['author'] . '</option>';
			}
			?>
			</select>
			<button type="submit">Rechercher par auteur</button>
		</form>
	</div>
	<?php
		//on a fini de traiter la réponse
		$reponse->closeCursor();
	?>
</body>
</html>