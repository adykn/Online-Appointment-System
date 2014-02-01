<?php 
$conn = mysql_connect('localhost', 'root', '');
 
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db ("Lib",$conn) or die("db not found");
 ?>
