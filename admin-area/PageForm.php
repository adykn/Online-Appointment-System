<script type="text/javascript">
function RS(a,s,e) {

if (window.getSelection) Selection = window.getSelection()
else Selection = document.selection.createRange();

if (Selection == 0) {
alert('No selection made !\nYou have to select something before using this button.');
return; }
else if (Selection.text == 0) {
alert('No selection made !\nYou have to select something before using this button.');
return; }

if (a==1)
{
if (window.getSelection) Replace = s + Selection + e;
else Replace = s + Selection.text + e;
}
if (a==2)
{
var l;
l=document.form3.l.value;

if (window.getSelection) Replace = "<a href='"+l+"' class='navac' style='text-decoration: none'>" + Selection + e;
else Replace = "<a href='"+l+"' class='navac' style='text-decoration: none'>" + Selection.text + e;
}
if (a==3)
{
var h,w,sc;
h=document.form3.h.value;
w=document.form3.w.value;
sc=document.form3.sc.value;
if (window.getSelection) Replace = "<img src='APanel/Gallery.php?Task=ShowImage&PkId="+sc+"' alt='" + Selection + "' width='"+w+"' height='"+h+"' >";
else Replace = "<img src='APanel/Gallery.php?Task=ShowImage&PkId="+sc+"' alt='" + Selection.text + "' width='"+w+"' height='"+h+"' >";
}

if (Replace == null) Replace = Selection;
else if (Replace == null) Replace = Selection.text;

if (window.getSelection) Selection = Replace;
else Selection.text = Replace; }

</script>
<hr>
<form method="POST" name=form3 action="<?php echo $PageLinkLocation?>">
	<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" width="100%" id="table1">
		<tr>
			<td width="13%"><b>Page Name </b> </td>
			<td width="86%">
			<input type="text" name="N1" size="69" style="color: #808080; border: 1px solid #808080; background-color: #FFFFFF" value="<?php echo $Name;?>" tabindex="1">
			</td>
		</tr>
		<tr>
			<td width="13%"><b>Page Title</b></td>
			<td width="86%">
			<input type="text" name="T1" size="69" style="color: #808080; border: 1px solid #808080; background-color: #FFFFFF" value="<?php echo $Title; ?>" tabindex="2">
			</td>
		</tr>
		<tr>
			<td width="99%" colspan="2"><b>Show Picture Table [4]&nbsp; </b> 

<script type="text/javascript">
function toggle(id)
{
	var tr = document.getElementById(id);
	if (tr==null) { return; }
	var bExpand = tr.style.display == '';
	
	tr.style.display = (bExpand ? 'none' : '');
}
function changeimage(id, sMinus, sPlus)
{
	var img = document.getElementById(id);
	if (img!=null)
	{
	    var bExpand = img.src.indexOf(sPlus) >= 0;
		if (!bExpand)
		{	img.src = sPlus;
		document.form3.PICUPD.value="Yes";
		}
		else
		{
			img.src = sMinus;
		document.form3.PICUPD.value="No";
		}	
	}
}

function funcTrChg3(val2,val3)
{

    changeimage(val3, 'images/Active.PNG', 'images/Deactive.PNG');
    toggle(val2);
}

            </script>
            <span onclick="javascript:funcTrChg3('Pics','pic1');">
			<img src="images/Active.PNG" id="pic1" width="18" height="18"/></span>
				<input type=hidden name=PICUPD value="No" size="20">

			</td>
		</tr>
		<tr id="Pics" style="display:none">
            <td width="99%" valign="top" colspan="2">
            
   <script>
	function AddPicLink()
	{
	var val, ra,i,i2;
	
	for (var i=0; i < document.form3.a.length; i++)
   		{
	   	if (document.form3.a[i].checked)
		    {
		    var rv = document.form3.a[i].value;
		    i2=i;
		    }
	   }
	
	ra = document.form3.elements[rv];
	val = document.form3.Page.value;
	ra.value="["+val+"] Selected";
 	document.form3.elements[rv-1].value=val;
	var xx = document.form3.a[i2+1] ;
	xx.checked = true;
	}

	</script>
<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table1">
	<tr>
		<td align="center" colspan="4"> 
   <select size="1" name="Page" onChange="AddPicLink()" style="color: #800080; border: 1px solid #C0C0C0; background-color: #FFFFFF" >
    <option selected value=1 >Online Page</option>
     <?php 
    $queryprog3=mysql_query("SELECT * FROM `albumpics`") or die ("query failed here");
    $i=1;
	while($rse=mysql_fetch_assoc($queryprog3))
	{
	?>
    <option value="<?php echo $rse['PkId'];?>"><?php echo $i.", ".$rse['Desc'];?></option>
    <?php $i++; }?>  
    </select>

	<a href="?position=here&goto=GalleryEdit&Task=ShowPicForm" class="navac" style="text-decoration: none">
			[ Upload New Pictures ]</a>

					</td>
	</tr>
	<tr>
		<td align="center"> 
		<input type="text" name="L1" size="14"  >
		<input type="text" name="Link1" size="14"  disabled></td>
		<td align="center"> 
		<input type="text" name="L2" size="14"  >
		<input type="text" name="Link2" size="14"  disabled></td>
		<td align="center"> 
		<input type="text" name="L3" size="14"  >
		<input type="text" name="Link3" size="14"  disabled></td>
		<td align="center"> 
		<input type="text" name="L4" size="14"  >
		<input type="text" name="Link4" size="14"  disabled></td>
	</tr>
	<tr>
		<td align="center"><input type="radio" value="5" checked name="a"></td>
		<td align="center"><input type="radio" value="7" name="a"></td>
		<td align="center"><input type="radio" value="9" name="a"></td>
		<td align="center"><input type="radio" value="11" name="a"></td>
	</tr>
</table>

            
            </td>
          </tr>

		<tr>
			<td colspan="2" bgcolor="#F7F7F7">
			<p align="center"><font color="#FF0000"><i><b>The tools only work in 
            Internet explorer .sorry working on patch code for it.. </b></i>
            </font>
 			</td>
		</tr>

		<tr>
			<td colspan="2" bgcolor="#F7F7F7">
			<p align="center">
			<img border="0" src="images/bold.gif" width="23" height="22" align="middle" onclick="RS(1,'<b>','</b>');">
			<img border="0" src="images/italic.gif" width="23" height="22" align="middle" onclick="RS(1,'<i>','</i>');">
			<img border="0" src="images/underline.gif" width="23" height="21" align="middle" onclick="RS(1,'<u>','</u>');">&nbsp;
			|&nbsp;
			<img border="0" src="images/left.gif" width="23" height="22" align="middle"  onclick="RS(1,'<p align=left >','</p>');">
			<img border="0" src="images/center.gif" width="23" height="22" align="middle"  onclick="RS(1,'<p align=center >','</p>');">
			<img border="0" src="images/right.gif" width="23" height="22" align="middle"  onclick="RS(1,'<p align=right >','</p>');">
			<img border="0" src="images/justify.gif" width="23" height="22" align="middle"  onclick="RS(1,'<p align=justify >','</p>');">&nbsp; 
			|&nbsp;
			<img border="0" src="images/ordlist.gif" width="23" height="22" align="middle"  onclick="RS(1,'<div style=background-color: #FFFF00 >','</div>');">
			<img border="0" src="images/bullist.gif" width="23" height="22" align="middle"  onclick="RS(1,'<font color=#00FF00 >','</font>');">&nbsp;
			|&nbsp;
			<img border="0" src="images/bgcol.gif" width="23" height="22" align="middle"  onclick="RS(1,'<div style=background-color: #FFFF00 >','</div>');">
			<img border="0" src="images/forecol.gif" width="23" height="22" align="middle"  onclick="RS(1,'<font color=#00FF00 >','</font>');">&nbsp;
			|&nbsp;
			 <span onclick="javascript:funcTrChg3('Img','Pic2');">
			<img border="0" src="images/image.gif" width="23" height="22" align="middle"></span>
			<span onclick="javascript:funcTrChg3('HL','Pic2');">
			<img border="0" src="images/link.gif" width="23" height="22" align="middle" ></span>
 			</td>
		</tr>

		<tr id="Img" style="display:none">

			<td colspan="2" bgcolor="#F7F7F7">
			<p align="center"> 
  
  <select size="1" name="sc" onChange="RS(3,'','');" style="color: #800080; border: 1px solid #C0C0C0; background-color: #FFFFFF" >
    <option selected value=1 >Online Picture</option>
  <?php 
    $queryprog3=mysql_query("SELECT * FROM `albumpics`") or die ("query failed here");
    $i=1;
	while($rse=mysql_fetch_assoc($queryprog3))
	{
	?>
    <option value="<?php echo $rse['PkId'];?>"><?php echo $i." ) ".$rse['Desc'];?></option><?php $i++; }?>

    </select>
    
    <input type="text" name="w" size="3" value=300 > % Width     
    <input type="text" name="h" size="3" value=200 > % Height&nbsp;&nbsp;&nbsp; 

			<a href="?position=here&goto=GalleryEdit&Task=ShowPicForm" class="navac" style="text-decoration: none">
			[ Upload New Pictures ]</a>
					</select></td>
		</tr>

		<tr id="HL" style="display:none">

			<td colspan="2" bgcolor="#F7F7F7">
			<p align="center">
			<input type="text" name="l" size="44" tabindex="2" value=""> 
    Or
	<script>
	function AddLink()
	{
	var val;
	val = document.form3.val.value;
	document.form3.l.value="?goto=DisplayPage&id="+val;
	}
	        </script>

    <select size="1" name="val" onChange="AddLink()"  style="color: #800080; border: 1px solid #C0C0C0; background-color: #FFFFFF" >
    <option selected value=1 >Online Page</option>
     <?php 
    $queryprog3=mysql_query("SELECT * FROM `pages`") or die ("query failed here");
	while($rse=mysql_fetch_assoc($queryprog3))
	{
	?>
    <option value="<?php echo $rse['Id'];?>"><?php echo $rse['Name'];?></option>
    <?php }?>      
    </select>&nbsp; 
            <input type="button" value="Insert Link" name="B1" onClick="RS(2,'','</a>');">
            <a href="General.php?position=here&goto=Page&Task=Modify" class="navac" style="text-decoration: none" >New Page</a></td>
		</tr>
		<tr>
			<td colspan="2">
  		<p align="center">
  		<textarea rows="20" name="S1" cols="73" style="color: #808080; font-weight: bold; border: 1px solid #C0C0C0; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1; background-color: #FFFFFF"><?php echo $Data;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
			
			<p align="center">
			
			<?php if ($_GET['Task']=="Modify" && isset($_GET['Id'])) 
 	{
 	?> 
 	<input type=hidden name=Id value="<?php echo $_GET['Id'];?>">
 

    <input type=submit value="Update" name="Submit" tabindex="8" style="color: #C0C0C0; background-color: #F7F7F7">
    <?php }else{?>
    <input type=submit value="Insert" name="Submit" tabindex="8" style="color: #C0C0C0; background-color: #F7F7F7">
    <?php }?>

			
			</td>
		</tr>
	</table>
</form>