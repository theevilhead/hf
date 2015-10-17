<div id="header">
	<div class="header-wrap">
		<div class="logo">
			<a href="/projects/hf">Illuminate
		</div>
		<div class="nav">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="/projects/hf/st">Students list</a></li>
			<?PHP 

			if(isset($_SESSION['user_id'])){
				echo '
				<li><a href="">Start a campaign</a></li>
				';
			}else{
				echo '<li><a href="/projects/hf/l.php">Log in</a></li>';
				echo '<li><a href="/projects/hf/s.php">Sign up</a></li>';
			}

			?>
			</ul>
		</div>
	</div>
</div>