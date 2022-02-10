<?php
$wish_arr = array(0);

if( isset($_COOKIE['mfn_wishlist']) ){
    $wishlist = $_COOKIE['mfn_wishlist'];
    $wish_arr = explode(',', $wishlist);
}

$wish_query = new WP_Query( array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post__in'=> $wish_arr
) ); ?>

<div class="section wishlist woocommerce">
    <div class="section_wrapper clearfix">
    <?php if($wish_query->have_posts()): ?>
        <?php while($wish_query->have_posts()): $wish_query->the_post();
            $product = wc_get_product(get_the_ID());
        ?>
        <div class="wishlist-row">
            <div class="column one-fourth">
                <?php echo Mfn_Builder_Woo_Helper::get_woo_product_image($product); ?>
            </div>
            <div class="column one-second">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="price"><?php echo $product->get_price_html(); ?></p>
                <?php the_excerpt(); ?>
                <?php woocommerce_template_single_meta(); ?>
            </div>
            <div class="column one-fourth wishlist-options">
                <?php echo Mfn_Builder_Woo_Helper::get_woo_product_button( $product ); ?>
            </div>
        </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="wishlist-info">
            <h3>Your wishlist is empty.</h3>
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="button mfn-btn">Go to shop</a>
        </div>
    <?php endif; ?>

    <div class="wishlist-info" style="display: none;">
        <h3>Your wishlist is empty.</h3>
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="button mfn-btn">Go to shop</a>
    </div>
    </div>
</div>
