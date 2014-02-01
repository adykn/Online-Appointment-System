<?php
$Link="?goto=Reserved2Issue"; 
$Link1="Reserved2Issue.php"; 
$HeaderTag="Reserved 2 Issue"; 
$ItemPerRow=4;
$Rtb="reserved";
$Stb="student";
$Btb="book";
    if (isset($_GET['T']) && isset($_GET['Rid'])){
        $rid=$_GET['Rid'];
        $sid=getValue('student_id',$Rtb," reserved_id='".$rid."'");
        $bid=getValue('book_id',$Rtb," reserved_id='".$rid."'");
        if ($_GET['T']=='Cancel'){
             
             $sql="Delete from ".$Rtb." Where reserved_id='" .$rid. "'";
             $result=mysql_query($sql) or die (mysql_error());
             if($result){echo "<center><font color=green>Action Successful</font></center>";}else{echo "<center><font color=red>Action failed</font></center>";}
             
        }else if ($_GET['T']=='Issue'){
              if (isset($_GET['L'])){$lim=$_GET['L'];}else{$lim="180";}
              if (isset($_GET['F'])){$fine=$_GET['F'];}else{$fine="10";}
                $sql="Delete from issue Where student_id='0' or book_id='0";
                        mysql_query($sql) or die (mysql_error());
               $sql="insert into issue (student_id,book_id,issue_date,issue_limit,issue_status,fine)
               values ('".$sid."','".$bid."','".date('y-m-d')."','".$lim."','Issued','".$fine."')";
               $result=mysql_query($sql) or die (mysql_error());
                    if($result){
                      
                        $sql="Delete from ".$Rtb." Where reserved_id='" .$rid. "'";
                        $result=mysql_query($sql) or die (mysql_error());
                        if($result){echo "<center><font color=green>Action Successful</font></center>";}else{echo "<center><font color=red>Action failed</font></center>";}
                        }else{echo "<center><font color=red>Action failed</font></center>";}
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
<script type="text/javascript">
      function onChangeTest(changeVal) {
        alert("Value is " + changeVal.value);
      }
      function gotoLink(id,nam){
           
          var r=confirm("Are you Shore....?");
		if (r==true)
  		{
		  var x=document.getElementById(nam);
                   var y=document.getElementById("fine"+id);
                  if (!IsNumeric(x.value)){ alert("Plz enter a valid number"); return false;}
                  //alert("test" + x.value + id);
		  bd="<?php echo $Link?>&Rid="+id+"&T=Issue";	
		  document.location = bd +"&L="+ x.value + "&F=" + y.value;
  		
		}
      }
      function IsNumeric(num) {
     return (num >=0 || num < 0);
}
    </script>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr><th width="5%" align="left">S.N</th><th width="40%" align="left">&nbsp;&nbsp;Book</th><th width="40%" align="left">Student</th><th width="15%">Action</th></tr>
    <?php $i=1; 
	$queryal=mysql_query("SELECT * FROM `".$Rtb."` ") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
        if ($NRow==0){
        echo "<tr><td colspan='4' align='center'> No records found</td>";
            }else{
        while($rw=mysql_fetch_assoc($queryal))
	{
	if($i%$ItemPerRow==0){echo "</tr><tr>";	}
        ?>
        <tr><td valign="top"><?php echo $i?></td>
        <td>
            <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="97%">
                <tr><td rowspan="4" align="center"><img src="<?php echo getValue('pic','book'," book_id='".$rw['book_id']."'");?>" width="70" height="80"></td>
                    <td><?php echo getValue('name','book'," book_id='".$rw['book_id']."'").'-'.getValue('edition','book'," book_id='".$rw['book_id']."'");?></td></tr>
                <tr><td>By <?php echo getValue('author','book'," book_id='".$rw['book_id']."'");?></td></tr>
                <tr><td  >Remaining Books: <?php $x=getCount('issue',"book_id='".$rw['book_id']."' and issue_status='Issued'");$x=getValue('qty','book'," book_id='".$rw['book_id']."'")-$x;echo $x;?></td></tr>
                <tr><td align="center"><?php echo $rw['date']?> </td></tr></table>
	
        </td>
        <td>
	
         <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="100%">
             <tr><td rowspan="4" align="center"><img src="<?php echo getValue('pic','student'," student_id='".$rw['student_id']."'");?>" width="70" height="80"></td>
                    <td><?php echo getValue('name','student'," student_id='".$rw['student_id']."'").' c/o '.getValue('f_name','student'," student_id='".$rw['student_id']."'");?></td></tr>
                <tr><td><?php echo getValue('class','student'," student_id='".$rw['student_id']."'");?></td></tr>
                <tr><td>Books Issued : <?php $x=getCount('issue',"student_id='".$rw['student_id']."' and issue_status='Issued'");echo $x;?></td></tr>
                <tr><td><?php echo getValue('Cell','student'," student_id='".$rw['student_id']."'");?></td></tr>
         </table>
            
            
        </td>
        <td>
             <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="100%">
                  <tr><td  align="left"> <font size="1">
                         Days &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fine/day </font></td></tr>
             
                 <tr><td  align="center"> 
                         <input type="text" id="num<?php echo $rw['reserved_id']?>" value="30"   style="text-align: center;width:20px"> &nbsp;&nbsp;|&nbsp;&nbsp; 
                         <input type="text" id="fine<?php echo $rw['reserved_id']?>" value="10"   style="text-align: center;width:40px"> </td></tr>
             <tr><td  align="center"><a href="#" class="navac" OnClick="gotoLink('<?php echo $rw['reserved_id']?>','num<?php echo $rw['reserved_id']?>');">Issue</a></td></tr>
             <tr><td><img src="images/spacer.gif"> </td></tr>
             <tr><td  align="center"><a href="<?php echo $Link?>&Rid=<?php echo $rw['reserved_id']?>&T=Cancel" class="navac">cancel</a></td></tr>
             </table>
            
        </td></tr>
        <tr><td colspan="4"><img src="images/spacer.gif"> </td></tr>
        <?php $i=$i+1;}}?>
    <tr><td> </td><td> </td><td> </td><td> </td></tr>
    <tr><td> </td><td> </td><td> </td><td> </td></tr>
</table><br> 