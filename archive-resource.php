<?php
/* Template Name: Primary Legal Information Landing Page Template*/
 get_header(); ?>
<?php echo get_template_part('partials/landing-page-banner'); ?>
<?php echo get_template_part('partials/global-title-bar'); ?>
<?php echo get_template_part('partials/topics-list'); ?>
<main id="content">

	<div class="container">
		<div class="row">
			
			

		</div>
	</div>
<section class="library-search">
	<div class="wrap">
		<h2>Get Help Now</h2>
		<p>Not seeing what you need above? Try searching...</p>
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<label for="searchHeader" class="sr-only">Search Legal Information Topics</label>
			<input id="searchHeader" class="hide" type="text" placeholder="" value="<?php the_search_query(); ?>" name="s" id="s" />
			<input type="hidden" name="post_type" value="resource" />
			<label for="searchSubmit" class="sr-only">Submit Search</label>
			<button type="submit" id="searchsubmit" value="" ><span class="sr-only">Submit search</span></button>
		</form>
	</div>
</section>
</main><!-- End of Content -->

<?php get_footer(); ?>