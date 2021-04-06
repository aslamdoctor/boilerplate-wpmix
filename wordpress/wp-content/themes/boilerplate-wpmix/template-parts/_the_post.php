<a href="<?php the_permalink();?>" class="the-post">
	<?php
	get_thumb('thumb-360x240', 'post-thumb', 'http://placehold.it/360x240');
	?>
	<span class="post-title"><?php the_title();?></span>
</a>
<!-- /.the-post -->