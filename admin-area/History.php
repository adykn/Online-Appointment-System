<?php
$Link="?goto=History"; 
$Link1="History.php"; 
$HeaderTag="History"; 
$ItemPerRow=3;
$Rtb="reserved";
$Stb="student";
$Btb="book";
$Itb="issue"    


//****************************************************************************************************?>
 
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
        <a href="?goto=History&status=Returned" class="navac">Returned</a> | <a href="?goto=History&status=Issued" class="navac">Issued</a> | <a href="?goto=History" class="navac">All</a>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>

<?php //****************************************************************************************************?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   
    <tr>
    <?php $i=0; 
            if (isset($_SESSION['RefNo']) && $_SESSION['RefNo']!=0){
            $Stdcond=" student_id='".$_SESSION['RefNo']."'";
            }else{$Stdcond=" 1=1 ";}
            if (isset($_GET['status']) && $_GET['status']=="Issued")
            {$statusCondtn=" issue_status='Issued' ";}else if (isset($_GET['status']) && $_GET['status']=="Returned")
                {$statusCondtn=" issue_status='Returned' ";}else{ $statusCondtn=" 1=1 ";}
            
	$queryal=mysql_query("SELECT * FROM `".$Itb."` Where ".$statusCondtn." and ".$Stdcond."  ORDER BY  `issue_id` Desc") or die ("query failed here");
	$NRow=  mysql_num_rows($queryal);
        if ($NRow==0){
        echo "<tr><td colspan='4' align='center'> No records found</td>";
            }else{
        while($rw=mysql_fetch_assoc($queryal))
	{
             if($rw['issue_status']!="Issued"){
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $colr="#0066ff";
                $show="false";
                $TbBgcolr="#f7f7f7";
                $date1 = $rw['issue_date'];
                $date2 = $rw['return_date'];
                             
           //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
             }else{ 
           //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $colr="white";
                $show="true";
                $TbBgcolr="#9299FB";                   
                $date2 = date('y-m-d');
                $date1 = $rw['issue_date'];
                
           //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++    
                }
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
         
               
        if ($rw['issue_limit']<$totalDays && $rw['issue_status']!="Issued"){
             $TbBgcolr="#D1FBD3";
             if ($Money<500){
                 $TbBgcolr="#F1E4B5";
             }else if ($Money>1000){
                 $TbBgcolr="#F8BABA";
             }
             
        }    
	     
                
       
         ?>
        <td>
            <table border="0" style="border-collapse: collapse"  bgcolor="<?php echo $TbBgcolr;?>" width="97%">
                <tr><td colspan="2" ><img src="images/spacer.gif"> </td></tr>
                <tr><td rowspan="6" align="center"><img src="<?php echo getValue('pic','book'," book_id='".$rw['book_id']."'");?>" width="70" height="80"></td>
                    <td><font size="1"><?php echo getValue('name','book'," book_id='".$rw['book_id']."'").'-'.getValue('edition','book'," book_id='".$rw['book_id']."'");?></font></td></tr>
                <tr><td ><font size="1">Status: </font><b> <font color="<?php echo $colr;?>" size="1"> <?php echo $rw['issue_status']?></font> </b></td></tr>
                <tr><td ><font size="1">Issued on: <?php echo $rw['issue_date']?></font></td></tr>
                <tr><td ><font size="1">Return on: <?php echo $rw['return_date']?></font> </td></tr>
                
                <tr><td ><font color="<?php echo $colr;?>" size="1">for <?php echo $rw['issue_limit']?>@<?php echo $rw['fine']?> /  
                         <font color="#0066ff" size="1"> 
                             <?php echo $RemainDays."@"; if ($rw['issue_limit']<$totalDays){echo $Money."/-";}else{echo "0/-";}?> 
                         </font> </td></tr>
                <tr><td ><font size="1">
                    <?php printf("%d Years, %d Month, %d days\n", $years, $months, $days);?></font> </td></tr>
                  
                    
                <tr><td colspan="2" ><img src="images/spacer.gif"> </td></tr>
                </td></tr> <tr><td colspan="2" bgcolor="#ffffff"><img src="images/spacer.gif"> </td></tr>
            </table>
	
        </td>
        
         
        
       
        <?php $i=$i+1;}}?>
    <tr><td> </td><td> </td><td> </td><td> </td></tr>
    <tr><td colspan="4"> 
            <table border="1" style="border-collapse: collapse" width="100%"><tr>
                    <td bgcolor="#f7f7f7" width="25%" align="center"><font size="1"> Ok </font> </td>
                    <td bgcolor="#9299FB" width="25%" align="center"><font size="1"> Appending </font> </td>
                    <td bgcolor="#D1FBD3" width="25%" align="center"><font size="1"> Less than 500/-rs </font> </td>
                    <td bgcolor="#F8BABA" width="25%" align="center"><font size="1"> Less than 1000/-rs </font> </td>
        </tr></table>
        </td></tr>
</table><br> 