<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./Login.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./Login.php');
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 14 - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Home.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="skrollr.min.js"></script>
<script src="wb.carousel.min.js"></script>
<script src="scrollspy.min.js"></script>
<script>
$(document).ready(function()
{
   function skrollrInit()
   {
      skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
   }
   skrollrInit();
   var Carousel1Opts =
   {
      delay: 3000,
      duration: 500,
      easing: 'linear',
      mode: 'forward',
      direction: '',
      scalemode: 2,
      pagination: true,
      pagination_img_default: 'images/page_default.png',
      pagination_img_active: 'images/page_active.png',
      start: 0
   };
   $("#Carousel1").carousel(Carousel1Opts);
});
</script>
</head>
<body data-spy="scroll">
<div id="PageHeader" data-top="background:rgba(33, 33, 33, 0.0);" data--50-top="background:rgba(33, 33, 33, 1.0);">
<div id="PageHeader_Container">
<div id="wb_CssMenu1">
<ul role="menubar">
<li class="firstmain"><a role="menuitem" href="./index.php" target="_self">HOME</a>
</li>
<li><a role="menuitem" href="./shop.php" target="_self">SHOP</a>
</li>
<li><a role="menuitem" href="./AboutUs.php" target="_self">ABOUT</a>
</li>
<li><a role="menuitem" href="./ContactUs.php" target="_self">CONTACT</a>
</li>
</ul>
</div>
<div id="wb_Image2">
<img src="images/93a1dffb0dd24b82b920d33bcc84b685__3_-removebg-preview.png" id="Image2" alt=""></div>
<div id="wb_Form1">
<form name="SearchForm" method="get" action="http://www.google.com/search" id="Form1">
<input type="text" id="Editbox1" name="q" value="" spellcheck="false">
<input type="submit" id="Button1" name="submit" value="Search">
</form>
</div>
</div>
</div>
<div id="wb_Carousel1">
<div id="Carousel1">
<div class="frame frame-1">
</div>
<div class="frame frame-2">
</div>
<div class="frame frame-3">
</div>
</div>
</div>
<div id="wb_Text2">
<span style="color:#000000;font-family:Arial;font-size:43px;">Manzzeli</span></div>
<div id="wb_Text3">
<span style="color:#000000;font-family:Arial;font-size:19px;">Shop By Category</span></div>
<div id="wb_CssMenu2">
<ul role="menubar">
<li class="firstmain"><a role="menuitem" href="./shop.php" target="_self">Beds</a>
</li>
<li><a role="menuitem" href="./shop.php" target="_self">Sofas</a>
</li>
<li><a role="menuitem" href="./shop.php" target="_self">Kitchens</a>
</li>
</ul>
</div>
<div id="wb_IconFont1">
<a href="./cart.php"><div id="IconFont1"><i class="material-icons">&#xe8cc;</i></div></a></div>

<div id="wb_CssMenu3">
<ul role="menubar">
<li class="firstmain"><a role="menuitem" href="./Login.php" target="_self">Login</a>
</li>
</ul>
</div>
<div id="wb_IconFont2">
<a href="./Login.php"><div id="IconFont2"><i class="material-icons">&#xe8a6;</i></div></a></div>
<div id="PageFooter1">
<label for="" id="Label4">Follow us:</label>
<div id="wb_FontAwesomeIcon5">
<a href="https://facebook.com/manzzeli" onclick="window.location.href='https://facebook.com/manzzeli';return false;"><div id="FontAwesomeIcon5"><i class="fa fa-facebook-f"></i></div></a></div>
<div id="wb_FontAwesomeIcon6">
<a href="https://www.linkedin.com/company/manzzeli" onclick="window.location.href='https://www.linkedin.com/company/manzzeli';return false;"><div id="FontAwesomeIcon6"><i class="fa fa-linkedin"></i></div></a></div>
<div id="wb_FontAwesomeIcon9">
<a href="https://instagram.com/manzzeli" onclick="window.location.href='https://instagram.com/manzzeli';return false;"><div id="FontAwesomeIcon9"><i class="fa fa-instagram"></i></div></a></div>
<div id="wb_FontAwesomeIcon8">
<a href="https://wa.me/message/PBHBCLD6JSMNA1" onclick="window.location.href='https://wa.me/message/PBHBCLD6JSMNA1';return false;"><div id="FontAwesomeIcon8"><i class="fa fa-whatsapp"></i></div></a></div>
<div id="wb_Text1">
<span style="color:#808080;font-family:Arial;font-size:13px;">Copyright @2022 all rights reserved</span></div>
</div>
</body>
</html>