<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form2')
{
   $mailto = 'yarahieshamosman222@gmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Contact Information';
   $message = 'Values submitted from web site form:';
   $success_url = './ContactSuccessfully.php';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   $logdata = '';
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
   exit;
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
<link href="ContactUs.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="skrollr.min.js"></script>
<script src="scrollspy.min.js"></script>
<script>
$(document).ready(function()
{
   function skrollrInit()
   {
      skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
   }
   skrollrInit();
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
<div id="wb_Text1">
<h3>Contact Us</h3></div>
<div id="wb_CssMenu3">
<ul role="menubar">
<li class="firstmain"><a role="menuitem" href="./Login.php" target="_self">Login</a>
</li>
</ul>
</div>
<div id="wb_IconFont2">
<a href="./Login.php"><div id="IconFont2"><i class="material-icons">&#xe8a6;</i></div></a></div>
<div id="wb_IconFont1">
<a href="./cart.php"><div id="IconFont1"><i class="material-icons">&#xe8cc;</i></div></a></div>
<div id="wb_Form2">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form2">
<input type="hidden" name="formid" value="form2">
<label for="Editbox2" id="Label1">Name:</label>
<input type="text" id="Editbox2" name="name" value="" spellcheck="false">
<label for="Editbox3" id="Label2">Email:</label>
<input type="text" id="Editbox3" name="email" value="" spellcheck="false">
<input type="submit" id="Button2" name="" value="Send">
</form>
</div>
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
<div id="wb_Text2">
<span style="color:#808080;font-family:Arial;font-size:13px;">Copyright @2022 all rights reserved</span></div>
</div>
</body>
</html>