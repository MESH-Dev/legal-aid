<section class="blog-feed">
					<div class="container">
						<div class="row">
							<h2 class="row-title">News &amp; Events</h2>
							<?php $args = array(
							    'post_type' => 'post',
							     'posts_per_page'=> 3,
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
										<?php echo the_post_thumbnail('large', $post->ID); ?>
										<div><span class="metadata"><?php echo $cats_name; ?></span></div>

										<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
									</div>
								</div>

								<?php endwhile; endif; wp_reset_query(); ?>
								
							</div>
							<div class="read-more-link-wrap">
									<a class="read-more-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Read all news > </a>
								</div>
						</div>
					</section>