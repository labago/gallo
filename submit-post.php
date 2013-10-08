<?php
include("functions.php");

$author =  htmlentities($_POST['author']);
$title = $_POST['title'];
$body =  htmlentities($_POST['body']);
$category = $_POST['category'];
$abstract = htmlentities($_POST['abstract']);
$pic = $_POST['pic'];
$tags =  htmlentities($_POST['tags']);

if(add_blog_post($author, $title, $body, "", $abstract, $pic, $category, $tags = ""))
	echo "Post successfully added!";

?>