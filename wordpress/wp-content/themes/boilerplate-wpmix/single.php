<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section id="content" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="page-title"><?php the_title();?></h1>
					
					<div class="page-content">

						<?php get_thumb('featured-1200x400', 'featured-image', ''); ?>

						<?php the_content();?>

					</div>
					<!-- /.page-content -->
				</div>
			</div>
		</div>
	</section>
	<!-- #content ends -->


    <?php //related_posts();?>

	<?php get_template_part("template-parts/_comments");?>
	
	<?php get_template_part("template-parts/_footer_widgets");?>

<?php endwhile; endif; ?>



<?php get_footer(); ?>