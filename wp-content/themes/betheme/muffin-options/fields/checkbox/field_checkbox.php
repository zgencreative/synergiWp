<?php
class MFN_Options_checkbox extends Mfn_Options_field
{

	/**
	 * Render
	 */

	public function render( $meta = false )
	{
		if ( ! is_array( $this->field[ 'options' ] ) ) {
			return false;
		}

		$class = false;

		// invert

		if( ! empty( $this->field['invert'] ) ){
			$class = 'invert';
		}

		// meta

		if ( $meta ) {

			// page mata & builder existing items
			$name = $this->field['id'];

		} else {

			// theme options
			$name = $this->prefix .'['. $this->field['id'] .']';

		}

		// array values

		if ( ! isset( $this->value ) || ! is_array( $this->value ) ) {
			$this->value = array();
		}


		// output -----

		echo '<div class="form-group checkboxes '. esc_attr( $class ) .'">';

			// FIX | post meta save | all values unchecked

			echo '<input type="hidden" name="'. esc_attr( $name ) .'[post-meta]" value="1" checked="checked" />';

			echo '<div class="form-control">';
				echo '<ul>';

					foreach ( $this->field['options'] as $k => $v ) {

						$class = false;

						if ( ! isset( $this->value[$k] ) ) {
							$this->value[$k] = '';
						}

						if ( checked( $this->value[$k], $k, false ) ){
							$class = "active";
						}

						echo '<li class="'. esc_attr( $class ) .'">';
							echo '<input type="checkbox" class="mfn-form-checkbox" name="'. esc_attr( $name ) . '['. esc_attr( $k ) .']" value="'. esc_attr( $k ) .'" '. checked( $this->value[$k], $k, false ) .' />';
							echo '<span class="title">'. wp_kses( $v, mfn_allowed_html('desc') ) .'</span>';
						echo '</li>';
					}

				echo '</ul>';
			echo '</div>';

		echo '</div>';

		echo $this->get_description();

		// enqueue

		$this->enqueue();

	}

	/**
	 * Enqueue
	 */

	public function enqueue()
	{
		wp_enqueue_script( 'mfn-opts-field-checkbox', MFN_OPTIONS_URI .'fields/checkbox/field_checkbox.js', array( 'jquery' ), MFN_THEME_VERSION, true );
	}

}
