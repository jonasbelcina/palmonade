<?php
/**
 *
 * Template name: About us
 *
 */

get_header(); ?>

<section class="company about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				endif; ?>
			</div>

			<div class="col-md-6">
				<h2><?php the_field('director_heading'); ?></h2>
				<?php $director_img = get_field('director_image'); ?>
				<div class="director-img">
					<img class="img-responsive" src="<?php echo $director_img['url']; ?>" alt="<?php echo $director_img['alt']; ?>">
					<span><?php the_field('director_position_name'); ?></span>
				</div>

				<div class="director-msg">
					<?php the_field('director_message'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $timeline_bg = get_field('timeline_bg_image'); ?>
<section class="timeline about-us" <?php if($timeline_bg) { ?>style="background: url(<?php echo $timeline_bg['url']; ?>) center no-repeat; background-size: cover;"<?php } ?>>
	<div class="container">
		<div class="row">
			<h2><?php the_field('timeline_heading'); ?></h2>

			<?php if( have_rows('timeline') ): ?>
				<ul>
				<?php while( have_rows('timeline') ): the_row(); ?>
					<li>
						<div class="timeline-bubble <?php if($ctr == 2) { ?>long-bubble<?php } ?>">
							<h3><?php the_sub_field('heading'); ?></h3>
							<p><?php the_sub_field('content'); ?></p>
							<span><?php the_sub_field('year'); ?></span>
						</div>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="services-cycle">
	<div class="container">
		
	</div>
</section>

<?php get_footer(); ?>
