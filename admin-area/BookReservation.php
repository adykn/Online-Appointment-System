<?php
$Link="?goto=BookReservation"; 
 
$HeaderTag="Book Reservation"; 
$ItemPerRow=4;
$MtbNam="category";
$StbNam="book";

if(isset($_GET['R']) && $_GET['R']==true){
  if (!IfExists('issue',"student_id='".$_SESSION['RefNo']."' and book_id='".$_GET['bid']."' and issue_status='Issued'")){
   if (!IfExists('reserved',"student_id='".$_SESSION['RefNo']."' and book_id='".$_GET['bid']."'")){
     $sql="insert into reserved (student_id,book_id,date,book_limit) values ('".$_SESSION['RefNo']."','".$_GET['bid']."','".date("Y-m-d")."','180')";
     $result=mysql_query($sql) or die (mysql_error());
                if($result){
                echo "<center><font color=green>Book reserved</font></center>";}
   }else{
       echo "<center><font color=red>Book already reserved</font></center>";
   }
  }else{
       echo "<center><font color=red>Book already Issued</font></center>";
   }
}                     


//****************************************************************************************************?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
     <a href='<?php echo $Link; ?>'><img src='pages/image/Updir.png'></a>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>

<?php //****************************************************************************************************?>
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
	$queryal=mysql_query("SELECT * FROM `".$StbNam."` WHERE category_id='".$_GET['id']."' and qty>'0' ORDER BY book_id") or die ("query failed here");
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
	<a href="<?php echo $Link; ?>&R=true&bid=<?php echo $rw['book_id']?>" style="text-decoration: none" class="navac">
	<img src="<?php echo $rw['pic'];?>" width="70" height="80">
	<br><font size='2'>
        <?php echo $rw['name'] ?>
        <?php echo $rw['edition'] ?> <br/>
        by <?php echo $rw['author'] ?><br/>
       [Reserve me]</font>
        </a><br/>
        <br>
	</td>
 <?php $i++; } }?>
  </tr>
</table>
<?php  } ?>