<?php
session_start();
?>

<?php
if ( isset($_SESSION['user']))
{

$_SESSION = array();
session_destroy();
}
header('Location: index.php');
?>