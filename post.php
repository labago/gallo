<?php include("functions.php"); ?>
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
					<!-- <h4 class="heading">5 Comments</h4> -->
					
					<ol class="commentlist">
					  
					           
						<!-- <li class="comment even thread-even depth-1" id="li-comment-1">
							
							<div id="comment-1" class="comment-body cf">
						     	<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
						     	<div class="comment-author vcard">Jhon</div>
						        <div class="comment-meta commentmetadata">
							  		<span class="comment-date">3 days ago  </span>
									<span class="comment-reply-link-wrap"><a class='comment-reply-link' href='replytocom=23#respond' onclick='return addComment.moveForm("comment-1", "1", "respond", "432")'>Reply</a></span>
									
								</div>
						  		<div class="comment-inner">
							   		<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
						 		</div>
					     	</div>
					
							<ul class='children'>
					  			<li class="comment even alt depth-2" id="li-comment-2-1">
									<div id="comment-2" class="comment-body cf">
										<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
					      				<div class="comment-author vcard">Jhon</div>
										<div class="comment-meta commentmetadata">
					  						<span class="comment-date">1 hour ago  </span>
											<span class="comment-reply-link-wrap"><a class='comment-reply-link' href='replytocom=24#respond' onclick='return addComment.moveForm("comment-2", "2", "respond", "432")'>Reply</a></span>
										</div>
					  					<div class="comment-inner">
								   			<p>Pellentesque ornare sem lacinia quam venenatis vestibulum. Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis.</p>
					     			 	</div>
					 				</div>
								</li>
								
								<li class="comment odd alt depth-2" id="li-comment-2-2">
									<div id="comment-3" class="comment-body cf">
										<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
					      				<div class="comment-author vcard">Jhon</div>
										<div class="comment-meta commentmetadata">
					  						<span class="comment-date">1 hour ago  </span>
											<span class="comment-reply-link-wrap"><a class='comment-reply-link' href='replytocom=24#respond' onclick='return addComment.moveForm("comment-3", "2", "respond", "432")'>Reply</a></span>
										</div>
					  					<div class="comment-inner">
								   			<p>Pellentesque ornare sem lacinia quam venenatis vestibulum. Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis.</p>
					     			 	</div>
					 				</div>
								</li>
								
								
							</ul>
						</li>
						
						
						<li class="comment odd thread-even depth-1" id="li-comment-3">
							
							<div id="comment-4" class="comment-body cf">
						     	<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
						     	<div class="comment-author vcard">Jhon</div>
						        <div class="comment-meta commentmetadata">
							  		<span class="comment-date">3 days ago  </span>
									<span class="comment-reply-link-wrap"><a class='comment-reply-link' href='replytocom=23#respond' onclick='return addComment.moveForm("comment-4", "1", "respond", "432")'>Reply</a></span>
									
								</div>
						  		<div class="comment-inner">
							   		<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
						 		</div>
					     	</div>
					    </li>
					    
					    
					    
					    
					    
					    <li class="comment even thread-even depth-1" id="li-comment-4">
							
							<div id="comment-5" class="comment-body cf">
						     	<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
						     	<div class="comment-author vcard">Jhon</div>
						        <div class="comment-meta commentmetadata">
							  		<span class="comment-date">3 days ago  </span>
									<span class="comment-reply-link-wrap"><a class='comment-reply-link' href='replytocom=23#respond' onclick='return addComment.moveForm("comment-5", "1", "respond", "432")'>Reply</a></span>
									
								</div>
						  		<div class="comment-inner">
							   		<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
						 		</div>
					     	</div>
					    </li>
					    
					    
					    
					    
					    -->
						
					</ol>
				</div>
				<!-- ENDS comments list -->
						
						
				<!-- Respond -->				
				<div id="respond">
					<!-- <h3 id="reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/themes/wp-simpler/archives/34#respond" style="display:none;">Cancel reply</a></small></h3>
					
					
					<form action="single.html" method="post" id="commentform">
					<p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
					
					<p class="comment-form-author"><label for="author">Name<span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true"></p>
					
					<p class="comment-form-email"><label for="email">Email<span class="required">*</span></label> <input id="email" name="email" type="text" value="" size="30" aria-required="true"></p>
	<p class="comment-form-url"><label for="url">Website</label><input id="url" name="url" type="text" value="" size="30"></p>
					
					<p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>						
													
					<p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p>						
					
					<p class="form-submit">
						<input name="submit" type="submit" id="submit" value="Post Comment">
						<input type="hidden" name="comment_post_ID" value="34" id="comment_post_ID">
						<input type="hidden" name="comment_parent" id="comment_parent" value="0">
					</p>
					
					</form> -->
				</div>
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