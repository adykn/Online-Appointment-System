<?php
if (isset($_GET['Modify']) && @$_GET['Modify'] == "True"){
   
    
     if ( $_POST['sub1']=='Save'){
          $sql="update user SET name='".$_POST['n']."',Email='".$_POST['e']."',
              f_name='".$_POST['f']."',class='".$_POST['c']."',Cell='".$_POST['p']."',Address='".$_POST['a']."',Gender='".$_POST['g']."' 
                  where id='".$_POST['s']."' ";
     }else{
    $name=$_FILES['pic2']['name'];
    $path=$_FILES['pic2']['tmp_name'];
    $org="pages/image/".$name;
    move_uploaded_file($path,$org);
    $sql="update user SET pic='".$org."' where id='".$_POST['s']."' ";
             echo $org . " - ". $_POST['s']; die();
    }
 mysql_query($sql) or die(mysql_error());
}
?>  
<h2>User Profile</h2> 
<center>  
    <form action="?position=here&goto=Profile&Modify=True" method="POST" name="form1">
    <table width="80%">
<?php
if (!isset($_GET['Pid'])){$id=$_SESSION['RefNo'];}else{$id=$_GET['Pid'];}
$query=mysql_query("select * from user where id='".$id."'") or die(mysql_error());
 
while( $r=mysql_fetch_array($query)){
    if (isset($_GET['Edit']) && @$_GET['Edit'] == "True"){
    ?>
 
     <tr><td colspan="2" Align="center"> <img src="<?php echo $r['pic']; ?>" width="200" height="200"/> </td></tr>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td width="40%"><b> </b></td><td width="60%">
                 
                <input type="hidden" value="<?php echo $r['id']?>" name="s">
                 
            </td></tr>
        <tr><td width="40%"><b>Name</b></td><td width="60%"><input type="text" value="<?php echo $r['name']?>" name="n"></td></tr>
        <tr><td><b>Father Name</b></td><td><input type="text" value="<?php echo $r['f_name']?>" name="f"></td></tr>
        <tr>
            <td width="40%"><b>Gender</b></td>
        <?php if ($r['Gender']=='Male'){$v1="checked";$v2="";$v3="";}else if($r['Gender']=='Female'){$v3="checked";$v2="";$v1="";}else{$v2="checked";$v3="";$v1="";}?> 
        <td width="60%"><input type="radio" name="g" value="Male" <?php echo $v1?>  /> Male
                    <input type="radio" name="g" value="Other" <?php echo $v2?> /> Other
                    <input type="radio" name="g" value="Female" <?php echo $v3?> /> Female
        </td>
        </tr>
        
        <tr><td><b>Education/Department</b></td><td><input type="text" value="<?php echo $r['class']?>" name="c"></td></tr>
        <tr><td><b>Login Id</b></td><td><?php echo $r['LoginId']?></td></tr>
        <tr><td><b>Email</b></td><td><input type="text" value="<?php echo $r['Email']?>" name="e"></td></tr>
        <tr><td><b>Date of Joining</b></td><td><?php echo $r['_Ddate']?></td></tr>
        <tr><td><b>Cell #</b></td><td><input type="text" value="<?php echo $r['Cell']?>" name="p"></td></tr>
        <tr><td><b>Address</b></td><td><textarea name="a"><?php echo $r['Address']?></textarea></td></tr>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td colspan="2" Align="center"> <input type="submit" value="Save" name="sub1"> </td></tr>
    
      
        
    
    <?php }else{ ?>
        
          <tr><td colspan="2" Align="center"> <a href="?goto=ProfilePicChange"><img src="<?php echo $r['pic']; ?>  " width="200" height="200"/></a> </td></tr>
          <?php if (isset($_GET['Pic'])){?> 
          <tr ><td width="40%" colspan="2" align="center"><b>Pic</b> 
                <input type="file" name="pic2" id="pic2" />
                <input type="hidden" value="<?php echo $r['id']?>" name="s">
                <input type="submit" value="Pic Change" name="sub1">
          </td></tr><?php }?>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td width="40%"><b>Name</b></td><td width="60%"><?php echo $r['name']?></td></tr>
        <tr><td><b>Father Name</b></td><td><?php echo $r['f_name']?></td></tr>
        <tr><td><b>Gender</b></td><td><?php echo $r['Gender']?></td></tr>
        
        <tr><td><b>Login Id</b></td><td><?php echo $r['LoginId']?></td></tr>
        <tr><td><b>Email</b></td><td><?php echo $r['Email']?></td></tr>
        <tr><td><b>Date of Joining</b></td><td><?php echo $r['_Ddate']?></td></tr>
        <tr><td><b>Cell #</b></td><td><?php echo $r['Cell']?></td></tr>
        <tr><td><b>Address</b></td><td><?php echo $r['Address']?></td></tr>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td colspan="2" Align="center"> <img src="pages/image/spacer.gif" > </td></tr>
        <tr><td colspan="2" Align="center"> <a href="?goto=Profile&Edit=True&<?php if (isset($_GET['Pid'])){echo"Pid=".$_GET['Pid'];}?>"><img src="pages/image/Edit.png"></a> </td></tr>
       
    <?php
       }
       } 
    ?>
    </table ></form>
    <br><br><br><br><br>
    </center>