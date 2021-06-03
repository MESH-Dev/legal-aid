<?php get_header(); ?>

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
								echo '<a href="'.$permalink.'">'.$title_text.'</a><span> > </span><span>'.get_the_title().'</span>';
								// var_dump(get_permalink($id));
								// var_dump($title_text);
								?>
								</div>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="the-content">
								<div class="the-body">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				
						<?php if (have_rows('callout')):?>
						<div class="callouts flex-container">
								<?php while(have_rows('callout')):the_row();
								$color = get_sub_field('color');
								$text = get_sub_field('callout_text');
								$link = get_sub_field('callout_link');
								$external = get_sub_field('external_');
								$ext = '';
								if($external == 'true'){
									$ext = 'target="_blank"';
								}
						if($text != ''){
							?>
						<div class="callout flex-item <?php echo $color; ?>">
							<h2 class="link-text">
								<a href="<?php echo $link; ?>" <?php echo $ext; ?>><?php echo $text; ?></a>
							</h2>
						</div>
					<?php } endwhile; ?>
					</div>
				<?php endif; ?>
				
				<?php endwhile; ?>

				<?php echo get_template_part('partials/newsletter'); ?>
		

</main><!-- End of Content -->

<?php get_footer(); ?>
