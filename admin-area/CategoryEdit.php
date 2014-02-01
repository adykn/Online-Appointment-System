 <?php 
 include "dbase.php";
 include "functions.php";
 $t="category";
 //print_r($_REQUEST);

 if (!isset($_GET['id'])){
 	$btn="Save";
	$id=0;
 	$Name="";
 	$Desc="";
 }else{
 	$btn="Update";
 	$id=$_GET['id'];
 	
 	$q="Select * from " . $t . " where Id=" .$id . "";
 	$result = mysql_query($q) or die(mysql_error());
   	$r = mysql_fetch_assoc($result);
 	$Name=$r['Name'];
 	$Desc=$r['Descr'];
 
 }
 $Msg="";

 if(isset($_POST['Submit']) && isset($_GET['here'])){

 
 	if ($_POST['Submit']=="Save"){
		$t="category";
		$v="'".$_POST['Name']."','".$_POST['Details']."'";
		 
		$f=" Name,Descr ";
		$Msg=Insert($t,$f,$v);
	

	}else if ($_POST['Submit']=="Update"){
	 	$t="category";
		$v=" Name='".$_POST['Name']."', Descr='".$_POST['Details']."' ";
		$c=" Id=". $_POST['Id'] . " ";
		$Msg=Update($t,$v,$c);
	}
 }
 
 ?>

<form method="POST" action="<?php if (isset($_GET['goto'])){echo "?goto=".$_GET['goto']."&";}else{echo "?";}?>here=Y">
	 
 <input type="hidden" name="Id" value="<?php echo $id;?>">
	 
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="100%" colspan="3">
		<p align="center"><font size="4" color="#FF0000"><?php $Msg?></font></td>
	</tr>
	<tr>
		<td width="100%" background="images/33.png" height="26" colspan="3">&nbsp;
		<b>Add Category For Package.</b></td>
	</tr>
	<tr>
		<td width="98">&nbsp;</td>
		<td width="97">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="98">&nbsp;</td>
		<td width="97"><b>Name</b></td>
		<td><input type="text" name="Name" size="20" value="<?php echo $Name?>" tabindex="1"></td>
	</tr>
	<tr>
		<td width="98">&nbsp;</td>
		<td width="97"><b>Details</b></td>
		<td rowspan="2" valign="top">
		<textarea rows="5" name="Details" cols="40" tabindex="7"><?php echo $Desc?></textarea></td>
	</tr>
	<tr>
		<td width="98" height="71">&nbsp;</td>
		<td width="97" height="71">&nbsp;</td>
		</tr>
	<tr>
		<td width="98">&nbsp;</td>
		<td width="97">&nbsp;</td>
		<td><input type="submit" value="<?php echo $btn;?>" name="Submit" tabindex="8">
		<input type="reset" value="Reset" name="B2" tabindex="9"></td>
	</tr>
</table>
</form>


<?php

	 

	if ( @ $_GET['action'] == "delete") {
	
		$id = $_GET['id'];
		
		$q= "Delete from " . $t . "  Where Id='" . $id . "'";
		
		$R=mysql_query($q) or die(mysql_error());
		
	}
	
	$frq = mysql_query("Select * from " . $t ) or die(mysql_error());
?>
 
 
        
      
          <table width="600" border="0" cellpadding="3" bordercolor="#ABABAB" cellspacing="0">
            <tr>
              <td width="37" align="center" background="images/33.png"><b>S.N</b></td>
              
              <td background="images/33.png"><b>Category Name </b> </td>
              
              <td align="right" width="123" background="images/33.png"> <b>Action&nbsp;&nbsp;&nbsp; </b> </td>
            </tr>
            <?php $i=1; while ($row = mysql_fetch_array($frq) ) { ?>
            <tr>
              <td width="37" align="center" bgcolor="#C0C0C0"> <?php echo $i;$i+=1;?></td>
              
              <td> <?php echo $row['Name']; ?></td>
              
              <td align="right" width="123"> 
              	<a href="<?php if (isset($_GET['goto'])){echo "?goto=".$_GET['goto'];}else{echo "?";}?>&id=<?php echo $row['Id'];?>"> Update </a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php if (isset($_GET['goto'])){echo "?goto=".$_GET['goto'];}else{echo "?";}?>&id=<?php echo $row['Id'];?>&action=delete"> Delete </a>
              </td>
            </tr>
            <?php } ?>
             <tr>
              <td bgcolor="#C0C0C0" width="37" align="center"><b>&nbsp;</b></td>
              
              <td bgcolor="#C0C0C0">&nbsp;</td>
              
              <td align="right" width="123" bgcolor="#C0C0C0"> &nbsp;</td>
            </tr>

          </table>
			
        </div>
