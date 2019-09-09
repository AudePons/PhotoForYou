<meta charset="UTF-8">

<?php include ('include/mysql.inc.php');	
		
// Si les champs sont remplis 
// adresse e-mail et mot de passe
if(isset($_POST) && !empty($_POST['adrMail']) && !empty($_POST['mdp'])) 
{
		// On récupére les données dans la BD
		extract($_POST);

		//Requête
		//On sélectionne le mot de passe dans la base de données
		//Dans la table users
		//Il doit être égal à ce que l'on saisi dans $adrMail
		$requete = "SELECT password FROM users WHERE mail ='".$adrMail."'";
		$executionReq = mysqli_query($bdd,$requete) or die('Attention erreur de SQL');
		$donnee = mysqli_fetch_assoc($executionReq);
	
		//On compare les deux mots de passe
		if($donnee['mdp'] != $passwordCrypt) 
		{
			echo '<p>Mauvais mot de passe. Merci de recommencer</p>';       
		}
		
		else 
		{
			// le mot de passe est correct, on rempli la variable session
			session_start();
			$adrMail = $_POST["adrMail"];
			$requete2 = "SELECT type FROM users WHERE mail='".$adrMail."'";
			$executionReq2 = mysqli_query($bdd,$requete2) or die('Attentio erreur de SQL');
			$donnee = mysqli_fetch_assoc($executionReq2);
			$_SESSION["user"]=$donnee;
			$_SESSION['adrMail'] = $_POST['adrMail'];
			$_SESSION['mdp'] = $_POST['mdp'];
			$_SESSION['type'] = $donnee['type'];
			echo 'Vous êtes bien connecté';
			header('Location: index.php');
		}   
}	

//Sinon la connexion n'est pas faite
//On affiche ce message
else 
{
    echo '<p>Veuillez remplir tous les champs.</p>';
}
?>
