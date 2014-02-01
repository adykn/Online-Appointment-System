  <center> 
      

               <?php  
               
               if(isset($_GET['area']) && $_GET['area']=='catdata' ){ 
                   $n1=getValue('name','Category'," category_id='".$_GET['cid']."'");;
                   $s1="Update";
                   $i1=$_GET['cid'];                           
                   $vis1="true";
               }else{
                   $n1="";
                   $s1="Add";
                   $i1="";
                   $vis1="false";
               }
                                
               if(isset($_GET['area']) && $_GET['area']=='CatAdd' ){ 
               if($_POST['submit1']=='Update'){
                   if ($_POST['chk']=='true'){
                        $sql="update category set name='".$_POST['name']."' where category_id='".$_POST['cid']."'";
                   }else{
                        $name=$_FILES['pic']['name'];
                        $tmpname=$_FILES['pic']['tmp_name'];
                        $org="pages/image/".$name;
                        move_uploaded_file($tmpname,$org);
                        $sql="update category set name='".$_POST['name']."',pic='".$org."' where category_id='".$_POST['cid']."'";
                   }
               }else if($_POST['submit1']=='Add'){    
               $name=$_FILES['pic']['name'];
                $tmpname=$_FILES['pic']['tmp_name'];
                $org="pages/image/".$name;
                move_uploaded_file($tmpname,$org);
                $sql="insert into category (name,pic) values ('".$_POST['name']."','".$org."')";
               }
                $result=mysql_query($sql) or die (mysql_error());
                if($result){echo "<font color=green>Action Successful</font>";}else{echo "<font color=red>Action failed</font>";}
  
               } ?>

<form enctype="multipart/form-data" name="form1" Method="POST" action="<?php echo $Link?>&Edit=true&area=CatAdd">
<table width="70%" border="0">
    <tr>
        <td colspan="2" bgcolor="#f7f7f7"> <b>Category Insertion</b></td>
        
      </tr>
      <tr>
        <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</td>
        <td width="75%">
            <input type="text" name="name" value="<?php echo $n1?>">
            <input type="hidden" name="cid" value="<?php echo $i1?>">
        </td>
      </tr> <tr> 
        <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pic</td>
        <td width="75%"><input type="file" name="pic" id="pic" />
        <?php if ($vis1=="true"){?>
        <input type="checkbox" name="chk" value="true" checked> 
        <?php }?>
        </td>
      </tr>
      <tr> 
        <td width="25%"></td>
        <td width="75%"><input type="Submit"  value="<?php echo $s1;?>" name="submit1"></td>
      </tr>
</table>
 </form>
<?php //****************************************************************************************************?>
                    <?php  
                    if (isset($_GET['area']) && $_GET['area']=='bookup'){
                        $n2=getValue('name','book'," book_id='".$_GET['bid']."'");
                        $e2=getValue('edition','book'," book_id='".$_GET['bid']."'");
                        $a2=getValue('author','book'," book_id='".$_GET['bid']."'");                        
                        $q2=getValue('qty','book'," book_id='".$_GET['bid']."'");
                        $s2="Update";
                        $b2=$_GET['bid'];
                        $vis="true";
                    }else{
                        $b2="";
                        $n2="";
                        $e2="";
                        $a2="";
                        $q2="";
                        $s2="Add";
                        $vis="false";
                    }
                    
                    if(isset($_GET['area']) && $_GET['area']=='bookAdd' ){ 
                        if($_POST['submit2']=='Update'){
                            if ($_POST['chk2']=='true'){
                                $sql="update book set category_id='".$_POST['cid']."',
                                    name='".$_POST['name']."',
                                    author='".$_POST['author']."',
                                    edition='".$_POST['edition']."',
                                    qty= '".$_POST['qty']."',
                                    remaining='".$_POST['qty']."'
                                    where book_id='".$_POST['bid']."'";
                            }else{
                                $name=$_FILES['pic']['name'];
                                $tmpname=$_FILES['pic']['tmp_name'];
                                $org="pages/image/".$name;
                                move_uploaded_file($tmpname,$org);

                        $sql="update book set category_id='".$_POST['cid']."',
                            name='".$_POST['name']."',
                            author='".$_POST['author']."',
                            edition='".$_POST['edition']."',
                            qty= '".$_POST['qty']."',
                            remaining='".$_POST['qty']."',
                            pic='".$org."' where book_id='".$_POST['bid']."'";
                                }
                        }else if($_POST['submit1']=='Add'){    
                        $name=$_FILES['pic']['name'];
                        $tmpname=$_FILES['pic']['tmp_name'];
                        $org="pages/image/".$name;
                        move_uploaded_file($tmpname,$org);

                        $sql="insert into book
                        (category_id,name,author,edition,qty,remaining,pic) values
                        ( 
                        '".$_POST['cid']."',
                        '".$_POST['name']."',
                        '".$_POST['author']."',
                        '".$_POST['edition']."',
                        '".$_POST['qty']."',
                        '".$_POST['qty']."',
                        '".$org."')";  
                        }
                        
                        $result=mysql_query($sql) or die (mysql_error());
                        if($result){echo "<font color=green>Action Sucessful</font>";}else{echo "<font color=red>Action failed</font>";}
  
                    }?>
<form enctype="multipart/form-data" name="form1" Method="POST" action="<?php echo $Link?>&Edit=true&area=bookAdd">
<table width="70%" border="0">
    <tr>
        <td colspan="2" bgcolor="#f7f7f7"> <b>Book Insertion</b></td>
        
      </tr>
      <tr>
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</td>
        <td width="70%">
             <select name="cid" >
             <option selected>Select an Category</option>
             <?php $queryal=mysql_query("SELECT * FROM `Category` ") or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){
            if($ro['category_id']==$_GET['cid']){$selected="selected";}else{$selected="";}    
                 ?>
             <option value="<?php echo $ro['category_id']?>" <?php echo $selected?> ><?php echo $ro['name']?></option>
             <?php }?>
             </select>	            
        </td>
      </tr>

      <tr>
          <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book Title</td>
        <td width="70%"><input type="text" name="name" id="name" value="<?php echo $n2?>"/>
        <input type="hidden" name="bid" value="<?php echo $b2?>">
        </td>
      </tr>
      <tr>
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edition</td>
        <td width="70%"><input type="text" name="edition" id="edition" value="<?php echo $e2?>"/> </td>
      </tr>
      <tr>
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Auther</td>
        <td width="70%"><input type="text" name="author" id="author" value="<?php echo $a2?>"/></td>
      </tr>
      <tr>
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty</td>
        <td width="70%"><input type="text" name="qty" id="qty" value="<?php echo $q2?>"/> </td>
      </tr>
      <tr> 
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pic</td>
        <td width="70%"><input type="file" name="pic" id="pic" />
        <?php if ($vis=="true"){?>
        <input type="checkbox" name="chk2" value="true" checked> 
        <?php }?>
        </td>
      </tr>
      <tr> 
        <td width="30%"></td>
        <td width="70%"><input type="Submit" value="<?php echo $s2?>" name="submit2"></td>
      </tr>
</table>
 </form>

</center>