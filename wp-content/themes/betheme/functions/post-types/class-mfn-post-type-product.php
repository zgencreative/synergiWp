<?php
/**
 * Custom post type: Template
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (! class_exists('Mfn_Post_Type_Product')) {
	class Mfn_Post_Type_Product extends Mfn_Post_Type
	{

		/**
		 * Mfn_Post_Type_Product constructor
		 */

		public function __construct()
		{
			parent::__construct();

			// fires after WordPress has finished loading but before any headers are sent
			//add_action('init', array($this, 'defaults'));

			// admin only methods

			if( is_admin() ){
				$this->fields = $this->set_fields();
				$this->builder = new Mfn_Builder_Admin();

			}

		}

		/*public function defaults() {
			remove_post_type_support( 'product', 'editor' );
		}*/

		/**
		 * Set post type fields
		 */

		public function set_fields(){

			$ref = parse_url(wp_get_referer());

			$type = 'default';

			return array(
				'id' => 'mfn-meta-product',
				'title' => esc_html__('Product Options', 'mfn-opts'),
				'page' => 'product',
				'fields' => array(

				),
			);
		}


	}
}

new Mfn_Post_Type_Product();
