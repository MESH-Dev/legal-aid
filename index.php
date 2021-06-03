<?php get_header(); ?>
<?php echo get_template_part('partials/blog-landing-banner')?>
<main id="content">
<section class="blog-feed">
					<div class="container">
						<div class="row" style="display: flex; flex-flow: row;flex-wrap: wrap;">
 
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
									$tags = get_the_tags($post->ID);
									$sep = ", ";
									//var_dump($tags);
									foreach($category as $cat){
										$cats_name = $cat->name;
										$cats_slug = $cat->slug;
									}
									if($tags != ''){
										foreach($tags as $tag){
											$tags_name .= $tag->name.$sep;
										}
									}
									$tag_list = rtrim($tags_name, ', ');
								?>
								<div class="blog-item columns-4 no-padding" style="margin-bottom:6.5rem;">
									<div class="content">
										<?php echo the_post_thumbnail('custom-post-thumbnail', $post->ID); ?>
										<div><span class="metadata"><?php echo $cats_name; ?></span></div>

										<h2><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
										<div class="subcategories tags"><?php echo $tag_list; ?></div>
									</div>
								</div>

								<?php endwhile; endif; wp_reset_query(); ?>
							</div>
 
	</div>
</div>
</section>
<?php echo get_template_part('partials/newsletter'); ?>
</main><!-- End of Content -->

<?php get_footer(); ?>
