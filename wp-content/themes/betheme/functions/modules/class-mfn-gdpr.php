<?php
defined( 'ABSPATH' ) || exit;

class Mfn_Gdpr {

  /**
   * Constructor
   */

  function __construct(){
    if( mfn_opts_get('gdpr') ){
      add_action('wp_footer', array($this, 'render'), 1);
    }
  }

  /**
   * Show image
   */

  public function display_image_if_exsists( $imageUrl ){

    if( '#' == $imageUrl ){
      $imageUrl = get_theme_file_uri( '/images/cookies.png' );
    }

    if( $imageUrl ){
      return '<div class="mfn-gdpr-image">
        <img src="'. esc_url($imageUrl) .'" alt="gdpr-image" />
      </div>';
    }
  }

  /**
   * Get bar direction
   */

  public function get_direction($position){
    if ($position === "left" || $position === "right") {
      return 'vertical';
    }

    return 'horizontal';
  }

  /**
   * Display CSS property when filled
   */

  public function display_css_when_filled($css_property, $value){
    if (strlen(str_replace(' ', '', $value)) > 0) {
      return $css_property.':'.$value.';';
    }
  }

  /**
   * Render
   */

  public function render(){

    $position = mfn_opts_get('gdpr-settings-position','left');

    $page_link = ! empty( mfn_opts_get('gdpr-content-more_info_page') ) ? get_permalink( mfn_opts_get('gdpr-content-more_info_page') ) : mfn_opts_get('gdpr-content-more_info_link');

    echo '
      <div id="mfn-gdpr" data-aligment="'. esc_attr($position) .'" data-direction="'. esc_attr($this->get_direction($position)) .'">

        '. $this->display_image_if_exsists( mfn_opts_get('gdpr-content-image') ) .'

        <div class="mfn-gdpr-content">
          '. do_shortcode(mfn_opts_get('gdpr-content')) .'
        </div>

        <a class="mfn-gdpr-readmore" href="'. esc_url($page_link) .'" target="'. esc_attr(mfn_opts_get('gdpr-settings-link_target')) .'" >
        '. mfn_opts_get('gdpr-content-more_info_text') .'
        </a>

        <button class="mfn-gdpr-button" data-cookieDays="'. intval(mfn_opts_get('gdpr-settings-cookie_expire')) .'" data-animation="'. esc_attr(mfn_opts_get('gdpr-settings-animation')) .'" >
          '. mfn_opts_get('gdpr-content-button_text') .'
        </button>
      </div>
    ';
  }

}

$mfn_gdpr = new Mfn_Gdpr();
