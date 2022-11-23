<?php
function envoieMailMDP($dest,$motDePasse)
{
	$objet="Première Connexion";

	$message="Bonjour,
	Voici votre Mot de Passe provisoire : ".$motDePasse."
	Pensez a changer votre mot de passe lors de votre prochaine connexion.
	Raphaël.";

  	return mail($dest,$objet,$message);
}
?>