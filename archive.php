<?php get_header(); ?>

<main id="content">

	<div class="container">
 
			<?php $args = array(
							    'post_type' => 'post',
							     'posts_per_page'=> -1,
							     'order' => 'DESC'
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
								<div class="blog-item columns-4 no-padding">
									<div class="content">
										<?php echo the_post_thumbnail('custom-post-thumbnail', $post->ID); ?>
										<div><span class="metadata"><?php echo $cats_name; ?></span></div>

										<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
									</div>
								</div>

								<?php endwhile; endif; wp_reset_query(); ?>
							</div>
 
	
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
