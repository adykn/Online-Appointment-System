<?php
include"dbase.php";
$PageLinkLocation="?position=here&goto=Page";
$NumCol=3;
$Name="";
$Title="";
$Data="";
//************************************************************************************;
//****** Insert Page
//************************************************************************************;
				
				if(isset($_POST['Submit']) && $_POST['Submit']=="Insert") 
				{
				$S1=$_POST['S1'];
				$T1=$_POST['T1'];
				$N1=$_POST['N1'];
				if ($_POST['PICUPD']=="Yes")
				{
				$L1=$_POST['L1'];
				$L2=$_POST['L2'];
				$L3=$_POST['L3'];
				$L4=$_POST['L4'];
								$footer="<table  border=\'0\' cellpadding=\'0\' cellspacing=\'0\' style=\'border-collapse: collapse\' bordercolor=\'#111111\' width=\'100%\' >";
				$footer.="<tr><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=includes/Gallery.php?Task=ViewImage&PkId=".$L1." \'text-decoration: none\'><img src=includes/Gallery.php?Task=ShowImage&PkId=".$L1." width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=includes/Gallery.php?Task=ViewImage&PkId=".$L2." \'text-decoration: none\'><img src=includes/Gallery.php?Task=ShowImage&PkId=".$L2." width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=includes/Gallery.php?Task=ViewImage&PkId=".$L3." \'text-decoration: none\'><img src=includes/Gallery.php?Task=ShowImage&PkId=".$L3." width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=includes/Gallery.php?Task=ViewImage&PkId=".$L4." \'text-decoration: none\'><img src=includes/Gallery.php?Task=ShowImage&PkId=".$L4." width=\'100\' height=\'80\'></a>";
				$footer.="</td></tr></table>";

				}else{
				$footer="";}
				$query=mysql_query("INSERT INTO `pages` (Name,Title,Data) VALUES('".$N1."','".$T1."','".$S1.$footer."')");
				$Msg="Inserted Successfully";
				}
//************************************************************************************;
//****** Update Page
//************************************************************************************;
				
				if(isset($_POST['Submit']) && $_POST['Submit']=="Update" && isset($_POST['Id'])) 
				{
				$Id=$_POST['Id'];
				$S1=$_POST['S1'];
				$T1=$_POST['T1'];
				$N1=$_POST['N1'];
			if ($_POST['PICUPD']=="Yes")
				{
				$L1=$_POST['L1'];
				$L2=$_POST['L2'];
				$L3=$_POST['L3'];
				$L4=$_POST['L4'];
				$footer="<table  border=\'0\' cellpadding=\'0\' cellspacing=\'0\' \'border-collapse: collapse\' bordercolor=\'#111111\' width=\'100%\' >";
				$footer.="<tr><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=\'APanel/Gallery.php?Task=ViewImage&PkId=".$L1." \' text-decoration: none\'><img src=\'APanel/Gallery.php?Task=ShowImage&PkId=".$L1."\' width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=\'APanel/Gallery.php?Task=ViewImage&PkId=".$L2." \' text-decoration: none\'><img src=\'APanel/Gallery.php?Task=ShowImage&PkId=".$L2."\' width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=\'APanel/Gallery.php?Task=ViewImage&PkId=".$L3." \' text-decoration: none\'><img src=\'APanel/Gallery.php?Task=ShowImage&PkId=".$L3."\' width=\'100\' height=\'80\'></a>";
				$footer.="</td><td align=\'center\' width=\'25%\'>";
				$footer.="<a href=\'APanel/Gallery.php?Task=ViewImage&PkId=".$L4." \' text-decoration: none\'><img src=\'APanel/Gallery.php?Task=ShowImage&PkId=".$L4."\' width=\'100\' height=\'80\'></a>";
				$footer.="</td></tr></table>";
				}else{
				$footer="";}

								
				mysql_query("UPDATE `pages` SET Data='".$S1.$footer."', Title='".$T1."',  Name='".$N1."' WHERE Id='".$Id."'");
				$Msg="Data has been updated.";
				}
//************************************************************************************;
//****** Delete Area
//************************************************************************************;
			if (isset($_GET['Task']) && $_GET['Task']=="Delete")
			{
			$id=$_GET['Id'];
			mysql_query("DELETE FROM `pages` WHERE Id='".$id."'");
}
//************************************************************************************;
//****** 
//************************************************************************************;
if ( isset($_GET['Tasks']) && $_GET['Tasks']=="UpdateS")
{
	$v=$_GET['Sts'];
	//echo $v;
		if ($v=="Show"){$val="Hide";$vall="False";	}else{$val="Show";$vall="True";}
		
	$Id=$_GET['Id'];
	$sql="Update `pages` set `Status`='$val' WHERE `Id`='".$Id."'";
	$query=mysql_query($sql);
		if($query)
		$Msg="Updated";
		else
		$Msg="error";
                 
     
	$Idd=getValue('Id','linktable'," Link='?goto=DisplayPage&id=".$Id."'");
        if (!$Idd=="Sorry"){
	$sql="Update `linktable` set `Visible`='$vall' WHERE `Id`='".$Idd."'";
	$query=mysql_query($sql);
        }

        }


?>
  <table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0" width="100%" bgcolor="#F7F7F7">
<tr><td width="100%">
<?php if( isset($_GET['Task']) && $_GET['Task']=="Modify"){?>
<a href="<?php echo $PageLinkLocation?>" style="text-decoration: none" class="navac">[Cancel]</a>
<?php }else if( !isset($_GET['Task']) || $_GET['Task']=="" || $_GET['Task']=="Show" || $_GET['Task']=="Delete"){?>
<a href="<?php echo $PageLinkLocation?>&Task=Modify" style="text-decoration: none" >[<img border="0" src="images/Page.png" width="18" height="22" alt="New Page" align="absmiddle">New Page]</a>
<?php } ?>

					
			    <?php 
			    if(isset($Msg) && $Msg<>"")
			    {?>
				<font color=#FF0000>[Status: <?php echo $Msg;?>]</font>
		   		<?php }?>


			 	
				</td>
			  </tr>
			</table>
<?php //********************************************************************************?>
<script>
var randomnumber=Math.floor(Math.random()*999999)
function Varify(val){
var CODE = prompt("Please Varify Deletion by Entering the Code in Braket ("+randomnumber+")", "Type Code here");
if (CODE == randomnumber)
	{		
	var b;
	b="<?php echo $PageLinkLocation?>";
	document.location = b + "&Task=Delete&Id=" + val ;
	}
else 
{
 alert("Number Does not match.. [File was not Deleted]..!");
 }
 }

function load(href) {
var Linkad
Linkad="../general.php?goto=../admin/DisplayPage&id="+href;
var load = window.open(Linkad,'','scrollbars=yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
}
			   
</script>
<table border="1" width="99%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-left-width:0; border-right-width:0; border-bottom-width:0" bordercolor="#F7F7F7">
  <tr>
<td width="99%" colspan="<?php echo $NumCol;?>" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style:none; border-bottom-width:medium">
<img border="0" src="images/spacer.gif" width="9" height="8"></td>
</tr>

  <tr>
<?php

$cnt=1;
$myqd2=mysql_query("SELECT * FROM `pages`") or die("query failed");
while($rm=mysql_fetch_assoc($myqd2))
{
if($rm['Status']=="Show")
	{
	$pic1="images/Show.PNG";
	}else{
	$pic1="images/Hide.PNG";
	}	
		 

?>
<td >

<a href="<?php echo $PageLinkLocation?>&Task=Modify&Id=<?php echo $rm['Id'];?>" style="text-decoration: none" >
<img border="0" src="images/Edit.png" width="18" height="21"></a>

<a href="#" onClick="return Varify(<?php echo $rm['Id'];?>)" >
<img border="0" src="images/delete.png" width="18" height="21"></a>

<a href="<?php echo $PageLinkLocation?>&Tasks=UpdateS&Sts=<?php echo $rm['Status'];?>&Id=<?php echo $rm['Id'];?>">
    <img border="0" src="<?php echo $pic1;?>" width="18" height="19"></a>
    
<a href="<?php echo $PageLinkLocation?>&Task=Show&Id=<?php echo $rm['Id'];?>" style="text-decoration: none" class="navac">
<img border="0" src="images/Page.png" width="18" height="22"><?php echo $rm['Name'];?></a>
 
 
&nbsp;
</td>
<?php 
if ($cnt==$NumCol)
{
echo "</tr><tr>";
$cnt=0;
}
$cnt++;
}?>

  </tr>
<tr>
<td width="99%" colspan="<?php echo $NumCol;?>" style="border-style:none; border-width:medium; ">
<img border="0" src="images/spacer.gif" width="9" height="8"></td>
</tr>
</table>



<?php 
//***********************************************************************************;


 if (isset($_GET['Id'])) 
 	{
	
	$queryprog3=mysql_query("SELECT * FROM `pages` WHERE Id='".$_GET['Id']."'") or die ("query failed here");
		while($N1=mysql_fetch_assoc($queryprog3))
		{
		$Name=$N1['Name'];
		$Title=$N1['Title'];
		$Data=$N1['Data'];
		}
		
	}
if (isset($_GET['Task']) && $_GET['Task']=="Show") 
{
echo "<br><b><font size='4'>".$Title."</b></font><hr>";		
echo $Data;

}	
if (isset($_GET['Task']) && $_GET['Task']=="Modify") 
{
$Name="Special Offers";
include "PageForm.php";
?><?php }?>