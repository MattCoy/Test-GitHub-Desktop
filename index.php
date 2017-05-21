<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		//connection a la base de données avec PDO
		//$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '');
		// $bdd est une variable de type objet

		//si il y a une erreur, les identifiants sont affichés
		//$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'xfvc', '');

		//pour éviter cela, on va traiter l'erreur, c'est à dire que l'on va la customiser pour qu'elle n'affiche que ce que l'on veut
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		//faire une requête
		//$reponse = $bdd->query('SELECT * FROM articles');

		//que contient $reponse ?
		//var_dump($reponse);  //objet PDO

		//récupérer les informations
		/*$donnees = $reponse->fetch();

		echo $donnees['author'];
		echo $donnees['title'];*/

		//récupérer toute les informations
		/*while($donnees = $reponse->fetch()){
			echo $donnees['author'];
			echo $donnees['title'];
		}*/

		//Exercice : récupérer et mettre en forme avec html et css chaque article avec le titre, publié par l'auteur, le date puis le contenu
		/*
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

		$reponse->closeCursor();
		*/
		// requête avec critère de sélection
		/*
		$reponse = $bdd->query('SELECT * FROM articles WHERE author = "Agathe Loiseau"');

		*/

		// requête avec ORDER BY
		/*
		$reponse = $bdd->query('SELECT * FROM articles WHERE author = "Agathe Loiseau" ORDER BY date_publi');

		
		*/

		// requête avec LIMIT
		/*
		$reponse = $bdd->query('SELECT * FROM articles ORDER BY date_publi LIMIT 0,10 ');

		
		*/

		//requête avec plusieurs critères dans la clause WHERE
		/*
		$reponse = $bdd->query('SELECT * FROM articles WHERE author != \'Agathe Loiseau\' AND date_publi > \'2000-01-01 0000:00:01\' ORDER BY date_publi DESC LIMIT 4,5 ');

		
		*/

		//Incorporer des variables PHP dans les requêtes SQL
		
		/*$reponse = $bdd->query('SELECT * FROM articles WHERE author = \'' . $_GET['author'] . '\' ORDER BY date_publi');*/

		
		
		//Cette méthode est vulnérable aux injections SQL
		//créer une table users et passer ?author=bob';DROP TABLE users;-- en paramètre dans l'url
		// la table users est supprimée

		//requêtes préparées : on utilise le marqueur ?
		/*
		$reponse = $bdd->prepare('SELECT * FROM articles WHERE author = ? ORDER BY date_publi');
		$reponse->execute(array($_GET['author']));

		
		*/

		//si plusieurs variables
		/*
		$reponse = $bdd->prepare('SELECT * FROM articles WHERE author = ? AND date_publi > ?ORDER BY date_publi');
		$reponse->execute(array($_GET['author'], $_GET['datepubli']));
		
		*/

		//marqueurs nominatifs
		/*$reponse = $bdd->prepare('SELECT * FROM articles WHERE author = :author AND date_publi > :datepubli ORDER BY date_publi');
		$reponse->execute(array('author'=>$_GET['author'], 'datepubli'=>$_GET['datepubli']));

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

		$reponse->closeCursor();
		*/

		//Debugger les erreurs SQL
		
		/*try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=testpdowf3;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
		$reponse = $bdd->prepare('SELECT * FROM articles WHERE authddddor = ? AND date_publi > ?ORDER BY date_publi');
		$reponse->execute(array($_GET['author'], $_GET['datepubli']));
		$reponse->closeCursor();

		//autre méthode
		$resultat = $bdd->query('SELECT * FROM articles WHERE titles = :title') or die(print_r($bdd->errorInfo()));
		*/

		// Rajouter une entrée dans la table 
		//$reponse = $bdd->exec('INSERT INTO articles(author, title, content, date_publi) VALUES(\'Matthieu Coyette\', \'Mon article\', \'Mon contenu pas très intéressant\', \'2017-05-10 11:30:28\')');

		//dès que l'on va introduire des variables, il faut utiliser une requête préparée
		/*
		$reponse = $bdd->prepare('INSERT INTO articles(author, title, content, date_publi) VALUES(:author, :title, :content, :date_publi)');
		$reponse->execute(array('author'=>'Matthieu Coyette', 
								'title'=>'Mon article', 
								'content'=>'Mon contenu pas très intéressant', 
								'date_publi'=>'2017-05-10 11:30:28'));
		*/


		//modifier des données
		
		//$reponse = $bdd->exec('UPDATE articles SET  title = \'Mon titre modifié\' WHERE author = \'Matthieu Coyette\'');
		//$reponse contient le nombre d'entrées modifiées
		//var_dump($reponse);
		//toujours pareil, on utilise les requêtes préparées si on utilise des variables
		/*
		$reponse = $bdd->prepare('UPDATE articles SET  title = :title WHERE author = :author');
		$reponse->execute(array('author'=>'Matthieu Coyette', 
								'title'=>'Mon article modifié'));

		*/


		//supprimer des données
		//$reponse = $bdd->exec('DELETE FROM articles SET WHERE author = \'Matthieu Coyette\'');
		
		//toujours pareil, on utilise les requêtes préparées si on utilise des variables
		/*
		$reponse = $bdd->prepare('DELETE FROM articles WHERE author = :author');
		$reponse->execute(array('author'=>'Matthieu Coyette'));

		*/
		
		

	?>
</body>
</html>