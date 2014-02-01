<?php 
    if(isset($_GET['T'])){
        if($_GET['T']=="D"){
            if ($_GET['I']!=1){
            $sql2="Delete from adi where Id='".$_GET['I']."'";
            $result=mysql_query($sql2) or die (mysql_error());
            if($result){
            $sql="Delete from student where student_id='".$_GET['R']."'";
            }
            }
        }else if($_GET['T']=="R"){
             if ($_GET['I']!=1){
            if($_GET['s']=="n"){$sts="Reg";}else{$sts="New";}
            $sql="update adi set Status='".$sts."' where Id='".$_GET['I']."'";
            }
        }
         if ($_GET['I']!=1){
        $result=mysql_query($sql) or die (mysql_error());
        if($result){echo "<font color=green>Action Successful</font>";}else{echo "<font color=red>Action failed</font>";}
         }
    }
?>	


		<b>New Member</b><hr>
<table border="0" width="620" cellspacing="0" cellpadding="0">
	<tr>
		<td background="TrBg.png" height="28" width="5%">
		<p align="center"><b><font color="#FFFFFF">S.N</font></b></td>
		<td background="TrBg.png"  width="20%"><b>
		<font color="#FFFFFF">User Name</font></b></td>
		<td background="TrBg.png"   width="20%">
                <b><font color="#FFFFFF">Encode Pwd</font></b></td>
		<td background="TrBg.png"   width="15%"><b>
		<font color="#FFFFFF">Level</font></b></td>
		<td background="TrBg.png"   width="15%"><b>
		<font color="#FFFFFF">Encode#</font></b></td>
		<td background="TrBg.png"   width="13%">
		<p align="center"><b><font color="#FFFFFF">&nbsp;</font></b></td>
		<td background="TrBg.png"   width="14%">
		<p align="center"><b><font color="#FFFFFF">Action</font></b></td>
	</tr>
<?php $i=1;$s = mysql_query("Select * from adi where Status='New'") or die(mysql_error());
	$count1 = mysql_num_rows($s);
	if ($count1==0){
	?>
	 <tr><td colspan="7" >
		<p align="center"><font color="#FF0000">No records found</font></td></tr>
  	
 <?php } while ($r= mysql_fetch_array($s) ) { ?>
         
	<tr>
		<td width="37" align="center">&nbsp;<?php echo $i;$i+=1;?></td>
		<td width="71" bgcolor="#F7F7F7">&nbsp;<a href="?goto=Profile&T=R&Pid=<?php echo $r['RefNum'];?>" class="navac"><?php echo $r['User'];?></a></td>
		<td width="147">&nbsp;<?php echo $r['pass'];?></td>
		<td width="107">&nbsp;<?php echo $r['Level'];?></td>
		<td width="106">&nbsp;<?php echo $r['EncNum'];?></td>
		<td>
		<?php 
		//list($dt,$t)=explode(" ", $r['Dt']);
		//list($y, $m, $d)=explode("-", $dt);
                list($y, $m, $d)=explode("-", $r['Dt']);
		echo $d."/".$m."/".$y;?></td>
		<td>
		 <a href="?goto=ListOfUser&T=R&s=n&I=<?php echo $r['Id'];?>&R=<?php echo $r['RefNum'];?>"><img border="0" src="images/Active.PNG" width="18" height="20"></a>&nbsp;
		<a href="?goto=ListOfUser&T=D&I=<?php echo $r['Id'];?>&R=<?php echo $r['RefNum'];?>"><img border="0" src="images/Del.jpg" width="18" height="21"></a> 
               
                </td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="7" background="images/TrBg.png">&nbsp;</td>
	</tr>
</table>
<br>
<b>Registered Member</b><hr>
<table border="0" width="620" cellspacing="0" cellpadding="0">
	<tr>
		<td background="TrBg.png" height="28" width="5%">
		<p align="center"><b><font color="#FFFFFF">S.N</font></b></td>
		<td background="TrBg.png"  width="20%"><b>
		<font color="#FFFFFF">User Name</font></b></td>
		<td background="TrBg.png"   width="20%">
                <b><font color="#FFFFFF">Encode Pwd</font></b></td>
		<td background="TrBg.png"   width="15%"><b>
		<font color="#FFFFFF">Level</font></b></td>
		<td background="TrBg.png"   width="15%"><b>
		<font color="#FFFFFF">Encode#</font></b></td>
		<td background="TrBg.png"   width="13%">
		<p align="center"><b><font color="#FFFFFF">&nbsp;</font></b></td>
		<td background="TrBg.png"   width="14%">
		<p align="center"><b><font color="#FFFFFF">Action</font></b></td>
	</tr>
	 
	<?php $i=1;$s = mysql_query("Select * from adi Where Status!='New'") or die(mysql_error());
	$count1 = mysql_num_rows($s);
	if ($count1==0){
	?>
	 <tr><td colspan="7" >
		<p align="center"><font color="#FF0000">No records found</font></td></tr>
   	<?php } while ($r= mysql_fetch_array($s) ) {  ?>
	 
     
	<tr>
		<td width="37" align="center">&nbsp;<?php echo $i;$i+=1;?></td>
		<td width="71" bgcolor="#F7F7F7">&nbsp;<a href="?goto=Profile&T=R&Pid=<?php echo $r['RefNum'];?>" class="navac"><?php echo $r['User'];?></a></td>
		<td width="147">&nbsp;<?php echo $r['pass'];?></td>
		<td width="107">&nbsp;<?php echo $r['Level'];?></td>
		<td width="106">&nbsp;<?php echo $r['EncNum'];?></td>
		<td>
		<?php 
		//list($dt,$t)=explode(" ", $r['Dt']);
		//list($y, $m, $d)=explode("-", $dt);
                list($y, $m, $d)=explode("-", $r['Dt']);
		echo $d."/".$m."/".$y;?></td>
		<td>
		<p align="center">&nbsp;
                    
                <a href="?goto=ListOfUser&T=R&s=r&I=<?php echo $r['Id'];?>&R=<?php echo $r['RefNum'];?>"><img border="0" src="images/Deactive.PNG" width="18" height="20"></a>&nbsp;
		<a href="?goto=ListOfUser&T=D&I=<?php echo $r['Id'];?>&R=<?php echo $r['RefNum'];?>"><img border="0" src="images/Del.jpg" width="18" height="21"></a> 
                 </td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="7" background="images/TrBg.png">&nbsp;</td>
	</tr>
</table>