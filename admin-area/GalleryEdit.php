<?php 
$Link="?position=here&goto=GalleryEdit"; 

$HeaderTag="Event Area"; 
?>
<?php //**********************************************************************************?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
    <?php
	//if(!$_SESSION['Level']=="")	{?>
    <a href="<?php echo $Link;?>&Task=ShowAlbumForm" style="text-decoration: none" class="navac">Add 
    an Album</a> |
    <a href="<?php echo $Link;?>&Task=ShowPicForm" style="text-decoration: none" class="navac">Upload 
    a Picture</a> 
        
    <?php// }?>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>
<?php //**********************************************************************************?>
<?php 
if (@$_GET['Task']=="Delete")
	{
	$id=$_GET['PkId'];
	mysql_query("DELETE FROM albumpics WHERE PkId='".$id."'");
	$msg = "Record [ " . $id . " ] Deleted <br>";
	}
if (@$_GET['Task']=="DeleteAlbum")
	{
	$id=$_GET['PkId'];
	mysql_query("DELETE FROM albums WHERE PkId='".$id."'");
	mysql_query("DELETE FROM albumpics WHERE FkId='".$id."'");
	$msg = "Complet Album deleted <br>";
	}
if (@$_POST['SubmitPic']=="Insert")
{
	$FkId=$_POST['FkId'];
	$Desc=$_POST['Desc'];
    $Pic = file_get_contents($_FILES['Pic']['tmp_name']);
    $Pic = mysql_real_escape_string($Pic);
	$sql="INSERT INTO `albumpics` (`PkId`,`FkId`,`Pic` ,`Desc`)VALUES (NULL , '".$FkId."' , '".$Pic."', '".$Desc."')";
	$query=mysql_query($sql);
		if ($query)
			$msg="Inserted";
		else
			$msg="Error";
}

if (@$_POST['Submit']=="Insert")
{
	$Name=$_POST['Name'];
	$Desc=$_POST['Desc'];
	
	$sql="INSERT INTO `albums` (`PkId` ,`Name` ,`Desc`)VALUES (NULL , '".$Name."', '".$Desc."')";
	$query=mysql_query($sql);
		if ($query)
			$msg="Inserted";
		else
			$msg="Error";
}
if (@$_POST['Submit']=="Update")
{
	$Name=$_POST['$Name'];
	$Desc=$_POST['$Desc'];
	$PkId=$_POST['PkId'];
	$sql="Update `albums` set `Name`='$Name' ,`Desc`='".$Desc."' WHERE `PkId`='".$PkId."'";
	$query=mysql_query($sql);
		if ($query)
			$msg="updated";
		else
			$msg="Error";
}

?>
<?php //**********************************************************************************?>
<?php echo @$msg;?>
<?php if(!isset($_GET['Task'])){?>
<script type="text/javascript">
function SearchResult()
		{
		var a;
		var b;
		a=document.form1.SR.value;	
		b=document.form1.link.value;	
		document.location = b + "&ad=" + a ;
		}

function SearchResult2()
		{
		var temp3;
		var bd;
		var r=confirm("Are you Shore....?");
		if (r==true)
  		{
		  temp3=document.form1.temp.value;	
		
			bd=document.form1.link.value;	
				document.location = bd + "&Task=DeleteAlbum&PkId=" + temp3;
  		
		}
		
		}
</script>

<form name="form1">
<table width="100%" border="0">
      <tr>
        <td width="16%">
            
            <b>Deletion </b></td>
        <td width="59%" >
	<input type=hidden name="link" value='<?php echo $Link.''; ?>' >
	<input type=hidden name="temp" value=<?php echo @$_GET['ad']?> >
        <select name="SR" id="program" onChange="SearchResult()">

                      <option selected>Select an Album</option>
                      <?php
               			$queryal=mysql_query("SELECT * FROM `albums` ORDER BY PkId") or die ("query failed here");
						while($ro=mysql_fetch_assoc($queryal))
						{?>
                      	<option value="<?php echo $ro['PkId']?>"><?php echo $ro['Name']?></option>
                      	<?php }?>
                      	</select>		
         </td>
        <td width="25%"></td>
      </tr>
      <?php if(isset($_GET['ad'])){?>
		 <tr bgcolor="#f7f7f7">
        <td valign="top"> <b> Album</b></td>
        <td  valign="top">
		<?php
		$qd=mysql_query("SELECT * FROM `albums` Where PkId ='".$_GET['ad']."'") or die ("query failed here");
						while($rdo=mysql_fetch_assoc($qd))
						{
						echo $rdo['Name'];
						}
						?>
		</td>
		 <td  ><a onClick="return SearchResult2()" href="#"  ><img border="0" src="images/Del.jpg" width="18" height="21"></a></td>
		</tr>
      <tr>
        <td valign="top"><b>Pictures</b></td>
        <td colspan="2" valign="top">
		<?php 
		
			$queryal=mysql_query("SELECT * FROM `albumpics` WHERE FkId='".$_GET['ad']."' ORDER BY PkId") or die ("query failed here");
			$e=1;
			while($rwe=mysql_fetch_assoc($queryal))
			{?>
			<?php echo $e;?> <a href="<?php echo $Link?>&Task=Delete&PkId=<?php echo $rwe['PkId']?>" onclick="return confirm('Are you sure?');" ><img border="0" src="images/Del.jpg" width="18" height="21"></a><br>
			<?php $e++;
			}?>
		</td>
		 </tr>
		 <?php }?>
      </table>
 </form>
<?php }?>
<?php //**********************************************************************************?>

<?php if(@$_GET['Task']=="ShowAlbumForm"){?>
<form action="<?= $Link; ?>" method="POST" enctype="multipart/form-data">
  
                    <center>
                  <table  border="0" cellpadding="0" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" height="264">
                    <tr>
                      <td  align="left" height="27"   ><b><span  >
                      Name&nbsp;</span></b></td>
                      <td  align="left" height="27" >
                      <input name="Name" type="text"  value="<?php echo @$Name;?>" size="45" style="color: #808080; border: 1px solid #808080; background-color: #FFFFFF"></td>
                    </tr>
                    <tr>
                      <td height="180" valign="top"   ><b><span  >Description&nbsp;</span></b></td>
                      <td  height="180"   >
                      <textarea name="Desc" cols="42" rows="17"  style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF"><?php echo @$Desc;?></textarea></td>
                    </tr>
                    <tr>
                      <td height="10" valign="top"  colspan="2"  ><img src="../images/spacer.gif" width=5 height=5 ></td>
                    </tr>
                   
                    <tr>
                      <td height="35" colspan="2" align="center"   >
                     
                      <?php if (isset($_GET['Btn'])){?>
				      <input type="submit" name="Submit" value="Update" style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF">
					 <?php }else{?>
					<input type="submit" name="Submit" value="Insert" style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF">
                    <?php }?>
                    </td>
                    </tr>
                  </table>
                    </center>
          
</form>
<?php }?>                
<?php //**********************************************************************************?>
<?php if(@$_GET['Task']=="ShowPicForm"){?>
<form action="<?php echo $Link; ?>" method="POST" enctype="multipart/form-data">
  
                    <center>
                  <table  border="0" cellpadding="0" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" height="264">
                    <tr>
                      <td  align="left" height="27"   ><b>Album</b></td>
                      <td  align="left" height="27" >
                      <select size="1" name="FkId" style="color: #808080; border: 1px solid #808080; background-color: #FFFFFF">
                      <option selected>Select an Album</option>
                      <?php
               $queryal=mysql_query("SELECT * FROM `albums` ORDER BY PkId") or die ("query failed here");
				while($ro=mysql_fetch_assoc($queryal))
				{

                      ?>
                      <option value="<?php echo $ro['PkId']?>"><?php echo $ro['Name']?></option>
                      <?php }?>
                      
                      </select></td>
                    </tr>
                    <tr>
                      <td  align="left" height="27"   ><b><span  >
                      Pic&nbsp;</span></b></td>
                      <td  align="left" height="27" >
                      <input name="Pic" type="file"  style="color: #808080; border: 1px solid #808080; background-color: #FFFFFF" size="20"></td>
                    </tr>
                    <tr>
                      <td height="180" valign="top"   ><b><span  >Description&nbsp;</span></b></td>
                      <td  height="180"   >
                      <textarea name="Desc" cols="42" rows="17"  style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF"><?php echo @$Desc;?></textarea></td>
                    </tr>
                    <tr>
                      <td height="10" valign="top"  colspan="2"  ><img src="../images/spacer.gif" width=5 height=5 ></td>
                    </tr>
                   
                    <tr>
                      <td height="35" colspan="2" align="center"   >
                     
                      <?php if (isset($_GET['Btn'])){?>
				      <input type="submit" name="SubmitPic" value="Update" style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF">
					 <?php }else{?>
					<input type="submit" name="SubmitPic" value="Insert" style="color: #808080; border: 1px solid #808080; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF">
                    <?php }?>
                      </td>
                    </tr>
                  </table>
                    </center>
          
</form>
<?php }?>                
<?php //**********************************************************************************?>
<hr>
<?php include 'Gallery.php'?>