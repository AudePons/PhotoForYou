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
	 //Appel de la procedure stockée
  $result = mysqli_query($bdd, 
     "CALL dernier_inscrit") or die("Query fail: " . mysqli_error());

  //Tant qu'il y a des lignes
  //on parcours les resultats
  while ($ligne = mysqli_fetch_array($result)){   
      echo "<p>".$ligne["idUser"]." - ".$ligne["type"]." - ".$ligne["nom"]." - ".$ligne["prenom"]." - ".$ligne["pseudo"]." - ".$ligne["mail"]." - ".$ligne["nbCredit"]." - ".$ligne["nbImage"]."</p>";; 
  }
?>
        </div>

    	<div class="clear">
        </div>
    </div>

    <?php include("include/pieddepage.php"); ?>
    
</body>
</html>

