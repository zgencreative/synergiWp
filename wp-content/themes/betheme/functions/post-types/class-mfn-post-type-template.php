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

if (! class_exists('Mfn_Post_Type_Template')) {
	class Mfn_Post_Type_Template extends Mfn_Post_Type
	{
		/**
		 * Mfn_Post_Type_Template constructor
		 */

		public $tmps;

		public function __construct(){

			if ( $visibility = mfn_opts_get( 'builder-visibility' ) ) {
				if( $visibility == 'hide' || ( !current_user_can( $visibility ) ) ) {
					return false;
				}
			}

			parent::__construct();

			// fires after WordPress has finished loading but before any headers are sent
			add_action('init', array($this, 'register'));

			$this->tmps = mfna_templates('single-product');

			// admin only methods

			if( is_admin() ){
				$this->fields = $this->set_fields();
				$this->builder = new Mfn_Builder_Admin();

				add_filter('views_edit-template', array( $this, 'list_tabs_wrapper' ));
				add_action('pre_get_posts', array( $this, 'filter_by_tab'));

				add_action( 'load-post.php',     array( $this, 'mfn_product_meta_box') );
    			add_action( 'load-post-new.php', array( $this, 'mfn_product_meta_box') );

    			if(function_exists('is_woocommerce')):
	    			add_filter( 'manage_template_posts_columns', array( $this, 'mfn_set_template_columns' ) );
	    			add_action( 'manage_template_posts_custom_column' , array( $this, 'mfn_template_column'), 10, 2 );
	    		endif;
			}
		}

		/**
		 * Templates list view display conditions
		 */

		public function mfn_set_template_columns($columns) {
			$columns['conditions'] = esc_html__('Conditions', 'mfn-opts');
    		return $columns;
		}

		public function mfn_template_column($column, $post_id){
			if($column == 'conditions'){
				$conditions = (array) json_decode( get_post_meta($post_id, 'mfn_template_conditions', true) );
				if(isset($conditions) && count($conditions) > 0){
					foreach($conditions as $c=>$con){
						if($con->rule == 'include'){ echo '<span style="color: green;">+ '; }else{ echo '<span style="color: red;">- '; }
						if($con->var == 'shop'){
							if( get_post_meta($post_id, 'mfn_template_type', true) == 'single-product' ){
								echo ' All products';
							}else{
								echo ' Shop';
							}
						}elseif($con->var == 'productcategory'){
							if($con->productcategory == 'all'){
								echo ' All categories';
							}else{
								$term = get_term_by('term_id', $con->productcategory, 'product_cat');
								echo 'Category: '.$term->name;
							}
						}elseif($con->var == 'producttag'){
							if($con->producttag == 'all'){
								echo ' All tags';
							}else{
								$term = get_term_by('term_id', $con->producttag, 'product_tag');
								echo 'Tag: '.$term->name;
							}
						}
						echo '</span><br>';
					}
				}
			}
		}

		/**
		 * Set post type fields
		 */

		public function set_fields(){

			$ref = parse_url(wp_get_referer());

			$type = 'default';

			if( isset($ref['query']) && $ref['query'] ){
				$ex_ref = explode('post_type=template&tab=', $ref['query']);
				if(isset($ex_ref[1])){
					$type = $ex_ref[1];
				}
			}

			$template_types = array(
				'default' => 'Page template',
			);
			if(function_exists('is_woocommerce')){
				$template_types['shop-archive'] = 'Shop archive';
				$template_types['single-product'] = 'Single product';
			}

			return array(
				'id' => 'mfn-meta-template',
				'title' => esc_html__('Template Options', 'mfn-opts'),
				'page' => 'template',
				'fields' => array(

					array(
	  					'id' => 'mfn_template_type',
	  					'type' => 'select',
	  					'class' => 'mfn_template_type',
	  					'title' => __('Template type', 'mfn-opts'),
	  					'options' => $template_types,
	  					'std' => $type,
  					),


  					// layout

  				array(
  					'title' => __('Layout', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-post-hide-content',
  					'type' => 'switch',
  					'title' => __('The content', 'mfn-opts'),
  					'desc' => __('The content from the WordPress editor', 'mfn-opts'),
  					'options'	=> array(
							'1' => __('Hide', 'mfn-opts'),
							'0' => __('Show', 'mfn-opts'),
						),
  					'std' => '0'
  				),

					array(
						'id' => 'mfn-post-layout',
						'type' => 'radio_img',
						'title' => __('Layout', 'mfn-opts'),
						'desc' => __('Full width sections works only without sidebars', 'mfn-opts'),
						'options' => array(
							'' => __('Use page options', 'mfn-opts'),
							'no-sidebar' => __('Full width', 'mfn-opts'),
							'left-sidebar' => __('Left sidebar', 'mfn-opts'),
							'right-sidebar' => __('Right sidebar', 'mfn-opts'),
							'both-sidebars' => __('Both sidebars', 'mfn-opts'),
							'offcanvas-sidebar' => __('Off-canvas sidebar', 'mfn-opts'),
						),
						'std' => mfn_opts_get('sidebar-layout'),
						'alias' => 'sidebar',
						'class' => 'form-content-full-width small',
					),

  				array(
  					'id' => 'mfn-post-sidebar',
  					'type' => 'select',
  					'title' => __('Sidebar', 'mfn-opts'),
  					'desc' => __('Shows only if layout with sidebar is selected', 'mfn-opts'),
  					'options' => mfn_opts_get('sidebars'),
  				),

  				array(
  					'id' => 'mfn-post-sidebar2',
  					'type' => 'select',
  					'title' => __('Sidebar 2nd', 'mfn-opts'),
  					'desc' => __('Shows only if layout with both sidebars is selected', 'mfn-opts'),
  					'options' => mfn_opts_get('sidebars'),
  				),

					// media

  				array(
  					'title' => __('Media', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-post-slider',
  					'type' => 'select',
  					'title' => __('Slider Revolution', 'mfn-opts'),
  					'options' => Mfn_Builder_Helper::get_sliders('rev'),
  				),

  				array(
  					'id' => 'mfn-post-slider-layer',
  					'type' => 'select',
  					'title' => __('Layer Slider', 'mfn-opts'),
  					'options' => Mfn_Builder_Helper::get_sliders('layer'),
  				),

  				array(
  					'id' => 'mfn-post-slider-shortcode',
  					'type' => 'text',
  					'title' => __('Slider shortcode', 'mfn-opts'),
  					'desc' => __('Paste slider shortcode if you use other slider plugin', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-post-subheader-image',
  					'type' => 'upload',
  					'title' => __('Subheader image', 'mfn-opts'),
  				),

					// options

  				array(
  					'title' => __('Options', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-post-one-page',
  					'type' => 'switch',
  					'title' => __('One Page', 'mfn-opts'),
  					'options'	=> array(
							'0' => __('Disable', 'mfn-opts'),
							'1' => __('Enable', 'mfn-opts'),
						),
  					'std' => '0'
  				),

					array(
  					'id' => 'mfn-post-full-width',
  					'type' => 'switch',
  					'title' => __('Full width', 'mfn-opts'),
  					'desc' => __('Set page to full width ignoring <a target="_blank" href="admin.php?page=be-options#general">Site width</a> option. Works for Layout Full width only.', 'mfn-opts'),
  					'options'	=> array(
							'0' => __('Disable', 'mfn-opts'),
							'site' => __('Enable', 'mfn-opts'),
							'content' => __('Content only', 'mfn-opts'),
						),
  					'std' => '0'
  				),

  				array(
  					'id' => 'mfn-post-hide-title',
  					'type' => 'switch',
  					'title' => __('Subheader', 'mfn-opts'),
  					'options'	=> array(
							'1' => __('Hide', 'mfn-opts'),
							'0' => __('Show', 'mfn-opts'),
						),
  					'std' => '0'
  				),

  				array(
  					'id' => 'mfn-post-remove-padding',
  					'type' => 'switch',
  					'title' => __('Content top padding', 'mfn-opts'),
  					'options' => array(
							'1' => __('Hide', 'mfn-opts'),
							'0' => __('Show', 'mfn-opts'),
						),
  					'std' => '0'
  				),

  				array(
  					'id' => 'mfn-post-custom-layout',
  					'type' => 'select',
  					'title' => __('Custom layout', 'mfn-opts'),
  					'desc' => __('Custom layout overwrites Theme Options', 'mfn-opts'),
  					'options' => $this->get_layouts(),
  				),

  				array(
  					'id' => 'mfn-post-menu',
  					'type' => 'select',
  					'title' => __('Custom menu', 'mfn-opts'),
  					'desc' => __('Does not work with Split Menu', 'mfn-opts'),
  					'options' => $this->get_menus(),
  				),

					// seo

  				array(
  					'title' => __('SEO', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-meta-seo-title',
  					'type' => 'text',
  					'title' => __('Title', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-meta-seo-description',
  					'type' => 'text',
  					'title' => __('Description', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-meta-seo-keywords',
  					'type' => 'text',
  					'title' => __('Keywords', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-meta-seo-og-image',
  					'type' => 'upload',
  					'title' => __('Open Graph image', 'mfn-opts'),
  					'desc' => __('Facebook share image', 'mfn-opts'),
  				),

					// custom css

  				array(
  					'title' => __('Custom CSS', 'mfn-opts'),
  				),

  				array(
  					'id' => 'mfn-post-css',
  					'type' => 'textarea',
  					'title' => __('Custom CSS', 'mfn-opts'),
  					'desc' => __('Custom CSS code for this page', 'mfn-opts'),
  					'class' => 'form-content-full-width',
						'cm' => 'css',
  				),


				),
			);
		}

		/**
		 * Register new post type and related taxonomy
		 */

		public function register()
		{
			$labels = array(
				'name' => esc_html__('Templates', 'mfn-opts'),
				'singular_name' => esc_html__('Template', 'mfn-opts'),
				'add_new' => esc_html__('Add New', 'mfn-opts'),
				'add_new_item' => esc_html__('Add New Template', 'mfn-opts'),
				'edit_item' => esc_html__('Edit Template', 'mfn-opts'),
				'new_item' => esc_html__('New Template', 'mfn-opts'),
				'view_item' => esc_html__('View Template', 'mfn-opts'),
				'search_items' => esc_html__('Search Template', 'mfn-opts'),
				'not_found' => esc_html__('No templates found', 'mfn-opts'),
				'not_found_in_trash' => esc_html__('No templates found in Trash', 'mfn-opts'),
				'parent_item_colon' => ''
			  );

			$args = array(
				'labels' => $labels,
				'menu_icon' => 'dashicons-align-wide',
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 3,
				'rewrite' => array('slug'=>'template-item', 'with_front'=>true),
				'supports' => array( 'title', 'author' ),
			);

			register_post_type('template', $args);
		}

		public function filter_by_tab($query){

			$tab = '';

	        if ( is_admin() && $query->get('post_type') == 'template' && ( !$query->get('post_status') || empty($query->get('post_status')) ) ) {

	        	if(!function_exists('is_woocommerce')){
					$meta_query = array(
						array(
							'key'=> 'mfn_template_type',
							'value'=> 'single-product',
							'compare'=> '!=',
						),
						array(
							'key'=> 'mfn_template_type',
							'value'=> 'shop-archive',
							'compare'=> '!=',
						),
					);
					$query->set('meta_query',$meta_query);
				}


	            if( !empty($_GET['tab']) ) $tab = $_GET['tab'];

	            if(!empty( $tab )):
					$meta_query = array(
						array(
							'key'=> 'mfn_template_type',
							'value'=> $tab,
							'compare'=> '=',
						),
					);
					$query->set('meta_query',$meta_query);
				endif;
	        }

		}


		public function list_tabs_wrapper($actions) {
			global $post_ID;
			$screen = get_current_screen();

			$tab = null;

			if( isset($screen->post_type) && $screen->post_type == 'template' ) :

			if( !empty($_GET['tab']) && ( empty($_GET['post_status']) ) ) $tab = $_GET['tab'];
			?>

			<nav class="nav-tab-wrapper" style="margin-bottom: 30px;">
				<a href="?post_type=template" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">All</a>
				<a href="?post_type=template&tab=default" class="nav-tab <?php if($tab==='default'):?>nav-tab-active<?php endif; ?>">Page templates</a>
				<?php if(function_exists('is_woocommerce')): ?>
				<a href="?post_type=template&tab=shop-archive" class="nav-tab <?php if($tab==='shop-archive'):?>nav-tab-active<?php endif; ?>">Shop archive</a>
				<a href="?post_type=template&tab=single-product" class="nav-tab <?php if($tab==='single-product'):?>nav-tab-active<?php endif; ?>">Single product</a>
				<?php endif; ?>
		    </nav>

			<?php endif;

			return $actions;

		}

		/**
		 * Product edit view
		 */

		public function mfn_product_meta_box(){
			add_action( 'add_meta_boxes', array( $this, 'productTemplate'));
			add_action( 'save_post', array( $this, 'saveProductTemplate'));
		}

		public function productTemplate() {
		    add_meta_box( 'mfn-product-templates-choose', __( 'Single product template', 'textdomain' ), array($this, 'productTemplateField'), 'product', 'side');
		}

		public function productTemplateField($post) {
			echo '<p class="post-attributes-label-wrapper page-template-label-wrapper"><label class="post-attributes-label" for="mfn-template-choose">Muffin Builder Template</label></p>';

			wp_nonce_field( 'mfn-product-templates-choose', 'mfn_single_product_nonce' );

			$value = get_post_meta( $post->ID, 'mfn_single_product_template', true );

			echo '<select id="mfn-template-choose" name="mfn_single_product_template">';
			if(count($this->tmps) > 0){
				foreach ($this->tmps as $o => $opt) {
					if($o == $value){
						echo '<option selected value="'.$o.'">'.$opt.'</option>';
					}else{
						echo '<option value="'.$o.'">'.$opt.'</option>';
					}
				}
			}
			echo '</select>';
		}

		public function saveProductTemplate( $post_id ){
			if(get_post_type($post_id) == 'product' && !empty($_POST['mfn_single_product_nonce'])){
				$nonce = $_POST['mfn_single_product_nonce'];

		        if ( ! wp_verify_nonce( $nonce, 'mfn-product-templates-choose' ) ) {
		            return $post_id;
	        	}

				$data = sanitize_text_field( $_POST['mfn_single_product_template'] );
	        	update_post_meta( $post_id, 'mfn_single_product_template', $data );
        	}
		}

		/**
		 * END Product edit view
		 */

	}
}

new Mfn_Post_Type_Template();
