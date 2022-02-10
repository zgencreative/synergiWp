<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

class Mfn_Tools extends Mfn_API {

	/**
	 * Mfn_Tools constructor
	 */
	public function __construct(){

		parent::__construct();

		// It runs after the basic admin panel menu structure is in place.
		add_action( 'admin_menu', array( $this, 'init' ), 8 );

	}

	/**
	 * Add admin page & enqueue styles
	 */
	public function init(){

		$title = __( 'Tools','mfn-opts' );

		$this->page = add_submenu_page(
			'betheme',
			$title,
			$title,
			'edit_theme_options',
			'be-tools',
			array( $this, 'template' )
		);

		// Fires when styles are printed for a specific admin page based on $hook_suffix.
		add_action( 'admin_print_styles-'. $this->page, array( $this, 'enqueue' ) );
	}

	/**
	 * Status template
	 */
	public function template(){

		if( WHITE_LABEL ){
			include_once get_theme_file_path('/functions/admin/templates/parts/white-label.php');
		} else {
			include_once get_theme_file_path('/functions/admin/templates/tools.php');
		}

	}

	/**
	 * Enqueue styles and scripts
	 */
	public function enqueue(){
		wp_enqueue_style( 'mfn-dashboard', get_theme_file_uri('/functions/admin/assets/dashboard.css'), array(), MFN_THEME_VERSION );
		wp_enqueue_script('mfn-dashboard', get_theme_file_uri('/functions/admin/assets/dashboard.js'), false, MFN_THEME_VERSION, true);
	}

}

$mfn_tools = new Mfn_Tools();
