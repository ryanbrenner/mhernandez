<?php
/* Template Name: News */
get_header();
?>

<div id="news" class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="content">
		<h2>/ News</h2>
		<div class="news_list">
		<?php
			$args = array('post_type' => 'news', 'posts_per_page' => 6);
			$news_query = new WP_Query($args);

			if ($news_query->have_posts()) {

				$num = 1;
				$html = '';

				while ($news_query->have_posts()) {

					$news_query->the_post();

					$image = get_field('image');

					$html .= '<div id="' . $post->post_slug . '" class="news_single news_single-' . $num . '">';
						$html .= '<span class="news_title">' . $post->post_title . '</span>';
						$html .= '<span class="news_date">' . (get_field('date') != '' ? get_field('date') : get_the_date()) . '</span>';
						$html .= '<div class="news_image">';
							$html .= '<a href="#" class="news_expand">';
								$html .= '<img src="' . $image['sizes']['news-image'] . '" alt="' . $post->post_title . ', ' . (get_field('date') != '' ? get_field('date') : get_the_date()) . ' by Marla Hernandez" />';
							$html .= '</a>';
						$html .= '</div>';
					$html .= '</div>';

					$num++;
				
				}

				echo $html;

			} else {
				echo 'nothing';
			}
		?>
			<div id="universal-reversal" class="news_single">
				<span class="news_title">Universal Reversal</span>
				<span class="news_date">November 15</span>
				<div class="news_image">
					<a href="#" class="news_expand">
						<img src="#" alt="Universal Reversal, November 15 by Marla Hernandez" />
					</a>
				</div>
			</div>
			<div id="universal-reversal" class="news_single">
				<span class="news_title">Universal Reversal</span>
				<span class="news_date">November 15</span>
				<div class="news_image">
					<a href="#" class="news_expand">
						<img src="#" alt="Universal Reversal, November 15 by Marla Hernandez" />
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>