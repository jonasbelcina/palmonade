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
						<div class="timeline-bubble">
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
		<?php if( have_rows('services') ): ?>
			<div class="desktop-cycle">

				<?php $ctr = 1;
				while( have_rows('services') ): the_row();
					if($ctr == 4) : ?>
						<div class="clearfix"></div>
						<div class="services-title">
							<?php $service_icon = get_field('cycle_image'); ?>
							<img src="<?php echo $service_icon['url']; ?>" alt="<?php echo $service_icon['alt']; ?>" />
							<h3>Our Services Cycle</h3>
						</div>
					<?php endif; ?>

					<div class="col-md-4">
						<div class="service-cycle">
							<div class="col-md-4">
								<?php $icon = get_sub_field('icon'); ?>
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
							</div>
							<div class="col-md-8">
								<h3><?php the_sub_field('service_name'); ?></h3>
								<p><?php the_sub_field('content'); ?></p>
							</div>
						</div>
					</div>
				<?php $ctr++;
				endwhile; ?>

			</div>
		<?php endif; ?>
	</div>
</section>

<section class="consultants about-us">
	<div class="container">
		<h2>Talk To Our Consultants</h2>
		<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
		<a href="">Contact Us</a>
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

<section class="our-team about-us">
	<div class="container">
		<div class="row">
			<h2><?php the_field('team_heading'); ?></h2>
			<div class="col-md-6">
				<?php $team_img = get_field('team_image'); ?>
				<img class="img-responsive" src="<?php echo $team_img['url']; ?>" alt="<?php echo $team_img['alt']; ?>" />
			</div>

			<div class="col-md-6">
				<?php the_field('team_content'); ?>
			</div>
		</div>
	</div>
</section>

<section class="why-us about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6 why-us-content">
				<h2><?php the_field('why_us_heading'); ?></h2>
				<p><?php the_field('why_us_text'); ?></p>

				<?php if( have_rows('why_us_list') ): ?>
					<ul>
					<?php while( have_rows('why_us_list') ): the_row(); ?>
						<li>
							<h3><?php the_sub_field('heading_text'); ?></h3>
							<p><?php the_sub_field('content'); ?></p>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="col-md-6 why-us-contact">
				<div class="home-contact">
					<?php $contact_box_image = get_field('contact_box_background_image', 5); ?>
					<img class="img-responsive" src="<?php echo $contact_box_image['url']; ?>" alt="<?php echo $contact_box_image['alt']; ?>" />
					<div class="home-contact-content">
						<div>
							<h3><?php the_field('contact_box_title', 5); ?></h3>
							<h4><?php the_field('contact_box_subtitle', 5); ?></h4>
						</div>
						<p><?php the_field('contact_box_content', 5); ?></p>
						<a href="" data-toggle="modal" data-target="#contact_popup"><?php the_field('contact_box_button_text', 5); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="design-testimonials about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php the_field('design_heading'); ?></h2>
				<?php $innovate_img = get_field('design_image'); ?>
				<div class="innovate" <?php if($innovate_img) { ?>style="background: url(<?php echo $innovate_img['url']; ?>) center top no-repeat; background-size: cover;"<?php } ?>>
					<p><?php the_field('design_content'); ?></p>
					<a href="<?php the_field('design_link'); ?>"><?php the_field('link_text'); ?></a>
				</div>
			</div>

			<div class="col-md-6 about-testimonials">
				<h2><?php the_field('testimonials_heading'); ?></h2>
				<div class="testimonial-items">
					<?php if( have_rows('about_testimonials') ):
						while( have_rows('about_testimonials') ): the_row(); ?>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<h3><?php the_sub_field('featured_text'); ?></h3>
									<p><?php the_sub_field('content'); ?></p>
								</div>
								<div class="testimonial-by">
									<?php the_sub_field('from'); ?>
								</div>
							</div>

						<?php endwhile;
					endif; ?>
				</div>
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

<?php get_footer(); ?>
