<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Index</title>
    <link rel="stylesheet" href="CSS/styles.css" type="text/css" />
</head>

<body>

<div id="container">

    <?php include("include/entete.php"); ?>

    <div id="body">

		<div id="content">	
		
		<?php
	//Récupération des données 
	//liées au formulaire d'inscription
	if(isset($_POST['mail'])) $mail=$_POST['mail'];
		else $mail="";
	if(isset($_POST['nom'])) $nom=$_POST['nom'];
		else $nom="";
	if(isset($_POST['prenom'])) $prenom=$_POST['prenom'];
		else $prenom="";
    if(isset($_POST['pseudo'])) $pseudo=$_POST['pseudo'];
        else $pseudo="";
    if(isset($_POST['mdp1'])) $mdp1=$_POST['mdp1'];
		else $mdp1="";
    if(isset($_POST['mdp2'])) $mdp2=$_POST['mdp2'];
		else $mdp2="";
    if(isset($_POST['type'])) $type=$_POST['type'];
		else $type="";
		
    // chiffrement du mot de passe
    $passwordCrypt1=md5($mdp1);
    $passwordCrypt2=md5($mdp2);
	
	if ( ($_POST['mail'] !== Null)  and ($_POST['nom']!== Null ) and ($_POST['prenom']!== Null ) and ($_POST['pseudo']!== Null ) and ($_POST['mdp1']!== Null ) and ($_POST['mdp2']!== Null ) and ($_POST['type']!== Null)) {
	// requête SQL
	// Enregistrement d'un nouvel utilisateur dans la table users
	$requete = "INSERT INTO users(nom,prenom,mail,pseudo,password,type) VALUES ('$nom','$prenom','$mail','$pseudo','$passwordCrypt1','$type')" or die("probleme requete");
	
	// Connexion à la base de données
	
	// Si la connexion ne marche pas.
	if( !$bdd ) 
	{ 
    	die("Erreur de la connexion à la base de données : ".mysqli_error($bdd));
	}	
	if( mysqli_connect_errno() ) 
	{ 
  	  die("La connexion a échoué : ".mysqli_connect_errno()." : ". mysqli_connect_error());
	}

	// Si la connexion marche
	else 
	{
		// Le mot de passe 1 est egal au mot de passe 2
		if ( $passwordCrypt1 == $passwordCrypt2 )
                {
                    $resultat=$bdd->query($requete);
                    echo 'Nous vous remercions de votre inscription'." ".$_POST['nom']." ".$_POST['prenom'];
                }
                else
                {
                    echo 'Les mots de passe ne sont pas cohérents. Faites attention à bien renseigner le même.';                
                }
	}
	}
	else {echo "Veuillez remplir tous les champs";}
?>
        </div>

    	<div class="clear">
        </div>
    </div>

    <?php include("include/pieddepage.php"); ?>
    
</body>
</html>




