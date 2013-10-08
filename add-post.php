<?php
if(!@$_POST['login']){ ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Username: <input type="text" name="username" size="21" maxlength="40">
<br>
Password: <input type="password" name="pwd" size="21" maxlength="40">
<br>
<input type="submit" value="Login" name="login">
</form>
<?php }
else {

	$username = $_POST['username'];
	$pwd = $_POST['pwd'];

	if(!(($username == "gallo") && ($pwd == "Webmaster7229"))){

	echo '<font color="red" size="4">WRONG USERNAME OR PASSWORD</font>';
	}
	else {
	?>
	<body>
<center>
		<form action="preview.php" method="post">
		Author: <input type="text" name="author" size="21" >
		<br>
		Title: <input type="text" name="title" size="21" >
		<br>
		Abstract: <input type="text" name="abstract" size="21" >
		<br>
		Tags: <input type="text" name="tags" size="21" >
		<br>
		Body Content: <br> 
		<textarea type="text" name="body" rows="10" cols="50"></textarea>
		<br>
		Category: 
		<select name="category">
			<option value="MLB">MLB</option>
			<option value="NBA">NBA</option>
			<option value="NFL">NFL</option>
			<option value="COLLEGE FOOTBALL">COLLEGE FOOTBALL</option>	
		</select>
		<br>
		Picture URL: <input type="text" name="pic" size="21" >
		<br>
		<input type="submit" value="Submit" name="submit">
		</form>


		TIPS:

		For a link use &lt;a href="LINK HERE"&gt;TEXT TO DISPLAY HERE&lt;/a&gt;</pre>
		<br>
		<br>
		For a line break (equivelant to hitting the enter key) use <pre>&lt;br /&gt;</pre>
		<br>
		<br>
		For an image use <pre>&lt;img src="LINK TO IMAGE HERE" &gt;</pre>
		<br>
		<br>
		<p>I will have to define some CSS classes that you can use for things like bold and italics a little later.<p>
</center>
	</body>
	<?php
	}
} ?>
