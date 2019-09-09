<div id="header">
    <h1><a href="index.php">PhotoForYou</a></h1>
        <h2></h2>
        <div class="clear"></div>
</div>

<div id="nav">
<ul>
            
<?php 

 //Prend le code de la page mysql.inc.php
 include ('include/mysql.inc.php');
 
 $requete="";
 $execution="";
 
 //Si c'est un visiteur (non connecté)
 if(!isset($_SESSION['user']))
 {
  //Selection des occurences de la table menu
  //connecte est un champ de la table 
  //connecte ce sont les pages à afficher
  $requete='SELECT * FROM menu WHERE connecte=2 OR connecte=1 OR connecte=5 ORDER BY nomMenu;';
 }

 //Si c'est un client
 if(isset($_SESSION['type']) && ($_SESSION['type']=='Client'))
 {
  $requete='SELECT * FROM menu WHERE connecte=0 OR connecte=2 OR connecte=6 ORDER BY nomMenu;';
 }
 
 //Si c'est un photographe
 if(isset($_SESSION['type']) && ($_SESSION['type']=='Photographe'))
 {
  $requete='SELECT * FROM menu WHERE connecte=4 OR connecte=2 OR connecte=6 ORDER BY nomMenu;';
 }
 
 //Si c'est un administrateur
 if(isset($_SESSION['type']) && ($_SESSION['type']=='Admin'))
 {
  $requete='SELECT * FROM menu WHERE connecte=3 OR connecte=6 ORDER BY nomMenu;';
 }
	  //Execution de la requête
	  $execution=mysqli_query($bdd,$requete);

                  
    $pageActuelle=basename($_SERVER['PHP_SELF']);
	
	//Si la requête est vraie
    if ($requete) 
 { 
	//Tant qu'il y a une ligne
	//alors on affiche le menu lié à la bdd
    while(list($num,$libelle,$lien)=mysqli_fetch_array($execution, MYSQLI_NUM))
    {
  echo '<li';
        if ($pageActuelle == $lien) echo ' class="selected"';
  echo '><a href='.$lien.'>'.$libelle.'</a></li>';
    }  
 }
 

?>
        </ul>
</div>