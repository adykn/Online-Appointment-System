<?php if (isset($_GET['D']) && $_GET['D']=='True' && isset($_GET['I']) ){
    $id=$_GET['I'];
    $lnk=getValue('Link','PdfList'," Id='".$id."'");
    $d=getValue('Downloads','PdfList'," Id='".$id."'");
    $d=$d+1;
     
     if (IfExists('PdfList',"Id='".$id."'  ")){
          
     $sql="update PdfList set Downloads='".$d."' where Id='".$id."'";
     $result=mysql_query($sql) or die (mysql_error());
    if($result){
               Header( "HTTP/1.1 301 Moved Permanently" );
               Header( "Location: ".$lnk." " ); 
    }else{
       echo "<center><font color=red>error : 02324..</font></center>";
    }
}  }?>


<?php if (!isset($_GET['Task'])){?>  



<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php    
        $i=0; 
	$queryal=mysql_query("SELECT * FROM `".$Mtb."` ") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr> No records found";
 }else{

        while($row=mysql_fetch_assoc($queryal))
	{
	$qe=mysql_query("SELECT * FROM `".$Stb."` WHERE CatId='".$row['Id']."'") or die ("query failed here");
	$Number=0;
		$Number = mysql_num_rows($qe);
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
                  
        <td align="center" width="25%"><br>
	<a href="<?php echo $Link; ?>&Task=ShowBooks&cid=<?php echo $row['Id']?>" style="text-decoration: none" class="navac">
	<img src="<?php echo $row['Pic']?>" width="65" height="75"  border="0" ><br>
	<?php echo $row['Title'] ?></a><br/>
	<font size="2">[ <?php echo $Number;?> ] Books<br/></font>
        </td>
 <?php $i++; }} ?>
  </tr>
</table>
<?php  } ?>
<?php //****************************************************************************************************?>
<?php if (isset($_GET['Task']) && $_GET['Task']=="ShowBooks" ){?>

<b><?php echo getValue('Title','PdfCat'," Id='".$_GET['cid']."'");?></b> : <?php echo getValue('Descr','PdfCat'," Id='".$_GET['cid']."'");?> 

<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php 
	$i=0; 
	$queryal=mysql_query("SELECT * FROM `".$Stb."` WHERE CatId='".$_GET['cid']."'  ") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr> No records found";
 }else{
        while($rw=mysql_fetch_assoc($queryal))
	{
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
        <td align="center" width="25%"   >
	<a href="<?php echo $Link?>&I=<?php echo $rw['Id'];?>&D=True&Task=ShowBooks&cid=<?php echo $_GET['cid'];?>" style="text-decoration: none" class="navac">
	<img src="<?php echo $rw['Pic'];?>" width="70" height="80">
	<br><font size='2'>
        <?php echo $rw['Title'] ?><br>
        <?php echo $rw['Downloads'] ?> </font>
        </a><br/>
        <br>
	</td>
 <?php $i++; } }?>
  </tr>
</table>
<?php  } ?>