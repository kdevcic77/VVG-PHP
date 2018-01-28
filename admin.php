<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		print '
		<div class="container">
		<h1>Administration of site</h1>
			<div id="admin">
			<ul>
				<li><a href="index.php?menu=7&amp;action=1">Users</a></li>
				<li><a href="index.php?menu=7&amp;action=2">News</a></li>
			</ul>';
			if ($action == 1) { include("admin/users.php"); }
			else if ($action == 2) { include("admin/news.php"); }
			print '
			</div>
		</div>';
	}
	else {
		$_SESSION['message'] = '<div class="container"><p class="poruka_BAD">Please register or login using your credentials!</p></div>';
		header("Location: index.php?menu=6");
	}
?>