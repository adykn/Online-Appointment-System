<?php
$Link="?goto=BooksArchive"; 
$Link1="BookArchive.php"; 
$HeaderTag="Book Archive"; 
$ItemPerRow=4;
$MtbNam="category";
$StbNam="book";

                     


//****************************************************************************************************?>
 
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
   <a href='?goto=BooksArchive&Del=true' class="navac"><img src='pages/image/del.png'></a> 
   <a href='?goto=BooksArchive&Edit=true' class="navac"><img src='pages/image/new.png'></a> 
   <a href='?goto=BooksArchive'><img src='pages/image/Updir.png'></a>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>

<?php //****************************************************************************************************?>
<?php if (!isset($_GET['Edit']) && !isset($_GET['Del']) && !isset($_GET['Update']) && !isset($_GET['Detail'])){?>  
<?php //****************************************************************************************************?>
<?php include 'BooksPart1.php';?>
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Edit']) && $_GET['Edit']=='true' ){ ?>
<?php //****************************************************************************************************?>
<?php include 'BooksPart2.php';?>       
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Del']) && $_GET['Del']=='true' ){ ?>
<?php //****************************************************************************************************?>
<?php include 'BooksPart3.php';?>
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Detail']) && $_GET['Detail']=='true' ){ ?>
<?php //****************************************************************************************************?>
<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php 
	$i=0; 
	$queryal=mysql_query("SELECT * FROM `issue` WHERE book_id='".$_GET['bid']."' and issue_status='Issued' ORDER BY book_id") or die ("query failed here");
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
	<a href="#" style="text-decoration: none" class="navac">
	<img src="<?php echo getValue('pic','student'," student_id='".$rw['student_id']."'");?>" width="70" height="80">
	<br><font size='2'>
        <?php echo getValue('name','student'," student_id='".$rw['student_id']."'"); ?>
        <?php echo getValue('class','student'," student_id='".$rw['student_id']."'"); ?> <br/>
        issued on <?php echo $rw['issue_date'] ?> <br> for <?php echo $rw['issue_limit'] ?> days</font>
        </a><br/>
        <br>
	</td>
 <?php $i++; } }?>
  </tr>
</table>
<?php  } ?>