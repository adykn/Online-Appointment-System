<?php
function Encrypt($PassCode,$EncNum) {
  $nstring = '';
  for($i = 0; $i < strlen($PassCode); $i++) {
    $nstring .= chr(ord(substr($PassCode,$i,$i + 1)) - $EncNum);
  }
  return $nstring;
}

function Insert($Table,$Var,$Values) {
$sadfsql="INSERT INTO `".$Table."` (".$Var.") VALUES (".$Values.")";
$query=mysql_query($sadfsql);
		if($query)
		$msg="Inserted";
		else
		$msg="error";
return $msg;
}
function Update($Table,$Set,$Where){
if ($Where=="")
$Where=1;

$sql="Update `".$Table."` set ".$Set." WHERE ".$Where."";
$query=mysql_query($sql);
if($query)
		$msg="Updated";
		else
		$msg="error";
return $msg;
}
function Delete($Table,$Where)
{
$query=mysql_query("DELETE FROM `".$Table."` WHERE ".$Where."");
if($query)
		$msg="Deleted";
		else
		$msg="error";
return $msg;

}
function IfExists( $Table, $Where ) {
$s= "SELECT COUNT(*) FROM {$table} WHERE ".$Where."";
if ( mysql_result( mysql_query($s), 0 ) == 0 ) {
return FALSE;
} else {
return TRUE;
}
}
?>