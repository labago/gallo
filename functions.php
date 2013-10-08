<?php
// functions file 
include("resources/db.php");
record_visit();


$db = new db_functions();

// checks to see if the given account is already in use
function check_email($email)
{
	$db = new db_functions();
    $db->db_connect();

	$query = "SELECT * 
	FROM `Users` 
	WHERE `Email` LIKE '$email'
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	if($row = $db->db_fetch_row($result))
		return true;
	else
		return false;

}

// checks whether the given crypt value of the given type is alreayd in use
function check_crypt($crypt, $type)
{
	$db = new db_functions();
    $db->db_connect();

	$query = "SELECT * 
	FROM  `$type` 
	WHERE  `Crypt` LIKE  '$crypt'
	LIMIT 0 , 30";  

	$result = $db->db_query($query);

	if($db->db_num_rows($result) != 0)
	{
		return false;  
	}  
	return true;
}

// generates random hexidecimal number
function gen_rand_hex()
{
	$number = substr(md5(rand()), 0, 10); 

	return $number;
}

// adds a new user with some optional parameters
function add_user($fname, $lname, $pass, $email, $picture = "", $id = "", $access_token = "")
{

	$db = new db_functions();
    $db->db_connect();

	$crypt = gen_rand_hex();  
	while(!check_crypt($crypt, 'Users')) {  
	$crypt = gen_rand_hex();
	} 

	$query = "INSERT INTO `newschool`.`Users` (
			`First Name` ,
			`Last Name` ,
			`Email` ,
			`Password`,
			`Crypt`,
			`Picture`,
			`Facebook ID`,
			`Access`
			)
			VALUES (
			'$fname', '$lname', '$email', '$pass', '$crypt', '$picture', '$id', '$access_token'
			);";

	$db->db_query($query);


	return $crypt;
}

// returns all user attributes
function fetch_user_info($crypt)
{
 	$db = new db_functions();
    $db->db_connect();

	$query = "SELECT * 
	FROM  `Users` 
	WHERE  `Crypt` LIKE  '$crypt'
	LIMIT 0 , 30";  

	$result = $db->db_query($query);
	$row = $db->db_fetch_row($result);

	$info = array();

	foreach($row as $row_item)
	{
		array_push($info, $row_item);	
	}


	return $info;
}

// genereates a random picture name
function gen_pic_name($original)
{
	$components = explode(".", $original);

	$end = $components[(sizeof($components)-1)];

	$name = gen_rand_hex();

	if(file_exists("uploads/".$name.".".$end)){
		return gen_pic_name($original);
	}
	else{
		return $name.".".$end;
	}

}

// updates this users information, for the account page
function update_user_info($fname, $lname, $email, $password, $crypt)
{
	$db = new db_functions();
    $db->db_connect();

	$query = "UPDATE `newschool`.`Users` SET `First Name` = '$fname',
			`Last Name` = '$lname',
			`Email` = '$email',
			`Password` = '$password' WHERE `Users`.`Crypt` = '$crypt' LIMIT 1 ;";

	$db->db_query($query);

}

// records a visit from any user, guest or member
function record_visit() 
{
	$db = new db_functions();
    $db->db_connect();

	$ip_new = VisitorIP();
	$page_name = find_full_page_name();

	$query = "SELECT * 
	FROM  `Visits` 
	WHERE  `IP` LIKE  '$ip_new'
	AND  `Page Name` LIKE  '$page_name'
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	$visited = false;
	if($row = $db->db_fetch_row($result))
	{
		$visited = true;

		$ip = $row[0];
		$times = $row[2];
		$user = $row[3];
		$page_name = $row[4]; 

		$new_times = $times + 1;
		if(strlen($user) == 0)
		{
			$new_user = $_SESSION['email'];
		}
		else 
		{
			$new_user = $user;  
		}
	}


	if($visited)
	{
		$date = date('Y-m-d g-i-s', time()+(60*60*3));  
		$query = "UPDATE  `newschool`.`Visits` SET  `Most Recent` =  '$date',
		`Times` =  '$new_times',
		`User` =  '$new_user' WHERE  
		`Visits`.`IP` =  '$ip' AND   
		`Visits`.`Times` =$times AND  
		`Visits`.`User` =  '$user' AND
		`Visits`.`Page Name` = '$page_name' LIMIT 1 ;";
	}
	else 
	{
	  	if(isset($_COOKIE['user']))
			$user = $_COOKIE['user'];  
		else
			$user = '';

		if(strlen($user) == 0)
		{
			$user = "Guest";  
		}

		$date = date('Y-m-d g-i-s', time()+(60*60*3));  

		$location_info = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?format=json&key=b49cd6eb6da4c0e429300fd010f02061db560d5b38c2526481abe89bc73f8b3b&ip=".$ip_new));

		@$country = @$location_info->{'countryName'};
		@$city = @$location_info->{'cityName'};
		@$zip = @$location_info->{'zipCode'};
		@$state = @$location_info->{'regionName'};

		$query = "INSERT INTO  `newschool`.`Visits` (
		`IP` ,
		`Most Recent` ,
		`Times` ,
		`User`,
		`Page Name`,
		`Country`,
		`City`,
		`Zip`,
		`State`
		)
		VALUES (
		'$ip_new', 
		'$date',  '1',  '$user', '$page_name', '$country', '$city','$zip', '$state'
		);";
	}

	$db->db_query($query);

}

// method to find users IP address
function VisitorIP()
{ 
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	    $TheIp=$_SERVER['HTTP_X_FORWARDED_FOR'];
	else $TheIp=$_SERVER['REMOTE_ADDR'];

	return trim($TheIp);
}

// returns the whole page name(this means includes arguments) but minus the domain name
function find_full_page_name() 
{

	$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  

	$array = explode("/", $url);  
	$full_name = "";

	$length = sizeof($array);
	$start = 1;

	while($start < $length)
	{
		$full_name = $full_name."/".$array[$start];
		$start += 1;    
	}

	return $full_name;
}

// adds a comment to the achievement
function add_comment($comment, $crypt_user, $crypt_goal)
{
	$db = new db_functions();
    $db->db_connect();

	$comment = strip_tags($comment);

	$date = date('Y-m-d g-i-s', time()+(60*60*3)); 

	$crypt = gen_rand_hex();  
	while(!check_crypt($crypt, 'Comments')) {  
	$crypt = gen_rand_hex();
	}

	$query = "INSERT INTO `ididit`.`Comments` (
	`Comment` ,
	`Date Posted` ,
	`Crypt of User` ,
	`Crypt of Goal` ,
	`Crypt`
	)
	VALUES (
	'$comment', 
	'$date', '$crypt_user', '$crypt_goal', '$crypt'
	);";

	$db->db_query($query);

}

// gets the comments that are on this goal
function get_comments($goal)
{
	$db = new db_functions();
    $db->db_connect();

	$query = "SELECT * 
	FROM `Comments` 
	WHERE `Crypt of Goal` LIKE '$goal'
	ORDER BY `Date Posted` DESC
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	$comments = array();

	while($row = $db->db_fetch_row($result))
	{
		array_push($comments, $row);
	}


	return $comments;
}

// makes a thumbnail image from a bigger image
function make_thumb($src, $dest, $desired_width) {

  /* read the source image */
  $source_image = imagecreatefromjpeg($src);
  $width = imagesx($source_image);
  $height = imagesy($source_image);
  
  /* find the "desired height" of this thumbnail, relative to the desired width  */
  $desired_height = floor($height * ($desired_width / $width));
  
  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
  
  /* copy source image at a resized size */
  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
  
  /* create the physical thumbnail image to its destination */
  imagejpeg($virtual_image, $dest);
} 

function genArticle($id)
{

	$db = new db_functions();
	$db->db_connect();

	$query = "SELECT * 
	FROM `Posts` 
	WHERE `Crypt` LIKE '$id'
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	if($row = $db->db_fetch_row($result))
	{
		$tag_string = genTags($row[9], true);
	?>
	<!-- Standard -->
		<article class="format-standard">
			<div class="feature-image">
				<a href="post.php?id=<?php echo $row[4]; ?>">
					<img src="<?php echo $row[6]; ?>" alt="Alt text" />
				</a>
			</div>
			<div class="box cf">
				<div class="entry-date"><div class="number">23</div><div class="month">JAN</div></div>
				
				<div class="excerpt">
					<a href="post.php?id=<?php echo $row[4]; ?>" class="post-heading" ><?php echo html_entity_decode($row[1]); ?></a>
					<p><?php echo html_entity_decode($row[5]); ?></p>
					
					<p><a href="post.php?id=<?php echo $row[4]; ?>" class="learnmore">Learn More</a></p>
				</div>
				
				<div class="meta">
					<span class="format">Post</span>
					<span class="user"><a href="#">By <?php echo $row[0]; ?>, </a></span>
					<span class="comments">0 comments</span>
					<span class="tags"><?php echo $tag_string; ?></span>
				</div>
					
			</div>
		</article>
		<!-- ENDS  Standard -->
<?php
	}
}

// adds a new user with some optional parameters
function add_blog_post($author, $title, $text, $date, $abstract, $picture = "", $category, $tags = "")
{

	$db = new db_functions();
    $db->db_connect();

	$crypt = gen_rand_hex();  
	while(!check_crypt($crypt, 'Posts')) {  
	$crypt = gen_rand_hex();
	} 

	$query = "INSERT INTO `newschool`.`Posts` (
						`Author` ,
						`Title` ,
						`Text` ,
						`Date Published` ,
						`Crypt` ,
						`Abstract` ,
						`Picture` ,
						`Views`,
						`Category`,
						`Tags`
						)
						VALUES (
						'$author', '$title', '$text',
						CURRENT_TIMESTAMP , '$crypt', '$abstract', '$picture', '0', '$category', '$tags'
						);";

	$db->db_query($query);


	return $crypt;
}

function getBlogPosts($category = "")
{
	$db = new db_functions();
    $db->db_connect();

	$query = "SELECT * 
	FROM `Posts` 
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	$temp = makeRowsArray($result, $db);

	if($category == "")
		return $temp;

	$final = array();

	foreach ($temp as $blog) {
		if($blog[8] == $category)
			array_push($final, $blog);
	}

	return $final;
}

function makeRowsArray($result, $db)
{
	$rows = array();

	while($row = $db->db_fetch_row($result))
	{
		array_push($rows, $row);
	}

	return $rows;
}

function getFullBlogPost($id)
{
	$db = new db_functions();
	$db->db_connect();

	$query = "SELECT * 
	FROM `Posts` 
	WHERE `Crypt` LIKE '$id'
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	if($row = $db->db_fetch_row($result))
	{
		$tag_string = genTags($row[9], true);
	?>
	<!-- Standard -->
	<article class="format-standard">
		<div class="feature-image">
			<img src="<?php echo $row[6]; ?>" alt="Alt text" />
		</div>
		<div class="box cf">
			<div class="entry-date"><div class="number">23</div><div class="month">JAN</div></div>
			
			<div class="excerpt">
				<div class="post-heading" ><?php echo html_entity_decode($row[1]); ?></div>
				<div class="entry-content">
				
					
					<p><?php echo html_entity_decode($row[2]); ?></p>
				</div>
				
				
			</div>
			
			<div class="meta">
				<span class="format">Post</span>
				<span class="user"><a href="#">By <?php echo html_entity_decode($row[0]); ?>, </a></span>
				<span class="comments">0 comments</span>
				<span class="tags"><?php echo $tag_string; ?></span>
			</div>
				
		</div>
	</article>
	<!-- ENDS  Standard -->
<?php
	}
}

function genMosaic($id)
{
	$db = new db_functions();
	$db->db_connect();

	$query = "SELECT * 
	FROM `Posts` 
	WHERE `Crypt` LIKE '$id'
	LIMIT 0 , 30";

	$result = $db->db_query($query);

	if($row = $db->db_fetch_row($result))
	{
		$tag_string = genTags($row[9]);

	?>
	<figure class="<?php echo $tag_string; ?>">
		<a href="post.php?id=<?php echo $row[4]; ?>" class="thumb"><img src="<?php echo $row[6]; ?>" alt="alt" /></a>
		<figcaption>
			<a href="post.php?id=<?php echo $row[4]; ?>"><h3 class="heading"><?php echo $row[1]; ?></h3></a>
			<?php echo $row[5]; ?>
		</figcaption>
	</figure>

	<?php
	}
}

function genTags($tags, $commas = false)
{
	$tags = explode(",", $tags);

	$tag_string = "";

	if($commas)
	{
		$first = true;
		foreach ($tags as $tag) 
		{
			if($first && sizeof($tags) > 1)
			{
				$tag_string .= trim($tag)."";
				$first = false;
			}
			else
				$tag_string .= ", ".trim($tag);
		}
	}
	else
	{
		foreach ($tags as $tag) 
		{
			$tag_string .= trim($tag)." ";
		}
	}

	return $tag_string;
}
?>