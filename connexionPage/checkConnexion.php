<?php

include '../Utilitaire/CheckInjectionSQL.php';
include '../Utilitaire/ConnexionBDD.php';


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
