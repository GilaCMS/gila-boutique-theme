<!DOCTYPE html>
<html lang="<?=Gila::config('language')?>">

<!--
---- Simple ecommerce template by http://gilacms.com
-->

<?php View::head()?>
<?php View::css('lib/gila.min.css');?>
<?php View::css('lib/bootstrap/bootstrap.min.css');?>
<?php View::css('lib/font-awesome/css/font-awesome.min.css');?>
<link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">
<?php View::css("themes/gila-boutique/style.css");?>

<body>

	<?php View::renderFile('shop-topnav.php')?>
	<div class="shop-header">
		<div style="text-align:center;padding:50px 0">
			<a href="<?=Gila::url('shop')?>" class="shop-title">My Boutique</a>
		</div>
	</div>

	<?php View::menu('mainmenu','shop-navbar.php')?>

	<div id="content">

	<div class="container-fluid">
<?php
if(Router::action()=='index') if(!$category) if(!$search) { ?>
	<div class="products-mondrian">
	<?php
	foreach (shop\models\product::get(['c'=>Gila::option('theme.featured-product-category',0)],8)[0] as $n=>$p) {
	  $href=Gila::make_url('shop','product',['id'=>$p['id'],'slug'=>$slug]);
	  ?>
	  <div style="z-index:<?=$n?>">
		<a href="<?=$href?>">
	  	<img data-src="<?=View::thumb_md($p['image'])?>" class="lazy img-responsive" alt="<?=$p['title']?>">
		<div class="boxed">
		  <?=$p['title']?><br><div class="product-price"><?=$p['price']?> <?=Gila::option('shop.currency')?></div>
		</div>
		</a>
	  </div>
	<?php } ?>
	</div>
	<hr>
<?php } ?>
