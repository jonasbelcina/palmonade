<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>


<?php woocommerce_product_subcategories(); ?>

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
				'post_type'			=> 'product',
				// 'product_cat'		=> 'ernestomeda',
				'posts_per_page'	=> 6,
				'tax_query' 		=> array(
											array(
												'taxonomy' => 'product_cat',
												'field'    => 'id',
												'terms'    => 14,
											),
										),
				'paged'				=> $paged
			);

	$wp_query = new WP_Query($args);

	if($wp_query->have_posts()) :
		while( $wp_query->have_posts() ) : $wp_query->the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;

		echo '<div class="clearfix"></div>';
		do_action( 'woocommerce_after_shop_loop' );

	endif;

	wp_reset_postdata();
?>
















