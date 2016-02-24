<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
	$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_option( 'page_for_posts' )));
?>

<section class="banner news-banner" <?php if($thumb){ ?>style="background: url('<?php echo $thumb; ?>') center bottom / cover no-repeat;"<?php } ?>>
	<div class="container">
		<div class="banner-text">
			<h2><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h2>
		</div>
	</div>
</section>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
