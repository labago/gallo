<?php include("functions.php"); ?>
<?php include("components/header.php"); ?>
		
		<!-- MAIN -->
		<div class="main">
			<div class="wrapper cf">
			
			
				
			<!-- page content-->
        	<div id="page-content" class="cf">        	
				
				
				<p><h3>CONTACT FORM</h3></p>
				<p>Use this contact form to get in touch with us.</p>
				<!-- form -->
				<script type="text/javascript" src="js/form-validation.js"></script>
				<form id="contactForm" action="#" method="post">
					<fieldset>
														
						<p>
							<label for="name" >Name</label>
							<input name="name"  id="name" type="text" class="form-poshytip" title="Enter your full name" />
						</p>
						
						<p>
							<label for="email" >Email</label>
							<input name="email"  id="email" type="text" class="form-poshytip" title="Enter your email address" />
						</p>
						
						<p>
							<label for="web">Website</label>
							<input name="web"  id="web" type="text" class="form-poshytip" title="Enter your website" />
						</p>
						
						<p>
							<label for="comments">Message</label>
							<textarea  name="comments"  id="comments" rows="5" cols="20" class="form-poshytip" title="Enter your comments"></textarea>
						</p>
						
						<p><input type="button" value="Send" name="submit" id="submit" /> <span id="error" class="warning">Message</span></p>
					</fieldset>
					
				</form>
				<p id="sent-form-msg" class="success"><b>Sent! Thanks for your comments.</b></p>
				<!-- ENDS form -->				
				
    		</div>
    		<!-- ENDS page content-->
			
			
			
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->
		
<?php include("components/footer.php"); ?>