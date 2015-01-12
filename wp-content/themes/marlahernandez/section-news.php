<div id="news" class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="content">
		<h2>/ News</h2>
		<div class="news_list">
		<?php
			$url = get_permalink();
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$ppp = get_field('posts_per_page', 102);
			$total_posts = wp_count_posts('news');
			$args = array('post_type' => 'news', 'posts_per_page' => $ppp, 'paged' => $paged);
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
									if (get_field('description') != '') 
			{							$html .= '<div class="news_description">';
											$html .= get_field('description');
										$html .= '</div>';
									}
									if (get_field('location') != '') {
										$html .= '<span class="news_location">' . get_field('location') . '</span>';
									}
									if (get_field('footer') != '') {
										$html .= '<span class="news_footer">' . get_field('footer') . '</span>';
									} else {
										$html .= '<span class="news_footer"><span class="square">&#9632;</span> <span class="triangle">&#9650;</span> <span class="circle">&#9679;</span></span>';
									}
									$html .= '<div class="news_close"></div>';
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';

					$num++;
				
				}
				
				// pagination
				if ($ppp < $total_posts->publish) {
					$html .= '<div class="pagination">';
						// prev page
						if ($paged != 1) {
							$html .= '<a href="' . $url . 'page/' . ($paged - 1) . '" class="paginate-prev" title="Previous Page">Previous</a>';
						}
						// pages
						$html .= '<div class="paginate-pages">';
						for ($x = 1; $x <= ($total_posts->publish / $ppp); $x++) {
							$html .= '<a href="' . $url . 'page/' . $x . '" class="paginate-single' . ($x == $paged ? ' is_active' : '') . '">' . $x . '</a>';
						}
						$html .= '</div>';
						// next page
						if ($ppp * $paged < $total_posts->publish) {
							$html .= '<a href="' . $url . 'page/' . ($paged + 1) . '" class="paginate-next" title="Next Page">Next</a>';
						}
					$html .= '</div>';
				}

				echo $html;

			} else {
				echo '<p>No Results</p>';
			}
		?>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>