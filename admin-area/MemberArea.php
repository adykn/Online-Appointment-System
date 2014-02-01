<?php 
ob_start();
session_start();

if($_SESSION['LoginId']=="" && $_SESSION['PassCode']=="" && $_SESSION['Level']=="" && !$_SESSION['Level']=="Member")
{
Header( "HTTP/1.1 301 Moved Permanently" );
Header( "Location: login.php" ); 
exit;

}
include_once "functions.php"; 
 include_once "dbase.php";

//var_dump($_SESSION['userData'] );
 
?>      
 <body topmargin="0" leftmargin="0" background="images/bgBlue2.png">

<center>
<div align="center">
  <center>
  <br>
	<TABLE WIDTH=774 BORDER=1 CELLPADDING=0 CELLSPACING=0 bgcolor="#f7f7f7" class="norepeat" style="border-collapse: collapse" bordercolor="#808080">
  	<tr><td>
<TABLE WIDTH=774 BORDER=0 CELLPADDING=0 CELLSPACING=0   class="norepeat" style="border-collapse: collapse" >
	<TR><TD align="left" valign="top"><?php include "top.php"?></TD></TR>
	<TR><TD align="left" valign="top" background="images/bg2.gif">&nbsp;</TD></TR>
	<TR><TD align="left" valign="top">
    
    	<table width="100%"  border="0" cellpadding="3" cellspacing="3">
          <tr>
            <td width="136"   align="left" valign="top"   background="images/left_nav_bg.png">
            <?php //***************************************************************************?>

           <table border="0" cellpadding="3" cellspacing="3" style="border-collapse: collapse"   width="100%"  ><tr><td width="100%">
			<b>Navigation Menu</b></td></tr><tr><td width="100%">
                <?php include "leftlinks.php"?>           
           </td></tr></table>
            
          <?php //***************************************************************************?></td>
            <td  align="left" valign="top">
		<?php //***************************************************************************?>
			<?php //***************************************************************************?>
			 <table border="0" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="100%" bgcolor="#FFFFFF">
				<?php if (isset($_GET['Msg'])){?>
				<tr><td colspan="5" align="center"   class="red"><?php echo $_GET['Msg']; ?></td></tr>
				<?php }?>
                         <tr>
                           <td width="100%">
                            <?php 
                            if(isset($_GET['goto']))
                            {
                            include $_GET['goto'].".php"; 
                            }else if(isset($_GET['act'])){
                            include("Common/control.php");
                            }else{
                            include "body.php";
                            }
                            ?></td>
                         </tr>
                       </table>

                 
		<?php //***************************************************************************?>
                 
		 
                
                </td>
              </tr>
            </table>
    </TD>
	</TR>
	
	<TR>
		<TD  align="center" valign="bottom"><?php include"bottom.php"?></TD>
	</TR>
</TABLE></td>
	</tr>
</table>
</center>
</div>
