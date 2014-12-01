<?php
/* Template Name: About */
get_header();
?>

<div id="info" class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="header-image">
		<img src="<?php echo get_field('header_image'); ?>" alt="About Marla Hernandez" />
	</div>
	<div class="content">
		<div class="col2">
			<div class="column">
				<h2>/ Artist Statement</h2>
				<?php 
					$html = get_field('artist_statement');
					if (get_field('cv_pdf') != '') {
						$html .= '<p><a href="' . get_field('cv_pdf') . '" class="view" target="_blank">View CV PDF</a></p>';
					}
					if (get_field('resume_pdf') != '') {
						$html .= '<p><a href="' . get_field('resume_pdf') . '" class="view" target="_blank">View Resume PDF</a></p>';
					}
					echo $html;
				?>
			</div>
			<div class="column">
				<h2>/ Biography</h2>

			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>