<?php date_default_timezone_set("Asia/Hong_kong");

include_once("datetime.php");

$dbhost = 'localhost';
$dbuser= 'root';
$dbpass = '';
$dbname = 'repo';

$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die('Erro'.mysql_error());

mysql_select_db($dbname);
?>