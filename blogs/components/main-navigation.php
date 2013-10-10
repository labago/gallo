<ul id="nav" class="sf-menu">
	<li>
		<?php if($fb_user)
		{
			echo "<a href='#'>Welcome ".$user_profile['first_name']."</a>";
		}
		else
		{
			echo "<a href='".$loginUrl."'>Connect With Facebook</a>";
		}
		?>
	</li>
	<li><a href="../index.php"><span>HOME</span></a></li>
	<li><a href="../blog.php">BLOG</a>
		<ul>
			<li><a href="nba.php">NBA</a></li>
			<li><a href="mlb.php">MLB</a></li>
			<li><a href="nfl.php">NFL</a></li>
			<li><a href="college-football.php">College Footbal</a></li>
		</ul>
	</li>
	<!-- <li><a href="../page.html">ABOUT</a></li> -->
	<li><a href="../contact.php">CONTACT</a></li>
</ul>