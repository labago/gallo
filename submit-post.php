<?php
include("functions.php");

$author =  mysql_real_escape_string(htmlentities($_POST['author']));
$title = mysql_real_escape_string($_POST['title']);
$body =  mysql_real_escape_string(htmlentities($_POST['body']));
$category = $_POST['category'];
$abstract = mysql_real_escape_string(htmlentities($_POST['abstract']));
$pic = $_POST['pic'];
$tags =  mysql_real_escape_string(htmlentities($_POST['tags']));

if(add_blog_post($author, $title, $body, "", $abstract, $pic, $category, $tags = ""))
	echo "Post successfully added!";

echo "<br>";
echo "<br>";
echo "Author: ".$author;
echo "<br>";
echo "<br>";
echo "Title: ".$title;
echo "<br>";
echo "<br>";
echo "Body: <br><br>".$body;
echo "<br>";
echo "<br>";
echo "<br>";
echo "Category: ".$category;
echo "<br>";
echo "<br>";
echo "Abstract: ".$abstract;
echo "<br>";
echo "<br>";
echo "Tags: ".$tags;
?>