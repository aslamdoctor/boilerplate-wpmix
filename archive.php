<?php get_header(); ?>

	<section id="posts">
		<div class="container">
			<?php /* If this is a category archive */ if ( is_category() ) { ?>
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
			<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
				<h1 class="page-title"><?php single_tag_title(); ?></h1>
			<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
				<h1 class="page-title">Archive for <?php the_time( 'F jS, Y' ); ?></h1>
			<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
				<h1 class="page-title">Archive for <?php the_time( 'F, Y' ); ?></h1>
			<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
				<h1 class="page-title">Archive for <?php the_time( 'Y' ); ?></h1>
			<?php /* If this is an author archive */ } elseif ( is_author() ) { ?>
				<h1 class="page-title">Posted by <?php the_author(); ?></h1>
			<?php /* If this is a paged archive */ } elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { ?>
				<h1 class="page-title">Blog Archives</h1>
			<?php } ?>

			<?php if ( have_posts() ) : ?>

				<?php get_template_part( 'template-parts/_loop_posts' ); ?>

			<?php else : ?>

				<h2>Nothing found</h2>

			<?php endif; ?>
		</div>
	</section>
	<!-- #posts ends -->

<?php get_footer(); ?>
