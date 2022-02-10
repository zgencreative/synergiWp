<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
?>

<div id="mfn-custom" class="wrap about-wrap">

	<?php include_once( plugin_dir_path( __DIR__ ) . '/templates/parts/header.php' ); ?>

	<div class="dashboard-tab register">

		<div class="col mfn-ui">
			<form method="post" class="mfn-form">
				<?php
					$this->form_handler(); //to enable form handler
					$meta = false;
				?>

				<h3 class="primary">Be dashboard</h3>

				<?php
					Mfn_Builder_Admin::field( array(
						'id' => 'disable_survey',
						'type' => 'switch',
						'title' => $this->get_attributes['disable_survey']['title'],
						'options' => array(
							0 => 'Visible',
							1 => 'Hidden',
						),
						'std' => 0,
					), $this->options['disable_survey']['value'] ? 1 : 0, $meta)
				?>

				<div class="becustom-dashboard-heading">
					<h3 class="primary"> <?php echo $this->get_attributes['below_welcome_text']['title']; ?> </h3>
						<div class="becustom-dashboard-tooltip">
							<?php
								echo $this->popup('below_welcome_text')
							?>
						</div>

						<?php
							$editor_content = stripslashes_deep($this->options['below_welcome_text']['value']);
							$settings = array(
								'wpautop' => false,
							);

							wp_editor( $editor_content, 'becustom_tinymce_below_welcome', $settings );
						?>
				</div>

				<div class="becustom-dashboard-content">
					<h3 class="primary"> <?php echo $this->get_attributes['content']['title']; ?> </h3>

					<div class="becustom-dashboard-tooltip">
						<?php
							echo $this->popup('content')
						?>
					</div>

					<?php
						$editor_content = stripslashes_deep($this->options['content']['value']);
						$settings = array(
							'wpautop' => false,
						);

						wp_editor( $editor_content, 'becustom_tinymce_content', $settings );
					?>
				</div>

				<?php submit_button( 'Save changes' ); ?>
			</form>
		</div>
	</div>

</div>
