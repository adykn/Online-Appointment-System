 <?php
$Link="?goto=PdfEditor"; 
$Link1="PdfEditor.php"; 
$HeaderTag="Pdf Editor"; 
$ItemPerRow=4;
$Mtb="PdfCat";
$Stb="PdfList";

                     


//****************************************************************************************************?>
 
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="25%"><b><font size="4">&nbsp;
    <?php echo $HeaderTag;?>
    </font></b></td>
    <td width="75%">
    <p align="right">
   <a href='<?php echo $Link?>&Del=true' class="navac"><img src='pages/image/del.png'></a> 
   <a href='<?php echo $Link?>&Edit=true' class="navac"><img src='pages/image/new.png'></a> 
   <a href='<?php echo $Link?>'><img src='pages/image/Updir.png'></a>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr></td>
  </tr>
</table>

<?php //****************************************************************************************************?>
<?php if (!isset($_GET['Edit']) && !isset($_GET['Del']) && !isset($_GET['Update']) && !isset($_GET['Detail'])){?>  
<?php //****************************************************************************************************?>
<?php include 'PdfEditorPart1.php';?>
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Edit']) && $_GET['Edit']=='true' ){ ?>
<?php //****************************************************************************************************?>
<?php include 'PdfEditorPart2.php';?>       
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Del']) && $_GET['Del']=='true' ){ ?>
<?php //****************************************************************************************************?>
<?php include 'PdfEditorPart3.php';?>
<?php //****************************************************************************************************?>
<?php  }else if(isset($_GET['Detail']) && $_GET['Detail']=='true' ){ ?>
<?php //****************************************************************************************************?>

<?php  } ?>