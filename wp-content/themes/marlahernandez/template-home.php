<?php
/* Template Name: Home */
get_header();
?>

<?php
	$nav = wp_nav_menu(array(
		'theme_location' => 'main-nav',
		'container' => '',
		'echo' => 0
	));

	print_r($nav);
	die();
?>

<?php get_footer(); ?>