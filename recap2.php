<?php

/*
A partir d’une variable $genre (qui peut avoir la valeur homme ou femme) et d’une variable age (int) :
Créer une fonction qui va afficher une image (<img> dans une <div>).
Cette fonction prend un paramètre (le nom du fichier image) et va afficher une image par défaut si aucun paramètre ne lui est fourni.
Créer une fonction qui va prendre deux paramètres (age et genre) et qui affiche bonjour Monsieur ou Madame (en fonction du genre), vous avez $ages ans . Je veux que si on a 1 an, cela affiche vous avez 1 an. (sans s)
Puis tester :
    si on est un homme, répéter age+5 fois (boucle for) l‘affichage d‘une image d’un homme (au choix) et
afficher 1 fois bonjour monsieur, vous avez $age ans
	si on est une femme, répéter age-5 fois (boucle while) l’affichage d’une image de femme (au choix) et afficher une fois bonjour madame, vous avez $age ans.

*/

















$genre='femme';
$age=7;

function displayImage($filename='default.jpg'){
	?>
	<div class="col-md-4">
		<img class="img img-responsive" src="images/<?php echo $filename; ?>">
	</div>
	<?php
}

function bonjour($genre, $age){
	if($genre=='femme'){
		$texte = 'Madame';
	}
	else{
		$texte = 'Monsieur';
	}
	$pluriel = '';
	if($age > 1){
		$pluriel = 's';
	}
	return 'Bonjour ' . $texte . ', vous avez ' . $age . 'an' . $pluriel;
}

if($genre == 'homme'){
	$image = 'homme.jpg';
	for($compteur=1; $compteur <= ($age+5); $compteur++){
		displayImage($image);
	}
}
else{
	$image = 'femme.jpg';
	$compteur = 1;
	while($compteur<= ($age-5)){
		displayImage($image);
		$compteur++;
	}
}

echo bonjour($genre, $age);

?>