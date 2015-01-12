<?php
get_header();
?>

<?php
	global $post;
	$post = get_post(105);
	setup_postdata($post);
?>

	<div id="<?php echo $post->post_slug; ?>" class="main">
	<div class="content">
	<?php
		$home = get_field('content');
		echo $home;
	?>
	</div>
</div>

<?php get_footer(); ?>