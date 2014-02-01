<?php 

if (isset($_SESSION['Level'])){
    $Link1="Gallery.php"; 
    $Link="?goto=Gallery"; 
}else{
$Link1="admin-area/Gallery.php"; 
$Link="?gotoA=Gallery"; 
}
$HeaderTag="Album Area"; 
//include"../db/dbase.php";
if (isset($_GET['Task']) && $_GET['Task']=="ViewImage")
{
?>
<p align="center">
[<a style="text-decoration: none; font-weight: 700;" href="javascript:history.go(-1)" class="navac">Back</a>]<br>
<img src="<?php $Link;?>?Task=ShowImage&H=<?php echo $_GET['H'];?>" width="600" height="428">
<?php
}else{
if (isset($_GET['Task']) && $_GET['Task']=="ShowImage")
{
include"dbase.php";
$H=$_GET['H'];
$queryp=mysql_query("SELECT * FROM `albumpics` WHERE PkId='".$H."'") or die ("query failed");
	$rs=mysql_fetch_assoc($queryp);
	echo $rs['Pic'];

}else{
//****************************************************************************************************?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
   [<a style="text-decoration: none; font-weight: 700;" href="javascript:history.go(-1)" class="navac">Back</a>]
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>
<?php //**********************************************************************************?><?php
if(!isset($_GET['Task']) || $_GET['Task']=="ShowAlbum" )
{?><table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
           <?php 
				$i=0; 
				$queryal=mysql_query("SELECT * FROM `albums` ORDER BY PkId") or die ("query failed here");
				while($row=mysql_fetch_assoc($queryal))
				{
				$qe=mysql_query("SELECT * FROM `albumpics` WHERE FkId='".$row['PkId']."'") or die ("query failed here");
				$PicNumber=0;
						while($r=mysql_fetch_assoc($qe))
						{
						$PicNumber++;
						}
				if($i%4==0)
				{
				echo "</tr><tr>";
				}
				
				?>
                  
                    <td align="center" width="25%"><br>
					<a href="<?php echo $Link; ?>&Task=ShowPics&H=<?php echo $row['PkId']?>" style="text-decoration: none">
					<img src="images/gallery.png" width="75" height="75"  border="0" ><br>
					<?php echo $row['Name'] ?></a><br/>
					<font size="2">[ <?php 
					echo $PicNumber;
					?> ] Pictures<br/></font>
					</td>
                  
				<?php $i++; } ?>
  </tr>
</table>
<?php  } ?>
                
<?php //**********************************************************************************?>
<?php
if(isset($_GET['Task']) &&  $_GET['Task']=="ShowPics")
{
	$qe=mysql_query("SELECT * FROM `albums` WHERE PkId='".$_GET['H']."'") or die ("query failed here");
	while($r=mysql_fetch_assoc($qe))
	{?>
	<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%">
    <p align="justify">
    
	<?php echo $r['Desc'];?>
	</td>
  </tr> 
  <tr>
    <td width="100%">
    <img src="images/spacer.gif" width=5 height=5 ></td>
  </tr>

</table>

	<?php }?>

<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
 
<tr> 
           <?php 
				$i=0; 
				$queryal=mysql_query("SELECT * FROM `albumpics` WHERE FkId='".$_GET['H']."' ORDER BY PkId") or die ("query failed here");
				while($rw=mysql_fetch_assoc($queryal))
				{
					if($i%4==0)
					{
					echo "</tr><tr>";
					}
			?>
                  
                    <td align="center" width="25%"   >
					<a href="<?php echo $Link1; ?>?Task=ViewImage&H=<?php echo $rw['PkId']?>" style="text-decoration: none">
					<img src="<?php echo $Link1;?>?Task=ShowImage&H=<?php echo $rw['PkId'];?>" width="100" height="80">
					<br>
					<?php echo $rw['Desc'] ?></a><br/>
				<br>
					</td>
                  
				<?php $i++; } ?>
  </tr>
</table>
 <?php  } ?>

<?php //**********************************************************************************?>
<?php }}?>