<?php
/* Template Name: Primary Legal Information Landing Page Template*/
 get_header(); ?>
<?php echo get_template_part('partials/landing-page-banner'); ?>
<?php echo get_template_part('partials/global-title-bar'); ?>
<?php echo get_template_part('partials/topics-list'); ?>
<main id="content">

	<div class="container">
		<div class="row">
			
			<?php 
			$term = get_field('taxonomy_field_name');?>
			<?php $args = array(
							    'post_type' => 'resource',
							     'posts_per_page'=> 3,
							     'order' => 'DESC',
							     'taxonomy' => $term,
								);
								$query = new WP_Query( $args );
								if ( $query->have_posts() ) :
									while ( $query->have_posts() ) : $query->the_post();
									$category = '';
									$category = get_terms('category');
									$pid  = get_the_id();
									$category = get_the_category($post->ID);
									foreach($category as $cat){
										$cats_name = $cat->name;
										$cats_slug = $cat->slug;
									}
								?>
				<div class="columns-6 resource-item"
					<?php echo the_title(); ?>
				</div>
			
			<?php endwhile; endif; ?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
