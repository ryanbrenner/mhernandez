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

					$html .= '<div id="' . $post->post_slug . '" class="news_single news_single-' . $num . ' ' . ((is_home() && $num == 1) ? 'is_expanded' : '') . '">';
						$html .= '<span class="news_title">' . $post->post_title . '</span>';
						$html .= '<span class="news_date">' . (get_field('date') != '' ? get_field('date') : get_the_date()) . '</span>';
						$html .= '<div class="news_image">';
							$html .= '<a href="#" class="news_expand">';
								$html .= '<img src="' . $image['sizes']['news-image'] . '" alt="' . $post->post_title . ', ' . (get_field('date') != '' ? get_field('date') : get_the_date()) . ' by Marla Hernandez" />';
							$html .= '</a>';
						$html .= '</div>';
						$html .= '<div class="news_expanded__container" style="background-image:url(' . $image['sizes']['news-bg'] . ');">';
							$html .= '<div class="news_expanded">';
								$html .= '<div class="news_expanded__content">';
									$html .= '<h2>' . $post->post_title . '</h2>';
									if (get_field('description') != '') {
										$html .= '<div class="news_description">';
											$html .= get_field('description');
										$html .= '</div>';
									}
									if (get_field('location') != '') {
										$html .= '<span class="news_location">' . get_field('location') . '</span>';
									}
									if (get_field('footer') != '') {
										$html .= '<span class="news_footer">' . get_field('footer') . '</span>';
									}
									$html .= '<div class="news_close"></div>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';

					$num++;
				
				}

				echo $html;

			} else {
				echo 'nothing';
			}
		?>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>