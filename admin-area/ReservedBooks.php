<?php
$Link="?goto=ReservedBooks"; 
 
$HeaderTag="Reserved Books"; 
$ItemPerRow=4;
$MtbNam="reserved";
 

if(isset($_GET['R']) && $_GET['R']==true){
   
    if (IfExists('reserved',"student_id='".$_SESSION['RefNo']."' and book_id='".$_GET['bid']."'")){
     $sql="Delete from reserved where student_id='".$_SESSION['RefNo']."' and book_id='".$_GET['bid']."'";
     $result=mysql_query($sql) or die (mysql_error());
                if($result){
                echo "<center><font color=green>Book Unreserved</font></center>";}
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
	$queryal=mysql_query("SELECT * FROM `".$MtbNam."` where student_id='".$_SESSION['RefNo']."' ORDER BY reserved_id") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr><center> No Books Reserved <br>Click here to reserve books <br><a href='?goto=BookReservation'><img src='images/books.png'></a></center>";
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
         <i>Reserved on :<br><?php echo $row['date'];?></i><br>
        
         <a href="<?php echo $Link; ?>&R=true&bid=<?php echo $row['book_id']?>&sid=<?php echo $row['student_id']?>" style="text-decoration: none" class="navac">
         Un-Reserve
         </a>
	</font>
        </td>
 <?php $i++; }} ?>
  </tr>
</table>
<?php  } ?>
<?php //****************************************************************************************************?>