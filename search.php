<?php get_header(); ?>
<?php if(isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
    if($type == 'resource') {?>
    <?php echo get_template_part('partials/landing-page-banner'); ?>
    <section class="title-bar category search">
		<div class="container">
			<div class="row">
				<div class="has-flex">
					<div class="columns-9 title">
						<h2><?php printf( __( 'Search Results: %s' ), '<span>'."'". get_search_query() ."'". '</span>' ); ?></h2>
					</div>
					<div class="columns-3 gateway">
						<div class="quicklinks">
							<ul class="quick-links">
								<li class="top-link">
									<div class="trigger">Browse Other Issues <span class="directional down">></span></div>
								<ul class="links" style="display:none">
								<?php 


									$quick_terms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_topic', 'hide_empty' => 0, 'post_per_page' => -1)); 
									
									
									foreach ($quick_terms as $q_term){
										$qt_name= $q_term->name;
										$qt_slug=$q_term->slug;
								?>
								<li data-cat="<?php echo $qt_slug; ?>"><a href="<?php echo get_term_link($qt_slug, 'legal_topic'); ?>"><?php echo $qt_name; ?> ></a></li>
								<?php } ?>
								</li>
							</ul>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<main id="content" class="offwhite">

	<div class="container">
		<div class="row">
			<div class="flex-container results">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); 

					$category = '';
						$category = get_terms('legal_topic');
						$subcategories = get_terms('legal_subtopic');
						$pid  = get_the_id();
						$category = get_the_category($post->ID);
						$template = get_template_directory_uri();
						foreach($category as $cat){
							$cats_name = $cat->name;
							$cats_slug = $cat->slug;
						}
						$pid = $post->ID;
						$sub_categories = get_the_terms($pid, 'legal_subtopic');
						$the_filters="";
						$the_subcats="";

						//run this to get all of the subcategories used
						//add it to an array with only unique items
						//Use the array to generate the list of filter buttons
						//---------------------
						foreach ($sub_categories as $s_cat){
							$catName = $s_cat->name;
							$catSlug = $s_cat->slug;
							$the_filters .= $catSlug.' ';
							$the_subcats .= $catName.', ';
						}

						$the_subcats = rtrim($the_subcats, ', ');
						$types = get_the_terms($pid, 'content_type');
						foreach($types as $type){
							$c_slug = $type->slug;
						}
						$_tags = get_the_tags($post->ID);
						$the_tags = '';
						$sep = ', ';
						if($_tags){
							foreach ($_tags as $tag){
								$the_tags .= $tag->name.$sep;
							}
						}

					?>

						<section class="resource-item flex-item <?php //echo $the_filters; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_slug ?>_content-type.svg">
								<div class="wrap">
									<div class="content">
										<h2><a href="<?php echo the_permalink(); ?>">
											<?php echo the_title(); ?></a></h2>
										<div class="sub-categories tags">
											<?php echo $the_subcats; ?>
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
<?php
    }
	} else  {?> 
	<section class="title-bar category search">
		<div class="container">
			<div class="row">
				<div class="has-flex">
					<div class="columns-9 title">
						<h2><?php printf( __( 'Search Results: %s' ), '<span>'."'". get_search_query() ."'". '</span>' ); ?></h2>
					</div>
					<div class="columns-3 gateway">
						<div class="quicklinks">
							<!-- <ul class="quick-links">
								<li class="top-link">
									<div class="trigger">Browse Other Issues <span class="directional down">></span></div>
								<ul class="links" style="display:none">
								<?php 


									$quick_terms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_topic', 'hide_empty' => 0, 'post_per_page' => -1)); 
									
									
									foreach ($quick_terms as $q_term){
										$qt_name= $q_term->name;
										$qt_slug=$q_term->slug;
								?>
								<li data-cat="<?php echo $qt_slug; ?>"><a href="<?php echo get_term_link($qt_slug, 'legal_topic'); ?>"><?php echo $qt_name; ?> ></a></li>
								<?php } ?>
								</li>
							</ul>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <main id="content">

	<div class="container">
		<div class="row">
			<div class="flex-container results">
				<?php if ( have_posts() ) : ?>
					

					<?php while ( have_posts() ) : the_post(); ?>

						<section class="resource-item flex-item <?php //echo $the_filters; ?>">
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_slug ?>_content-type.svg"> -->
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

</main>
<?php }
?>
<?php get_footer(); ?>