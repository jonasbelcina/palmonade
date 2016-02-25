<?php 

/*
* Template Name: Contact
*/

get_header(); ?>

<div class="container">
	<nav class="breadcrumbs contact-breadcrumbs">
		<a href="<?=home_url()?>">Home</a>
		<span>Contact Us</span>
	</nav>

	<div class="contact-us">
		<div class="col-md-6">
			<h2>Our Location</h2>
			<div class="map-container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14121.846985526518!2d55.064236492646906!3d24.960723569919708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f0deaff2b8909%3A0x50e23a1aa9a6ce83!2sBusiness+Storage+Solutions!5e0!3m2!1sen!2s!4v1456040469540" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="col-md-6">
			<h2>Contact Us</h2>
			<?php echo do_shortcode('[contact-form-7 id="113" title="Contact Us Popup"]')?>
		</div>
	</div>
</div>

<?php get_footer(); ?>