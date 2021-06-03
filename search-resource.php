<?php get_header(); ?>

<?php echo get_template_part('partials/landing-page-banner'); ?>
<main id="content">

	<div class="container">
		<div class="row">
			<div class="">
				<?php if ( have_posts() ) : ?>
					<h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

					<?php while ( have_posts() ) : the_post(); ?>

						<section class="resource-item flex-item <?php //echo $the_filters; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_slug ?>_content-type.svg">
								<div class="wrap">
									<div class="content">
										<h2><a href="<?php echo the_permalink(); ?>">
											<?php echo the_title(); ?></a></h2>
										<div class="sub-categories tags">
											<?php echo $the_tags; ?>
										</div>
									</div>
								</div>
						</section>
					<?php endwhile; ?>

				<?php else : ?>
					<h1>Nothing Found</h1>
					<p>Nothing matched your search criteria. Please try again with some different keywords.</p>

					<?php //get_search_form(); ?>
				<?php endif; ?>
			</div>
			
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
