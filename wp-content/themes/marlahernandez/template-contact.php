<?php
/* Template Name: Contact */
get_header();
?>

<div id="contact" class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="header-image">
		<img src="<?php echo get_field('header_image'); ?>" alt="Contact Marla Hernandez" />
	</div>
	<div class="content">
	<h2>/ Contact</h2>
	
	<?php
		$content = get_field('description');
		echo $content;
	?>

	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>