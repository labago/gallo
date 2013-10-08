<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>Contact Us</title>
<meta name="keywords" content=""><meta name="description" content=""><link href="style.css" rel="stylesheet" type="text/css" media="screen"></head>
<style>
textarea#styled {
        width: 400px;
        height: 60px;
        border: 3px solid #cccccc;
        padding: 5px;
        font-family: Tahoma, sans-serif;
        background-image: url(bg.gif);
        background-position: bottom right;
        background-repeat: no-repeat;
        resize: none; 
}
</style>
<script type="text/javascript">//<![CDATA[

<!-- Script by hscripts.com -->
//Edit the counter/limiter value as your wish
var count = "500";   //Example: var count = "175";
function limiter(){
var tex = document.form.message.value;
var len = tex.length;
if(len > count){
        tex = tex.substring(0,count);
        document.form.message.value =tex;
        return false;
}
document.form.limit.value = count-len;
}


//]]></script>
<script type="text/javascript" language="JavaScript">
function validateForm()
{
var x=document.forms["form"]["email"].value
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("You must supply a valid email address");
  return false;
  }
}
</script>



<body>
<div id="wrapper">
	<div id="logo">
		<h1>Jonathan Edmund Lane</h1>
		<p><em> "Do what you like, like what you do."</em></p>
	</div>
	<hr><!-- end #logo --><div id="header">
<?php include('main-nav.php') ?>
		<!--<div id="search">
			<form method="get" action="">
				<fieldset><input type="text" name="s" id="search-text" size="15"><input type="submit" id="search-submit" value="GO"></fieldset></form>
		</div> -->
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
	<div id="page-bgtop">
		<div id="content">
			<div class="post">
				<h2 class="title">Contact Me</h2>
				<div class="entry">
				If for any reason you would like to get in contact with me, just drop me a message using the form below.
				<br>
				<br>
				<br>
<?php if(!$_POST['sent']) {	?>			
<form action="/contact.php" method="post" name="form" onsubmit="return validateForm()">
Subject: <input type="text" name="subject" size="32" maxlength="80">
<br>
Return Email: <input type="text" name="email" size="26" maxlength="80" value="">
<br>
<br>
<textarea name="message" maxlength="500" wrap=physical id="styled" onkeyup=limiter() onfocus="	if ( this.value == 'Your message here...' ) {	this.value = '';}; setbg('#e5fff3');" onblur="if ( this.value == '' ) {	this.value = 'Your message here...';}; setbg('white')">Your message here...</textarea>
<br> Characters left:
<script type="text/javascript">
document.write("<font color='green'><input type=text style='border: none' name=limit size=4 readonly value="+count+"></font>");
</script>
<br>
<br>
<input type="submit" value="Send" name="sent">
</form>
<?php } else { 

echo "Thank you! Your message has been sent, I will get back to you promptly if necessary.";

$to = "jlane09sjp@gmail.com";
$subject = $_POST['subject'];
$email = $_POST['email'];
$message = $_POST['message'];

$headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
// Additional headers
$headers .= 'From: Contact Me <'.$email.'>'."\r\n";

mail($to, $subject, $message, $headers);
}
?>
                </div>
			</div>
</div>
		<!-- end #content -->
	<?php include('side-bar.php') ?>
		<div style="clear: both;"> </div>
	</div>
	</div>
	<!-- end #page -->
<?php include('footer.php') ?>
</div>
</body></html>
