<?php
/**
 * Template part for displaying posts
 *
 * @package WPMix
 */

?>
<a href="<?php the_permalink(); ?>" class="the-post">
	<?php
	\WPMix\Helper::get_thumb( 'thumb-360x240', 'post-thumb', 'https://source.unsplash.com/user/erondu/360x240' );
	?>
	<span class="post-title"><?php the_title(); ?></span>
</a>
<!-- /.the-post -->
