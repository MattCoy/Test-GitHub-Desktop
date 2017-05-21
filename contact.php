<!DOCTYPE html>
<html>
	<head>
		<title><?php echo 'cible du formulaire'; ?></title>
	</head>
	<body>
	    <?php
	    	/*Exercice:
			Créer un formulaire de contact :
			Nom, Prenom, email, url (input type texte) , Message (textarea), Categorie(liste déroulante avec comme options : php, sql, js, html, css), Urgent(checkbox)
			Ce formulaire va utiliser la méthode POST et le traitement sera fait sur la même page.
			Le script php doit vérifier la conformité des données (url, email)
			Le nom, prénom et l'email doivent faire au moins 1 caractère.
			l'url peut être laissé vide.
			Le téléphone doit être constitué de 10 chiffres.
			Le message ne doit pas faire plus de 100 charactères
			Un message de confirmation est affiché si tout va bien : si urgent a été coché afficher 'votre message urgent a bien été envoyé' sinon afficher 'votre message a été envoyé'.
			Sinon un ou des messages d'erreurs doivent être affichés pour avertir l'utilisateur.
			Si il y a une erreur, l'utilisateur ne doit pas avoir a re remplir les champs.
			*/
















			//on contrôle l'existence des variables
			//print_r($_POST);
			if(isset($_POST['message']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['telephone']) AND isset($_POST['url']) AND isset($_POST['categorie'])){
				//ensuite on contrôle la cohérence des variables
				if($_POST['nom'] AND $_POST['prenom'] AND $_POST['email'] AND $_POST['message'] AND $_POST['telephone']){
					//on vérifie que l'email est bon
					if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
						//puis on vérifie que le téléphone contient bien 10 chiffres
						if(mb_strlen($_POST['telephone']) == 10 AND ctype_digit($_POST['telephone'])){
							//enfin on vérifie que le message ne fait pas plus de 100 caractères
							if(mb_strlen($_POST['message']) < 100){
								//on peut envoyer le message
								//on teste si la checkbox urgent a été cochée
								if($_POST['urgent']){// on peut aussi faire if($_POST['urgent'] == 'on')
									echo 'Votre message urgent a bien été envoyé';
								}
								else{
									//urgent n'est pas coché
									echo 'Le message a bien été envoyé';
								}
								
							}
							else{
								//le message est trop long
								echo 'Le message ne doit pas contenir plus de 100 caractères';
							}
						}
						else{
							//le téléphone n'est pas au bon format
							echo 'Le téléphone doit être constitué de 10 chiffres';
						}
					}
					else{
						//l'email n'est pas valide
						echo 'Votre email n\'est pas valide';
					}
				}
				else{
					//un champ au moins n'a pas été rempli
					if(!$_POST['nom']){
						echo 'Vous devez indiquer votre nom';
					}
					if(!$_POST['prenom']){
						echo 'Vous devez indiquer votre prénom';
					}
					if(!$_POST['email']){
						echo 'Vous devez indiquer votre email';
					}
					if(!$_POST['telephone']){
						echo 'Vous devez indiquer votre téléphone';
					}
					if(!$_POST['message']){
						echo 'Vous devez écrire un message';
					}
					//autre méthode
					/*foreach($_POST as $cle=>$valeur){
						if(!$valeur AND $cle != 'url'){
							echo 'Vous devez remplir le champ ' . $cle;
						}
					}*/
				}

			}

	    ?>
	    <form method="POST">
		    <label>Nom</label>
		    <input type="text" name="nom" value="">
		    <label>Prénom</label>
		    <input type="text" name="prenom" value="">
		    <label>Email</label>
		    <input type="text" name="email" value="">
		    <label>Téléphone</label>
		    <input type="text" name="telephone" value="">
		    <label>Url de votre site</label>
		    <input type="text" name="url" value="">
		    <label>Categorie</label>
		    <select name="categorie">
			    <option value="php">php</option>
			    <option value="sql">sql</option>
			    <option value="js">js</option>
			    <option value="html">html</option>
			    <option value="css">css</option>
		    </select>
		    <label>Urgent</label>
		    <input type="checkbox" name="urgent">
		    <label>Message</label>
		    <textarea name="message"></textarea>
		    <button type="submit">Envoyer</button>
	    </form>
	</body>
</html> 