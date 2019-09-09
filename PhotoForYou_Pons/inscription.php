<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="CSS/styles.css" type="text/css" />
    <!--
    sworm, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

    Download: http://zypopwebtemplates.com/

    License: Creative Commons Attribution
    //-->

</head>

<body>

<div id="container">

    <?php include("include/entete.php"); ?>
	


    <div id="body">

        <!-- Contenu de la page -->
		<div id="content">	

            <h3>Se connecter</h3>
            <p>Merci de remplir ce formulaire !</p>
            <form method="post" action="transfertUtilisateur.php" >
            <h4>Prénom</h4>            
            <input type="text" name="prenom"/> <br /><br/>
            <h4>Nom</h4>
            <input type="text" name="nom"/> <br /><br/>
            <h4>Type</h4>
            <select id="type" name="type">
                <option value="Client">Client</option>
                <option value="Photographe">Photographe</option>
            </select> <br /><br/>
            <h4>Nom d'utilisateur souhaité</h4>
            Uniquement des lettres et des chiffres.<br/>
            <input type="text" name="pseudo"/><br/><br/>
            <h4>Adresse e-mail</h4>
            <input type="email" name="mail"/> <br /><br/>
            <h4>Mot de passe</h4>
            Entre 6 et 20 caractères, avec au moins une majuscule et un chiffre.
            <input type="password" name="mdp1"/><br/><br/>
            <h4>Confirmer le mot de passe</h4>
            <input type="password" name="mdp2"/><br /><br/>
            <input type="reset" value="Effacer le formulaire" /><input type="submit" name="inscrire" value="Suite" /> <br /><br />

        </form>
        </div>
        

    	<div class="clear">
        </div>
    </div>
    
    <?php include("include/pieddepage.php"); ?>
    
</body>
</html>