<?php
class MFN_Options_social extends Mfn_Options_field
{

	/**
	 * Render
	 */

	public function render( $meta = false )
	{
    // socials

    $socials = [
      'skype' => [
        'title' => 'Skype',
        'desc' => 'Skype login. You can use callto: or skype: prefix',
        'icon' => 'icon-skype',
      ],
      'whatsapp' => [
        'title' => 'WhatsApp',
        'desc' => 'WhatsApp URL. You can use whatsapp: prefix',
        'icon' => 'icon-whatsapp',
      ],
      'facebook' => [
        'title' => 'Facebook',
        'icon' => 'icon-facebook',
      ],
      'twitter' => [
        'title' => 'Twitter',
        'icon' => 'icon-twitter',
      ],
      'vimeo' => [
        'title' => 'Vimeo',
        'icon' => 'icon-vimeo',
      ],
      'youtube' => [
        'title' => 'YouTube',
        'icon' => 'icon-play',
      ],
      'flickr' => [
        'title' => 'Flickr',
        'icon' => 'icon-flickr',
      ],
      'linkedin' => [
        'title' => 'LinkedIn',
        'icon' => 'icon-linkedin',
      ],
      'pinterest' => [
        'title' => 'Pinterest',
        'icon' => 'icon-pinterest',
      ],
      'dribbble' => [
        'title' => 'Dribbble',
        'icon' => 'icon-dribbble',
      ],
      'instagram' => [
        'title' => 'Instagram',
        'icon' => 'icon-instagram',
      ],
      'snapchat' => [
        'title' => 'Snapchat',
        'icon' => 'icon-snapchat',
      ],
      'behance' => [
        'title' => 'Behance',
        'icon' => 'icon-behance',
      ],
      'tumblr' => [
        'title' => 'Tumblr',
        'icon' => 'icon-tumblr',
      ],
      'tripadvisor' => [
        'title' => 'Tripadvisor',
        'icon' => 'icon-tripadvisor',
      ],
      'vkontakte' => [
        'title' => 'VKontakte',
        'icon' => 'icon-vkontakte',
      ],
      'viadeo' => [
        'title' => 'Viadeo',
        'icon' => 'icon-viadeo',
      ],
      'xing' => [
        'title' => 'Xing',
        'icon' => 'icon-xing',
      ],
			'custom' => true,
			'rss' => true,
    ];

    // order

    if( ! empty( $this->value['order'] ) ){

      $order = $this->value['order'];
      $order = explode( ',', $order );

      $order = array_unique( array_merge( $order, array_keys( $socials ) ) );

    } else {

      $order = array_keys( $socials );

    }

		// output -----

		echo '<div class="form-group social-icons">';

      echo '<ul class="social-wrapper">';

        foreach( $order as $key ){

					if( 'custom' == $key ){

						echo '<li data-key="custom">';
	            echo '<div class="drag"><i class="icon-arrow-combo"></i></div>';
	            echo '<div class="label"><i class="fas fa-question"></i> &nbsp;Custom</div>';
	            echo '<div class="form-control">';
	              echo '<span>Custom icon selected <a href="admin.php?page=be-options#social&custom">below</a><span>';
	            echo '</div>';
	          echo '</li>';

					} elseif( 'rss' == $key ) {

						echo '<li data-key="rss">';
	            echo '<div class="drag"><i class="icon-arrow-combo"></i></div>';
	            echo '<div class="label"><i class="icon-rss"></i> RSS</div>';
	            echo '<div class="form-control">';
	              echo '<span>Show the RSS icon if enabled <a href="admin.php?page=be-options#social&custom">below</a><span>';
	            echo '</div>';
	          echo '</li>';

					} else {

						$social = $socials[$key];

	          if( ! empty( $this->value[$key] ) ){
	            $value = $this->value[$key];
	          } else {
	            $value = '';
	          }

	          if( ! empty( $social['desc'] ) ){
	            $desc = $social['desc'];
	          } else {
	            $desc = 'Link to the profile page';
	          }

	          echo '<li data-key="'. esc_attr($key) .'">';
	            echo '<div class="drag"><i class="icon-arrow-combo"></i></div>';
	            echo '<div class="label" data-tooltip="'. esc_attr($desc) .'"><i class="'. esc_attr( $social['icon'] ) .'"></i> '. esc_html( $social['title'] ) .'</div>';
	            echo '<div class="form-control">';
	              echo '<input class="mfn-form-control mfn-form-input" type="text" '. $this->get_name( $meta, $key ) .' value="'. esc_attr( $value ) .'"/>';
	            echo '</div>';
	          echo '</li>';

					}

        }

      echo '</ul>';

      echo '<input type="hidden" class="social-order" '. $this->get_name( $meta, 'order' ) .' value="'. esc_attr( implode( ',', $order ) ) .'" />';

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
    wp_enqueue_script( 'mfn-opts-field-social', MFN_OPTIONS_URI .'fields/social/field_social.js', array( 'jquery' ), MFN_THEME_VERSION, true );
  }
}
