<!DOCTYPE html>
<html>
	<head>
		<title><?php echo 'cible du formulaire'; ?></title>
	</head>
	<body>
	    <?php
	    	/*Exercice:
			Créer une page formulaire.php dans laquelle on va créer un formulaire qui va demander le pseudo de l'utilisateur et son sexe.
			Créer une page traitement_formulaire.php qui va contenir le code php qui va traiter le formulaire
			Cette page doit afficher
			Bonjour Monsieur ou Madame (en fonction du sexe), votre pseudo est $pseudo
			Faire un lien retour vers la page formulaire
			*/


			if(isset($_POST['pseudo'])){
				if($_POST['sexe'] == 'F'){
					$texte = 'Madame';
				}
				else{
					$texte = 'Monsieur';
				}
				// en ternaire $texte = $sexe=='F' ? 'Madame' : 'Monsieur';
				echo 'Bonjour ' . $texte . ' votre pseudo est ' . $_POST['pseudo'];
			}

			//version GET

			if(isset($_GET['pseudo'])){
				if($_GET['sexe'] == 'F'){
					$texte = 'Madame';
				}
				else{
					$texte = 'Monsieur';
				}
				// en ternaire $texte = $sexe=='F' ? 'Madame' : 'Monsieur';
				echo 'Bonjour ' . $texte . ' votre pseudo est ' . $_GET['pseudo'];
			}

	    ?>
	    <a href="formulaires.php">retour au formulaire</a>
	</body>
</html> 