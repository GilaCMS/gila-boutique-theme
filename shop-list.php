<?php
if(router::action()=='index') if(!$category) if(!$search) if(!$_GET['offers']) { ?>
		  <div class="products-mondrian">
		  <?php
		  foreach (shop\models\product::get(['c'=>gila::option('theme.featured-product-category',0)],8)[0] as $n=>$p) {
			  $href=gila::make_url('shop','product',['id'=>$p['id'],'slug'=>$slug]);
			  ?>
			  <div style="z-index:<?=$n?>">
				  <a href="<?=$href?>">
			  	<img data-src="<?=view::thumb_md($p['image'])?>" class="lazy img-responsive" alt="<?=$p['title']?>">
				<div class="boxed">
                    <?php 
                    $pos=mb_strpos($p['title'], ' ', 30);
                    if($pos>0){
                        echo mb_substr($p['title'],0,$pos);
                    } else echo $p['title'];
                    ?>
                <br><div class="product-price"><?=$p['price']?> <?=gila::option('shop.currency')?></div></div>
				</a>
		  	  </div>
		  <?php } ?>
	  	</div>
		<br>
<?php 
    return;
} ?>
<?php view::css("src/shop/assets/shop.css");?>
<div class="shop-list">
<div class="wrapper sidebar" style="grid-area:sidebar">
    <?php view::widget_area('sidebar')?>
</div>
<div class="products-list" style="grid-area:productlist">
<script src="src/core/assets/lazyImgLoad.js" async></script>

<?php
$slugify = new Cocur\Slugify\Slugify();

foreach ($products as $p) {
    $href=gila::make_url('shop','product',['id'=>$p['id'],'slug'=>$slug]);
    ?>
    <div class="product">
        <div class="product-body">
            <a href="<?=$href?>" class="thumb">
                <img data-src="<?=view::thumb_sm($p['image'])?>" class="lazy img-responsive" alt="Image">
            </a>
            <div class="product-title"><?=$p['title']?></div>
            <div class="product-price"><?=$p['price']?> <?=gila::option('shop.currency')?></div>
            <?=(@$p['old_price']>$p['price'])?'<del>'.$p['old_price'].'</del>':''?>
        </div>
        <div class="product-footer"><a class="g-btn" href="<?=$href?>"><?=__('Details')?></a></div>
    </div>
<?php } ?>
    </div>
    <!-- Pagination -->
    <div class="" style="margin:20px 0;text-align:center;grid-area:pagin">
        <ul class="g-nav g-pagination pagination">
            <?php
            for($pl=1;$pl<$totalpages+1;$pl++) {
                $active = "";
                if($pl==$page) $active="active";
                ?>
            <li class="<?=$active?>">
                <?php
                if($category) {
                    $slugify = new Cocur\Slugify\Slugify();
                    $cat = $category.'/'.$slugify->slugify($category_name);
                } else $cat = '';
                ?>
                <a href="<?=gila::url('shop').$cat?>?page=<?=$pl?>"><?=$pl?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
