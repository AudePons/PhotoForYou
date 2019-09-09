<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Connexion</title>
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

		<div id="content">
         <!-- Formulaire de connexion -->
            <h3>Se connecter</h3>
            <form action="transfertConnexion.php" method="post">
            <h4>Adresse e-mail<h4>
            <input type="text" name="adrMail"/> <br />
            <h4>Mot de passe </h4>
            <input type="password" name="mdp"/> <br /><br />
            <input type="submit" name="connect" value="Connexion" /> <br /><br />

        </form>	
        </div>
        

    	<div class="clear">
        </div>
    </div>
    
    <?php include("include/pieddepage.php"); ?>
    
</body>
</html>