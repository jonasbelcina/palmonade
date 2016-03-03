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

get_header( 'shop' ); 

global $wp_query;
$cat = $wp_query->get_queried_object();
// var_dump($cat);
?>

<?php
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
?>

	<?php
		if($cat->parent == 0) :
			$banner_img = get_field('banner_image', 'product_cat_' . $cat->term_id);
			$mobile_img = get_field('mobile_banner_image', 'product_cat_' . $cat->term_id); ?>

			<?php if($banner_img && $mobile_img) : ?>
				<section class="product-cat-banner">
					<img class="img-responsive" src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt'] ?>" />
					<img class="img-responsive" src="<?php echo $mobile_img['url']; ?>" alt="<?php echo $mobile_img['alt'] ?>" />
				</section>
			<?php endif; ?>
	<?php endif; ?>

	<div class="product-listing">
		<div class="container">
			<div class="row">
			
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

						<?php
							if($cat->term_id == 6) :
								$cat_args = array(
												'taxonomy'	=> 'product_cat',
												'parent' 	=> $cat->term_id,
												// 'hide_empty' => 0
											);
							else:
								$cat_args = array(
												'orderby'	=> 'slug',
												'taxonomy'	=> 'product_cat',
												'parent' 	=> $cat->term_id,
												'exclude'  	=> 34
												// 'hide_empty' => 0
											);

							endif;

							$cat = get_categories($cat_args);

							if($cat) :
								foreach($cat as $c) :
									// var_dump($c);

									echo '<div class="prod-cat-group" id="' . $c->slug . '">';
										if($c->parent == 6) :
											echo '<h2>' . $c->name  . ' Kitchens</h2>';
										else :
											echo '<h2>' . $c->name  . '</h2>';
										endif;

										if($c->count > 0) :
											// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
											// $args = array(
											// 			'post_type'			=> 'product',
											// 			'product_cat'		=> $c->slug,
											// 			'posts_per_page'	=> 6,
											// 			'paged'				=> $paged
											// 		);

											// $wp_query = new WP_Query($args);

											// if($wp_query->have_posts()) :
											// 	while( $wp_query->have_posts() ) : $wp_query->the_post();
											// 		wc_get_template_part( 'content', 'product' );
											// 	endwhile;

											// 	echo woocommerce_pagination();
											// endif;

											// wc_get_template_part('taxonomy-product_cat-' . $c->slug);

											//wp_reset_query();

											// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
											// $args = array(
											// 			'post_type'			=> 'product',
											// 			// 'product_cat'		=> 'ernestomeda',
											// 			'posts_per_page'	=> 6,
											// 			'tax_query' 		=> array(
											// 										array(
											// 											'taxonomy' => 'product_cat',
											// 											'field'    => 'id',
											// 											'terms'    => $c->term_id,
											// 										),
											// 									),
											// 			'paged'				=> $paged
											// 		);

											// $wp_query = new WP_Query($args);

											// if($wp_query->have_posts()) :
											// 	while( $wp_query->have_posts() ) : $wp_query->the_post();
											// 		wc_get_template_part( 'content', 'product' );
											// 	endwhile;

											// 	echo '<div class="clearfix"></div>';
											// 	// do_action( 'woocommerce_after_shop_loop' );
											// 	// echo do_shortcode('[ajax_load_more post_type="product" taxonomy="product_cat" taxonomy_terms="' . $c->slug . '" taxonomy_operator="IN" posts_per_page="6"]');

											// endif;

											// wp_reset_postdata();

											echo do_shortcode('[ajax_load_more post_type="product" taxonomy="product_cat" taxonomy_terms="' . $c->slug . '" taxonomy_operator="IN" posts_per_page="6" scroll="false" button_label="Load More"]');

										endif;

									echo '</div>';
								endforeach;
							endif;
						?>

				<?php woocommerce_product_loop_end(); ?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .product-listing -->

<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );

	global $wp_query;
	$cat = $wp_query->get_queried_object();
	// var_dump($cat);

?>

<?php if($cat->term_id == 21) : ?>
	<section class="consultants about-us">
		<div class="container">
			<h2>Talk To Our Consultants</h2>
			<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
			<a href="" data-toggle="modal" data-target="#contact_popup">Contact Us</a>
		</div>
	</section>

	<section class="contact-icons about-us">
		<div class="container">
			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>Office</h2>
					<h3>Bldg 7, Street N606, JAFZA Dubai</h3>
				</div>
			</div>

			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>Phone</h2>
					<h3>+971 455 8844 99</h3>
				</div>
			</div>

			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>E-mail</h2>
					<h3><a href="mailto:info@palmonade.com">info@palmonade.com</a></h3>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact Modal -->
	<div class="modal fade" id="contact_popup" tabindex="-1" role="dialog" aria-labelledby="ContactPopup">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title">Contact Us</h4>
	      		</div>

	      		<div class="modal-body">
	    			<?php echo do_shortcode('[contact-form-7 id="113" title="Contact Us Popup"]'); ?>
	     	 	</div>
	    	</div>
	  	</div>
	</div>

	<!-- Appliance Enquiry Modal -->
	<div class="modal fade" id="appliance_enquiry" tabindex="-1" role="dialog" aria-labelledby="Appliance Enquiry">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title">Product Enquiry</h4>
	      		</div>

	      		<div class="modal-body">
	      			<!-- <h3><?php the_title(); ?></h3> -->
	    			<?php echo do_shortcode('[contact-form-7 id="571" title="Appliance Enquiry"]'); ?>
	     	 	</div>
	    	</div>
	  	</div>
	</div>
<?php endif; ?>

<?php get_footer( 'shop' ); ?>















