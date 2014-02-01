<?php
function Encrypt($PassCode,$EncNum) {
  $nstring = '';
  for($i = 0; $i < strlen($PassCode); $i++) {
    $nstring .= chr(ord(substr($PassCode,$i,$i + 1)) - $EncNum);
  }
  return $nstring;
}

function Insert($Table,$Var,$Values) {
$sadfsql="INSERT INTO `".$Table."` (".$Var.") VALUES (".$Values.")";
$query=mysql_query($sadfsql);
		if($query)
		$msg="Inserted";
		else
		$msg="error";
return $msg;
}
function Update($Table,$Set,$Where){
if ($Where=="")
$Where=1;

$sql="Update `".$Table."` set ".$Set." WHERE ".$Where."";
$query=mysql_query($sql);
if($query)
		$msg="Updated";
		else
		$msg="error";
return $msg;
}
function Delete($Table,$Where)
{
$query=mysql_query("DELETE FROM `".$Table."` WHERE ".$Where."");
if($query)
		$msg="Deleted";
		else
		$msg="error";
return $msg;

}
function IfExists( $T, $W ) {
$s= "SELECT COUNT(*) FROM   ". $T ."   WHERE " . $W . " ";
if ( mysql_result( mysql_query($s), 0 ) == 0 ) {
return FALSE;
} else {
return TRUE;
}
}

function readtxt($filename){
	@$fr = fopen($filename, 'r');
   
 	  if(!$fr) {
      $fr = fopen($filename,'w');
      if(!$fr) {
         echo "Could not create the file!";
         exit;
      		}
      $data="ace2khan@gmail.com";      		
      fputs($fr, $data);

      fclose($fr);	
      } else {
      
    	$content = fread($fr, filesize($filename));
		$content = nl2br($content);
		fclose($fr);
		$data=$content;
   		}
   	return $data;	
   		
}
function getValue($col,$table,$condition){
$qry="select ".$col." as mx from ".$table." where " . $condition . "" ;
$rs= mysql_query($qry) or die ("query failed here");
$ns= mysql_num_rows($rs);
if ( $ns == 0 ) 
        {
            return "Sorry";}
        else{ 
            $irow = mysql_fetch_array($rs);
            return $irow['mx'];
        }
}

//============================================================================================================================

 function getCount($table,$conditionVal){
	$ss= "SELECT * FROM `".$table."` where " . $conditionVal ."";
	$rs= mysql_query($ss) or die ("query failed here");
	$ns= mysql_num_rows($rs);
	//return number($ns);
        return $ns;
        }
function WholeNumber($num,$len){
$z="0";
for ($i=1; $i<$len-strlen((string)$num); $i++)
  {
  $z= $z . "0";
  }
  
  return $z.$num;
}

function number($n){
if (strlen($n)==1)  
return "000000000000".$n;
else if (strlen($n)==2)  
return "00000000000".$n;
else if (strlen($n)==3)  
return "0000000000".$n;
else if (strlen($n)==4)  
return "000000000 ".$n;
else if (strlen($n)==5)  
return "00000000".$n;
else if (strlen($n)==6)  
return "0000000".$n;
else if (strlen($n)==7)  
return "000000".$n;
else if (strlen($n)==8) 
return "00000".$n;
else if (strlen($n)==9)  
return "00000".$n;
else if (strlen($n)==10)  
return "0000".$n;
else if (strlen($n)==11) 
return "000".$n;
else if (strlen($n)==12)  
return "00".$n;
else if (strlen($n)==13)  
return "0".$n;
else if (strlen($n)==14)  
return $n;
}
//============================================================================================================================

 

//echo function_exists( 'mail' );
?>