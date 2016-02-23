<?php

global $wp_query;
$top_parent = '';
$cat = $wp_query->get_queried_object();

wc_get_template_part( 'content', 'product' );