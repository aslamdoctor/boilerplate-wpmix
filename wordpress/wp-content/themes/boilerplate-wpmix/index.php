<?php get_header(); ?>

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
