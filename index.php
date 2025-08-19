<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package WPMix
 */

get_header(); ?>

<section id="posts">
	<div class="container">
		<h1 class="page-title">Latest Posts</h1>

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'template-parts/_loop_posts' ); ?>

		<?php else : ?>

			<h2>Nothing found</h2>

		<?php endif; ?>
	</div>
</section>
<!-- #posts ends -->


<?php get_footer(); ?>
