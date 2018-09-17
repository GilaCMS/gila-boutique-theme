<nav class="navbar" role="navigation">
<div class="container col-sm-12 navbar-container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" >
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li><a href=""><?=__("Home")?></a></li>
<?php
global $db,$controller;
$slugify = new Cocur\Slugify\Slugify();
$cats = $db->get("SELECT id,title FROM shop_category WHERE parent_id<1");
foreach ($cats as $cat) {
$slug = $slugify->slugify($cat['title']);
$cats2 = $db->get("SELECT id,title FROM shop_category WHERE parent_id={$cat['id']}");
if (count($cats2)>0) {
echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href=\"#\">{$cat['title']} <span class='caret'></span></a>";
echo '<ul class="dropdown-menu">';
foreach ($cats2 as $cat2) {
    $slug = $slugify->slugify($cat2['title']);
    echo "<li><a href=\"".gila::make_url('shop','',[
        'category'=>$cat2['id'],
        'slug'=>$slug
        ])."\">{$cat2['title']}</a></li>";
}
echo "</ul>";
}
else echo "<li><a href=\"".gila::make_url('shop','',[
'category'=>$cat['id'],
'slug'=>$slug
])."\">{$cat['title']}</a>";
echo "</li>";
}
?>

    </ul>
    </div><!--/.nav-collapse -->
</div>
</nav>
