<!DOCTYPE html>
<html>
	<head>
		<title><?php echo 'formulaire!'; ?></title>
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








	    ?>



	    <form method="GET" action="traitement_formulaire.php">
		    <label>Pseudo</label>
		    <input type="text" name="pseudo" value="">
		    <label>Sexe</label>
		    <select name="sexe">
			    <option value="F">Femme</option>
			    <option value="H">Homme</option>
		    </select>
		    <button type="submit">envoyer</button>
	    </form>
	</body>
</html> 