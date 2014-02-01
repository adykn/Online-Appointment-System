<?php
$Location="";
include_once "functions.php";
$TableName="adI";
$Pass="Pass";
$User="User";
$Encode="EncNum";
$WhereCondition="";
$UN="";
$EN="";
$msg="";

if (isset($_SESSION['LoginId']) && $_SESSION['LoginId']!="")
{$UN=$_SESSION['LoginId'];}

if (isset($_SESSION['ENC']) && $_SESSION['ENC']!="")
{$EN=$_SESSION['ENC'];}

/*
//$_SESSION['LoginId']=$Id;
//$_SESSION['PassCode']=$EncPwd;
//$_SESSION['Level']=$Level;
//$_SESSION['ENC']=$Enc;
*/
//*************************************************************************
//*************************************************************************
//*************************************************************************
//*************************************************************************


if (isset($_POST['Submit']) && $_POST['Submit'] == "Change")
{
	if($_POST['NP']==$_POST['VP']){
	$WhereCondition="`".$User."`='".$_POST['UN']."' AND `".$Pass."`='".Encrypt($_POST['OP'],$_POST['OEN'])."' ";
	$result=mysql_query("SELECT * FROM `".$TableName."` Where ".$WhereCondition."") or die ("query failed here");
	$num_rows = mysql_num_rows($result);
	
		if ($num_rows!=0 || $num_rows>1)
		{
		$sql="Update `".$TableName."` set `".$Pass."`='".Encrypt($_POST['VP'],$_POST['EN'])."',`".$Encode."`='".$_POST['EN']."',`".$User."`='".$_POST['UN']."' WHERE ".$WhereCondition."";
		$query=mysql_query($sql);
			if($query)
			{
			$_SESSION['LoginId']="";
			$_SESSION['PassCode']="";
			$_SESSION['Level']="";
			$_SESSION['ENC']="";
			}
			else
			$msg="error: SQL";
		}else{$msg="error: Invalid Data";}
	}else{$msg="error: Password Not Verified";}
}
//*************************************************************************
//*************************************************************************
//*************************************************************************
//*************************************************************************

?>
<br><br><br><br>
<form method="POST" action="<?php echo $Location;?>">
	<center>
	<table border="0" width="80%" id="table1" cellspacing="0" cellpadding="0" bordercolor="#C0C0C0">
	<tr>
		<td colspan="4" background="images/bg.gif" style="border-style: solid; border-width: 1px">
		<p align="center"><font color="#FF0000">&nbsp;<?php echo $msg;?> </font></td>
	</tr>
	<tr>
		<td  width="100%" colspan="4" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
		<img border="0" src="images/spacer.gif" width="9" height="8"></td>
	</tr>
	<tr>
		<td  width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td  width="34%" >
<b>User Name</b></td>
		<td width="2%" >&nbsp;</td>
		<td  width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="text" name="UN" size="20" value="<?php echo $UN;?>"></td>
	</tr>
	<tr>
		<td  width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td  width="34%">
		<b>Old Encode Level</b></td>
		<td width="2%">&nbsp;</td>
		<td  width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="text" name="OEN" size="4" value="<?php echo $EN;?>"></td>
	</tr>
	<tr>
		<td  width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td  width="34%">
		<b>Old Password:</b></td>
		<td width="2%">&nbsp;</td>
		<td  width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="password" name="OP" size="20"></td>
	</tr>
	<tr>
		<td width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td width="34%">
		<b>New Encode Level</b></td>
		<td width="2%">&nbsp;</td>
		<td width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="text" name="EN" size="4"></td>
	</tr>
	<tr>
		<td width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td width="34%"><b>New Password</b></td>
		<td width="2%">&nbsp;</td>
		<td width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="password" name="NP" size="20"></td>
	</tr>
	<tr>
		<td width="16%" style="border-left-style: solid; border-left-width: 1px">&nbsp;</td>
		<td width="34%"><b>Verification Pwd</b></td>
		<td width="2%">&nbsp;</td>
		<td width="48%" style="border-right-style: solid; border-right-width: 1px">
		<input type="password" name="VP" size="20"></td>
	</tr>
	<tr>
		<td colspan="4" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
		<img border="0" src=" images/spacer.gif" width="9" height="8"></td>
	</tr>
	<tr>
		<td colspan="4" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
		<input type="submit" value="Change" name="Submit"></td>
	</tr>
	<tr>
		<td colspan="4" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<img border="0" src=" images/spacer.gif" width="9" height="8"></td>
	</tr>
</table></center>
</form>


