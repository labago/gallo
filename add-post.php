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
	<head>
		<link rel="stylesheet" href="js/aloha/css/aloha.css" type="text/css">
		<script src="js/jquery-1.7.1.min.js"></script>
    	<script src="js/aloha/lib/require.js"></script>
    	<script src="js/aloha/lib/aloha.js" data-aloha-plugins="common/ui,
								common/format,
		                        common/table,
		                        common/list,
		                        common/link,
		                        common/highlighteditables,
		                        common/block,
		                        common/image,
		                        common/undo,
		                        common/contenthandler,
		                        common/paste,
		                        common/commands"></script>
	</head>
	<body>
<center>
		<form action="preview.php" method="post" enctype="multipart/form-data">
		Author: <input type="text" name="author" size="21" >
		<br>
		Title: <input type="text" name="title" size="21" >
		<br>
		Abstract: <input type="text" name="abstract" size="21" >
		<br>
		Tags: <input type="text" name="tags" size="21" >
		<br>
		Body Content: <br> <br><br><br><br><br><br><br>
		<textarea type="text" name="body" rows="50" cols="100"></textarea>
		<br>
		Category: 
		<select name="category">
			<option value="MLB">MLB</option>
			<option value="NBA">NBA</option>
			<option value="NFL">NFL</option>
			<option value="COLLEGE FOOTBALL">COLLEGE FOOTBALL</option>	
		</select>
		<br>
		<br>

		<div class="upload">
			<input type="button" value="Use URL"><br>
			Picture: <input id="local" type="file" name="pic" size="10000000"><br>
		</div>
		<div class="url">
			<input type="button" value="Upload Picture"><br>
			Picture URL: <input type="text" name="pic_url" size="21" >
		</div>
		<br>
		<input type="submit" value="Submit" name="submit">
		</form>
		<script type="text/javascript">
	        Aloha.ready( function() {
	            Aloha.jQuery('textarea').aloha();
	        });

	        $('.upload input[type=button]').click(function(){
	        	$('.upload').hide();
	        	$('.url').show();
	        })

	        $('.upload').hide();

	        $('.url input[type=button]').click(function(){
	        	$('.upload').show();
	        	$('.url').hide();
	        })


	    </script>


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
