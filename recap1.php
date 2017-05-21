<?php
$sexe='homme';
$age=40;
$premium=true;
if(($sexe == 'homme' AND $age >= 18 AND $premium) OR $sexe == 'femme'){
	echo 'Vous avez accès au contenu<br>';
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