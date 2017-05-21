<!DOCTYPE html>
<html>
	<head>
		<title><?php echo 'Mon site est super!'; ?></title>
	</head>
	<body>
	    <?php echo'<p style="color: red;">bonjour Matthieu</p>';
		    //display user's name
			echo '<p class="nom">Bonjour Matthieu</p>';
			//display css for 'nom' class
			echo '<style>.nom{font-weight: bold;}</style>';

			echo '<br>';
			$a = 5;
			$b = ++$a;
			echo $b. '-' . $a;
			$a = 5;
			$b = $a++;
			echo $b. '-' . $a;

			echo "je suis à l'ouest";
			echo 'je suis "au top"!';
			$nomPlanete = 'Jupiter';
			$distance = 4;
			$texte = 'la planete ' . $nomPlanete . ' se situe à ' . $distance .' unités astronomiques de la Terre';
			echo $texte;
		?>
	</body>
</html> 