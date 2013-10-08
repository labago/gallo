
<!doctype html> 
<html class="no-js">
<?php include("functions.php"); ?>
<?php 

$author =  mysql_real_escape_string(htmlentities($_POST['author']));
$title = mysql_real_escape_string($_POST['title']);
$body =  mysql_real_escape_string(htmlentities($_POST['body']));
$category = $_POST['category'];
$abstract = mysql_real_escape_string(htmlentities($_POST['abstract']));
$pic = $_POST['pic'];
$tags =  mysql_real_escape_string(htmlentities($_POST['tags']));


?>

	<head>
		<meta charset="utf-8"/>
		<title>New School</title>
		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->		
				
		<!-- JS -->
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/tabs.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/jquery.columnizer.min.js"></script>
		
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
		
		<!-- Lof slider -->
		<script src="js/jquery.easing.js"></script>
		<script src="js/lof-slider.js"></script>
		<link rel="stylesheet" href="css/lof-slider.css" media="all"  /> 
		<!-- ENDS slider -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  /> 
		<script src="js/tweet/jquery.tweet.js" ></script> 
		<!-- ENDS Tweet -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script  src="js/superfish-1.4.8/js/superfish.js"></script>
		<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- prettyPhoto -->
		<script  src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css"  />
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css"  />
		<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- JCarousel -->
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<link rel="stylesheet" media="screen" href="css/carousel.css" /> 
		<!-- ENDS JCarousel -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>

		<!-- modernizr -->
		<script src="js/modernizr.js"></script>
		
		<!-- SKIN -->
		<link rel="stylesheet" media="all" href="css/skin.css"/>
		
		<!-- Less framework -->
		<link rel="stylesheet" media="all" href="css/lessframework.css"/>
		
		<!-- jplayer -->
		<link href="player-skin/jplayer-black-and-yellow.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
		
		<!-- flexslider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider.js"></script>
		
	</head>
	
	
	<body class="blog single home">
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div class="logo-text">
					<a href="index.php">New School Sports</a>
				</div>
				
				<!-- nav -->
				<ul id="nav" class="sf-menu">
	<li><a href="index.php"><span>HOME</span></a></li>
	<li><a href="blog.php">BLOG</a>
		<ul>
			<li><a href="blogs/nba.php">NBA</a></li>
			<li><a href="blogs/mlb.php">MLB</a></li>
			<li><a href="blogs/nfl.php">NFL</a></li>
			<li><a href="blogs/college-football.php">College Footbal</a></li>
		</ul>
	</li>
	<li><a href="page.html">ABOUT</a></li>
	<li><a href="portfolio.html">WORK</a></li>
	<li><a href="contact.html">CONTACT</a></li>
</ul>				<div id="combo-holder"></div>
				<!-- ends nav -->

			</div>
		</header>
		<!-- ENDS HEADER -->		

		<!-- MAIN -->
		<div class="main">
			<div class="wrapper cf">
			
			
			<!-- masthead -->
			<div class="masthead cf">
				OUR BLOG
			</div>
			<!-- ENDS masthead -->
			
			
				
			<!-- posts list -->
        	<div id="posts-list" class="cf">        	
	        		
	        		
					<!-- Standard -->
	<article class="format-standard">
		<?php if($pic != ""){ ?>
		<div class="feature-image">
			<img src="<?php echo $pic; ?>" alt="Alt text" />
		</div>
		<?php } ?>
		<div class="box cf">
			<div class="entry-date"><div class="number">23</div><div class="month">JAN</div></div>
			
			<div class="excerpt">
				<div class="post-heading" ><?php echo $title; ?> - PREVIEW</div>
				<div class="entry-content">
				
					
					<?php echo $body; ?>
				</div>
				
				
			</div>
			
			<div class="meta">
				<span class="format">Post</span>
				<span class="user"><a href="#">By <?php echo $author; ?> </a></span>
				<span class="comments">0 comments</span>
				<span class="tags"><?php echo $tags; ?> </span>
			</div>
				
		</div>
	</article>
	<form action="submit-post.php" method="post">
		<input type="hidden" name="author" size="21" value="<?php echo $author; ?>">
		<input type="hidden" name="title" size="21" value="<?php echo $title; ?>">
		<input type="hidden" name="abstract" size="21" value="<?php echo $abstract; ?>">
		<input type="hidden" name="tags" size="21" value="<?php echo $tags; ?>"> 
		<textarea name="body" style="display: none;" rows="10" cols="50"><?php echo $body; ?></textarea>
		<input type="hidden" name="category" size="21" value="<?php echo $category; ?>">
		<input type="hidden" name="pic" size="21" value="<?php echo $pic; ?>">
		<input type="submit" value="Submit Final" name="submit">
	</form>
	<!-- ENDS  Standard -->
					
					
				<!-- comments list -->
				<div id="comments-wrap">
					
					<ol class="commentlist">
						
					</ol>
				</div>
				<!-- ENDS comments list -->
						
    		</div>
    		<!-- ENDS posts list -->
			
			<!-- sidebar -->
        	<aside id="sidebar">
        		
        		<ul>
	        		<li class="block">
		        		<h4>Categories</h4>
						<ul>
							<li class="cat-item"><a href="#" title="title">Film and video<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Print<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Photo and lomo<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Habitant morbi<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Film and video<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Print<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Photo and lomo<span class="post-counter"> (2)</span></a></li>
							<li class="cat-item"><a href="#" title="title">Habitant morbi<span class="post-counter"> (2)</span></a></li>
						</ul>
	        		</li>
	        		
	        		<li class="block">
		        		<h4>Archives</h4>
						<ul>
							<li class="cat-item"><a href="#" title="title">January</a></li>
							<li class="cat-item"><a href="#" title="title">February</a></li>
							<li class="cat-item"><a href="#" title="title">March</a></li>
						</ul>
	        		</li>
        		
        		</ul>
        		
        	</aside>
			<!-- ENDS sidebar -->
			
			
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->		
		
<!-- FOOTER -->
		<footer>
			<div class="wrapper cf">
			
				<!-- widgets -->
				<ul  class="widget-cols cf">
					<li class="first-col">
						
						<div class="widget-block">
							<h4>RECENT POSTS</h4>
							<div class="recent-post cf">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
							<div class="recent-post cf">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
							<div class="recent-post cf">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
						</div>
					</li>
					
					<li class="second-col">
						
						<div class="widget-block">
							<h4>ABOUT</h4>
							<p>Folder it's completely free this means you don't have to pay anything <a href="http://luiszuno.com/blog/license" tar >read license</a>.</p> 
							<p>Visit <a href="http://templatecreme.com/" >Template Creme</a> and find the most beautiful free templates up to date.</p>
						</div>
						
					</li>
					
					<li class="third-col">
						
						<div class="widget-block">
							<div id="tweets" class="footer-col tweet">
		         				<h4>TWITTER WIDGET</h4>
		         			</div>
		         		</div>
		         		
					</li>
					
					<li class="fourth-col">
						
						<div class="widget-block">
							<h4>CATEGORIES</h4>
							<ul>
								<li class="cat-item"><a href="#" >Design</a></li>
								<li class="cat-item"><a href="#" >Photo</a></li>
								<li class="cat-item"><a href="#" >Art</a></li>
								<li class="cat-item"><a href="#" >Game</a></li>
								<li class="cat-item"><a href="#" >Film</a></li>
								<li class="cat-item"><a href="#" >TV</a></li>
							</ul>
						</div>
		         		
					</li>	
				</ul>
				<!-- ENDS widgets -->	
				
				
				<!-- bottom -->
				<div class="footer-bottom">
					<div class="left">by <a href="http://luiszuno.com" >luiszuno.com</a></div>
						<ul id="social-bar" class="cf sb">
							<li><a href="http://www.facebook.com"  title="Become a fan" class="facebook">Facebbok</a></li>
							<li><a href="http://www.twitter.com" title="Follow my tweets" class="twitter"></a></li>
							<li><a href="http://plus.google.com" title="Enter my circles" class="plus"></a></li>
						</ul>
				</div>	
				<!-- ENDS bottom -->
			
			</div>
		</footer>
		<!-- ENDS FOOTER -->
		
	</body>
	
	
	
</html>