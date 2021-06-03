<?php 
/*
YARPP Template: Starter Template
Description: A simple starter example template that you can edit.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>


<?php if ( have_posts() ) : ?>
<div class="container">
		<div class="row">
			<h2 class="row-title">Related Resources</h2>
			<section class="related-feed">
	<?php 
	while ( have_posts() ) :
		the_post(); 
		?>
		
	
	<div class="blog-item related-item columns-4 no-padding">
					<div class="content">
						<?php //echo the_post_thumbnail('large', $post->ID); ?>
						<!-- <div><span class="metadata"><?php echo $cats_name; ?></span></div> -->
						<h3 class="the-date"><?php echo get_the_date(); ?></h3>
						<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<div class="sub-categories tags">
							<?php echo $cats_name; ?>
						</div>
					</div>
				</div><!-- (<?php the_score(); ?>)--></li>
	<?php endwhile; ?>
	<!-- </div> -->
			
		</div>
	</div>
	</section>
<?php else : ?>
<p>No related posts.</p>


<?php endif; ?>

