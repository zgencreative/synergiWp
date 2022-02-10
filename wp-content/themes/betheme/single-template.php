<?php
/**
 * Single Template
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */

if( in_array( get_post_meta(get_the_ID(), 'mfn_template_type', true), array('single-product', 'shop-archive')) ){
	get_header( 'shop' );
}else{
	get_header();
}
?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<div class="sections_group">

			<div class="entry-content" itemprop="mainContentOfPage">

				<div class="product">
				<?php

					$mfn_builder = new Mfn_Builder_Front(get_the_ID());
					$mfn_builder->show();
					
				?>
				</div>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php 
if( in_array( get_post_meta(get_the_ID(), 'mfn_template_type', true), array('single-product', 'shop-archive')) ){
	get_footer( 'shop' );
}else{
	get_footer();
}
