<?php 
/* Template Name: Search Template*/
get_header(); 

?>

<main id="content" class="offwhite">

	
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="page-banner">
						<div class="container">
							<div class="row">
								<div class="columns-3">
									<h1 class="page-title">Not seeing what you need? Try searching...</h1>
								</div>

								<div class="columns-8">
									<div class="banner-statement">
										<h2><?php echo get_field('banner_statement'); ?></h2>
									</div>
								</div>
								
							</div>
							<!-- <div class="breadcrumb"><?php
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
								echo '<a href="'.$permalink.'">'.$title_text.'</a> > <span>'.get_the_title().'</span>';
								// var_dump(get_permalink($id));
								// var_dump($title_text);
								?>
								</div> -->
						</div>
					</div>
					<section class="primary-search ">
	<div class="wrap">
		
		
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<label for="searchHeader" class="sr-only">Search Legal Information Topics</label>
			<input id="searchHeader" class="hide" type="text" placeholder="" value="<?php the_search_query(); ?>" name="s" id="s" />
			 <!-- <input type="hidden" name="post_type" value="" /> -->
			<label for="searchSubmit" class="sr-only">Submit Search</label>
			<button type="submit" id="searchsubmit" value="" ><span class="sr-only">Submit search</span></button>
		</form>
	</div>
</section>
					
				</div>
				<?php endwhile; ?>

				<?php echo get_template_part('partials/newsletter'); ?>
		

</main><!-- End of Content -->

<?php get_footer(); ?>
