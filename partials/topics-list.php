<section class="topics">
	<div class="container">
		<div class="row" style="display: flex; flex-flow: row;flex-wrap: wrap;">

			<?php 
			$args3 = array (
				    'post_type' => 'resource', 
				    //'taxonomy' => 'legal_topic',//your custom post type
				    'orderby' => 'name',
				    'order' => 'ASC',
				    'hide_empty' => 0, //shows empty categories
				    'posts_per_page' => -1,
				);

				$cats = new WP_Query($args3);
				//var_dump($cats);
				if($cats->have_rows()){
					while($cats->have_rows()){$cats->the_posts();
					foreach ($cats as $cat){
						//echo $cat['post_name'];
					}
				// echo $cats;
				?>

			<?php }} ?>
			<?php ////////////////////////////// ?>
			<?php 
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
							$filter_slugs[] = $f_catName;

							//array_push( $filter_slugs, $f_catSlug);
							//var_dump($filter_names);
						//echo "<div>".$filter_names.", ".$filter_slugs."</div>";
					}
					//$unique = array_unique($filter_slugs)
						endwhile;
						//array_push($filter_slugs, $the_filter_slugs);
					
						endif;
						//var_dump($filter_unique);
						//$slugs = array_unique($filter_slugs);
						//$names = array_unique($filter_names);
						//$labels = array('name', 'slug');

						//$e = array_combine($labels, array($names,$slugs) );
						//var_dump($e['name'][1]);
						//$i='';

						// for ($i=0; $i < count($e); $i++){
						// 	//echo $e['name'][$i];
						// }
						foreach ($filter_unique as $filter_item){
							
							//echo '<div class="filter-button" data-toggle=".'.$filter_item['slug'].'">'.$filter_item['name'].'</div>';
						}
						// $unique_names = array_unique($filter_names);
						// var_dump($filter_names);
						foreach($quick_subterms as $sub){
							$sub_ids .= $sub->term_id.", ";
						}
			?>

			<?php ////////////////////////////// ?>
			<?php 

				$args = array (
				    'post_type' => 'resource', 
				    'taxonomy' => 'legal_topic',//your custom post type
				    'orderby' => 'name',
				    'order' => 'ASC',
				    'hide_empty' => 0 //shows empty categories
				);
				$categories = get_terms( $args );
				//var_dump($categories);
				//$term = get_queried_object();
				foreach ($categories as $category) {    
				    //echo $category->name;
				    //$post_by_cat = get_posts(array('cat' => $category->term_id));
					//var_dump($category->term_id);
					//$term = get_queried_object();
				    //echo 	'<ul>';
				    // foreach( $post_by_cat as $post ) {
				    //     setup_postdata($post);
				    //     echo '<li><a href="'.the_permalink().'">'.the_title().'</a></li>';
				    // }
				    // echo '</ul>';
				    ?>

				    <div class="topic columns-6">
				    	<div class="content">
				   		<header class="topic-header">
						<?php echo get_field('svg_image', 'term_'.$category->term_id); ?>
						<h3 class="tax-title"><a href="<?php echo get_term_link($category->slug, 'legal_topic'); ?>"><?php echo $category->name; ?> ></a></h3>
						</header>
					<div class="subtopics description">
						<?php //echo get_field('taxonomy_description', 'term_'.$category->term_id); ?>
						
						<?php $count = count(get_field('subtopics', 'term_'.$category->term_id)); 
						//echo $count; 
						?>
							<?php if(have_rows('subtopics', 'term_'.$category->term_id)):
								$cnt=0;
								?>
							<p>
							<?php
								while(have_rows('subtopics', 'term_'.$category->term_id)):the_row();
								$sep="";
								$cnt++;
								if($cnt < $count){
									$sep=", ";
								}
								$subtopic = get_sub_field('subtopic');
						 ?>
						  <a href="<?php echo esc_url( home_url( '/' ) ); ?>legal-information/legal-topic/<?php echo $category->slug; ?>/#<?php echo $subtopic->slug; ?>"><?php echo $subtopic->name; ?></a><?php echo $sep; ?>
						<?php endwhile; ?>
					</p>
					<?php endif; ?>
					 <?php	//$args2 = array (
					// 	    'post_type' => 'resource',
					// 	    //'post_type' => 'resource', 
					// 	    'taxonomy' => 'legal_subtopic',//your custom post type
					// 	    'orderby' => 'name',
					// 	    'order' => 'ASC',
					// 	    'hide_empty' => 1 //shows empty categories
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
						//); 
					//$categories2 = get_terms( $args2 );
					//var_dump($categories2);
					//foreach ($categories2 as $category2) { 
						?>
						<!-- <div class="sub-categories"> -->
						<!-- <span><?php //echo $category2->name; ?>,</span> -->
						<?php //}?>
					</div></div></div>
				<?php } ?>
				
		</div>
	</div>
</section>