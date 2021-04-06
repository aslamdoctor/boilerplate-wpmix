<div class="row">
			
	<?php while (have_posts()) : the_post(); ?>

	<div class="col-md-4">
		<?php get_template_part("template-parts/_the_post");?>
	</div>

	<?php endwhile;?>

	<?php get_template_part("template-parts/_nav");?>

</div>