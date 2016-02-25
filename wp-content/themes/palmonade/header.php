<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default">
	                <div class="navbar-header">
		                <a class="navbar-brand" href="<?php echo home_url(); ?>">
		                	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.jpg" alt="Palmonade Kitchens" />
		                </a>

		                <div class="header-contact">
	                		<ul>
	                			<li><a href="mailto:info@palmonade.com">info@palmonade.com</a></li>
	                			<li>+971 455 8844 99</li>
	                		</ul>
		                </div>

                		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                		    <span class="icon-bar"></span>
                		    <span class="icon-bar"></span>
                		    <span class="icon-bar"></span>
                		</button>

                		<div id="navbar" class="navbar-collapse collapse">
                		    <ul class="nav navbar-nav">
                		    	<li><a href="<?php echo home_url(); ?>">Home</a></li>
                		    	<li><a href="<?php echo home_url(); ?>">About Us</a></li>
                		    	<li><a href="<?php echo home_url(); ?>/product-category/kitchens/">Kitchens</a></li>
                		    	<li><a href="<?php echo home_url(); ?>/news">News</a></li>
                		    	<li><a href="<?php echo home_url(); ?>">Contact Us</a></li>
                		    </ul>
            		    </div>
            		</div>
        		</nav>
			</div>
		</div>
	</header>
