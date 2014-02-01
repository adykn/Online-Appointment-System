<?php 
if (isset($_SESSION['Level'])){$Lev=$_SESSION['Level'];}else{$Lev="Main";}
$QL=mysql_query("SELECT * FROM `linktable` WHERE Loc='".$Lev."' AND Visible='True'  ORDER BY `Odr` ASC");
?>

<style>
a.navac         { color: #0066ff; font-size: 10pt;    }
a:hover.navac {COLOR: #0066ff;  FONT-SIZE: 8pt; font-weight:bold  }
a:visited.navac {color: #0066ff; font-size: 10pt;}
a:hover.navac {color: #0066ff; font-size: 10pt;  }
</style>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111"  >
       <tr  >
        <td width="11">&nbsp;
        </td>
        <td>
        <a style="text-decoration: none" class="navac"  href="?">Home</a></td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>

 


 <?php 
 if (@mysql_num_rows($QL) == 0) {?>
  <tr  >
        <td width="11">&nbsp;
        </td>
        <td>
         </td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
<?php }else{
 while($LinkRs=mysql_fetch_assoc($QL))
			  {
					
	         
              ?>

      <tr  >
        <td width="11">&nbsp;</td><td><?php if ($LinkRs['Status']=="Active"){?>
        <a style="text-decoration: none" href="<?php echo $LinkRs['Link']?>" class="navac"   ><?php echo $LinkRs['Ltitle']?></a>
		<?php }else{?>
		<font color="#922866"><?php echo $LinkRs['Ltitle']?></font>
		<?php }?>
		
       </font>
		
      </td><td align="center" valign="middle">&nbsp;</td></tr>
		<?php }}?>

      
      <tr >
        <td height="0" width="11">&nbsp;</td>
        <td height="0"> </td>
        <td height="0" align="center">&nbsp;</td>
      </tr>
      <?php if (isset($_SESSION['Level'])){?>
<tr  >
        <td height="0" width="11">&nbsp;</td>
        <td height="0"><a href="?goto=PCC" style="text-decoration: none" class="navac">Change 
        Password</a></td>
        <td height="0" align="center">&nbsp;</td>
      </tr>

<tr  >
        <td height="0" width="11"><a href="?goto=LinkEdit">
		<img border="0" src="images/spacer.gif" width="9" height="8"></a></td>
        <td height="0"><p>
        <a href="Signout.php"   style="text-decoration: none" class="navac" >Logout</a></p>          </td>
        <td height="0" align="center">&nbsp;</td>
      </tr>
      <?php }?>
    </table>
 
 
 
