<?php
$Link="?goto=ListIssuedBooks"; 
$Link1="ListIssuedBooks.php"; 
$HeaderTag="List of Issued Books"; 
$ItemPerRow=4;
$Rtb="reserved";
$Itb="issue";
$Stb="student";
$Btb="book";
include_once 'functions.php';
    if (isset($_GET['T']) && isset($_GET['Iid'])){
        $iid=$_GET['Iid'];
       
        if ($_GET['T']=='Returned'){
             
             $sql="update ".$Itb." set issue_status='Returned',return_date='".date('y-m-d')."' Where issue_id='" .$iid. "'";
             $result=mysql_query($sql) or die (mysql_error());
             if($result){echo "<center><font color=green>Action Successful</font></center>";}else{echo "<center><font color=red>Action failed</font></center>";}
             
        } 
         
      
    }                 


//****************************************************************************************************?>
 
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="45%"><b><font size="4">&nbsp;
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
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
    <tr><th width="5%" align="left">S.N</th><th width="40%" align="left">&nbsp;&nbsp;Book</th><th width="40%" align="left">Student</th><th width="15%">Action</th></tr>
    <?php $i=1; 
	$queryal=mysql_query("SELECT * FROM `".$Itb."` where issue_status='Issued' order by issue_date") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
        if ($NRow==0){
        echo "<tr><td colspan='4' align='center'> No records found</td>";
            }else{
        while($rw=mysql_fetch_assoc($queryal))
	{
                $colr="#0066ff";
                $show="true";
                $TbBgcolr="#9299FB";                   
                $date2 = date('y-m-d');
                $date1 = $rw['issue_date'];
           //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $diff = abs(strtotime($date2) - strtotime($date1));
                $years = floor($diff / (365*60*60*24));
                $totalDays=floor($diff / (60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                $Money=($totalDays-$rw['issue_limit'])*$rw['fine'];
                $RemainDays=$totalDays-$rw['issue_limit'];  
           //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++     
	if($i%$ItemPerRow==0){echo "</tr><tr>";	}
        ?>
        <tr><td valign="top"><?php echo $i?></td>
        <td>
            <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="97%">
                <tr><td rowspan="6" align="center"><img src="<?php echo getValue('pic','book'," book_id='".$rw['book_id']."'");?>" width="70" height="80"></td>
                    <td><font color="<?php echo $colr;?>" size="1"><?php echo getValue('name','book'," book_id='".$rw['book_id']."'").'-'.getValue('edition','book'," book_id='".$rw['book_id']."'");?></font></td></tr>
                <tr><td><font color="<?php echo $colr;?>" size="1">By <?php echo getValue('author','book'," book_id='".$rw['book_id']."'");?></font></td></tr>
                <tr><td ><font color="<?php echo $colr;?>" size="1">Remaining Books: <?php $x=getCount('issue',"book_id='".$rw['book_id']."' and issue_status='Issued'");$x=getValue('qty','book'," book_id='".$rw['book_id']."'")-$x;echo $x;?></font></td></tr>
                <tr><td align="center"><font color="<?php echo $colr;?>" size="1"><?php echo $rw['issue_date']?> </font></td></tr>
                <tr><td align="center"><font color="<?php echo $colr;?>" size="1">
                        for <?php echo $rw['issue_limit']?>@<?php echo $rw['fine']?> /  
                         <font color="#0066ff" size="1"> <?php echo $RemainDays."@"; if ($rw['issue_limit']<$totalDays){echo $Money."/-";}else{echo "0/-";}?>
                        </font></td></tr>
                <tr><td align="center"><font color="red" size="1"><?php printf("%d Years, %d Month, %d days\n", $years, $months, $days);?> </font></td></tr>
            </table>
	
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
                 <tr><td  align="center"><a href="<?php echo $Link?>&Iid=<?php echo $rw['issue_id']?>&T=Returned" class="navac" onclick="return confirm('are you sure?');">Returned</a></td></tr>
             <tr><td><img src="images/spacer.gif"> </td></tr>
             <tr><td  align="center"> </td></tr>
             </table>
            
        </td></tr>
        <tr><td colspan="4"><img src="images/spacer.gif"> </td></tr>
        <?php $i=$i+1;}}?>
    <tr><td> </td><td> </td><td> </td><td> </td></tr>
    <tr><td> </td><td> </td><td> </td><td> </td></tr>
</table><br> 