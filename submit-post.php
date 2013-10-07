<?php
include("functions.php");

$author = $_POST['author'];
$title = $_POST['title'];
$body = $_POST['body'];
$category = $_POST['category'];
$abstract = $_POST['abstract'];
$pic = $_POST['pic'];
$tags = $_POST['tags'];

if(add_blog_post($author, $title, $body, "", $abstract, $pic, $category, $tags = ""))
	echo "Post successfully added!";

?>