<section class="related-feed">
	<div class="container">
		<div class="row">
			<h2 class="row-title">Related Resources</h2>
			<?php
			$r_terms = wp_get_post_terms($post->ID, 'legal_subtopic');

			if($r_terms){
				$sub_terms=array();
				foreach($r_terms as $r_term){
					$sub_terms[] = $r_term->slug;
				}
			}

			$p_terms = wp_get_post_terms($post->ID, 'legal_topic');

			if($p_terms){
				$prim_terms=array();
				foreach($p_terms as $p_term){
					$prim_terms[] = $p_term->slug;
				}
			}
			//var_dump($r_terms);
			$related="";
			$sub_cats=array();

			// foreach($r_terms as $r_term){
			// 	$related = $r_term->term_id.', ';
			// 	array_push ($sub_cats, $r_term->term_id);
			// }
			
			 $args = array(
			    'post_type' => 'resource',
			     'posts_per_page'=> 3,
			     //'order' => 'asc',
			      'orderby' => 'rand',
			     'tax_query' => array(
			     	'relation' => 'AND',
			     	array(
		     			'taxonomy' => 'legal_topic',
			     		'terms' => $prim_terms,
			     		'field' => 'slug'
			     	),
			     	array(
			     		'taxonomy' => 'legal_subtopic',
			     		'terms' => $sub_terms,
			     		'field' => 'slug'
			     		)
			     	),
			   // 'category__in'   => wp_get_post_categories($post->ID),
			     //'posts_per_page' => 1,
			     'post__not_in'   => array( $post->ID )//Excludes the current post
			 		
				);
				//remove_all_filters('posts_orderby');
				//var_dump( wp_get_post_categories($post->ID));
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
					$category = '';
					//$category = get_terms('legal_topic');
					$pid  = get_the_id();
					$category = get_the_terms($post->ID, 'legal_subtopic');
					//var_dump($category);
					$cats_name="";
					$cats_slug="";
					$the_cats="";
					if($category){
					foreach($category as $cat){
						$cats_name = $cat->name;
						$cats_slug = $cat->slug;
						$the_cats .= $cat->name.', ';
					}
					$the_cats = rtrim($the_cats, ', ');
					}
				?>
				<div class="blog-item related-item columns-4 no-padding">
					<div class="content">
						<?php //echo the_post_thumbnail('large', $post->ID); ?>
						<!-- <div><span class="metadata"><?php echo $cats_name; ?></span></div> -->
						<!-- <h3 class="the-date"><?php echo get_the_date(); ?></h3> -->
						<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
						<div class="sub-categories tags">
							<?php echo $the_cats; ?>
						</div>
					</div>
				</div>

				<?php endwhile; endif; wp_reset_query(); ?>
				
			</div>
			
		</div>
	</div>
	</section>