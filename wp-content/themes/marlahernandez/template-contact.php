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
		$html = '<p>Marla Hernandez</p>';
		if (get_field('email') != '') {
			$html .= '<p>mail: <a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a></p>';
		}
		if (get_field('phone_number') != '') {
			$html .= '<p>phonenumber: <a href="tel:' . get_field('phone_number') . '"> ' . get_field('phone_number') . '</a></p>';
		}
		if (get_field('facebook') != '') {
			$facebook = str_replace('https://', '', get_field('facebook'));
			$facebook = str_replace('http://', '', $facebook);
			$html .= '<p>facebook: <a href="https://' . $facebook . '" target="_blank"> ' . $facebook . '</a></p>';
		}
		if (get_field('location') != '') {
			$html .= '<p>location: ' . get_field('location') . '</p>';
		}
		echo $html;
	?>

	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>