<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
?>

<div id="mfn-dashboard" class="wrap about-wrap">

	<?php include_once get_theme_file_path('/functions/admin/templates/parts/header.php'); ?>

	<div class="dashboard-tab changes">

		<div class="col col-fw">

			<h3 class="primary"><?php esc_html_e( 'Changelog', 'mfn-opts' ); ?> <a target="_blank" class="external" href="https://support.muffingroup.com/changelog/">see what's new</a></h3>

			<?php include get_theme_file_path('changelog.html'); ?>

			<a class="mfn-button mfn-button-primary mfn-button-fw" target="_blank" href="https://support.muffingroup.com/changelog/"><?php esc_html_e( 'See full changelog', 'mfn-opts' ); ?></a>

		</div>

	</div>

</div>
