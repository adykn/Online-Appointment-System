 

               <?php  if(isset($_GET['area']) && $_GET['area']=='CatDel' ){ 
                $sql="delete from book where category_id='".$_POST['cid']."' ";
                $result=mysql_query($sql) or die (mysql_error());
                
                $sql="delete from category where category_id='".$_POST['cid']."' ";
                $result=mysql_query($sql) or die (mysql_error());
                
                if($result){echo "<font color=green>Data Deleted</font>";}else{echo "<font color=red>Action failed</font>";}
                
               } ?>
    <h3>Category Deletion</h3><center> select category to delete.
<form enctype="multipart/form-data" name="form1" Method="POST" action="<?php echo $Link?>&Del=true&area=CatDel" onsubmit="return confirm('Do you really want to submit the form?');">
<table width="50%" border="0">
      <tr>
        <td width="25%">Category</td>
        <td width="75%">
             <select name="cid" >
             <option selected>Select an Category</option>
             <?php $queryal=mysql_query("SELECT * FROM `Category` ") or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){?>
             <option value="<?php echo $ro['category_id']?>"><?php echo $ro['name']?></option>
             <?php }?>
             </select>	                  
        </td>
      </tr>  
      <tr> 
        <td width="25%"></td>
        <td width="75%"><input type="Submit" value="Delete"  ></td>
      </tr>
</table>
 </form></center>
<?php //****************************************************************************************************?>
    <hr>
    <h3>Book Deletion Area</h3>
                <?php  if(isset($_GET['area']) && $_GET['area']=='bookDel' ){ 
                    
                    
                if ($_GET['Q']=='a'){
                $sql="delete from book where book_id='".$_GET['cid']."' ";
                $result=mysql_query($sql) or die (mysql_error());
                }else if ($_GET['Q']=='1'){
                    $qty=getValue('qty','book'," book_id='".$_GET['cid']."'");
                    $rm=getValue('remaining','book'," book_id='".$_GET['cid']."'");
                    $qty= $qty-1;
                    $rm= $rm-1;
                    if ($qty<=0 && $rm<=0){
                        $sql="delete from book where book_id='".$_GET['cid']."' ";
                    }else{
                    $sl="update book set qty=". $qty .",remaining=".$rm." where book_id='".$_GET['cid']. "' " ; 
                    }
                    $result=mysql_query($sl) or die (mysql_error());
                }
                if($result){echo "<font color=green>Data Deleted</font>";}else{echo "<font color=red>Action failed</font>";}
                
               } ?>
    
<script type="text/javascript">
function SearchResult()
		{
		var a;
		var b;
		a=document.form2.SR.value;	
		b='<?php echo $Link.'&Del=true';?>';	
		document.location = b + "&id=" + a ;
		}

 
</script>
<center>
        <form name="form2">
 	    <select name="SR" id="program" onChange="SearchResult()">
             <option selected>Select an Category</option>
             <?php $queryal=mysql_query("SELECT * FROM `Category` ") or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){?>
             <option value="<?php echo $ro['category_id']?>"><?php echo $ro['name']?></option>
             <?php }?>
             </select> </form>	</center>
       <?php if (isset($_GET['id'])){
      $cat= getValue('name','Category'," category_id='".$_GET['id']."'");
       echo $cat;?>
 <a href="<?php echo $Link; ?>&Edit=true&area=catdata&cid=<?php echo $_GET['id'];?>" class="navac">
        <img src="pages/image/Edit.png"></a>
       <?php }else{echo "All books";}?>
	<hr>
    <table  border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr> 
<?php 
        $i=0; 
        if (!isset($_GET['id'])){
            $Wher="";
        }else{
            $Wher=" WHERE category_id='".$_GET['id']."'";
        }
         
	$queryal=mysql_query("SELECT * FROM `".$StbNam."` ".$Wher." ORDER BY book_id") or die ("query failed here");
	while($rw=mysql_fetch_assoc($queryal))
	{
	if($i%$ItemPerRow==0)
	{
	echo "</tr><tr>";
	}?>
        <td align="center" width="25%"   >
	
	<img src="<?php echo $rw['pic'];?>" width="70" height="80">
	<br><font size='2'>
        <?php echo $rw['name'] ?>
        <?php echo $rw['edition'] ?> <br/>
        by <?php echo $rw['author'] ?><br/>
        <?php echo $rw['qty'] ?>/<?php echo $rw['remaining'] ?></font><br>
        [<a href="<?php echo $Link; ?>&Del=true&Q=1&area=bookDel&cid=<?php echo $rw['book_id']?>" class="navac" onclick="return confirm('Do you really want to submit the form?');">-1</a> |
         <a href="<?php echo $Link; ?>&Del=true&Q=a&area=bookDel&cid=<?php echo $rw['book_id']?>" class="navac" onclick="return confirm('Do you really want to submit the form?');">All</a> |
         <a href="<?php echo $Link; ?>&Edit=true&area=bookup&cid=<?php echo $rw['category_id']?>&bid=<?php echo $rw['book_id']?>" class="navac">
        <img src="pages/image/Edit.png"></a> ]
        <br/>
	<br/>
	</td>
        <?php $i++; } ?>
  </tr>
</table>