<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
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
global $wp_query;
$top_parent = '';
$cat = $wp_query->get_queried_object();

// var_dump($cat);
?>

<div class="col-sm-3 woo-sidebar">
	<h2>Our Offerings</h2>
	<ul>
		<?php
		$args = array(
					'hide_empty'	=> 0,
					'parent' 		=> 0,
				);

		$top_parent = get_terms('product_cat', $args);

		if($top_parent) :
			foreach ($top_parent as $parent) { ?>
				<?php
					if($parent->count > 0) {
						if($cat->term_id == $parent->term_id) :
							$this_parent_class = '<span class="glyphicon glyphicon-minus expand" title="Toggle"></span>';
						else :
							$this_parent_class = '<span class="glyphicon glyphicon-plus expand" title="Toggle"></span>';
						endif;
					}
					else {
						$this_parent_class = '';
					}

				?>
				<li class="top-parent <?php //if($parent->count > 0) { echo 'expand'; } ?> <?php if($cat->term_id == $parent->term_id) { echo 'current-cat cat-active'; } ?>"><a href="<?php echo get_term_link($parent); ?>"><?php echo $parent->name; ?></a><?php echo $this_parent_class; ?></li>
					<?php 
					if($parent->count > 0) :
						if($parent->term_id == 6) :
							$child_args = array(
											'hide_empty'	=> 0,
											'parent' 		=> $parent->term_id,
										);
						else :
							$child_args = array(
											'orderby'		=> 'slug',
											// 'order'			=> 'DESC',
											'hide_empty'	=> 0,
											'parent' 		=> $parent->term_id,
										);
						endif;

						$child_category = get_terms('product_cat', $child_args);

						if($child_category) :
							if($cat->term_id == $parent->term_id) :
								echo '<ul class="active-parent">';
							else :
								echo '<ul>';
							endif;

								foreach ($child_category as $child_cat) {
									if($child_cat->count > 0) {
										$this_class = 'expand cat-active';
										$this_span = '<span class="glyphicon glyphicon-minus"></span>';
									}
									else {
										$this_class = '';
										$this_span = '';
									}

									if($child_cat->parent == 6) :
										echo '<li class="' . $this_class . '">' . $child_cat->name . $this_span . '</li>';
									else :
										if($cat->term_id == 6) :
											echo '<li><a class="smooth" href="' . get_term_link(21) . '#' . $child_cat->slug . '">' . $child_cat->name . '</a></li>';
										else :
											echo '<li><a class="smooth" href="#' . $child_cat->slug . '">' . $child_cat->name . '</a></li>';
										endif;
									endif;
									if($child_cat->count > 0 && $child_cat->parent == 6) :
										$products_args = array(
															'post_type' 	=> 'product',
															'product_cat'	=> $child_cat->slug,
															'posts_per_page' => -1
														);

										$products = new WP_Query($products_args);

										if($products->have_posts()) :
											echo '<ul class="active-parent">';
												while ( $products->have_posts() ) : $products->the_post();
													echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
												endwhile;
											echo "</ul>";
										endif;
									endif;
								}
							echo '</ul>';
						endif;
					endif;
					?>
			<?php }
		endif;
		?>
	</ul>
</div>
