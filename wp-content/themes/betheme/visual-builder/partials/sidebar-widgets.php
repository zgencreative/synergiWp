<?php  
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

if( get_post_type($post->ID) == 'template' && get_post_meta($post->ID, 'mfn_template_type', true) != 'default' ){
	$tmpl_items = get_post_meta($post->ID, 'mfn_template_type', true);
}

echo '<div class="panel panel-items" id="mfn-widgets-list">
        <div class="panel-search mfn-form">
            <input class="mfn-form-control mfn-form-input search mfn-search" type="text" placeholder="Search">
        </div>
        <ul class="items-list list clearfix">';

		foreach($widgets as $w=>$widget){
			if( 
				( !in_array($widget['cat'], array('shop-archive', 'single-product')) ) || 
				( isset($tmpl_items) && $tmpl_items == 'single-product' && $widget['cat'] != 'shop-archive' ) || 
				( isset($tmpl_items) && $tmpl_items == 'shop-archive' && $widget['cat'] != 'single-product' ) 
			){
				echo '<li class="mfn-item-'.$w.' category-'.$widget['cat'].'" data-title="'.$widget['title'].'" data-type="'.$w.'"><a href="#"><div class="mfn-icon card-icon"></div><span class="title">'.$widget['title'].'</span></a></li>';
			}
		}

echo '</ul>
</div>';
?>