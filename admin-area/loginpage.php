<?php 
ob_start();
session_start();
include"dbase.php"; 
include"functions.php"; 
$dt=date('M j\, Y \[ g\:i a\]');
  
if(isset($_POST['login']) && $_POST['login'] == "Login")
{

$Id=trim($_POST['UserId']);
$Pwd=trim($_POST['PassCode']);

	if($Id==""||$Pwd=="")
	{
	header("Location:login.php?Msg=Please+fill+all+the+fields");
	die();
	}

$sql=mysql_query("SELECT * FROM `adI` WHERE `User`='".$Id."' and Status='Reg'") or die("query failed");
while($rs=mysql_fetch_assoc($sql))
{
$Enc=$rs['EncNum'];
$Pwddb=$rs['pass'];
$Level=$rs['Level'];
$RefNo=$rs['RefNum'];
if (!$RefNo==0){
    $query=mysql_query("SELECT * FROM `student` where student_id='".$RefNo."' ") or die ("query failed here");
    if(mysql_num_rows($query) > 0)
        {   
            $row = mysql_fetch_assoc($query);
               $_SESSION['userData']= $row;
               //var_dump($_SESSION['userData']);
               //die();
        }      

             
} 
}
	if(isset($Enc) && $Enc!=="")
	{
		echo $EncPwd=Encrypt($Pwd,$Enc);
	}else{
		header("Location:login.php?Msg=Login+failed");
		die();
		}

if($EncPwd!==$Pwddb)
{
header("Location:login.php?Msg=Login+failed+<br/>+Please+User+Proper+Username+and+Password");
die();
}
else if ($EncPwd==$Pwddb)
{

$_SESSION['LoginId']=$Id;
$_SESSION['PassCode']=$EncPwd;
$_SESSION['Level']=$Level;
$_SESSION['ENC']=$Enc;
$_SESSION['RefNo']=$RefNo;
    if ($Level=='Admin'){
        header("Location:index.php");
    }else{
        header("Location:MemberArea.php");    
    }

}
}
?>