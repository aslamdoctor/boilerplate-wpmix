<?php
/**
 * The template for displaying single posts
 *
 * @package WPMix
 */

get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<section id="content" class="clearfix">
			<div class="container">
				<h1 class="page-title"><?php the_title(); ?></h1>

				<div class="page-content">

					<?php \WPMix\Helper::get_thumb( 'featured-1200x400', 'featured-image', '' ); ?>

					<?php the_content(); ?>

				</div>
				<!-- /.page-content -->
			</div>
		</section>
		<!-- #content ends -->

		<?php
endwhile;
endif;
?>

<?php get_footer(); ?>
