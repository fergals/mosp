<?php
ob_start();
session_start();
date_default_timezone_set('Europe/London');

$servername = ;
$username = ;
$password = ;
$dbname = ;

//PDO connection
$db = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pagetitle = "Napier Management Training";

//define website details
define('DIR','http://mosp.napiermgt.tk');
define('SITEMAIL', 'noreply@napiermgt.tk');

require_once($_SERVER['DOCUMENT_ROOT'].'/config/user.php');
include ($_SERVER['DOCUMENT_ROOT'].'/config/phpmailer/mail.php');

$user = new User($db);

?>
