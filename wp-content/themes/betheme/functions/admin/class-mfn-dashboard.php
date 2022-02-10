<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class Mfn_Dashboard extends Mfn_API
{
	public $notices = array(

		'no_purchase_code' => 'Please enter purchase code.',
		'code_format' => 'Invalid purchase code format.',
		'no_connection' => 'Could not connect to the Envato (ThemeForest) server to verify purchase. Please try again later.',

		'registered' => 'Thank you for registration.',
		'deregistered' => 'Theme deregistered.',
	);

	public $error = '';
	public $version = '';

	/**
	 * Mfn_Dashboard constructor
	 */

	public function __construct()
	{
		parent::__construct();

		// handle custom AJAX endpoint
		add_action( 'wp_ajax_mfn_survey', array( $this, '_survey' ) );

		// after_switch_theme is triggered on the request immediately following a theme switch.
		add_action('after_switch_theme', array( $this, 'after_switch_theme' ));

		// switch_theme is triggered when the blog's theme is changed. Specifically, it fires after the theme has been switched but before the next request.
		add_action('switch_theme', array( $this, 'switch_theme' ));

		// Notices displayed near the top of admin pages. The hook function should echo a message to be displayed.
		add_action('admin_notices', array( $this, 'admin_notices' ), 1);

		// It runs after the basic admin panel menu structure is in place.
		add_action('admin_menu', array( $this, 'init' ), 1);

		// admin_init is triggered before any other hook when a user accesses the admin area.
		add_action('admin_init', array( $this, 'register_setting' ));

		// Filters a specific network option before its value is updated.
		add_filter('pre_update_site_option_envato_purchase_code_7758048', array( $this, 'validate_code' ), 10, 2);

		// Load all necessary admin bar items.
		add_action('admin_bar_menu', array( $this, 'add_menu' ), 1000); // group theme settings is allowed

		// bundled plugins
		add_filter('admin_body_class', array( $this, 'bundled_plugins' ));

		// betheme admin before tabs
		add_action('mfn-admin-before-tabs', array( $this, 'survey' ));

		// Notices displayed near the top of admin pages. The hook function should echo a message to be displayed.
		add_action('admin_notices', array( $this, 'wp_survey' ), 1);
	}

	/**
	 * Under Construction active | Admin notice
	 */

	public function add_menu()
	{
		if (mfn_opts_get('construction')) {
			global $wp_admin_bar;

			$wp_admin_bar->add_menu(array(
				'id' => 'mfn-notice-construction',
				'href' => 'admin.php?page=be-options#pages-under',
				'parent' => 'top-secondary',
				'title' => __('Under Construction active', 'mfn-opts'),
				'meta' => array( 'class' => 'mfn-notice' ),
			));
		}
	}

	/**
	 * Ajax | Survey close
	 */

	public function _survey(){

		set_site_transient( 'betheme_survey_25', 1, MONTH_IN_SECONDS );

		exit;

	}

	/**
	 * Be dashboard survey
	 */

	public function survey(){

		if( WHITE_LABEL || apply_filters('betheme_disable_survey', 0) ){
			return false;
		}

		if( get_site_transient( 'betheme_survey_25' ) ){
			return false;
		}

		include get_theme_file_path('/functions/admin/templates/parts/survey.php');
	}

	/**
	 * Wordpress dashboard survey
	 */

	public function wp_survey(){

		if( WHITE_LABEL || apply_filters('betheme_disable_survey', 0) ){
			return false;
		}

		if( get_site_transient( 'betheme_survey_25' ) ){
			return false;
		}

		// Current screen is not always available, most notably on the customizer screen.
		if ( ! function_exists( 'get_current_screen' ) ) {
			return false;
		}

		$current_screen = get_current_screen();
		$current_screen = $current_screen->base;

		if ( 'dashboard' != $current_screen ) {
			return false;
		}

		include get_theme_file_path('/functions/admin/templates/parts/survey.php');
	}

	/**
	 * Validate purchase code
	 */

	public function validate_code( $value = false, $old_value = false, $option = false, $network_id = false )
	{
		if ( isset( $_POST['register'] ) ) {

			$value = trim( $value );

			if ( ! $value ){
				add_settings_error('betheme_registration', 'registration_error', $this->notices['no_purchase_code'], 'error inline mfn-dashboard-error');
				return false;
			}

			$pattern = '/^[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/';
			if ( ! preg_match( $pattern, $value ) ){
				add_settings_error('betheme_registration', 'registration_error', $this->notices['code_format'], 'error inline mfn-dashboard-error');
				return false;
			}

		}

		return $value;
	}

	/**
	 * Add admin page & enqueue styles
	 */

	public function init()
	{

		$title = array(
			'betheme'	=> apply_filters('betheme_dynamic_slug', 'betheme'),
			'dashboard'	=> __('Dashboard', 'mfn-opts'),
			'label' => apply_filters('betheme_label', 'Betheme')
		);

		$icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMC4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4wIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMCAyMCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzAgMjAiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCI+DQogIDxzdHlsZT4jc3ZnLW1mbi1jb2xvcntmaWxsOiMwMDk2RUR9PC9zdHlsZT4NCjxnPg0KCTxwYXRoIGlkPSJzdmctbWZuLWNvbG9yIiBkPSJNMCwxOS44VjBoNy4zYzEuNCwwLDIuNSwwLjEsMy41LDAuNGMxLDAuMywxLjcsMC42LDIuMywxLjFjMC42LDAuNSwxLDEsMS4zLDEuN2MwLjMsMC43LDAuNCwxLjQsMC40LDIuMg0KCQljMCwwLjQtMC4xLDAuOS0wLjIsMS4zYy0wLjEsMC40LTAuMywwLjgtMC42LDEuMmMtMC4zLDAuNC0wLjYsMC43LTEsMWMtMC40LDAuMy0wLjksMC41LTEuNSwwLjhjMS4zLDAuMywyLjMsMC44LDIuOSwxLjUNCgkJYzAuNiwwLjcsMC45LDEuNiwwLjksMi43YzAsMC44LTAuMiwxLjYtMC41LDIuM2MtMC4zLDAuNy0wLjgsMS40LTEuNCwxLjljLTAuNiwwLjUtMS40LDEtMi4zLDEuM2MtMC45LDAuMy0yLDAuNS0zLjIsMC41SDB6DQoJCSBNNC42LDguM0g3YzAuNSwwLDEsMCwxLjQtMC4xYzAuNC0wLjEsMC44LTAuMiwxLTAuNEM5LjcsNy43LDkuOSw3LjQsMTAsNy4xYzAuMS0wLjMsMC4yLTAuNywwLjItMS4yYzAtMC41LTAuMS0wLjktMC4yLTEuMg0KCQlDMTAsNC40LDkuOCw0LjIsOS41LDRDOS4zLDMuOCw5LDMuNiw4LjYsMy42QzguMiwzLjUsNy44LDMuNCw3LjMsMy40SDQuNlY4LjN6IE00LjYsMTEuNHY0LjloMy4yYzAuNiwwLDEuMS0wLjEsMS41LTAuMg0KCQljMC40LTAuMiwwLjctMC40LDAuOS0wLjZjMC4yLTAuMiwwLjQtMC41LDAuNC0wLjhjMC4xLTAuMywwLjEtMC42LDAuMS0wLjljMC0wLjQsMC0wLjctMC4xLTFjLTAuMS0wLjMtMC4zLTAuNS0wLjUtMC43DQoJCWMtMC4yLTAuMi0wLjUtMC40LTAuOS0wLjVjLTAuNC0wLjEtMC45LTAuMi0xLjQtMC4ySDQuNnoiLz4NCgk8cGF0aCBpZD0ic3ZnLW1mbi1jb2xvciIgZD0iTTIyLjgsNS41YzAuOSwwLDEuOCwwLjEsMi42LDAuNGMwLjgsMC4zLDEuNCwwLjcsMiwxLjNjMC42LDAuNiwxLDEuMiwxLjMsMmMwLjMsMC44LDAuNSwxLjcsMC41LDIuNw0KCQljMCwwLjMsMCwwLjYsMCwwLjhjMCwwLjItMC4xLDAuNC0wLjEsMC41cy0wLjIsMC4yLTAuMywwLjJjLTAuMSwwLTAuMywwLjEtMC41LDAuMUgyMGMwLjEsMS4yLDAuNSwyLDEuMSwyLjYNCgkJYzAuNiwwLjUsMS4zLDAuOCwyLjIsMC44YzAuNSwwLDAuOS0wLjEsMS4zLTAuMmMwLjQtMC4xLDAuNy0wLjIsMC45LTAuNGMwLjMtMC4xLDAuNS0wLjMsMC44LTAuNGMwLjItMC4xLDAuNS0wLjIsMC43LTAuMg0KCQljMC4zLDAsMC42LDAuMSwwLjgsMC40bDEuMiwxLjVjLTAuNCwwLjUtMC45LDAuOS0xLjQsMS4yYy0wLjUsMC4zLTEsMC42LTEuNSwwLjdzLTEuMSwwLjMtMS42LDAuNGMtMC41LDAuMS0xLDAuMS0xLjUsMC4xDQoJCWMtMSwwLTEuOS0wLjItMi44LTAuNWMtMC45LTAuMy0xLjYtMC44LTIuMy0xLjRjLTAuNi0wLjYtMS4yLTEuNC0xLjUtMi40Yy0wLjQtMC45LTAuNi0yLTAuNi0zLjNjMC0wLjksMC4yLTEuOCwwLjUtMi43DQoJCWMwLjMtMC44LDAuOC0xLjYsMS40LTIuMkMxOC4zLDYuOSwxOSw2LjQsMTkuOSw2QzIwLjcsNS43LDIxLjcsNS41LDIyLjgsNS41eiBNMjIuOCw4LjRjLTAuOCwwLTEuNCwwLjItMS45LDAuNw0KCQljLTAuNSwwLjUtMC44LDEuMS0wLjksMmg1LjNjMC0wLjMsMC0wLjctMC4xLTFjLTAuMS0wLjMtMC4yLTAuNi0wLjQtMC44QzI0LjYsOSwyNC4zLDguOCwyNCw4LjZDMjMuNyw4LjUsMjMuMyw4LjQsMjIuOCw4LjR6Ii8+DQo8L2c+DQo8L3N2Zz4=';
		$icon = apply_filters('betheme_logo_nohtml', $icon);

		if (WHITE_LABEL) {
			$title['betheme'] = 'betheme';
			$title['label'] = 'Theme';
			$icon = false;
		}

		$this->page = add_menu_page(
			$title['label'],
			$title['label'],
			'edit_theme_options',
			$title['betheme'],
			array( $this, 'template' ),
			$icon,
			2
		);

		add_submenu_page(
			$title['betheme'],
			$title['dashboard'],
			$title['dashboard'],
			'edit_theme_options',
			$title['betheme'],
			array( $this, 'template' )
		);

		// Deregister theme if any errors after switch theme
		if( get_transient('betheme_deregistered') ){
			$this->error = get_transient('betheme_deregistered');
			delete_transient('betheme_deregistered');
		}

		// Runs when an administration menu page is loaded.
		add_action('load-'. $this->page, array( $this, 'on_load' ));

		// Fires when styles are printed for a specific admin page based on $hook_suffix.
		add_action('admin_print_styles-'. $this->page, array( $this, 'enqueue' ));
	}

	/**
	 * Dashboard template
	 */

	public function template()
	{
		include_once get_theme_file_path('/functions/admin/templates/dashboard.php');
	}

	/**
	 * Enqueue styles and scripts
	 */

	public function enqueue()
	{
		wp_enqueue_style('mfn-dashboard', get_theme_file_uri('/functions/admin/assets/dashboard.css'), array(), MFN_THEME_VERSION);
		wp_enqueue_script('mfn-dashboard', get_theme_file_uri('/functions/admin/assets/dashboard.js'), false, MFN_THEME_VERSION, true);
	}

	/**
	 * Redirect after switch theme
	 */

	public function after_switch_theme()
	{
		if (mfn_is_registered()) {

			$error = false;

			$args = array(
				'user-agent' => 'WordPress/'. get_bloginfo('version') .'; '. network_site_url(),
				'timeout' => 30,
				'body' => array(
					'code' => urlencode(mfn_get_purchase_code()),
					'register' => 1,
				),
			);

			$response = $this->remote_post('register', $args);

			if (is_wp_error($response)) {
				$error = $response->get_error_message();
			} elseif (empty($response['success'])) {
				$error = $this->notices['no_connection'];
			}

			if( $error ){
				set_transient('betheme_deregistered', $error, 30);
				delete_site_option('envato_purchase_code_7758048');
			}
		}

		wp_safe_redirect(admin_url('admin.php?page=betheme'));
	}

	/**
	 * Theme deactivation - deactivate all theme related plugins
	 */

	public function switch_theme()
	{
		if (class_exists('Mfn_HB_Admin')) {
			deactivate_plugins('mfn-header-builder/mfn-header-builder.php');
		}
	}

	/**
	 * Admin notice - plase register
	 */

	public function admin_notices()
	{

		// Current screen is not always available, most notably on the customizer screen.
		if ( ! function_exists( 'get_current_screen' ) ) {
			return false;
		}

		$current_screen = get_current_screen();
		$current_screen = $current_screen->base;

		$whitelist = array(
			'toplevel_page_betheme',
			'betheme_page_be-plugins',
			'betheme_page_be-websites',
			'betheme_page_be-status',
			'betheme_page_be-support',
		);

		if ( in_array( $current_screen, $whitelist ) ) {
			return false;
		}

		if ( mfn_is_registered() && ( 36 !== mfn_is_registered() ) ) {
			include_once get_theme_file_path( '/functions/admin/templates/notice-corrupted.php' );
		}

		if ( mfn_is_registered() || $this->is_localhost() ) {
			return false;
		}

		include_once get_theme_file_path( '/functions/admin/templates/notice-register.php' );
	}

	/**
	 * Bundled plugins | Hide intrusive notices
	 */

	function bundled_plugins( $classes ){
		if (! mfn_opts_get('plugin-rev')) {
			$classes .= ' bundled-rev ';
		}

		if (! mfn_opts_get('plugin-layer')) {
			$classes .= ' bundled-ls ';
		}

		if (! mfn_opts_get('plugin-visual')) {
			$classes .= ' bundled-wpb ';
		}

		return $classes;
	}

	/**
	 * Refresh site transients
	 */

	public function refresh_transients()
	{
		delete_site_transient('betheme_update_plugins');
		delete_site_transient('betheme_plugins');

		delete_site_transient('update_themes');
		do_action('wp_update_themes');
	}

	/**
	 * Register a setting and its data
	 */

	public function register_setting()
	{
		register_setting('betheme_registration', 'envato_purchase_code_7758048', array( $this, 'registration' ));
	}

	/**
	 * A callback function that sanitizes the option's value
	 */

	public function registration($code)
	{
		$code = trim($code);

		if (isset($_POST['register'])) {
			$code = $this->register($code);
		} elseif ($_POST['deregister']) {
			$code = $this->deregister();
		}

		return $code;
	}

	/**
	 * Register theme
	 */

	protected function register($code)
	{
		if (! $code) {
			return false;
		}

		$args = array(
			'user-agent' => 'WordPress/'. get_bloginfo('version') .'; '. network_site_url(),
			'timeout' => 30,
			'body' => array(
				'code' => urlencode($code),
				'register' => 1,
			),
		);

		$response = $this->remote_post('register', $args);
		if (is_wp_error($response)) {
			add_settings_error('betheme_registration', 'registration_error', $response->get_error_message(), 'error inline mfn-dashboard-error');
			return false;
		}

		if (empty($response['success'])) {
			add_settings_error('betheme_registration', 'registration_error', $this->notices[ 'no_connection' ], 'error inline mfn-dashboard-error');
			return false;
		}

		add_settings_error('betheme_registration', 'registration_success', $this->notices[ 'registered' ], 'updated inline mfn-dashboard-error');

		$this->refresh_transients();

		return $code;
	}

	/**
	 * Deregister theme
	 */

	protected function deregister()
	{
		$code = mfn_get_purchase_code();

		if ( ! $code ) {
			return false;
		}

		$args = array(
			'user-agent' => 'WordPress/'. get_bloginfo('version') .'; '. network_site_url(),
			'timeout' => 30,
			'body' => array(
				'code' => urlencode($code),
				'deregister' => 1,
			),
		);

		$this->remote_post('register', $args);

		add_settings_error('betheme_registration', 'registration_success', $this->notices[ 'deregistered' ], 'updated inline mfn-dashboard-error');

		$this->refresh_transients();

		return true;
	}

	/**
	 * Update the value of an option that was already added for the current network
	 */

	public function on_load()
	{
		if (! isset($_POST['option_page']) || $_POST['option_page'] !== 'betheme_registration') {
			return false;
		}

		check_admin_referer('betheme_registration-options');

		if( isset($_POST['envato_purchase_code_7758048']) ){

			$code = htmlspecialchars(trim($_POST['envato_purchase_code_7758048']));
			update_site_option('envato_purchase_code_7758048', $code);

		} else {

			// FIX: update first to trigger option related action
			update_site_option('envato_purchase_code_7758048', '');

			delete_site_option('envato_purchase_code_7758048');
		}

		set_transient('settings_errors', get_settings_errors(), 30);

		$location = add_query_arg('settings-updated', 'true', wp_get_referer());
		$location = apply_filters('becustom_check_without_register', $location);

		wp_safe_redirect($location);
		exit;
	}
}
