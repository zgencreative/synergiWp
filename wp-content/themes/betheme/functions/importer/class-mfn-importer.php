<?php
/**
 * Pre-built websites
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 * @version 2.3
 */

if ( ! defined( 'ABSPATH' ) ){
	exit;
}

class Mfn_Importer {

	private $error	= array();
	private $failed	= array();

	private $demo = ''; // current demo
	private $builder = ''; // demo builder if there is more than one builder available for this demo
	private $url = ''; // current demo url
	private $demo_builder = ''; // current demo + builder, ie. shop_el

	private $demos = array();

	private $categories = array(
		'bus'	=> 'Business',
		'ent'	=> 'Entertainment',
		'cre'	=> 'Creative',
		'blo'	=> 'Blog',
		'por'	=> 'Portfolio',
		'one'	=> 'One Page',
		'sho'	=> 'Shop',
		'ele'	=> 'Elementor',
		'oth'	=> 'Other',
	);

	private $plugins = array(
		'bud'	=> array(
			'name' 	=> 'BuddyPress',
			'class' => 'BuddyPress',
			's'	=> 'BuddyPress',
		),
		'cf7'	=> array(
			'name' => 'Contact Form 7',
			'class' => 'WPCF7',
		),
		'ele'	=> array(
			'name' => 'Elementor',
			'class' => 'Elementor\Plugin',
		),
		'mch'	=> array(
			'name' => 'MailChimp',
			'class' => 'MC4WP_MailChimp',
			's' => 'Mailchimp+for+WordPress',
		),
		'rev'	=> array(
			'name' => 'Revolution Slider',
			'class' => 'RevSlider',
		),
		'woo'	=> array(
			'name' => 'WooCommerce',
			'class'	=> 'WooCommerce',
			's'	=> 'WooCommerce',
		),
	);

	/**
	 * Constructor
	 */

	function __construct() {

		// Set demos list

		require_once(get_theme_file_path('/functions/importer/demos.php'));
		$this->demos = $demos;

		// It runs after the basic admin panel menu structure is in place

		add_action( 'admin_menu', array( $this, 'init' ), 3 );

		// Removes Elementor filter in case it will be deprecated some day and add our own code
		// https://github.com/elementor/elementor/issues/10774

		remove_filter( 'wp_import_post_meta', array( 'Elementor\Compatibility', 'on_wp_import_post_meta') );
		// Fixed in WordPress Importer 0.7, we do not need it anymore
		// add_filter( 'wp_import_post_meta', array( $this, 'on_wp_import_post_meta') );

		// Ajax | database reset

		add_action('wp_ajax_mfn_db_reset', array( $this, '_db_reset' ));

	}

	/**
	 *
	 */

	public function _db_reset()
	{
		global $wpdb;

		check_ajax_referer( 'mfn-importer-nonce', 'mfn-importer-nonce' );

		$wpdb->query( "TRUNCATE TABLE $wpdb->posts" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->postmeta" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->comments" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->commentmeta" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->terms" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->termmeta" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->term_taxonomy" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->term_relationships" );
		$wpdb->query( "TRUNCATE TABLE $wpdb->links" );

		esc_html_e('Database was reset', 'mfn-opts');

		exit;
	}

	/**
	 * Add theme page & enqueue styles
	 */

	function init() {

		$this->page = add_submenu_page(
			apply_filters('betheme_dynamic_slug', 'betheme'),
			__( 'Install pre-built website', 'mfn-opts' ),
			__( 'Pre-built websites', 'mfn-opts' ),
			'edit_theme_options',
			apply_filters('betheme_slug', 'be').'-websites',
			array( $this, 'import' )
		);

		add_action( 'admin_print_styles-'.$this->page, array( $this, '_enqueue' ) );

	}

	/**
	 * Enqueue
	 */

	function _enqueue(){

		wp_enqueue_style('mfn-import', get_theme_file_uri('/functions/importer/css/style.css'), false, MFN_THEME_VERSION, 'all');
		wp_enqueue_script('mfn-import', get_theme_file_uri('/functions/importer/js/scripts.js'), false, MFN_THEME_VERSION, true);

	}

	/**
	 * Process post meta before WP importer.
	 *
	 * Normalize Elementor post meta on import, We need the `wp_slash` in order
	 * to avoid the unslashing during the `add_post_meta`
	 *
	 * @todo: Required by WordPress Importer 0.6.4 - can be removed when migrate to 0.7
	 */

	function on_wp_import_post_meta( $post_meta ) {

		foreach ( $post_meta as &$meta ) {
			if ( '_elementor_data' === $meta['key'] ) {
				$meta['value'] = wp_slash( $meta['value'] );
				break;
			}
		}

		return $post_meta;
	}

	/**
	 * Demo URL
	 *
	 * Get demo url to replace
	 *
	 * @param string $demo
	 * @return string
	 */

	function get_demo_url(){

		if( 'theme' == $this->demo_builder ){

			$url = 'https://themes.muffingroup.com/betheme/';

		} elseif( 'bethemestore' == $this->demo_builder ){

			$url = 'https://themes.muffingroup.com/betheme-store/';

		} elseif( 'bethemestore_el' == $this->demo_builder ){

			$url = 'https://themes.muffingroup.com/betheme-store_el/';

		} else {

			$url = array(
				'http://themes.muffingroup.com/be/'. $this->demo_builder .'/',
				'https://themes.muffingroup.com/be/'. $this->demo_builder .'/',
			);

		}

		return $url;
	}

	/**
	 * Get FILE data
	 *
	 * @param $file string
	 * @param $method string
	 * @return string
	 */

	function get_file_data( $path ){

		$data = false;
		$path = wp_normalize_path( $path );
		$wp_filesystem = Mfn_Helper::filesystem();

		if( $wp_filesystem->exists( $path ) ){

			if( ! $data = $wp_filesystem->get_contents( $path ) ){

				$fp = fopen( $path, 'r' );
				$data = fread( $fp, filesize( $path ) );
				fclose( $fp );

			}

		}

		return $data;
	}

	/**
	 * Elementor
	 */

	function elementor_settings(){

		$wrapper = '1140';

		if( isset( $this->demos[$this->demo]['wrapper'] ) ){
			$wrapper = $this->demos[$this->demo]['wrapper'];
		}

		$settings = [
			'elementor_cpt_support' => [ 'post', 'page', 'product', 'portfolio' ],
			'elementor_disable_color_schemes' => 'yes',
			'elementor_disable_typography_schemes' => 'yes',
			'elementor_load_fa4_shim' => 'yes',

			// Elementor < 3.0
			'elementor_container_width' => $wrapper,
			'elementor_stretched_section_container' => '#Wrapper',
			'elementor_viewport_lg' => '960',
		];

		foreach ( $settings as $key => $value ) {
			update_option( $key, $value );
		}

		// Elementor 3.0 +

		if ( class_exists( 'Elementor\Plugin' ) ){
			if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.0', '>=' )) {

				$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit();

				if ( ! $kit->get_id() ) {

					// FIX: Elementor 3.3 + | default Kit do not exists after Database Reset

					$created_default_kit = \Elementor\Plugin::$instance->kits_manager->create_default();

					if ( ! $created_default_kit ) {
						return false;
					}

					update_option( \Elementor\Core\Kits\Manager::OPTION_ACTIVE, $created_default_kit );

					$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit();

				}

				$kit->update_settings( [
					'container_width' => array(
						'size' => $wrapper,
					),
					'stretched_section_container' => '#Wrapper',
					'viewport_lg' => '960',
				] );

			}
		}

	}

	/**
	 * Import | Content
	 *
	 * @param string $file
	 * @param string $demo
	 */

	function import_content( $file ){

		$this->import_xml( $file );

		// Muffin Builder

		$this->replace_builder();

		// Elementor

		$this->replace_elementor();
		$this->elementor_settings();

		if ( class_exists( 'Elementor\Plugin' ) ){
			Elementor\Plugin::$instance->files_manager->clear_cache();
		}

	}

	/**
	 * Import | XML
	 *
	 * @param string $file
	 */

	function import_xml( $file ){

		$import = new WP_Import();

		if( $_POST[ 'attachments' ] && ( $_POST[ 'type' ] == 'complete' ) ){
			$import->fetch_attachments = true;
		} else {
			$import->fetch_attachments = false;
		}

		ob_start();
		$import->import( $file );
		ob_end_clean();
	}

	/**
	 * Import | Remove all menus
	 * TIP: Useful on slower servers when we need to resume downloading
	 */

	function remove_menus(){

		global $wpdb;

		$wpdb->query( $wpdb->prepare(
			"DELETE a,b,c
    	FROM wp_posts a
    	LEFT JOIN wp_term_relationships b
        ON (a.ID = b.object_id)
    	LEFT JOIN wp_postmeta c
        ON (a.ID = c.post_id)
    	WHERE a.post_type = %s",
			"nav_menu_item" ) );

	}

	/**
	 * Import | Menu - Locations
	 *
	 * @param string $file
	 */

	function import_menu_location( $file ){

		$file_data = $this->get_file_data( $file );
		$data = unserialize( call_user_func( 'base'.'64_decode', $file_data ) );

		if( is_array( $data ) ){

			$menus = wp_get_nav_menus();

			foreach( $data as $key => $val ){
				foreach( $menus as $menu ){
					if( $val && $menu->slug == $val ){
						$data[$key] = absint( $menu->term_id );
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $data );

		} else {

			$this->failed['menu'] = true;

		}
	}

	/**
	 * Set homepage
	 */

	 function set_pages(){

 		update_option( 'show_on_front', 'page' );

 		$defaults = [
 			'page_on_front' => 'Home',
 			'page_for_posts' => 'Blog',
 			'woocommerce_shop_page_id' => 'Shop',
 			'woocommerce_cart_page_id' => 'Cart',
 			'woocommerce_checkout_page_id' => 'Checkout',
 			'woocommerce_myaccount_page_id' => 'My account',
 			'woocommerce_terms_page_id' => 'Privacy Policy',
 		];

 		if( ! empty( $this->demos[$this->demo]['pages'] ) ){
 			$pages = $this->demos[$this->demo]['pages'];
 		} else {
 			$pages = [];
 		}

 		$pages = array_merge( $defaults, $pages );

 		foreach ( $pages as $slug => $title ) {

 			$post = get_page_by_title( $title );

 			$post_id = ( $post && ! empty( $post->ID ) ) ? $post->ID : '';

 			update_option( $slug, $post_id );

 		}

 	}

	/**
	 * Regenerate static class
	 * Stiic CSS files generated for styles in: builder > element > style tab
	 */

	function regenerate_CSS(){

		$items = get_posts( array(
			'post_type' => array( 'page', 'post', 'template', 'portfolio' ),
			'post_status' => 'publish',
			'posts_per_page' => -1,
		) );

		if( ! empty( $items ) && is_array( $items ) ){
			foreach( $items as $item ){
				if( get_post_meta( $item->ID, 'mfn-page-local-style') ){
					$mfn_styles = json_decode( get_post_meta( $item->ID, 'mfn-page-local-style', true ) );
					Mfn_Helper::generate_css( $mfn_styles, $item->ID );
				}
			}
		}

	}

	/**
	 * Import | Theme Options
	 *
	 * @param string $file
	 * @param string $url
	 */

	function import_options( $file ){

		$file_data 	= $this->get_file_data( $file );
		$data = unserialize( call_user_func( 'base'.'64_decode', $file_data ) );

		if( is_array( $data ) ){

			// images URL | replace exported URL with destination URL

			if( $this->url ){
				$replace = home_url('/');
				foreach( $data as $key => $option ){
					if( is_string( $option ) ){
						// variable type string only
						$option = $this->replace_multisite( $option );
						$data[$key] = str_replace( $this->url, $replace, $option );
					}
				}
			}

			ob_start();
			update_option( 'betheme', $data );
			ob_end_clean();

		} else {

			$this->failed['options'] = true;

		}
	}

	/**
	 * Import | Widgets
	 *
	 * @param string $file
	 */

	function import_widget( $file ){

		$file_data = $this->get_file_data( $file );

		if( $file_data ){

			$this->import_widget_data( $file_data );

		} else {

			$this->failed['widgets'] = true;

		}
	}

	/**
	 * Import | Revolution Slider
	 *
	 * @param string $demo
	 */

	function import_slider( $demo_path ){

		$sliders = array();
		$demo_args = $this->demos[ $this->demo ];

		if( ! isset( $demo_args['plugins'] ) ){
			return false;
		}

		if( false === array_search( 'rev', $demo_args['plugins'] ) ){
			return false;
		}

		if( ! class_exists( 'RevSliderSlider' ) ){
			return false;
		}

		if( isset( $demo_args['revslider'] ) ){

			// multiple sliders
			foreach( $demo_args['revslider'] as $slider ){
				$sliders[] = $slider;
			}

		} else {

			// single slider
			$sliders[] = $this->demo_builder .'.zip';

		}

		if( method_exists( 'RevSliderSlider', 'importSliderFromPost' ) ){

			// RevSlider < 6.0

			$revslider = new RevSliderSlider();

			foreach( $sliders as $slider ){

				ob_start();
					$file = wp_normalize_path( $demo_path .'/'. $slider );
					$revslider->importSliderFromPost( true, false, $file );
				ob_end_clean();

			}

		} elseif( method_exists( 'RevSliderSliderImport', 'import_slider' ) ){

			// RevSlider 6.0 +

			$revslider = new RevSliderSliderImport();

			foreach( $sliders as $slider ){

				ob_start();
					$file = wp_normalize_path( $demo_path .'/'. $slider );
					$revslider->import_slider( true, $file );
				ob_end_clean();

			}

		} else {

			return new WP_Error( 'rev_update', 'Revolution Slider is outdated. Please update plugin.' );

		}

		return true;
	}

	/**
	 * Replace Multisite URLs
	 *
	 * Multisite 'uploads' directory url
	 *
	 * @param string $field
	 * @return string
	 */

	function replace_multisite( $field ){

		if ( is_multisite() ){

			global $current_blog;

			if( $current_blog->blog_id > 1 ){
				$old_url = '/wp-content/uploads/';
				$new_url = '/wp-content/uploads/sites/'. $current_blog->blog_id .'/';
				$field = str_replace( $old_url, $new_url, $field );
			}

		}

		return $field;
	}

	/**
	 * Replace Elementor URLs
	 *
	 * @param string $old_url
	 */

	function replace_elementor(){

		global $wpdb;

		$old_url = $this->url;

		if( is_array( $old_url ) ){
			$old_url = $old_url[1]; // https
		}

		$old_url = str_replace('/','\/',$old_url);
		$new_url = home_url('/');

		// FIX: importer new line characters in longtext

		$wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta
			SET `meta_value` =
			REPLACE( meta_value, %s, %s)
			WHERE `meta_key` = '_elementor_data'
		", "\n", ""));

		// replace urls

		$wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta
			SET `meta_value` =
			REPLACE( meta_value, %s, %s)
			WHERE `meta_key` = '_elementor_data'
		", $old_url, $new_url));

	}

	/**
	 * Replace Muffin Builder URLs
	 *
	 * @param array $old_url
	 */

	function replace_builder(){

		global $wpdb;

		$uids = array();

		$old_url = $this->url;
		$new_url = home_url('/');

		$results = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->postmeta
			WHERE `meta_key` = %s
		", 'mfn-page-items'));

		// posts loop -----

		if( is_array( $results ) ){
			foreach( $results as $result_key => $result ){

				$meta_id = $result->meta_id;
				$meta_value = @unserialize( $result->meta_value );

				// builder 2.0 compatibility

				if( $meta_value === false ){
					$meta_value = unserialize(call_user_func('base'.'64_decode', $result->meta_value));
				}

				// SECTIONS

				if( is_array( $meta_value ) ){
					foreach( $meta_value as $sec_key => $sec ){

						// section uIDs

						if( empty( $sec['uid'] ) ){
							$uids[] = Mfn_Builder_Helper::unique_ID($uids);
							$meta_value[$sec_key]['uid'] = end($uids);
						} else {
							$uids[] = $sec['uid'];
						}

						// section attributes

						if( isset( $sec['attr'] ) && is_array( $sec['attr'] ) ){
							foreach( $sec['attr'] as $attr_key => $attr ){
								$attr = str_replace( $old_url, $new_url, $attr );
								$meta_value[$sec_key]['attr'][$attr_key] = $attr;
							}
						}

						// FIX | Muffin Builder 2 compatibility
						// there were no wraps inside section in Muffin Builder 2

						if( ! isset( $sec['wraps'] ) && ! empty( $sec['items'] ) ){

							$fix_wrap = array(
								'size' => '1/1',
								'uid' => Mfn_Builder_Helper::unique_ID($uids),
								'items'	=> $sec['items'],
							);

							$sec['wraps'] = array( $fix_wrap );

							$meta_value[$sec_key]['wraps'] = $sec['wraps'];
							unset( $meta_value[$sec_key]['items'] );

						}

						// WRAPS

						if( isset( $sec['wraps'] ) && is_array( $sec['wraps'] ) ){
							foreach( $sec['wraps'] as $wrap_key => $wrap ){

								// wrap uIDs

								if( empty( $wrap['uid'] ) ){
									$uids[] = Mfn_Builder_Helper::unique_ID($uids);
									$meta_value[$sec_key]['wraps'][$wrap_key]['uid'] = end($uids);
								} else {
									$uids[] = $wrap['uid'];
								}

								// wrap attributes

								if( isset( $wrap['attr'] ) && is_array( $wrap['attr'] ) ){
									foreach( $wrap['attr'] as $attr_key => $attr ){

										$attr = str_replace( $old_url, $new_url, $attr );
										$meta_value[$sec_key]['wraps'][$wrap_key]['attr'][$attr_key] = $attr;

									}
								}

								// ITEMS

								if( isset( $wrap['items'] ) && is_array( $wrap['items'] ) ){
									foreach( $wrap['items'] as $item_key => $item ){

										// item uIDs

										if( empty( $item['uid'] ) ){
											$uids[] = Mfn_Builder_Helper::unique_ID($uids);
											$meta_value[$sec_key]['wraps'][$wrap_key]['items'][$item_key]['uid'] = end($uids);
										} else {
											$uids[] = $item['uid'];
										}

										// item fields

										if( isset( $item['fields'] ) && is_array( $item['fields'] ) ){
											foreach( $item['fields'] as $field_key => $field ) {

												if( 'tabs' == $field_key ) {

													// tabs

													if( is_array( $field ) ){
														foreach( $field as $tab_key => $tab ){

															// tabs fields

															if( is_array( $tab ) ){
																foreach( $tab as $tab_field_key => $tab_field ){

																	$field = str_replace( $old_url, $new_url, $tab_field );
																	$field = $this->replace_multisite( $field );
																	$meta_value[$sec_key]['wraps'][$wrap_key]['items'][$item_key]['fields']['tabs'][$tab_key][$tab_field_key] = $field;

																}
															}

														}
													}

												} else {

													// default

													$field = str_replace( $old_url, $new_url, $field );
													$field = $this->replace_multisite( $field );
													$meta_value[$sec_key]['wraps'][$wrap_key]['items'][$item_key]['fields'][$field_key] = $field;

												}

											}
										}

									}
								}

							}
						}

					}
				}

				// builder 2.0 compatibility

				$meta_value = call_user_func('base'.'64_encode', serialize( $meta_value ));

				$wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta
					SET `meta_value` = %s
					WHERE `meta_key` = 'mfn-page-items'
					AND `meta_id`= %d
				", $meta_value, $meta_id));

			}
		}
	}

	/**
	 * Returns formated error messages
	 *
	 * @return string
	 */

	public function error_messages( $errors ){

		$output = '';

		if( ! is_array( $errors ) ){
			return false;
		}

		foreach( $errors as $error ){
			echo '<div class="mfn-message mfn-error">'. esc_html($error) .'</div>';
		}

	}

	/**
	 * Import
	 */

	function import(){

		if( WHITE_LABEL ){
			require_once(get_theme_file_path('/functions/admin/templates/parts/white-label.php'));
			return false;
		}

		$output = '';

		if( isset( $_POST['mfn-importer-nonce'] ) ){

			// AFTER IMPORT --------------------

			if ( wp_verify_nonce( $_POST['mfn-importer-nonce'], 'mfn-importer-nonce' ) ){

				// Importer classes

				if( ! defined( 'WP_LOAD_IMPORTERS' ) ){
					define( 'WP_LOAD_IMPORTERS', true );
				}

				if( ! class_exists( 'WP_Importer' ) ){
					require_once(ABSPATH .'wp-admin/includes/class-wp-importer.php');
				}

				if( ! class_exists( 'WP_Import' ) ){
					require_once(get_theme_file_path('/functions/importer/wordpress-importer/wordpress-importer.php'));
				}

				// Import START

				if( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ){

					$this->demo = htmlspecialchars( stripslashes( $_POST['demo'] ) );
					$this->builder = htmlspecialchars( stripslashes( $_POST['builder'] ) );

					$this->demo_builder = $this->demo . $this->builder;
					$this->url = $this->get_demo_url();

					// Importer remote API

					require_once( get_theme_file_path( '/functions/importer/class-mfn-importer-api.php' ) );
					$importer_api = new Mfn_Importer_API( $this->demo_builder );
					$demo_path = $importer_api->remote_get_demo();

					if( ! $demo_path ){

						$this->error[] = __( 'Remote API error.', 'mfn-opts' );

					} elseif( is_wp_error( $demo_path ) ){

						$this->error[] = $demo_path->get_error_message();

					} else {

						if( 'selected' == $_POST['type'] ){

							// Selected data only ---------------------------------

							if( 'content' == $_POST['data'] ){

								// WordPress XML importer

								$file = wp_normalize_path( $demo_path .'/content.xml.gz' );
								$this->import_content( $file );

							} elseif( 'options' == $_POST['data'] ) {

								// Theme Options

								$file = wp_normalize_path( $demo_path .'/options.txt' );
								$this->import_options( $file );

							} else {

								// Revolution Slider

								$result = $this->import_slider( $demo_path );
								if( is_wp_error( $result ) ){
									$this->error[] = $result->get_error_message();
								}

							}

						} else {

							// Complete pre-built website ---------------------------------

							$this->remove_menus();

							// WordPress XML importer

							$file = wp_normalize_path( $demo_path .'/content.xml.gz' );
							$this->import_content( $file );

							// Menu locations

							$file = wp_normalize_path( $demo_path .'/menu.txt' );
							$this->import_menu_location( $file );

							// Theme Options

							$file = wp_normalize_path( $demo_path .'/options.txt' );
							$this->import_options( $file );

							// Widgets

							$file = wp_normalize_path( $demo_path .'/widget_data.json' );
							$this->import_widget( $file );

							// Revolution Slider

							if( $_POST['slider'] ){

								$result = $this->import_slider( $demo_path );
								if( is_wp_error( $result ) ){
									$this->error[] = $result->get_error_message();
								}

							}

							// Set homepage

							$this->set_pages();

							// Regenerate static CSS

							$this->regenerate_CSS();

						}

						// delete temp dir

						$importer_api->delete_temp_dir();

					}

				}

			}

			$this->import_html( 'after', $output );

		} else {

			// BEFORE IMPORT --------------------

			$this->import_html( 'before' );

		}

	}

	/**
	 * Import HTML
	 *
	 * @param string $status
	 * @param string|array $output
	 */

	function import_html( $status, $output = '' ){
		?>

		<div class="mfn-demo-data wrap">

			<div id="mfn-overlay" <?php if( isset( $_GET['demo'] ) ) echo 'style="display:block"'; ?>><!-- overlay --></div>

			<form id="form" action="" method="post" autocomplete="off">

				<input type="hidden" name="mfn-importer-nonce" value="<?php echo wp_create_nonce( 'mfn-importer-nonce' ); ?>" />
				<input type="hidden" name="demo" id="input-demo" value="" />

				<input type="hidden" name="builder" id="input-builder" value="" />
				<input type="hidden" name="type" id="input-type" value="complete" />
				<input type="hidden" name="data" id="input-data" value="content" />
				<input type="hidden" name="attachments" id="input-attachments" value="1" />
				<input type="hidden" name="slider" id="input-slider" value="1" />

				<div class="header">
					<div class="logo">
						<?php
						$logo = '<svg width="30" height="20" xmlns="http://www.w3.org/2000/svg">
							<path d="M0,19.8V0h7.3c1.4,0,2.5,0.1,3.5,0.4c1,0.3,1.7,0.6,2.3,1.1c0.6,0.5,1,1,1.3,1.7c0.3,0.7,0.4,1.4,0.4,2.2
							c0,0.4-0.1,0.9-0.2,1.3c-0.1,0.4-0.3,0.8-0.6,1.2c-0.3,0.4-0.6,0.7-1,1c-0.4,0.3-0.9,0.5-1.5,0.8c1.3,0.3,2.3,0.8,2.9,1.5
							c0.6,0.7,0.9,1.6,0.9,2.7c0,0.8-0.2,1.6-0.5,2.3c-0.3,0.7-0.8,1.4-1.4,1.9c-0.6,0.5-1.4,1-2.3,1.3c-0.9,0.3-2,0.5-3.2,0.5H0z
							 M4.6,8.3H7c0.5,0,1,0,1.4-0.1c0.4-0.1,0.8-0.2,1-0.4C9.7,7.7,9.9,7.4,10,7.1c0.1-0.3,0.2-0.7,0.2-1.2c0-0.5-0.1-0.9-0.2-1.2
							C10,4.4,9.8,4.2,9.5,4C9.3,3.8,9,3.6,8.6,3.6C8.2,3.5,7.8,3.4,7.3,3.4H4.6V8.3z M4.6,11.4v4.9h3.2c0.6,0,1.1-0.1,1.5-0.2
							c0.4-0.2,0.7-0.4,0.9-0.6c0.2-0.2,0.4-0.5,0.4-0.8c0.1-0.3,0.1-0.6,0.1-0.9c0-0.4,0-0.7-0.1-1c-0.1-0.3-0.3-0.5-0.5-0.7
							c-0.2-0.2-0.5-0.4-0.9-0.5c-0.4-0.1-0.9-0.2-1.4-0.2H4.6z"/>
							<path d="M22.8,5.5c0.9,0,1.8,0.1,2.6,0.4c0.8,0.3,1.4,0.7,2,1.3c0.6,0.6,1,1.2,1.3,2c0.3,0.8,0.5,1.7,0.5,2.7
							c0,0.3,0,0.6,0,0.8c0,0.2-0.1,0.4-0.1,0.5s-0.2,0.2-0.3,0.2c-0.1,0-0.3,0.1-0.5,0.1H20c0.1,1.2,0.5,2,1.1,2.6
							c0.6,0.5,1.3,0.8,2.2,0.8c0.5,0,0.9-0.1,1.3-0.2c0.4-0.1,0.7-0.2,0.9-0.4c0.3-0.1,0.5-0.3,0.8-0.4c0.2-0.1,0.5-0.2,0.7-0.2
							c0.3,0,0.6,0.1,0.8,0.4l1.2,1.5c-0.4,0.5-0.9,0.9-1.4,1.2c-0.5,0.3-1,0.6-1.5,0.7s-1.1,0.3-1.6,0.4c-0.5,0.1-1,0.1-1.5,0.1
							c-1,0-1.9-0.2-2.8-0.5c-0.9-0.3-1.6-0.8-2.3-1.4c-0.6-0.6-1.2-1.4-1.5-2.4c-0.4-0.9-0.6-2-0.6-3.3c0-0.9,0.2-1.8,0.5-2.7
							c0.3-0.8,0.8-1.6,1.4-2.2C18.3,6.9,19,6.4,19.9,6C20.7,5.7,21.7,5.5,22.8,5.5z M22.8,8.4c-0.8,0-1.4,0.2-1.9,0.7
							c-0.5,0.5-0.8,1.1-0.9,2h5.3c0-0.3,0-0.7-0.1-1c-0.1-0.3-0.2-0.6-0.4-0.8C24.6,9,24.3,8.8,24,8.6C23.7,8.5,23.3,8.4,22.8,8.4z"/>
						</svg>';

						$logo = apply_filters('betheme_logo', $logo);

						echo $logo;
						?>
					</div>

					<div class="title"><?php echo esc_html(get_admin_page_title()) ?></div>
				</div>

				<?php if( 'after' == $status ): ?>

					<?php if( ! $this->error ): ?>

						<?php
							$demo_args = $this->demos[ $this->demo ];

							// data | name

							if( isset( $demo_args['name'] ) ){
								$demo_name = $demo_args['name'];
							} else {
								$demo_name = ucfirst( $this->demo );
							}
						?>

						<div class="import-all-done item" data-id="<?php echo esc_attr( $this->demo ); ?>">

							<div class="done-image">
								<div class="item-image"></div>
							</div>

							<div class="done-header">
								Be <?php echo esc_html( $demo_name ); ?> has been successfully installed<br />
								You have a new website now
							</div>

							<div class="done-subheader">
								What would you like to do next?
							</div>

							<div class="done-buttons">
								<?php
									echo '<a target="_blank" href="admin.php?page='. apply_filters('betheme_slug', 'be') .'-options" class="mfn-button mfn-button-secondary">Go to '. apply_filters('betheme_label', 'Muffin') .' Options</a>';
									echo '<a target="_blank" href="'. esc_url( get_home_url() ) .'" class="mfn-button mfn-button-primary">Preview website</a>';
								?>
							</div>

							<?php if( ! apply_filters('betheme_disable_support', false) ): ?>
								<div class="done-learn">
									<span>or</span>
									<?php echo '<div class="learn-header">Learn more about '. apply_filters('betheme_label', 'BeTheme') .' </div>' ?>
									Remember, it is a good practise to read the manual first
								</div>

								<div class="done-help">
									<a target="_blank" href="https://themes.muffingroup.com/betheme/documentation/">
										<span class="dashicons dashicons-info"></span>
										<?php echo 'Learn how to use '. apply_filters('betheme_label', 'BeTheme') .' from our manual' ?>
									</a>
								</div>
							<?php endif; ?>
						</div>

					<?php
						else:

							// show errors

							$this->error_messages($this->error);

						endif;
					?>

				<?php else: ?>

					<div class="subheader">

						<div class="filters">
							<ul class="filter-categories">
								<li data-filter="*" class="active"><a href="javascript:void(0);">All</a></li>
								<?php
									foreach( $this->categories as $key_cat => $cat ){
										echo '<li data-filter="'. esc_attr($key_cat) .'"><a href="javascript:void(0);">'. esc_html($cat) .'</a></li>';
									}
								?>
							</ul>
						</div>

						<div class="demo-search">
							<span class="dashicons dashicons-search"></span>
							<input class="input-search" placeholder="Search website..." onkeypress="return event.keyCode != 13;" />
						</div>

					</div>

					<ul class="demos">
						<?php
							foreach( $this->demos as $key => $demo ){

								$categories = array_intersect_key( $this->categories, array_flip( $demo['categories'] ) );
								$categories = implode( ', ', $categories );

								// class | categories

								$builder_selector = false;
								$class = [
									'mfn' => 'category-mfn', // all websites are muffin builder based by default
								];

								if( is_array( $demo['categories'] ) ){
									foreach( $demo['categories'] as $cat ){

										$class[] = 'category-'. $cat;

										if( 'mfn' == $cat ){
											$builder_selector = true;
										}

										// remove default muffin builder attribute for elementor based websites

										if( 'ele' == $cat ){
											unset( $class['mfn'] );
										}

									}
								}

								// pre-selected demo

								if( isset( $_GET['demo'] ) && ( $_GET['demo'] == $key ) ){
									$class[] = 'active';
								}

								if( isset( $demo['new'] ) ){
									$class[] = 'new';
								}

								// class | implode

								$class = implode( ' ', $class );

								// data | name

								if( isset( $demo['name'] ) ){
									$demo_name = $demo['name'];
								} else {
									$demo_name = ucfirst( $key );
								}

								echo '<li class="item '. esc_attr($class) .'" data-id="'. esc_attr($key) .'" data-name="'. esc_attr($demo_name) .'">';

									echo '<div class="icons"></div>';

									echo '<div class="border"></div>'; // border for hover effect

									echo '<div class="item-inner">';

										echo '<div class="item-header">';

											echo '<a href="javascript:void(0);" class="close"><i class="dashicons dashicons-no-alt"></i></a>';

											echo '<div class="item-image"></div>'; // sprite image

											echo '<div class="item-title">'. esc_html($demo_name) .'</div>';

											if( $categories ){
												echo '<div class="item-category">';
													echo '<span class="label">Category:</span>';
													echo '<span class="list">'. esc_html($categories) .'</span>';
												echo '</div>';
											}

										echo '</div>';

										echo '<div class="item-content">';
											echo '<div class="item-content-wrapper">';

												// content | step 1

												echo '<div class="content-step step-1">';

													if( ! empty( $demo['url'] ) ){
														$demo_url = $demo['url'] .'/';
														$demo_el = $demo['url'] .'_el/';
													} else {
														$demo_url = 'https://themes.muffingroup.com/be/'. $key .'/';
														$demo_el = 'https://themes.muffingroup.com/be/'. $key .'_el/';
													}

													if( $builder_selector ){

														echo '<p><b>Choose your favourite builder</b></p>';

														echo '<ul class="select-builder clearfix">';

															echo '<li class="muffin active" data-builder="">';
																echo '<span class="builder-title">Muffin Builder</span>';
																echo '<a target="_blank" href="'. esc_url( $demo_url ) .'">Preview</a>';
															echo '</li>';

															echo '<li class="elementor" data-builder="_el">';
																echo '<span class="builder-title">Elementor</span>';
																echo '<a target="_blank" href="'. esc_url( $demo_el ) .'">Preview</a>';
															echo '</li>';

														echo '</ul>';

														if( mfn_is_registered() ){
															echo '<a href="javascript:void(0);" class="mfn-button mfn-button-primary mfn-button-install">Install</a>';
														} else {
															echo '<a href="admin.php?page=betheme" class="mfn-button mfn-button-secondary">Please register the theme</a>';
														}

														echo '<p class="info">Website may differ slightly depending on the builder. Please check preview.</p>';


													} else {

														if( mfn_is_registered() ){
															echo '<a href="javascript:void(0);" class="mfn-button mfn-button-primary mfn-button-install">Install</a>';
														} else {
															echo '<a href="admin.php?page=betheme" class="mfn-button mfn-button-secondary">Please register the theme</a>';
														}

														echo '<p class="align-center"><a target="_blank" href="'. esc_url( $demo_url ) .'">Live preview</a></p>';

													}

												echo '</div>';

												// content | step 2

												echo '<div class="content-step step-2">';

													$plugins_count = 0;

													if( isset( $demo['plugins'] ) ){
														$plugins_count = count( $demo['plugins'] );
													}

													echo '<p>';
														echo '<b>Install the following plugins before website installation</b>';
													echo '</p>';

													echo '<ul class="plugins-used" data-count="'. esc_attr( $plugins_count ) .'">';

														echo '<li class="plugin-none">No additional plugins required</li>';

														if( isset( $demo['plugins'] ) ){

															if( ( $plugins_key = array_search( 'rev', $demo['plugins'] ) ) !== false ){

																echo '<li class="plugin-rev">';
																	echo '<b>'. esc_html($this->plugins['rev']['name']) .'</b><br />';

																	if( class_exists( $this->plugins['rev']['class'] ) ){
																		echo '<span class="install is-active">Active</span>';
																	} else {
																		echo '<span class="install"><a href="admin.php?page=be-plugins">Install</a></span>';
																		echo 'Slider demo <u>will not</u> be installed if Revolution Slider is not active';
																	}

																echo '</li>';

																unset( $demo['plugins'][$plugins_key] );
															}

															foreach( $demo['plugins'] as $plugin ){

																if( isset( $this->plugins[ $plugin ]['s'] ) ){
																	$install_url = 'plugin-install.php?s='. $this->plugins[ $plugin ]['s'] .'&amp;tab=search&amp;type=term';
																} else {
																	$install_url = 'admin.php?page=be-plugins';
																}

																echo '<li class="plugin-'. esc_attr($plugin) .'">';

																	echo '<b>'. esc_html($this->plugins[$plugin]['name']) .'</b><br />';

																	if( class_exists( $this->plugins[ $plugin ]['class'] ) ){
																		echo '<span class="install">Active</span>';
																	} else {
																		echo '<span class="install"><a href="'. esc_url($install_url) .'">Install</a></span>';
																	}

																echo '</li>';
															}

														}

													echo '</ul>';

													echo '<div class="content-buttons">';
														echo '<a href="javascript:void(0);" class="mfn-button mfn-button-secondary cancel">Cancel</a>';
														echo '<a href="javascript:void(0);" class="mfn-button mfn-button-primary mfn-button-import">Next <span class="dashicons dashicons-arrow-right"></span></a>';
													echo '</div>';

												echo '</div>';

											echo '</div>';
										echo '</div>';

									echo '</div>';

								echo '</li>'."\n";
							}
						?>
					</ul>

					<div id="mfn-demo-popup">
						<div class="popup-inner">

							<div class="popup-header">
								<div class="item-image"></div>
							</div>

							<div class="popup-content">

								<div class="popup-step step-1">

									<h3 class="item-title-wrapper"><b>Database Reset</b></h3>

									<p class="align-center">Before installing a new pre-built website, it is recommended to <b>clean up your WordPress database</b>.</p>

									<div class="db-reset">

										<div class="reset-step reset-1">

											<p class="align-center important">Important: This tool DOES NOT create backups.</p>

											<ul class="reset-list">
												<li class="delete"><b>Deletes:</b> Posts, custom posts, pages, menus, categories, comments, etc.</li>
												<li class="keep"><b>Remains:</b> Users and passwords, wp_options, files on your server.</li>
											</ul>

											<a href="javascript:void(0);" class="mfn-button mfn-button-reset">Reset now</a>

										</div>

										<div class="reset-step reset-2">

											<p class="align-center"><strong>Are you sure you want to reset the database?</strong></p>
											<p class="align-center"><label><input type="checkbox" class="checkbox-reset" value="1" /> I understand that there is NO UNDO.</label></p>

											<a href="javascript:void(0);" class="mfn-button mfn-button-reset-confirm disabled" data-ajax="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">Reset now</a>

										</div>

									</div>

									<div class="popup-buttons">
										<a href="javascript:void(0);" class="mfn-button mfn-button-secondary mfn-button-cancel">Cancel</a>
										<a href="javascript:void(0);" class="mfn-button mfn-button-primary mfn-button-next">Skip <span class="dashicons dashicons-arrow-right"></span></a>
									</div>

								</div>

								<div class="popup-step step-2">

									<h3 class="item-title-wrapper">Install Be<span class="item-title"></span></h3>

									<div class="import-options active">
										<label><input type="radio" name="radio_import" class="radio-type checked" value="complete" /> <b>Complete pre-built website</b></label>
										<ul>
											<li>
												<label><input type="checkbox" class="checkbox-attachments checked" value="1" /> Import media (images, videos, etc.)<br />
												Media download may take a while</label>
											</li>
											<li class="slider-active">
												<label><input type="checkbox" class="checkbox-slider checked" value="1" /> Import Revolution Slider demo</label>
											</li>
										</ul>
									</div>

									<div class="import-options">
										<label><input type="radio" name="radio_import" class="radio-type" value="selected" /> <b>Selected data only</b></label>
										<ul>
											<li><label><input type="radio" name="radio_type" class="radio-data checked" value="content" /> Content</label></li>
											<li><label><input type="radio" name="radio_type" class="radio-data" value="options" /> Theme Options</label></li>
											<li class="slider-active"><label><input type="radio" name="radio_type" class="radio-data" value="slider" /> Revolution Slider demo</label></li>
										</ul>
									</div>

									<div class="popup-buttons">
										<a href="javascript:void(0);" class="mfn-button mfn-button-secondary mfn-button-cancel">Cancel</a>
										<a href="javascript:void(0);" class="mfn-button mfn-button-primary mfn-button-submit">Install</a>
									</div>

								</div>

								<div class="popup-step step-3">

									<h3 class="item-title-wrapper">Installing Be<span class="item-title"></span></h3>

									<div class="import-progress-bar"></div>

									<p class="align-center"><b>Please wait</b> for the whole demo data import before doing anything. <b>It may take a while</b>...</p>

								</div>

							</div>

						</div>
					</div>

					<input id="form-submit" type="submit" name="submit" value="import" style="display:none" />

				<?php endif; ?>

			</form>

		</div>

		<?php
	}

	/**
	 * Parse JSON import file
	 *
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param string $json_data
	 */

	function import_widget_data( $json_data ) {

		$json_data = json_decode( $json_data, true );
		$sidebar_data = $json_data[0];
		$widget_data = $json_data[1];

		// prepare widgets table

		$widgets = array();
		foreach( $widget_data as $k_w => $widget_type ){
			if( $k_w ){
				$widgets[ $k_w ] = array();
				foreach( $widget_type as $k_wt => $widget ){
					if( is_int( $k_wt ) ) $widgets[$k_w][$k_wt] = 1;
				}
			}
		}

		// sidebars

		foreach ( $sidebar_data as $title => $sidebar ) {
			$count = count( $sidebar );
			for ( $i = 0; $i < $count; $i++ ) {
				$widget = array( );
				$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
				$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
				if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
					unset( $sidebar_data[$title][$i] );
				}
			}
			$sidebar_data[$title] = array_values( $sidebar_data[$title] );
		}

		// widgets

		foreach ( $widgets as $widget_title => $widget_value ) {
			foreach ( $widget_value as $widget_key => $widget_value ) {
				$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
			}
		}

		$sidebar_data = array( array_filter( $sidebar_data ), $widgets );
		$this->parse_import_data( $sidebar_data );
	}

	/**
	 * Import widgets
	 *
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param array $import_array
	 * @return boolean
	 */

	function parse_import_data( $import_array ) {
		$sidebars_data = $import_array[0];
		$widget_data = $import_array[1];

		mfn_register_sidebars(); // fix for sidebars added in Theme Options

		$current_sidebars 	= array( );
		$new_widgets = array( );

		foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

			foreach ( $import_widgets as $import_widget ) :

				// if NOT the sidebar exists

				if ( ! isset( $current_sidebars[$import_sidebar] ) ){
					$current_sidebars[$import_sidebar] = array();
				}

				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name = $this->get_new_widget_name( $title, $index );
				$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];

					// notice fix

					if( ! key_exists('_multiwidget',$new_widgets[$title]) ) $new_widgets[$title]['_multiwidget'] = '';

					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];

					// notice fix

					if( ! key_exists('_multiwidget',$current_widget_data) ) $current_widget_data['_multiwidget'] = '';

					$current_multiwidget = $current_widget_data['_multiwidget'];
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endforeach;
		endforeach;

		// remove old widgets

		delete_option( 'sidebars_widgets' );

		if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
			update_option( 'sidebars_widgets', $current_sidebars );

			foreach ( $new_widgets as $title => $content )
				update_option( 'widget_' . $title, $content );

			return true;
		}

		return false;
	}

	/**
	 * Get new widget name
	 *
	 * http://wordpress.org/plugins/widget-settings-importexport/
	 *
	 * @param string $widget_name
	 * @param int $widget_index
	 * @return string
	 */

	function get_new_widget_name( $widget_name, $widget_index ) {
		$current_sidebars = get_option( 'sidebars_widgets' );
		$all_widget_array = array( );
		foreach ( $current_sidebars as $sidebar => $widgets ) {
			if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
				foreach ( $widgets as $widget ) {
					$all_widget_array[] = $widget;
				}
			}
		}
		while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
			$widget_index++;
		}
		$new_widget_name = $widget_name . '-' . $widget_index;
		return $new_widget_name;
	}

}

$Mfn_Importer = new Mfn_Importer;
