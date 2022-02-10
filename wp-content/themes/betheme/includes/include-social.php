<?php
/**
 * Social Icons
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

// attributes

$attr = array();
$social_attr = mfn_opts_get('social-attr');

if (is_array($social_attr)) {
	if (isset($social_attr['blank'])) {
		$attr[] = 'target="_blank"';
	}
	if (isset($social_attr['nofollow'])) {
		$attr[] = 'rel="nofollow"';
	}
}

$attr = implode(' ', $attr);

// order

$social_links = mfn_opts_get('social-link');

// output -----

echo '<ul class="social">';

	if( ! empty( $social_links['order'] ) ){

		$social_links['order'] = explode( ',', $social_links['order'] );

		foreach( $social_links['order'] as $social ){

			$item = mfna_social($social);

			if( 'custom' == $social ){

				if (mfn_opts_get('social-custom-icon') &&  mfn_opts_get('social-custom-link')) {
					$title = mfn_opts_get('social-custom-title');
					echo '<li class="custom"><a '. $attr .' href="'. esc_url(mfn_opts_get('social-custom-link')) .'" title="'. esc_attr($title) .'"><i class="'. esc_attr(mfn_opts_get('social-custom-icon')) .'"></i></a></li>';
				}

			} elseif( 'rss' == $social ) {

				if (mfn_opts_get('social-rss')) {
					echo '<li class="rss"><a '. $attr .' href="'. esc_url(get_bloginfo('rss2_url')) .'" title="RSS"><i class="icon-rss"></i></a></li>';
				}

			} else {

				if( ! empty( $social_links[$social] ) ){
					echo '<li class="'. esc_attr($social) .'"><a '. $attr .' href="'. esc_attr( $social_links[$social] ) .'" title="'. esc_html($item['title']) .'"><i class="'. esc_attr($item['icon']) .'"></i></a></li>';
				}

			}

		}

	}

echo '</ul>';
