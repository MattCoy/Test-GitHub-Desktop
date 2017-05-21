<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<label>Titre</label>
		<input type="text" name='titre'>
		<label>Auteur</label>
		<input type="text" name='author'>
		<label>Contenu</label>
		<textarea name="content"></textarea>
		<input type="hidden" name="date_publi" value="<?php echo date('Y-m-d H:i:s'); ?>">
		<button type="submit">Enregistrer</button>
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

	if(isset($_POST['titre']) AND isset($_POST['author']) AND isset($_POST['content']) AND isset($_POST['date_publi'])){
			//on vérifie que le titre ne fait pas plus de 150 caracteres
		if(mb_strlen($_POST['titre']) < 150){
				//ensuite on vérifie que les variables ne sont pas vides
			if($_POST['titre'] AND $_POST['author'] AND $_POST['content'] AND $_POST['date_publi']){
					//on insère les données dans la bdd
					//comme on va intégrer des variables, on effectue une requête préparée
				$reponse = $bdd->prepare('INSERT INTO articles(title, author, content, date_publi) VALUES (:title, :author, :content, :date_publi)');
				if($reponse->execute(array('title'=>$_POST['titre'], 'author'=>$_POST['author'], 'content'=>$_POST['content'], 'date_publi'=>$_POST['date_publi']))){
					echo 'Votre article a bien été ajouté';
					
					//on a fini de traiter la réponse
					$reponse->closeCursor();
				}
				else{
					echo 'Problème lors de l\'enregistrement, veuillez recomencer';
				}
			}
			else{
				foreach($_POST as $cle=>$valeur){
					if(!$valeur){
						echo 'Le champ ' . $cle . ' doit être renseigné';
					}
				}
			}
		}
		else{
			echo 'Le titre ne doit pas dépasser 150 caractères';
		}


		
	}

	?>
</body>
</html>