<?php 
include("functions.php");

$valid = @$_SESSION['v'];

if(!@$_POST['login'] && !@$_POST['submit'] && $valid != "true"){ ?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Username: <input type="text" name="username" size="21" maxlength="40">
	<br>
	Password: <input type="password" name="pwd" size="21" maxlength="40">
	<br>
	<input type="submit" value="Login" name="login">
	</form>
<?php }
else {

	$username = @$_POST['username'];
	$pwd = @$_POST['pwd'];

	if((($username == "gallo") && ($pwd == "Webmaster7229")) || $valid == "true"){

		$_SESSION['v'] = 'true';

		if(!@$_POST['submit'])
		{
			$id = @$_GET['id'];

			if(strlen($id) > 0)
			{

				$info = getBlogInfo($id);

				?>
		<head>
				<link rel="stylesheet" href="js/aloha/css/aloha.css" type="text/css">
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
					<form action="edit-post.php" method="post">
					Author: <input type="text" name="author" size="21" value="<?php echo $info[0]; ?>" >
					<br>
					Title: <input type="text" name="title" size="21" value="<?php echo $info[1]; ?>">
					<br>
					Abstract: <input type="text" name="abstract" size="21" value="<?php echo $info[5]; ?>">
					<br>
					Tags: <input type="text" name="tags" size="21" value="<?php echo $info[9]; ?>">
					<br>
					Body Content: <br> <br> <br><br><br><br><br><br><br>
					<textarea type="text" name="body" rows="50" cols="100"><?php echo $info[2]; ?></textarea>
					<br>
					Category: 
					<select name="category" value="<?php echo $info[8]; ?>">
						<option value="MLB">MLB</option>
						<option value="NBA">NBA</option>
						<option value="NFL">NFL</option>
						<option value="COLLEGE FOOTBALL">COLLEGE FOOTBALL</option>	
					</select>
					<br>
					Picture URL: <input type="text" name="pic" size="21" value="<?php echo $info[6]; ?>" >
					<br>
					<input type="hidden" name="crypt" size="21" value="<?php echo $info[4]; ?>">
					<input type="submit" value="Edit Post" name="submit">
					</form>
					<script type="text/javascript">
				        Aloha.ready( function() {
				            Aloha.jQuery('textarea').aloha();
				        });
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
			else
			{
				$posts = getBlogPosts();

				echo "Choose post to edit<br><br>";

				foreach ($posts as $post) 
				{
					echo "<br>";
					echo "<a href='edit-post.php?id=".$post[4]."'>".$post[1]."</a>";
					echo "<br>";
				}
			}
		}
		else
		{
			$author =  mysql_real_escape_string(htmlentities($_POST['author']));
			$title = mysql_real_escape_string($_POST['title']);
			$body =  stringCleanse(mysql_real_escape_string(htmlentities($_POST['body'])));
			$category = $_POST['category'];
			$abstract = stringCleanse(mysql_real_escape_string(htmlentities($_POST['abstract'])));
			$pic = $_POST['pic'];
			$tags =  stringCleanse(mysql_real_escape_string(htmlentities($_POST['tags'])));
			$crypt = $_POST['crypt'];

			if(updatePost($author, $title, $body, $abstract, $pic, $category, $tags, $crypt))
				echo "Post successfully edited!";
			else
				echo "Something went wrong";

			echo "<br><br>Edit another <a href='edit-post.php'>here</a>";
		}
	}
	else
	{
		echo '<font color="red" size="4">WRONG USERNAME OR PASSWORD</font>';
	}
}


?>