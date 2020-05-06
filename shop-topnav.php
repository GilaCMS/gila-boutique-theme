<nav class="top-nav" role="navigation">
    <ul class="nav navbar-nav">
<?php
//global $db,$controller;
if(isset($cart_items)){ ?>
        <li><a class="cart-btn" style="padding:10px" href="<?=Gila::url('shop/cart')?>"><i class="fa fa-shopping-cart"></i> <?=__("Cart")?> (<?=$cart_items?>)</a></li>
    <?php } ?>
    <li>
    <?php View::widget_body('search')?>
    	<!--form method="get" class="inline-flex" style="margin:6px" action="<?=Gila::make_url('shop')?>">
    		<input name="search" class="g-input" value="" style="width:120px">
    		<button class="g-btn g-group-item" onclick="submit"><i class="fa fa-search"></i></button>
    	</form-->
    <li>
    </ul>
</nav>