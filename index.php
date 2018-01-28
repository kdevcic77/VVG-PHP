<?php 
	define('__APP__', TRUE);
    session_start();
	include ("bazakonekcija.php");
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	include_once("functions.php");
print '
<!DOCTYPE html>
<html>
	<head>
		<title>News Portal</title>
		<meta http-equiv="content-type" content="text/html"; charset="utf-8">
		<meta name="description" content="Professional news portal">
		<meta name="keywords" content="latest news, newsletter, 24 hours a day">
		<meta name="author" content="Krešimir Devčić">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="shortcut icon" href="news.ico" />
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	</head>
<body>
	<header>
		<div id="header-inner">
		<nav>';
			include("menu.php");
		print '
		</nav>
		</div>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	else if ($menu == 2) { include("news.php"); }
	else if ($menu == 3) { include("contact.php"); }
	else if ($menu == 4) { include("about.php"); }
	else if ($menu == 5) { include("register.php"); }
	else if ($menu == 6) { include("signin.php"); }
	else if ($menu == 7) { include("admin.php"); }
	
	print '
	</main>
		
	<footer>
		<ul class="social">
		<li><a href="https://hr-hr.facebook.com/devinjo" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://plus.google.com/105962100788388620759" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="https://twitter.com/CroDeviano" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UC9CF4p-nfaKIJdKzH5sPaiA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
		</ul>
		<p>Copyright &copy; ' . date("Y") . ' Krešimir Devčić</p>

	</footer>
</body>
</html>';
?>
