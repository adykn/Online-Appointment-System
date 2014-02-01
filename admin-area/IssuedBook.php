<?php
$Link="?goto=IssuedBook"; 
 
$HeaderTag="Issued Book"; 
$ItemPerRow=4;
$MtbNam="issue";
 
 
//****************************************************************************************************?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
     
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
	$queryal=mysql_query("SELECT * FROM `".$MtbNam."` where student_id='".$_SESSION['RefNo']."' and issue_status='Issued' ORDER BY issue_id") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr><center> No Books issued <br>Click here to reserve books to be issued <br><a href='?goto=BookReservation'><img src='images/books.png'></a></center>";
 }else{

        while($row=mysql_fetch_assoc($queryal))
	{
	 
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
                  
        <td align="center" width="25%"><br>
	<img src="<?php echo getValue('pic','book'," book_id='".$row['book_id']."'");  ?>" width="65" height="75"  border="0" ><br>
	 <br/><font size="2">
         <?php echo getValue('name','book'," book_id='".$row['book_id']."'");  ?> - <?php echo getValue('edition','book'," book_id='".$row['book_id']."'");  ?>
         <br><?php echo getValue('author','book'," book_id='".$row['book_id']."'");  ?> <br>
         <i>Issued on :<br><?php echo $row['issue_date'];?></i><br>
	</font>
        </td>
 <?php $i++; }} ?>
  </tr>
</table>
<?php  } ?>
<?php //****************************************************************************************************?>