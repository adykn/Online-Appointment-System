<?php 
$loc="?goto=Searchbooks";
$HeaderTag="Search for Books"; 
$ItemPerRow=4;
include_once 'functions.php';
 if(isset($_GET['R']) && $_GET['R']==true){
 if($_SESSION['RefNo']!=0){    
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
 }else{echo "<center><font color=red>Sorry Admin</font></center>";}
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
<form method="POST" action="<?php echo $loc?>">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="47%">&nbsp;</td>
		<td>
	
		 
			
		&nbsp;</td>
		<td width="63">&nbsp;</td>
		<td width="18%">&nbsp;</td>
	</tr>
	<tr>
		<td width="47%">&nbsp;</td>
		<td>
	
		 
			
		<p><input type="text" name="T1" size="20"></td>
		<td width="63">
 <input type="submit" value="Search" name="B1"></td>
		<td width="100%">&nbsp;</td>
	</tr>
	</table>
 &nbsp;&nbsp;</p>
		</form>
<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr style="background: url(images/bg2.gif) ">  <th align="center" width="5%">S.N</th>	
        <th align="center" width="15%">Category</th>
        <th align="center" width="30%">Title</th>
        <th align="center" width="5%">Edt</th>
        <th align="center" width="25%">Written by</th>
        <th align="center" width="5%">Qty</th>
        <th align="center" width="20%"> </th>
</tr><tr>       
<?php 
        if(isset($_POST['T1'])){$cond=" Where name like '%".$_POST['T1']."%' or edition like '%".$_POST['T1']."%' or author like '%".$_POST['T1']."%'  ";}else{$cond="";}
	$i=0; 
	$queryal=mysql_query("SELECT * FROM `book`  " .$cond) or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
if ($NRow==0){
        echo "<tr><th colspan='7'> No records found </th>";
 }else{
        while($rw=mysql_fetch_assoc($queryal))
	{
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
        <td align="center" width="5%"> <?php echo $i+1;?></td>	
        <td align="center" width="15%"><?php echo getValue('name','category'," category_id='".$rw['category_id']."'");?></td>
        <td align="center" width="30%"><?php echo $rw['name'] ?></td>
        <td align="center" width="5%"><?php echo $rw['edition'] ?></td>
        <td align="center" width="25%"><?php echo $rw['author'] ?></td>
        <td align="center" width="5%"><?php $x=getCount('issue',"book_id='".$rw['book_id']."' and issue_status='Issued'");$x=getValue('qty','book'," book_id='".$rw['book_id']."'")-$x;echo $x;?></td>
        <td align="center" width="20%">
            <a href="<?php echo $loc; ?>&R=true&bid=<?php echo $rw['book_id']?>" style="text-decoration: none" class="navac">
            <?php echo "reserve Me"; ?></a></td>
         
 <?php $i++; } }?>
  </tr>
</table>