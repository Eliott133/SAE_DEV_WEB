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

		grid-template-columns:30vw 40vw 30vw;
		grid-template-rows: 25vh 50vh 25vh;

		
	}

	#millieuDeBody
	{

		grid-area: 2 / 2;

		border: 1px solid black;
		border-radius: 10px 100px / 120px;
		background-color: salmon;

		display: grid;
		grid-template-rows: 40% 60%;


	}

	#titre
	{
		

		font-size: 50px;

		display: flex;
    	align-items: center;
    	justify-content: left;

    	padding-left: 70px;
	
		
	}

	#mail
	{
		font-size: 20px;
		margin-left: 100px;
		
	}

	#textFieldMail
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
	#Suivant
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
			
			<p>Renseigner</br>votre mail</p>

		</div>
		<div>
			
			<form  method='post'>
			<p id="mail">Email</p>
			<input id="textFieldMail" type="text" name="mail" maxlength="40" size="40" required ><br>
			<input id="Suivant" type="submit" name="Suivant" value="Suivant">
			</form>

			<?php 


			include 'Utilitaire/GenerateurDeMdp.php';
			include 'Utilitaire/CheckInjectionSQL.php';
			include 'Utilitaire/envoieMailMdp.php';
			include 'Utilitaire/ConnexionBDD.php';


	if (isset($_POST['Suivant'])) {		

		$mail = $_POST['mail'];

		$injectionSQL=CheckInjectionSQL($mail);
	
		if (!$injectionSQL) {
		
			$sql = "SELECT mailConnexion FROM CONNEXION WHERE mailConnexion ='" . $mail . "' AND MDPConnexion IS NULL;";
			$rs = $bdd->query($sql);
			$lignes = $rs->fetchAll();
			if(count($lignes) > 0)
			{
				$mdp = CreatePass(8);

				if(envoieMailMDP($mail,$mdp)){					
					
					$sql = "UPDATE CONNEXION SET temporaireConnexion = 'oui' WHERE mailConnexion='" . $mail ."';";
					$rs = $bdd->query($sql);

					$sql = "UPDATE CONNEXION SET MDPConnexion = '".password_hash($mdp,PASSWORD_BCRYPT)."' WHERE mailConnexion='" . $mail."';";
					$rs = $bdd->query($sql);


				//TODOrediriger rediriger vers la page de comfirmation



				}
				else
				{
					echo "<p id='message'>Un problème est survenu</p>";
				}
			

			}
			else
			{
			
				echo "<p id='message'>Désolé mais ce compte à deja un mot de passe ou il n'existe pas</p>";
	
			}
		}
		else
		{
			echo "<p id='message'>Bon arrête les injections SQL enculé</p>";
		}

	}


?>


	
		</div>



	</div>



</html>

