<?php
$age = 'lkjgljk';

if ($age >= 10) {
	$resultat = $age * 2;
} 
elseif($age == 0){
	$resultat = -1000;
}
else {
	$resultat = $age / 2;
}

echo $resultat+10;

$nombre = 1;
$max = 20;
while($nombre <= $max){
    if($nombre % 2 == 0){
      echo $nombre . ' est pair<br>'; 
   }
   else{
      echo $nombre . ' est impair<br>'; 
   }
 $nombre++;
}

function calculDuPerimetre($rayon){
    $perimetre = 2*3.14*$rayon;
    return $perimetre;
}

echo  calculDuPerimetre(5);

$chaine = 'Hello world ! ';
$chaine = str_replace('world', 'universe', $chaine);
echo $chaine;
echo 'il est ' . date('H') . 'h ' . date('i');

$sexe='homme';
$age=40;
$premium=true;
if(($sexe == 'homme' AND $age >= 18 AND $premium) OR $sexe == 'femme'){
	echo 'Vous avez accès au contenu';
	if($sexe == 'femme'){
		echo 'Bonjour Madame';
	}
	else{
		echo 'Bonjour membre premium';
	}
}
elseif($age >= 18){
	echo 'Devenez membre premium';
	?>
	<button class="btn btn-default">Devenir membre</button>
	<?php
}
else{// je suis un homme mineur
	$ecart = 18 - $age;
	echo 'Vous avez ' . $age . ' ans, vous n\'êtes donc pas autorisé à accéder au contenu mais vous pourrez y accéder dans ' . $ecart . ' ans';
}
?>
