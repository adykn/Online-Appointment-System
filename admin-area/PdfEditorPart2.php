  <center> 
       <?php  
               
               if(isset($_GET['area']) && $_GET['area']=='catdata' ){ 
                  
                   $s="Update";
                   $i=$_GET['cid'];                           
                   $vis1="true";
                   $t=getValue('Title','PdfCat'," Id='".$_GET['cid']."'");
                   $d=getValue('Descr','PdfCat'," Id='".$_GET['cid']."'");
               }else{
                   
                   $s="Add";
                   $vis1="false";
                   $t="";$i="";$d="";
               }
                                
               if(isset($_GET['area']) && $_GET['area']=='CatAdd' ){ 
               if($_POST['submit1']=='Update'){
                   if ($_POST['chk']=='true'){
                        $sql="update PdfCat set Title='".$_POST['t']."',Descr='".$_POST['d']."' where Id='".$_POST['i']."'";
                   }else{
                        $name=$_FILES['p']['name'];
                        $tmpname=$_FILES['p']['tmp_name'];
                        $org="pages/image/".$name;
                        move_uploaded_file($tmpname,$org);
                        $sql="update PdfCat set Title='".$_POST['t']."',Descr='".$_POST['d']."',pic='".$org."' where Id='".$_POST['i']."'";
                   }
               }else if($_POST['submit1']=='Add'){    
                $name=$_FILES['p']['name'];
                $tmpname=$_FILES['p']['tmp_name'];
                $org="pages/image/".$name;
                move_uploaded_file($tmpname,$org);
                $sql="insert into PdfCat (Title,Descr,Pic) values ('".$_POST['t']."','".$_POST['d']."','".$org."')";
               }
                $result=mysql_query($sql) or die (mysql_error());
                if($result){echo "<font color=green>Action Successful</font>";}else{echo "<font color=red>Action failed</font>";}
  
               } ?>
 
<form enctype="multipart/form-data" name="form1" Method="POST" action="<?php echo $Link?>&Edit=true&area=CatAdd">
<table width="70%" border="0">
    <tr>
        <td colspan="2" bgcolor="#f7f7f7"> <b>Category Insertion for PDF</b></td>
        
      </tr>
      <tr>
        <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</td>
        <td width="75%">
            <input type="text" name="t" value="<?php echo @$t?>">
            <input type="hidden" name="i" value="<?php echo @$i?>">
        </td>
      </tr>
       <tr>
        <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description</td>
        <td width="75%">
            <textarea name="d"><?php echo @$d?></textarea> 
            
        </td>
      </tr>
      <tr> 
        <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pic</td>
        <td width="75%"><input type="file" name="p" />
        <?php if (@$vis1=="true"){?>
        <input type="checkbox" name="chk" value="true" checked> 
        <?php }?>
        </td>
      </tr>
      <tr> 
        <td width="25%"></td>
        <td width="75%"><input type="Submit"  value="<?php echo @$s;?>" name="submit1"></td>
      </tr>
</table>
 </form>
<?php //****************************************************************************************************?>
                    <?php  
                    if (isset($_GET['area']) && $_GET['area']=='Pdfup'){
                        $t=getValue('Title','PdfList'," Id='".$_GET['id']."'");
                        $s2="Update";
                        $i=$_GET['id'];
                         $vis2="true";
                    }else{
                        $t="";
                        $i="";
                        $s2="Add";
                        $vis2="false";
                    }
                    
                    if(isset($_GET['area']) && $_GET['area']=='bookAdd' ){ 
                        if($_POST['submit2']=='Update'){
                            if ($_POST['chk2']=='true'){
                                $sql="update PdfList set CatId='".$_POST['cid']."',
                                    Title='".$_POST['t']."'
                                    where Id='".$_POST['i']."'";
                            }else{
                                $name=$_FILES['p']['name'];
                                $tmpname=$_FILES['p']['tmp_name'];
                                $org="pages/pdf/".$name;
                                move_uploaded_file($tmpname,$org);

                        $sql="update PdfList set CatId='".$_POST['cid']."',
                            Title='".$_POST['t']."',
                            Link='".$_POST['qty']."',
                            Status='Deactive',
                            Pic='".$org."' where Id='".$_POST['i']."'";
                                }
                        }else if($_POST['submit2']=='Add'){    
                        
                          
                        $name=$_FILES['f']['name'];
                        $tmpname1=$_FILES['f']['tmp_name'];
                        $pdf="pages/pdf/".$name;
                        move_uploaded_file($tmpname1,$pdf);
                        
                        $name2=$_FILES['p']['name'];
                        $tmpname=$_FILES['p']['tmp_name'];
                        $pic="pages/image/".$name2;
                        move_uploaded_file($tmpname,$pic);
                        
                       
                        $sql="insert into PdfList
                        (Title,Link,Pic,Status,CatId) values
                        ( 
                        '".$_POST['t']."',
                        '".$pdf."',
                        '".$pic."',
                        'Deactive',
                        '".$_POST['cid']."')";  
                        }
                        @$result=mysql_query($sql) or die (mysql_error());
                        if($result){echo "<font color=green>Action Sucessful</font>";}else{echo "<font color=red>Action failed</font>";}
                          
                    }?>
<form enctype="multipart/form-data" name="form1" Method="POST" action="<?php echo $Link?>&Edit=true&area=bookAdd">
<table width="70%" border="0">
    <tr>
        <td colspan="2" bgcolor="#f7f7f7"> <b>PDF Insertion</b></td>
        
      </tr>
      <tr>
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</td>
        <td width="70%">
             <select name="cid" >
             <option selected>Select an Category</option>
             <?php $queryal=mysql_query("SELECT * FROM `pdfcat` ") or die ("query failed here");
             while($ro=mysql_fetch_assoc($queryal)){
            if($ro['Id']==$_GET['cid']){$selected="selected";}else{$selected="";}    
                 ?>
             <option value="<?php echo $ro['Id']?>" <?php echo $selected?> ><?php echo $ro['Title']?></option>
             <?php }?>
             </select>	            
        </td>
      </tr>

      <tr>
          <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title</td>
        <td width="70%"><input type="text" name="t" id="name" value="<?php echo @$t?>"/>
        <input type="hidden" name="i" value="<?php echo $i?>">
        </td>
      </tr>
       
      <tr> 
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pdf</td>
        <td width="70%"><input type="file" name="f"   />
        <?php if (@$vis2=="true"){?>
        <input type="checkbox" name="chk2" value="true" checked> 
        <?php }?>
        </td>
      </tr>
       <tr> 
        <td width="30%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pic</td>
        <td width="70%"><input type="file" name="p"   />
        <?php if (@$vis2=="true"){?>
        <input type="checkbox" name="chk3" value="true" checked> 
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