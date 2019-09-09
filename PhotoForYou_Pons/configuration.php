<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Index</title>
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
		
		<table>
            <td><form action="transfertModifier.php" method="post">
			<h3>Modifier</h3>
            <h4>Numéro user<h4>
            <input type="text" name="numeroM"/> <br />
            <h4>Adresse mail </h4>
            <input type="email" name="mail"/> <br /><br />
			<h4>Pseudo</h4>
            <input type="text" name="pseudo"/> <br /><br />
			<h4>Type de compte </h4>
			<select id="type" name="type">
            <option value="Client">Client</option>
            <option value="Photographe">Photographe</option>
			<option value="Banni">Banni</option>
			</select><br/><br/>
            <input type="reset" value="Remettre à 0" /><input type="submit" name="connect" value="Modifier" /> <br /><br />
			</form></td>
			<td>
			<form action="transfertsupprimer.php" method="post">
			<h3>Supprimer</h3>
            <h4>Numéro user</h4>
            <input type="text" name="numeroM"/> <br /><br/>
            <input type="reset" value="Remettre à 0" /><input type="submit" name="connect" value="Modifier" /> <br /><br />
			</form>	</tr>
			<td>
			<form action="transfertgerer.php" method="post">
			<h3>Gérer les photos</h3>
            <h4>Numéro Photo</h4>
            <input type="text" name="numeroP"/> <br /><br/>
            <input type="reset" value="Remettre à 0" /><input type="submit" name="connect" value="Modifier" /> <br /><br />
			</form></td>
			<td>
			
            <form action="tranfertDernierInscrit.php" method="post">
			<h3>S'informer</h3>
			<h4>Dernier utilisateur inscrit</h4>
            <input type="submit" name="var_voir" value="Voir" /> <br /><br />
			</form></td></table>
        </div>

    	<div class="clear">
        </div>
    </div>

    <?php include("include/pieddepage.php"); ?>
    
</body>
</html>