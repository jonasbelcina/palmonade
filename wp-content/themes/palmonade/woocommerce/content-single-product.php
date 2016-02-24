<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="kitchen-details-banner">
		<?php if(get_field('video')) : ?>
			<div class="videoWrapper">
				<iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php the_field('video'); ?>?rel=0&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php else :
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
			$thumb_url = $thumb_url_array[0]; ?>
			<img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?> banner image" />
		<?php endif; ?>

		<div class="banner-caption">
			<div class="container">
				Ernestomeda Soul – The Contemporary and Vintage kitchen
			</div>
		</div>
	</div>
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<!-- <div class="summary entry-summary"> -->

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			// do_action( 'woocommerce_single_product_summary' );
		?>

	<!-- </div> --><!-- .summary -->

	<section class="kitchen-about">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<h2>About the Kitchen</h2>
					<?php the_content(); ?>
					<a class="kitchen-enquiry" href="">Send Enquiry</a>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="catalogue">
						<h2>Catalogue Request</h2>
						<h3>Discover ideas &amp; solutions for creating kitchen that reflects your personality</h3>
						<img class="img-responsive catalogue-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/catalogue-item.png" alt="Catalogue" />
						<?php echo do_shortcode('[contact-form-7 id="57" title="Catalogue Request Form"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<section class="consultants">
		<div class="container">
			<h2>Talk To Our Consultants</h2>
			<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
			<a href="">Contact Us</a>
		</div>
	</section>

	<section class="contact-icons">
		<div class="container">
			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>Office</h2>
					<h3>12 East Street, Dubai</h3>
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

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
