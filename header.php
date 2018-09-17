<!DOCTYPE html>
<html lang="<?=gila::config('language')?>">

<!--
---- Simple ecommerce template by http://gilacms.com
-->
	<head>
		<?php view::head()?>
		<?php view::css('lib/gila.min.css');?>
		<?php view::css('lib/bootstrap/bootstrap.min.css');?>
		<?php view::css('lib/font-awesome/css/font-awesome.min.css');?>
		<link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">
		<?php view::css("themes/gila-boutique/style.css");?>
	</head>

	<body>

		<?php view::renderFile('shop-topnav.php')?>
		<div class="shop-header">
			<div style="text-align:center;padding:50px 0">
				<a href="<?=gila::url('shop')?>" class="shop-title">My Boutique</a>
			</div>
		</div>

		<?php view::menu('mainmenu','shop-navbar.php')?>

		<div id="content">

		<div class="container-fluid">

