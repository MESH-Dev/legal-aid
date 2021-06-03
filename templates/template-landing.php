<?php
/* Template Name: Landing Template*/
get_header(); ?>

<main id="content">
		
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="page-banner">
						<div class="container">
							<div class="row">
								<div class="columns-3">
									<h1 class="page-title"><?php the_title(); ?></h1>
								</div>

								<div class="columns-8">
									<div class="banner-statement">
										<h2><?php echo get_field('banner_statement'); ?></h2>
									</div>
								</div>
								
							</div>
							<div class="breadcrumb"><?php
								global $post;
								$parents = get_post_ancestors( $post->ID );
								/* Get the ID of the 'top most' Page if not return current page ID */
								$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
								$title = get_post($id);
								$title_text = $title->post_title;
								$permalink = get_permalink($id);
								// if(has_post_thumbnail( $id )) {
								//     get_the_post_thumbnail( $id, 'thumbnail');
								// }
								echo '<a href="'.$permalink.'">'.$title_text.'</a> <span> > </span> <span>'.get_the_title().'</span>';
								// var_dump(get_permalink($id));
								// var_dump($title_text);
								?>
								</div>
						</div>
					</div>
					<div class="the-body">
					<?php echo get_template_part('partials/page-modules'); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<?php echo get_template_part('partials/newsletter'); ?>
		</div>


</main><!-- End of Content -->

<?php get_footer(); ?>
