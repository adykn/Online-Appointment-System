<?php
$PageLinkLocation="?goto=LinkEdit";
include "dbase.php";

if (isset($_POST['Submit']) && $_POST['Submit']=="Update") 
 {
 
	$sql="Update `linktable` set `Ltitle`='".$_POST['LTitle']."',`Link`='".$_POST['Link']."',`odr`='".$_POST['Order']."',`Loc`='".$_POST['Loc']."' WHERE `Id`='".$_POST['Id']."'";
	$query=mysql_query($sql);
		if($query)
		$msg="Updated";
		else
		$msg="error";

 }
 if ( isset($_POST['Submit']) && $_POST['Submit']=="Insert") 
 {
 $sql="INSERT INTO `linktable` (`Id`, `Ltitle`, `Link`,`odr`,`Loc`) VALUES (NULL,  '".$_POST['LTitle']."', '".$_POST['Link']."',".$_POST['Order'].", '".$_POST['Loc']."')";
 $query=mysql_query($sql);
		if($query)
		$msg="Inserted";
		else
		$msg="error";

 }
 if (isset($_GET['Task']) && $_GET['Task']=="Delete")
{
$id=$_GET['Id'];
	mysql_query("DELETE FROM `linktable` WHERE Id='".$id."'");
}
if (isset($_GET['Task']) &&  $_GET['Task']=="UpdateV")
{
	$valT=$_GET['Sts'];
		if ($valT=="True")
		{
		$val="False";
		}else{
		$val="True";
		}
	$Id=$_GET['Id'];
	$sql="Update `linktable` set `Visible`='$val' WHERE `Id`='".$Id."'";
	$query=mysql_query($sql);
		if($query)
		$msg="Updated";
		else
		$msg="error";
}
if ( isset($_GET['Task']) && $_GET['Task']=="UpdateS")
{
	$valT=$_GET['Sts'];
		if ($valT=="Active")
		{
		$val="Deactive";
		}else{
		$val="Active";
		}
	$Id=$_GET['Id'];
	$sql="Update `linktable` set `Status`='$val' WHERE `Id`='".$Id."'";
	$query=mysql_query($sql);
		if($query)
		$msg="Updated";
		else
		$msg="error";
}

?>
<?php //*************************************************************************************************?>
<?php //******* Header area ?>
<?php //*************************************************************************************************?>
<script type="text/javascript">
function Where()
		{
		var Loc;
		var b;
		Loc=document.formheader.WhereLoc.value;	
		b=document.formheader.link.value;	
		document.location = b + "&Where=" + Loc ;
		}
		</script>
<form name="formheader" >
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%">&nbsp;<b><font size="4">Navigation Menu</font></b> </td>
    <td width="75%">
    <p align="right"><input type=hidden name=link value="<?php echo $PageLinkLocation?>">
    <select size="1" name="WhereLoc" onChange="Where()" style="color: #800080; border: 1px solid #C0C0C0; background-color: #FFFFFF" >
  
    <option selected>Arrange Order..?</option>
    <?php 
    $queryprog3=mysql_query("SELECT * FROM `linktableloc`") or die ("query failed here...!");
	while($rs3=mysql_fetch_assoc($queryprog3))
	{
	?>
    <option value="<?php echo $rs3['Loc'];?>"><?php echo $rs3['Loc'];?></option>
    <?php }?>  
    </select> |<?php if(isset($_GET['LocEdit']) && $_GET['LocEdit']=="Show"){?>
    <a href="<?php echo $PageLinkLocation; ?>" class="navac" style="text-decoration: none">Hide 
    Loc</a>
    <?php }else{?>
    <a style="text-decoration: none" class="navac" href="<?php echo $PageLinkLocation?>&LocEdit=Show">Show 
    Loc</a>
    <?php }?>
   | <?php if(isset($_GET['Insert']) && $_GET['Insert']=="True"){?>
    <a href="<?php echo $PageLinkLocation; ?>" class="navac" style="text-decoration: none">Hide 
    Insert Area</a>
    <?php }else{?>
    <a href="<?php echo $PageLinkLocation; ?>&Insert=True" class="navac" style="text-decoration: none">Show 
    Insert Area</a>
    <?php }?>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>
</form>
<?php //*************************************************************************************************?>
<?php //******* Edit area ?>
<?php //*************************************************************************************************?>
<?php
if (isset($_POST['LinkSub']) && $_POST['LinkSub']=="Insert") 
 {
 $sql="INSERT INTO `linktableloc` (`Id`, `Loc`) VALUES (NULL, '".$_POST['Loc']."')";
 $query=mysql_query($sql);
		if($query)
		$msg="Inerted";
		else
		$msg="error";

 }
 if (isset($_GET['Task']) && $_GET['Task']=="DeleteLoc")
{
$id=$_GET['LocId'];
$Loc=$_GET['Loc'];

	mysql_query("DELETE FROM `linktableloc` WHERE Id='".$id."'");
	$sql="Update `LinkTable` set `Loc`='' WHERE `Loc`='".$Loc."'";
	$query=mysql_query($sql);

}

if (isset($_GET['LocEdit']) && $_GET['LocEdit']=="Show")
{
?>
<form name=form3 method="POST" action="<?php echo $PageLinkLocation?>">
 <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   <tr>
    <td width="21%">&nbsp;</td>
    <td width="79%" colspan="2">
     <?php 
     $i=1;
    $queryprog3=mysql_query("SELECT * FROM `linktableloc` Order by Id") or die ("query failed here..!");
	while($rs3=mysql_fetch_assoc($queryprog3))
	{
	?>
    <a href="<?php echo $PageLinkLocation?>&Task=DeleteLoc&LocId=<?php echo $rs3['Id'];?>&Loc=<?php echo $rs3['Loc'];?>" >
     <img border="0" src="images/Del.jpg" width="18" height="21" align="absmiddle"></a>
    <?php echo $i;?>. <?php echo $rs3['Loc'];?>	<br>
    <?php $i++;
    }?>  

    
    </td>
   </tr>
   <tr>
    <td width="21%"><b>&nbsp;&nbsp; Location (Loc)</b></td>
    <td width="2%"><b><font size="4">:</font></b></td>
     <td width="77%">
    <input type="text" name="Loc" size="41" tabindex="1" value="<?php 
    if (isset($Loc))
    echo $Loc;
    else
    echo ""
    ?>"></td>
   </tr>
   <tr>
    <td width="21%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
     <td width="77%">
    &nbsp;<input type=submit value="Insert" name="LinkSub" tabindex="8">
</td>
   </tr>
   <tr>
     <td width="100%" colspan="3"><hr></td>
   </tr>
</table>
</form>
<?php }?>
<?php //*************************************************************************************************?>
<?php //******* Edit area ?>
<?php //*************************************************************************************************?>
<?php

if (isset($_GET['Insert']) && $_GET['Insert']=="True")
{
 
 if (isset($_GET['Task']) && $_GET['Task']=="Update") 
 {
	$qg=mysql_query("SELECT * FROM `linktable` WHERE Id='".$_GET['IdUpD']."'") or die ("query failed here [update]");
	while($rs1=mysql_fetch_assoc($qg))
	{
	$LTitle=$rs1['Ltitle'];
	$Link=$rs1['Link'];
	$Order=$rs1['odr'];
	
	$Loc=$rs1['Loc'];
	$Id=$rs1['Id'];
	}
}else{
	$LTitle="";
	$Link="";
	$Order="";
	$JAction="Select an Event";
	$JAction2="";
	$JFunction="";
	$Loc="";
	$Id="";
	

	}?>
 </p>
 <form name=form2 method="POST" action="<?php echo $PageLinkLocation?>">

<table border="0" cellpadding="0" cellspacing="4" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="21%"><b>&nbsp;&nbsp; Link Tile</b></td>
    <td width="2%"><b><font size="4">:</font></b></td>
    <td width="77%">
    <input type="text" name="LTitle" size="55" tabindex="1" value="<?php echo $LTitle;?>"></td>
  </tr>
  <tr>
    <td width="21%"><b>&nbsp;&nbsp; Link</b></td>
    <td width="2%"><b><font size="4">:</font></b></td>
    <td width="77%">
    <input type="text" name="Link" size="37" tabindex="2" value="<?php echo $Link;?>"> 
    Or
	<script>
	function AddLink()
	{
	var val;
	val = document.form2.Page.value;
	document.form2.Link.value="?goto=DisplayPage&id="+val;
	}
	</script>
    <select size="1" name="Page" onChange="AddLink()" style="color: #800080; border: 1px solid #C0C0C0; background-color: #FFFFFF" >
    <option selected value=44 >Online Page</option>
    <?php 
    $queryprog3=mysql_query("SELECT * FROM `pages`") or die ("query failed here.[pages]");
	while($rse=mysql_fetch_assoc($queryprog3))
	{
	?>
    <option value="<?php echo $rse['Id'];?>"><?php echo $rse['Title'];?></option>
    <?php }?>  
    </select>
    
    
    </td>
  </tr>
  <tr>
    <td width="21%"><b>&nbsp;&nbsp; Order</b></td>
    <td width="2%"><b><font size="4">:</font></b></td>
    <td width="77%">
    <input type="text" name="Order" size="4" tabindex="3" value="<?php echo $Order;?>"></td>
  </tr>
  
   
  <tr>
    <td width="21%"><b>&nbsp;&nbsp; Location (Loc)</b></td>
    <td width="2%"><b><font size="4">:</font></b></td>
    <td width="77%">
    
    <select size="1" name="Loc" tabindex="4">
    <?php if ($Loc==""){?>
    <option selected>Location..?</option>
	<?php }else{?>
	<option selected value="<?php echo $Loc;?>" > <?php echo $Loc;?></option>
	<?php }?>

    <?php 
    $q3=mysql_query("SELECT * FROM `linktableloc`") or die ("query failed here.[linktable]");
	while($rs3=mysql_fetch_assoc($q3))
	{
	if ($Loc==$rs3['Loc']){}else{
	?>
    <option value="<?php echo $rs3['Loc'];?>"><?php echo $rs3['Loc'];?></option>
    <?php }}?>  
    </select>  
    
   </td>
  </tr>
  <tr>
    <td width="21%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="77%">&nbsp;
   <?php
    if (isset($_GET['Task']) && $_GET['Task']=="Update") 
 	{
 	?> 
 	<input type=hidden name=Id value="<?php echo $Id;?>">
    <input type=submit value="Update" name="Submit" tabindex="8">
    <?php }else{?>
    <input type=submit value="Insert" name="Submit" tabindex="8">
    <?php }?>
    </td>
  </tr>
  
  
  <tr>
    <td width="100%" colspan="3"><hr></td>
  </tr>
  
  
</table>
</form>
<?php }?>
<?php //*************************************************************************************************?>

 <form method="POST" action="<?php echo $PageLinkLocation?>">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="107%" align="center" colspan="10">
    <img border="0" src="images/spacer.gif" width="9" height="8"></td>
  </tr>
  <tr>
    <td width="5%" align="center"><b>S.N</b></td>
    <td width="10%"><b>&nbsp;Link Title</b></td>
    <td width="50%"><b>&nbsp;Link</b></td>
    <td width="8%" align="center"><b>Loc</b></td>
    <td width="4%" align="center"><b>O</b></td>
    <td width="4%" align="center"><b>V</b></td>
    <td width="4%" align="center"><b></b></td>
    <td width="4%" align="center"><b>S</b></td>
    <td width="3%" align="center"><b>E</b></td>
    <td width="2%" align="center"><b>D</b></td>
  </tr>
  <tr>
    <td width="107%" align="center" colspan="10">
    <img border="0" src="images/spacer.gif" width="9" height="8"></td>
  </tr>
  <?php 
  $i=1;
  if (isset($_GET['Where']) && $_GET['Where']!=""){
  	$queryprog=mysql_query("SELECT * FROM `linktable` WHERE Loc='".$_GET['Where']."' ORDER BY odr") or die ("query failed here.[LinkTable]");
	}else{
  	$queryprog=mysql_query("SELECT * FROM `linktable` WHERE 1 ORDER BY odr  ") or die ("query failed here.[Linktable]");	
	}
while($rs=mysql_fetch_assoc($queryprog))
{
	if($rs['Visible']=="True")
	{
	$pic1="images/Show.PNG";
	}else{
	$pic1="images/Hide.PNG";
	}	
		if($rs['Status']=="Active"){
		$pic2="images/Active.PNG";
		}else{
		$pic2="images/Deactive.PNG";
		}
?>

  <tr onmouseover="this.style.backgroundColor='#f7f7f7'" onmouseout="this.style.backgroundColor='';" >
    <td width="5%" align="center"><?php echo $i;?>.&nbsp;</td>
    <td width="30%">&nbsp;<?php echo $rs['Ltitle'];?>&nbsp;</td>
    <td width="30%">&nbsp;<?php echo $rs['Link'];?>&nbsp;</td>
    <td width="8%" align="center"><?php echo $rs['Loc'];?>&nbsp;</td>
    <td width="4%" align="center">
    <?php echo $rs['odr'];?>
    </td>
    <td width="4%" align="center">
    <a href="<?php echo $PageLinkLocation?>&Task=UpdateV&Sts=<?php echo $rs['Visible'];?>&Id=<?php echo $rs['Id'];?>">
    <img border="0" src="<?php echo $pic1;?>" width="18" height="19"></a></td>
    <td width="4%" align="center">
    </td>
    <td width="4%" align="center">
    <a href="<?php echo $PageLinkLocation?>&Task=UpdateS&Sts=<?php echo $rs['Status'];?>&Id=<?php echo $rs['Id'];?>">
    <img border="0" src="<?php echo $pic2;?>" width="18" height="20"></a></td>
    <td width="3%" align="center">
    <a href="<?php echo $PageLinkLocation?>&Task=Update&Insert=True&IdUpD=<?php echo $rs['Id'];?>">
    <img border="0" src="images/Edit.png" width="18" height="21"></a></td>
    <td width="2%" align="center">
    <a href="<?php echo $PageLinkLocation?>&Task=Delete&Id=<?php echo $rs['Id'];?>" onclick="return confirm('Are you sure?');">
	<img border="0" src="images/Del.jpg" width="18" height="21"></a></td>
  </tr>
<?php 
$i++;
}?>
</table>
</form>