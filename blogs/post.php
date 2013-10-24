<?php include("../functions.php"); ?>
<?php include("components/header.php"); ?>
		
<?php $id = $_GET["id"]; ?>

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
	        		
	        		
				<?php getFullBlogPost($id); ?>
					
					
				<!-- comments list -->
				<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_sharethis_hcount' displayText='ShareThis'></span>
				<div id="comments-wrap">
					
				<!-- ENDS Respond -->
					
										
				
    		</div>
    		<!-- ENDS posts list -->
			
			<!-- sidebar -->
        	<aside id="sidebar">
        		
        		<!-- <ul>
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
        		
        		</ul> -->
        		
        	</aside>
			<!-- ENDS sidebar -->
			
			
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->		
		
<?php include("components/footer.php") ?>