<?php
	if(!defined('__APP__')) {
		die("Pokušaj neovlaštenog pristupa");
	}
	$MySQL = mysqli_connect("localhost","root","","newsportal") or die('Greška kod spajanja na MySQL server.');