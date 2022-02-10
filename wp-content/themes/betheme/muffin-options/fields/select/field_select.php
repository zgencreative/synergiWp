<?php
class MFN_Options_select extends Mfn_Options_field
{

	/**
	 * Render
	 */

	public function render( $meta = false )
	{

		$preview = '';

		// preview

		if ( ! empty( $this->field['preview'] ) ){
			$preview = 'preview-'. $this->field['preview'];
		}

		// WPML

		if ( ! empty( $this->field['wpml'] ) ) {
			if ( $this->value && function_exists( 'icl_object_id' ) ) {
				$term = get_term_by( 'slug', $this->value, $this->field['wpml'] );
				$term = apply_filters( 'wpml_object_id', $term->term_id, $this->field['wpml'], true );
				$this->value = get_term_by( 'term_id', $term, $this->field['wpml'] )->slug;
			}
		}

		// output -----

		echo '<div class="form-group">';
			echo '<div class="form-control">';

				echo '<select class="mfn-form-control mfn-form-select '. esc_attr( $preview ) .'" '. $this->get_name( $meta ) .'>';
					if ( is_array( $this->field['options'] ) ) {
						foreach ( $this->field['options'] as $k => $v ) {
							echo '<option value="'. esc_attr($k) .'" '. selected($this->value, $k, false) .'>'. esc_html($v) .'</option>';
						}
					}
				echo '</select>';

			echo '</div>';
		echo '</div>';

		echo $this->get_description();

	}
}
