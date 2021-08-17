<?php get_header(); ?>

<section id="posts">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Latest Posts</h2>
			</div>
		</div>

		<?php if (have_posts()) : ?>

			<?php get_template_part("template-parts/_loop_posts"); ?>

		<?php else : ?>

			<div class="row">
				<div class="col-md-12">
					<h2>Nothing found</h2>
				</div>
			</div>

		<?php endif; ?>
	</div>
</section>
<!-- #posts ends -->


<?php get_footer(); ?>