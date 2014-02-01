<?php
if (isset($_POST['Send'])){
	$url="Bidsmoney.com";
    $to = $_POST['To'];
    $from = $_POST['From'];
    $subject = $_POST['Subject'];

	$message=$_POST['Body'];
    
    $headers .= "Content-type: text/html; charset=iso-8859-1rn";
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
 	$headers .= "From: =?UTF-8?B?". base64_encode($from) ."?= <$from>\r\n";
 	$headers .= "X-Mailer: PHP/". phpversion();
    $headers .= "Reply-To: $url <$from>\r\n"; 
    $headers .= "Return-Path: $url <$from>\r\n"; 
    $headers .= "Organization: $url\r\n"; 
   
 
	mail($to, $subject, $message, $headers, "-f $from");

  
    echo "Message has been sent....!";
    }
?>
<form method="POST" action="?goto=<?php echo $_GET['goto']?>">
		
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F7F7F7">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">
		<img border="0" src="images/spacer.gif" width="9" height="8"></td>
	</tr>
	<tr>
		<td width="22%"><b><font color="#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		To</font></b></td>
		<td width="4%" align="center"><b><font size="4" color="#808080">:</font></b></td>
		<td width="74%">

			
			<input type="text" name="To" size="39"  >
	
		  </td>
	</tr>
	<tr>
		<td width="22%"><b><font color="#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		From</font></b></td>
		<td width="4%" align="center"><b><font size="4" color="#808080">:</font></b></td>
		<td width="74%">

			
			<input type="text" name="From" size="39"  ></td>
	</tr>
	<tr>
		<td width="22%"><b><font color="#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		BCC</font></b></td>
		<td width="4%" align="center"><b><font size="4" color="#808080">:</font></b></td>
		<td width="74%">

			
			<input type="text" name="BCC" size="39"  ></td>
	</tr>
	<tr>
		<td width="22%"><b><font color="#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		CC</font></b></td>
		<td width="4%" align="center"><b><font size="4" color="#808080">:</font></b></td>
		<td width="74%">

			
			<input type="text" name="CC" size="39"  ></td>
	</tr>
	<tr>
		<td width="22%"><b><font color="#808080">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Subject</font></b></td>
		<td width="4%" align="center"><b><font size="4" color="#808080">:</font></b></td>
		<td width="74%">

			
			<input type="text" name="Subject" size="50"  ></td>
	</tr>
	<tr>
		<td width="100%" colspan="3">
		<p align="center"><textarea rows="12" name="Body" cols="73"></textarea></td>
	</tr>
	<tr>
		<td width="100%" colspan="3">
		<img border="0" src="images/spacer.gif" width="9" height="8"></td>
	</tr>
	<tr>
		<td width="100%" colspan="3">
		<p align="center">
		<input type="submit" value="Send" name="Send" style="color: #000000; border-style: double; border-width: 3px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px; "></td>
	</tr>
</table>	</form>
 