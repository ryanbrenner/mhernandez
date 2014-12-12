<?php
/* Template Name: Exhibitions */
get_header();
?>

<div id="exhibitions" class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="content">
		<h2>/ Exhibitions</h2>
		<div class="col2">
			<div class="column">
				<h3>Upcoming Show</h3>
				<div class="exhibition_single upcoming_show">
				<?php
					$upcoming = get_field('upcoming_exhibition');
					$upcoming = $upcoming[0];

					if ($upcoming['title'] == '') {
						echo '<span class="exhibition_title">There are no upcoming shows.</span>';
					} else {
						$html = '<span class="exhibition_title">' . $upcoming['title'] . '</span>';
						$html .= '<span class="exhibition_location">' . $upcoming['location'] . '</span>';
						$html .= '<span class="exhibition_date">Opening reception: ' . $upcoming['date'] . '</span>';
						$html .= '<div class="exhibition_image">';
						if ($upcoming['link'] != '') {
							$html .= '<a href="' . $upcoming['link'] . '" target="_blank">';
						}
							$html .= '<img src="' . $upcoming['image']['sizes']['exhibition-image'] . '" alt="Upcoming Show \'' . $upcoming['title'] . '\' by Marla Hernandez" />';
						if ($upcoming['link'] != '') {
							$html .= '</a>';
						}
						$html .= '</div>';
						echo $html;
					}
				?>
				</div>
			</div>
			<div class="column">
				<h3>Past Show</h3>
				<div class="exhibition_single past_show">
				<?php
					$past = get_field('past_exhibition');
					$past = $past[0];

					if ($past['title'] == '') {
						echo '<span class="exhibition_title">There are no past shows.</span>';
					} else {
						$html = '<span class="exhibition_title">' . $past['title'] . '</span>';
						$html .= '<span class="exhibition_location">' . $past['location'] . '</span>';
						$html .= '<span class="exhibition_date">Opening reception: ' . $past['date'] . '</span>';
						$html .= '<div class="exhibition_image">';
						if ($past['link'] != '') {
							$html .= '<a href="' . $past['link'] . '" target="_blank">';
						}
							$html .= '<img src="' . $past['image']['sizes']['exhibition-image'] . '" alt="Past Show \'' . $past['title'] . '\' by Marla Hernandez" />';
						if ($past['link'] != '') {
							$html .= '</a>';
						}
						$html .= '</div>';
						echo $html;
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>