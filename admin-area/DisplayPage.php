
<?php

if (isset($_GET['id']))
{

$Id=$_GET['id'];
include_once 'admin-area/dbase.php';
$myqd=mysql_query("SELECT * FROM `pages` WHERE id='".$Id."'") or die("query failed");
		while($mw=mysql_fetch_assoc($myqd))
		{
		$Name=$mw['Name'];
		$Title=$mw['Title'];
		$Data=$mw['Data'];
		}
echo "<b><font size='4'>".$Title."</b></font><hr>";		
echo $Data;
}else{
echo "error";
}
?>