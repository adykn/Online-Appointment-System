<?php
$Link="?goto=IssueControl";
 
?>
<script type="text/javascript">
function SearchResult()
		{
		var a;
		var b;
                
		a=document.form2.SR.value;	
                
		b='<?php echo $Link;?>';	
		document.location = b + "&cid=" + a ;
		}

 
</script>
<h3>Book Reservation</h3><hr><center>
<form enctype="multipart/form-data" name="form2" Method="POST" action="<?php echo $Link?>&Edit=true&area=bookAdd">
 
             <select name="SR" id="program" onChange="SearchResult()">
             <option selected>Select an Category</option>
             <?php $queryal=mysql_query("SELECT * FROM `Category` ") or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){
                 if (!isset($_GET['cid'])){
                     $select="Selected";
                 }else{
                     $select=" ";
                 }
                 ?>
             
             <option value="<?php echo $ro['category_id']?>" <?php echo $select?>><?php echo $ro['name']?></option>
             <?php }?>
             </select>
    <hr><h3>
    <?php if (isset($_GET['cid'])){
      $cat= getValue('name','Category'," category_id='".$_GET['cid']."'");
    echo $cat;}?></h3>
    
    
             <?php if(isset($_GET['cid'])){
                 $condition=" WHERE category_id='".$_GET['cid']."'";
             }else{
                 $condition=" ";
             } ?>
             <select name="bid" >
             <option selected>Select an Book</option>
             <?php $queryal=mysql_query("SELECT * FROM `book` " . $condition ) or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){?>
             <option value="<?php echo $ro['book_id']?>"  >
             <?php echo $ro['name'] ?>-<?php echo $ro['edition'] ?> by <?php echo $ro['author'] ?>
             </option>
             <?php }?>
             </select><br>
             <br>
    <input type="submit" >
</form>