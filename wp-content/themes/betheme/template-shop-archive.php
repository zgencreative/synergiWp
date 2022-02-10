<?php

// 1. by conditions (cat, tags)
// 2. from theme options by default

if( function_exists( 'mfn_ID' ) ){
	$tmp_id = mfn_ID();
}

if( isset( $tmp_id ) && is_numeric( $tmp_id ) && get_post_status( $tmp_id ) == 'publish' && get_post_type( $tmp_id ) == 'template' ){
	
	$mfn_builder = new Mfn_Builder_Front($tmp_id);
	$mfn_builder->show();

} else {
	echo '<div class="section">';
		echo '<div class="section_wrapper clearfix default-woo-list">';
			woocommerce_content();
		echo '</div>';
	echo '</div>';
}


?>
