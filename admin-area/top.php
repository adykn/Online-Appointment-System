<script>
// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 3000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 5;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

Picture[1]  = 'Banners/banner1.jpg';
Picture[2]  = 'Banners/banner1a.jpg';
Picture[3]  = 'Banners/banner1b.jpg';
Picture[4]  = 'Banners/banner2.jpg';
Picture[5]  = 'Banners/banner2a.jpg';
Picture[6]  = 'Banners/banner2b.jpg';
Picture[7]  = 'Banners/banner3.jpg';
Picture[8]  = 'Banners/banner3a.jpg';
Picture[9]  = 'Banners/banner3b.jpg';
var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}

</script>
 <script>
	  var opacity;
  	  opacity=50;
	  obj = document.getElementById('aaa');
	  opacity = (opacity == 100)?99.999:opacity;
  	  obj.style.filter = "alpha(opacity:"+opacity+")";
  	  obj.style.KHTMLOpacity = opacity/100;
  	  obj.style.MozOpacity = opacity/100;
  	  obj.style.opacity = opacity/100;
	  </script>

<body onload=runSlideShow() topmargin="3" leftmargin="2">
<img border="0" src="Banners/banner.jpg" width="100%" height="177" name="PictureBox1" id="aaa">
<div style="position: absolute ; top:150px">
    <font color=white><h2>&nbsp;&nbsp;&nbsp;Welcome <?php echo $_SESSION['LoginId']?>..</h2>
</div>