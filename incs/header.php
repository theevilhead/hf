<div id="header">
	<div class="header-wrap">
		<div class="logo">
			<a href="/projects/hf">Smarty pants
		</div>
		<div class="nav">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Students list</a></li>
			<?PHP 

			if(isset($_SESSION['user_id'])){
				echo '
				<li><a href="">Start a campaign</a></li>
				';
			}

			?>
				<li><a href="">Log in</a></li>
			</ul>
		</div>
	</div>
</div>