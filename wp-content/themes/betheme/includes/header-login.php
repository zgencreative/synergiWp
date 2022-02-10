<?php
/**
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */

global $woocommerce;

$has_shop = false;
$has_user = false;
$has_cart = false;
$has_wishlist = false;

// has shop

if( isset( $woocommerce ) && function_exists('is_woocommerce') ){
	$has_shop = true;
}

// shop icons hide

$shop_icons_hide = mfn_opts_get('shop-icons-hide');

// shop user

if( $has_shop && empty( $shop_icons_hide['user'] ) ){
	$has_user = true;
}

// output -----

if( $has_user ){
  echo '<div class="mfn-header-login is-side woocommerce '. ( is_user_logged_in() ? "mfn-header-modal-nav" : "mfn-header-modal-login" ) .'">';
    echo '<span class="mfn-close-icon toggle-login-modal close-login-modal"><span class="icon">&#10005;</span></span>';
    if( ! is_user_logged_in()){
      echo '<h4>'; esc_html_e( 'Login', 'woocommerce' ); echo '</h4>';
      echo woocommerce_login_form();
      $opt_reg = get_option( 'woocommerce_enable_myaccount_registration' );
      if( $opt_reg == 'yes' ){
        echo '<p class="create_account"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">';
          esc_html_e( 'Create an account?', 'woocommerce' );
        echo '</a></p>';
      }
    } else {
      echo '<h4>'. sprintf( __( 'Hello %s,', 'woocommerce' ), esc_html( wp_get_current_user()->user_login ) ) .'</h4>';
      woocommerce_account_navigation();
    }
  echo '</div>';
  // echo '<div id="mfn-login-overlay"></div>';
}
