<?php
function VerifyPassTaille($pass)
{
	$tailleMini = 8;

	if ($pass.length() >= $tailleMini) {
		
		return true;
	}
	return false;
}

function VerifyPassChiffre($pass)
{
	$chiffre = '1234567890';

	if ($pass.indexOf($chiffre)!=-1){
		return true;
	}
	return false;
	
}

function VerifyPassMaj($pass)
{
	$Majuscule = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	if ($pass.indexOf($Majuscule)!=-1){
		return true;
	}
	return false;
}

function VerifyPassMin($pass)
{
	$Minuscule = 'abcdefghijklmnopqrltuvwxyz';

	if ($pass.indexOf($Minuscule)!=-1){
		return true;
	}
	return false;
}
?>