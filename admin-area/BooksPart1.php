<?php if (!isset($_GET['Task'])){?>  
<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php    
        $i=0; 
	$queryal=mysql_query("SELECT * FROM `".$MtbNam."` ORDER BY category_id") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr> No records found";
 }else{

        while($row=mysql_fetch_assoc($queryal))
	{
	$qe=mysql_query("SELECT * FROM `".$StbNam."` WHERE category_id='".$row['category_id']."'") or die ("query failed here");
	$Number=0;
		$Number = mysql_num_rows($qe);
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
                  
        <td align="center" width="25%"><br>
	<a href="<?php echo $Link; ?>&Task=ShowBooks&id=<?php echo $row['category_id']?>" style="text-decoration: none" class="navac">
	<img src="<?php echo $row['pic']?>" width="65" height="75"  border="0" ><br>
	<?php echo $row['name'] ?></a><br/>
	<font size="2">[ <?php echo $Number;?> ] Books<br/></font>
        </td>
 <?php $i++; }} ?>
  </tr>
</table>
<?php  } ?>
<?php //****************************************************************************************************?>
<?php if (isset($_GET['Task']) && $_GET['Task']=="ShowBooks" ){?>  	 
<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php 
	$i=0; 
	$queryal=mysql_query("SELECT * FROM `".$StbNam."` WHERE category_id='".$_GET['id']."' ORDER BY book_id") or die ("query failed here");
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
	<a href="<?php echo $Link; ?>&Detail=true&bid=<?php echo $rw['book_id']?>" style="text-decoration: none" class="navac">
	<img src="<?php echo $rw['pic'];?>" width="70" height="80">
	<br><font size='2'>
        <?php echo $rw['name'] ?>
        <?php echo $rw['edition'] ?> <br/>
        by <?php echo $rw['author'] ?><br/>
        <?php echo $rw['qty'] ?>/<?php $x=getCount('issue',"book_id='".$rw['book_id']."' and issue_status='Issued'");$x=getValue('qty','book'," book_id='".$rw['book_id']."'")-$x;echo $x;?> </font>
        </a><br/>
        <br>
	</td>
 <?php $i++; } }?>
  </tr>
</table>
<?php  } ?>