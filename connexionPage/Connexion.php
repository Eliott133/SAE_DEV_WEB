<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Première Connexion</title>
</head>
<style type="text/css">
	
	*
	{

	overflow: hidden;

	}

	body
	{
		display: grid;

		/* vrai grid
		grid-template-rows: 25vh 50vh 25vh;
		 */

		grid-template-columns:30vw 40vw 30vw;;
		grid-template-rows: 20vh 60vh 20vh;

		
	}
	#millieuDeBody
	{

		grid-area: 2 / 2;

		border: 1px solid black;
		border-radius: 10px 100px / 120px;
		background-color: salmon;

		display: grid;
		grid-template-rows: 25% 75%;

	}

	#titre
	{
		font-size: 50px;

		display: flex;
    	align-items: center;
    	justify-content: left;

    	padding-left: 70px;
		
	}
	.texte
	{
		font-size: 20px;
		margin-left: 100px;		

	}

	.textField
	{

		font-size: 20px;
		
		padding-top: 5px;
		padding-bottom: 5px;


		margin-left: 70px;
		margin-top: -22px;

		border-radius: 10px ;
		border: 1px solid black;

		text-align: center;
	}

	#Connexion
	{

		font-size: 30px;

		padding: 5px 50px 5px 50px;
		border-radius: 10px ;
		margin-top: 25px;

		margin-left: 200px;


	}

	#message
	{
		font-size: 20px;
		text-align: center;
	}



	
</style>

<body>

	<div id="millieuDeBody">
		
		<div id="titre">
			
			<p>Connexion</p>

		</div>
		<div>
			
			<form  method='post'>
			<p class="texte">Email</p>
			<input class="textField" type="text" name="mail" maxlength="40" size="40" required ><br>
			<p class="texte">Mot De Passe</p>
			<input class="textField" type="pass" name="mdp" maxlength="40" size="40" required ><br>

			<input id="Connexion" type="submit" name="Connexion" value="Connexion">
			</form>



	<?php 

			include 'Utilitaire/CheckInjectionSQL.php';
			include 'Utilitaire/ConnexionBDD.php';
			

	if (isset($_POST['Connexion'])) {

		$mail = $_POST['mail'];
		$mdp = $_POST['mdp'];

		$injectionSQL=CheckInjectionSQL($mail);
	
		if (!$injectionSQL) {
		
			$sql = "SELECT * FROM CONNEXION WHERE mailConnexion ='" . $mail . "' AND MDPConnexion IS NOT NULL;";
			$rs = $bdd->query($sql);
			$lignes = $rs->fetchAll();

		foreach($lignes as $key => $value) {

			$mailBdd = $value['mailConnexion'];
			$hashBdd = $value['MDPConnexion'];
			$temporaireBdd = $value['temporaireConnexion'];
    	}


				if (password_verify($mdp, $hashBdd)) {
					
					if ($temporaireBdd == 'oui') {


						header('Location: CreationMDP.php?mail='.$mail);



					}else{

						//TODO : redirection vers la page qu'il faut

						echo "<p id='message'>PAGE A DEFINIR</p>";
					}
					
				}else{

						echo "<p id='message'>MDP incorrecte</p>";

				}
			}

		}	

	?>

	
		</div>



	</div>



</html>

