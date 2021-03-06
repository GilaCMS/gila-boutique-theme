<nav class="navbar" role="navigation">
<div class="container col-sm-12 navbar-container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" >
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
    <ul class="g-nav nav navbar-nav">
    <?php
use core\models\page as page;

$menu_items = $menu_data['children'];

foreach ($menu_items as $mi) {
    if (!isset($mi['children'])) {
        echo menu_item($mi,'li')."</li>";
    }
    else {
        echo menu_item($mi);
        if (isset($mi['children'])) if (isset($mi['children'][0])) {
            echo "<ul class=\"dropdown-menu\" role=\"menu\">";
            foreach ($mi['children'] as $mii) {
                echo menu_item($mii)."</li>";
            }
            echo "</ul></li>";
        }
    }
}

function menu_item($mi, $tag=''){
    global $db;

    $url = isset($mi['url'])?$mi['url']:(Router::url().'#');
    $name = isset($mi['name'])?$mi['name']:'';

    if($mi['type']=='page') {
        if($r=page::getById(@$mi['id'])){
            $url = $r['slug'];
            $name = $r['title'];
        }
    }
    if($mi['type']=='postcategory') {
        $ql = "SELECT id,title FROM postcategory WHERE id=?;";
        $res = $db->query($ql,@$mi['id']);
        while($r=mysqli_fetch_array($res)){
            $url = "category/".$r[0];
            $name = $r[1];
        }
    }
    if($mi['type']=='widget') {
        echo '<li><a href=\"'.$url.'\" >'.$mi['name'].'</a><ul style="min-width:240px">';
        View::widget_body(@$mi['widget']);
        echo '</ul>';
        return;
    }
    if($mi['type']=='link') {

    }
    if($res = menuItemTypes::get($mi)) {
        list($url,$name) = $res;
    }

    if(Router::url()==$url) {
        return "<li class=\"active\"><a href=\"$url\">$name</a>";
    }
    return "<li><a href=\"$url\" >$name</a>";
}
?>

    </ul>
    </div><!--/.nav-collapse -->
</div>
</nav>
