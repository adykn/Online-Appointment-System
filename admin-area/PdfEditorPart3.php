<?php $PL="?goto=PdfEditor";
        
       if ( isset($_GET['T']) ){    
           if ($_GET['T']=='D'){
               $i=$_GET['Id'];
               $sql="delete from PdfList where Id='".$i."'";
             
           }else if ($_GET['T']=='C'){
             
               $i=$_GET['cid'];
               $sql="delete from PdfCat where Id='".$i."'";
               $result=mysql_query($sql) or die (mysql_error());
               if($result){
               $sql="delete from PdfList where CatId='".$i."'";    
               }
           }else if ($_GET['T']=='U'){
               $i=$_GET['Id'];
               $s=$_GET['Sts'];
               if ($s=="Active"){$st="Deactive";}else{$st="Active";}
               $sql="update PdfList set Status='".$st."' where Id='".$i."'";
           }
             $result=mysql_query($sql) or die (mysql_error());
             if($result){echo "<center><font color=green>Action Successful</font></center>";}
             else{echo "<center><font color=red>Action failed</font></center>";}
       }
       
        ?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">

<?php 
$queryal=mysql_query("SELECT * FROM `PdfCat` ") or die ("query failed here");
while($ro=mysql_fetch_assoc($queryal)){?>
<tr><td>
 
        <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="100%">
        <tr><td rowspan="2" align="center" width="20%"><img src="<?php echo $ro['Pic'];?>" width="70" height="80"></td>
        <td valign="top" width="80%" height="20px"> <b><?php echo $ro['Title'];?></b>
        <a href="<?php echo $PL?>&Edit=true&area=catdata&cid=<?php echo $ro['Id'];?>" style="text-decoration: none" >
                <img border="0" src="images/Edit.png" width="18" height="21"></a>
            
            <a href="<?php echo $PL?>&Del=true&T=C&area=catdata&cid=<?php echo $ro['Id'];?>" style="text-decoration: none" >
                <img border="0" src="images/Del.png" width="18" height="21"></a>
        </td></tr>
        <tr><td valign="top" height="60px"><?php echo $ro['Descr'];?> </td></tr></table>
        
        
</td></tr>


<tr><td>
 
        <table border="0" style="border-collapse: collapse"  bgcolor="#f7f7f7" width="100%"><tr>
        <th width="5%" align="center"> S.N </th><th width="25%" align="left"> Title </th><th width="30%" align="left"> Link </th><th width="15%" align="center"> # </th><th  > Action </th></tr>
        <?php $count=1;
            $querya2l=mysql_query("SELECT * FROM `PdfList` Where CatId='".$ro['Id']."'") or die ("query failed here");
            while($row=mysql_fetch_assoc($querya2l)){
                if($row['Status']=="Active")
                    {
                    $pic1="images/Show.PNG";
                    }else{
                    $pic1="images/Hide.PNG";
                    }	

                ?>
        <tr><td align="center"> <?php echo $count;?> </td><td> <?php echo $row['Title'];?> </td>
            <td > <?php echo $row['Link'];?> </td>
            <td align="center"> <?php echo $row['Downloads'];?> </td>
            <td align="center"> 
        
                <a href="<?php echo $PL?>&Edit=true&area=Pdfup&id=<?php echo $row['Id'];?>&cid=<?php echo $row['CatId'];?>" style="text-decoration: none" >
                <img border="0" src="images/Edit.png" width="18" height="21"></a>

                <a href="<?php echo $PL?>&Del=true&T=D&Id=<?php echo $row['Id'];?>"  >
                <img border="0" src="images/del.png" width="18" height="21"></a>

                <a href="<?php echo $PL?>&Del=true&T=U&Id=<?php echo $row['Id'];?>&Sts=<?php echo $row['Status'];?>">
                    <img border="0" src="<?php echo $pic1;?>" width="18" height="19"></a>
                
            </td>
        </tr>
            <?php $count=$count+1; }?>
        </table>
        
</td></tr>

<tr><td>
 <img src="images/spacer.gif">
</td></tr>
<?php }?>
</table>