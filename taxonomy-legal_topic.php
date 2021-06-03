<?php
/* Template Name: Single Legal Information Landing Page Template*/
 get_header(); ?>
<?php 
			// $term = get_field('pick_a_category'); 
			// $term_name = $term->slug;
			// $term_id = $term->ID;
			//$term = get_term();
			$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
			$term_name = $term->slug;
			//echo $term->name;
			//var_dump($term_name);?>
<?php echo get_template_part('partials/landing-page-banner'); ?>
<section class="title-bar category">
		<div class="container">
			<div class="row">
				<div class="has-flex">
					<div class="columns-9 title">
						<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $term->slug ?>_topic.svg"> <h2><?php echo $term->name; ?></h2>
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
<main id="content" class="legal-information offwhite">
	<div class="container">
		<div class="row">
			<div class="filters controls">
				<span class="label">Filter:</span>
				<?php 
				$quick_subterms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_subtopic', 'hide_empty' => 1, 'post_per_page' => -1)); 
				//var_dump($quick_terms);
				$sub_ids = "";

				$sc_args = array(
				    'post_type' => 'resource',
				     'posts_per_page'=> -1,
				     'order' => 'DESC',
				     'taxonomy' => 'legal_topic',
				     'term' => $term_name,
					);

					$sc_query = new WP_Query( $sc_args );
					$the_filter_slugs='';
					$filter_names=array();
						$filter_slugs = array();
					if ( $sc_query->have_posts() ) :
						while ( $sc_query->have_posts() ) : $sc_query->the_post();
						$sc_pid  = get_the_id();
						//echo the_title();
						//$button_filters = get_terms('legal_subtopic');
						$button_filters = get_the_terms($sc_pid, 'legal_subtopic');
						//$the_filter_slugs='';
						
						$the_bfilters='';
						foreach ($button_filters as $button_filter){
							$f_catName = $button_filter->name;
							$f_catSlug = $button_filter->slug;
							//var_dump($f_catSlug);
							$the_filter_slugs .= $f_catSlug.', ';
							$filter_names[] = array('name'=>$button_filter->name, 'slug'=>$button_filter->slug);
							$filter_unique = array_unique($filter_names, SORT_REGULAR);
							//$filter_unique = asort($filter_unique);
							//$filter_unique = sort($filter_unique);
							$filter_slugs[] = $f_catName;

							//array_push( $filter_slugs, $f_catSlug);
							//var_dump($filter_names);
						//echo "<div>".$filter_names.", ".$filter_slugs."</div>";
					}
					//$unique = array_unique($filter_slugs)
						endwhile;
						//array_push($filter_slugs, $the_filter_slugs);
					
						endif;
						//$subs = usort($filter_unique);
						sort($filter_unique);
						//var_dump($filter_sort);
						//$filter_unique = array_multisort($filter_unique[0], SORT_ASC, $filter_unique[1], SORT_ASC);
						//$slugs = array_unique($filter_slugs);
						//$names = array_unique($filter_names);
						//$labels = array('name', 'slug');

						//$e = array_combine($labels, array($names,$slugs) );
						//var_dump($e['name'][1]);
						//$i='';

						// for ($i=0; $i < count($e); $i++){
						// 	//echo $e['name'][$i];
						// }

						//$filter_unique = asort($filter_unique);

						foreach ($filter_unique as $filter_item){
							
							echo '<div class="filter-button" data-toggle=".'.$filter_item['slug'].'">'.$filter_item['name'].'</div>';
						}
						// $unique_names = array_unique($filter_names);
						// var_dump($filter_names);
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
				<!-- <div class="filter-button" data-toggle=".<?php echo $filter->slug; ?>"><?php echo $filter->name; ?> ></div> -->
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
							$c_name = $type->name;
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
					<div class="resource-header">
					<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_slug ?>_content-type.svg"> <span class="ct-label"><?php echo $c_name; ?></span>
					</div>
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
			
			<?php endwhile; endif; wp_reset_query();?>
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
