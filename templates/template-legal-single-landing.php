<?php
/* Template Name: Single Legal Information Landing Page Template*/
 get_header(); ?>
<?php 
			$term = get_field('pick_a_category'); 
			$term_name = $term->slug;
			$term_id = $term->ID;

			//var_dump($term_name);?>
<main id="content" class="legal-information offwhite">
	<section class="title-bar category">
		<div class="container">
			<div class="row">
				<div class="has-flex">
					<div class="columns-9 title">
						<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $term_name ?>_topic.svg"> <h2><?php echo $term->name; ?></h2>
					</div>
					<div class="columns-3 gateway">
						<div class="quicklinks">
							<ul class="quick-links">
								<li class="top-link">
									<div class="trigger">Other legal information <span class="directional down">></span></div>
								<ul class="links" style="display:none">
								<?php 


									$quick_terms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_topic', 'hide_empty' => 0, 'post_per_page' => -1)); 
									
									
									foreach ($quick_terms as $q_term){
										$qt_name= $q_term->name;
										$qt_slug=$q_term->slug;
								?>
								<li data-cat="<?php echo $qt_slug; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $qt_slug; ?>"><?php echo $qt_name; ?> ></a></li>
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
	<div class="container">
		<div class="row">
			<div class="filters controls">
				<span class="label">Filter:</span>
				<?php 
				$quick_subterms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_subtopic', 'hide_empty' => 1, 'post_per_page' => -1)); 
									//var_dump($quick_terms);
									$sub_ids = "";
				foreach($quick_subterms as $sub){
										$sub_ids .= $sub->term_id.", ";
									}
									//echo '<div>'.$sub_ids.'</div>';
								
					$s_args = array(
						'post_type' => 'resource',
					    //'post_type' => 'resource', 
					    //'taxonomy' => 'legal_subtopic',//your custom post type
					    'orderby' => 'name',
					    'order' => 'ASC',
					    'hide_empty' => 0, //shows empty categories
						    // your custom post type
						    'tax_query' => array(
						    	'relation' => 'AND',
						    	array(
						    		'taxonomy' => 'legal_topic',
						    		'terms' => $term_name,
						    		'field' => 'slug',
						    		'operator' => 'IN',
						    		//'orderby' => 'name',
								    //'order' => 'ASC',
								    //'hide_empty' => 1

						    		),
						    	array(
						    		'taxonomy' => 'legal_subtopic',
						    		//'orderby' => 'name',
						    		'field' => 'slug',
						    		'terms' => 'abuse-neglect',
								    // 'order' => 'ASC',
								     //'operator' => 'IN',
								    // 'hide_empty' => 1
						    		)

						    ),
						); 
						
					$subfilters = get_terms($s_args);
					foreach ($subfilters as $subfilter){
						//echo $subfilter->name;
					};
					$f_args= array (
					    'post_type' => 'resource',
					    //'post_type' => 'resource', 
					    'taxonomy' => 'legal_subtopic',//your custom post type
					    'orderby' => 'name',
					    'order' => 'ASC',
					    'hide_empty' => 1 //shows empty categories
						     //your custom post type
						    // 'tax_query' => array(
						    // 	'relation' => 'AND',
						    // 	array(
						    // 		'taxonomy' => 'legal_topic',
						    // 		'terms' => $category->slug,
						    // 		'orderby' => 'name',
								  //   'order' => 'ASC',
								  //   'hide_empty' => 1
						    // 		),
						    // 	array(
						    // 		'taxonomy' => 'legal_subtopic',
						    // 		'orderby' => 'name',
						    // 		'field' => 'term_id',
						    // 		'terms' => array(17),
								  //   'order' => 'ASC',
								  //   //'operator' => 'AND',
								  //   'hide_empty' => 1
						    // 		)

						    // ),
						); 
						$filters = get_terms( $f_args );
						//var_dump($categories2);
						foreach ($filters as $filter) { 
				?>
				<div class="filter-button " data-toggle=".<?php echo $filter->slug; ?>"><?php echo $filter->name; ?> ></div>
				<?php } ?>
				<span class="label refresh" data-filter="all">Refresh X</span>
			</div>
			<div class="flex-container results">
			
			
			<?php 
			$args = array(
				    'post_type' => 'resource',
				     'posts_per_page'=> -1,
				     'order' => 'DESC',
				     'taxonomy' => 'legal_topic',
				     'term' => $term_name,
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) : $query->the_post();
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

						//run this to get all of the subcategories used
						//add it to an array with only unique items
						//Use the array to generate the list of filter buttons
						//---------------------
						foreach ($sub_categories as $s_cat){
							$catName = $s_cat->name;
							$catSlug = $s_cat->slug;
							$the_filters .= $catSlug.' ';
						}


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
				<section class="resource-item flex-item mix <?php echo $the_filters; ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_slug ?>_content-type.svg">
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
			
			<?php endwhile; endif; ?>
			<section class="nothing-found" style="display:none;">
			 	<h2>Nothing found</h2>
		 	 </section>
		</div>
		</div>
	</div>

</main><!-- End of Content -->
<script>
            
        </script>
<?php get_footer(); ?>
