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
				<?php
					echo get_field('information');
				?>
				<p><strong><u>Education</u></strong><br /><span class="key">2011 BFA Studio Art</span> <span class="tab">University of Central Florida</span><br /><span class="key">Major Specialization</span> <span class="tab">Photography</span><br /><span class="key">Minor Specialization</span> <span class="tab">Cinema Studies</span><br />
				<?php
					$bio = get_field('bio');
					
					if ($bio) {
						
						$html = '';
						
						foreach ($bio as $section) {
							
							if ($section['acf_fc_layout']	 == 'exhibitions') {
								$html .= '<p><strong><u>' . $section['title'] . '</u></strong></p>';
								$html .= yearSort($section['content']);
							} else if ($section['acf_fc_layout']	 == 'text') {
								$html .= '<span class="title"><strong><u>' . $section['title'] . '</u></strong></span><br />';
								$html .= $section['content'];
							}
						}
						
						echo $html;
					}
					
					/*
					$solo = $bio[0]['solo_exhibitions'];
					$group = $bio[0]['group_exhibitions'];
					$awards = $bio[0]['awards'];
					$html = '<p><strong><u>Solo Exhibitions</u></strong>';
					$html .= yearSort($solo);
					$html .= '<p><strong><u>Group Exhibitions</u></strong>';
					$html .= yearSort($group);
					$html .= '<p><strong><u>Awards</u></strong><br />';
					$aCount = 1;
					foreach ($awards as $a) {
						$html .= $a['award'];
						if ($sCount == count($awards)) {
							$html .= '</p>';
						} else {
							$html .= '<br />';
						}
						$aCount++;
					}
					echo $html;
					*/
				?>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>