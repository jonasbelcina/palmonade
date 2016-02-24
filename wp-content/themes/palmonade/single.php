<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
	$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_option( 'page_for_posts' )));
?>

<section class="banner news-banner" <?php if($thumb){ ?>style="background: url('<?php echo $thumb; ?>') center top / cover no-repeat;"<?php } ?>>
	<div class="container">
		<div class="banner-text">
			<h2><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h2>
		</div>
	</div>
</section>
	
<section class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8 main-blog">
				<nav class="breadcrumbs">
					<a href="<?=home_url()?>">Home</a>
					<span>News and Events</span>
				</nav>

				<div class="side-box posts-filter mobile-post-filter">
					<h2>Our Shows <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-minus"></span></h2>
					<div class="button-group">
						<?php if (!is_single()) : ?>
							<button data-filter="*" class="post-filter-active">All</button>
						<?php else: ?>
							<a href="<?=home_url()?>/blog">All</a>
						<?php endif; ?>
						<?php
							$args = array(
										'type'			=> 'post',
										'hide_empty'	=> 0
									);
							$categories = get_categories($args);
							foreach ($categories as $category) { 
								if ($category->name != 'Uncategorized' && $category->category_parent == 0) : ?>
									<a href="<?=home_url()?>/blog#<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
								<?php 
								endif;
							}
						?>
					</div>
				</div>

				<div class="single-blog-posts">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}

						// End of the loop.
					endwhile;
					?>
				</div>

			</div>

			<?php get_sidebar('blog'); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
