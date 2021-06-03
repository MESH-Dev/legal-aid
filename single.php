<?php 
/*
 Template Name: Default
 Template Post Type: post
*/
get_header(); ?>
<?php echo get_template_part('partials/blog-landing-banner')?>
<div id="content">
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
	$terms = get_the_terms($post->ID, 'category');
 
foreach($terms as $term){
	$category_name = $term->name;
}

$tags = get_the_tags();
$sep=", ";

if($tags != ""){
	foreach($tags as $tag){
		$tags_list .= $tag->name.$sep;
	}
}

 //$s_terms = get_the_terms($post->ID, 'legal_subtopic');
 //$c_terms = get_the_terms($post->ID, 'content_type');
 // $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
 // $term_name = $term->slug;

 // foreach($terms as $term){
 // 	$topic = $term->name;
 // 	$t_slug = $term->slug;
 // }
 
 // $sub_topics="";
 // $separator=", ";
 // $s_slug="";
 // $s_topic="";
 // //$sub_count = count();
 // foreach ($s_terms as $s_term){
 // 	$s_topic = $s_term->name;
 // 	$s_slug = $s_slug->slug;
 // 	$sub_topics .= $s_topic.$separator;
 // }
  $tags_list = rtrim($tags_list, ', ');

 // foreach ($c_terms as $c_term){
 // 	$c_name = $c_term->slug;
 // }
 ?>
	<div class="title-row bp">
			<div class="the-content">
				<div class="category">
							
							<?php echo $category_name; ?>
						</div>
				<h1><?php the_title(); ?></h1>
				<div class="meta">
					
					<div class="data">
						<div class="tags"><?php echo $tags_list; ?></div>
						<div class="author">Written by <?php the_author(); ?></div>
						<div class="time">
							<?php 
							// $u_time = get_the_time('U'); 
							// 	$u_modified_time = get_the_modified_time('U'); 
							// 	if ($u_modified_time >= $u_time + 86400) { 
							// 	echo "<p>Last updated on "; 
							// 	echo get_the_modified_time('m/d/Y'); 
							// 	echo " at "; 
							// 	echo get_the_modified_time(); 
							// 	echo "</p> "; } else{
							// 		echo "<p>Posted on ";
							// 		echo get_the_time('m/d/Y');
							// 		echo "at";
							// 		echo get_the_time();
							// 		echo "</p> "; 
							// 	}
							echo '<p>'.get_the_time('m/d/Y').'</p>';
							?>
						</div> 

					</div>
				</div>
				<div class="underline" aria-hidden="true"></div>
		</div>
	</div>
	<div class="the-content">
		<?php the_content(); ?>
		<section class="related-feed">
					<div class="container">
						<div class="row">
							<h2 class="row-title">Related Articles</h2>
							<?php
							//$r_terms = get_the_terms($post->ID, 'category');
							//var_dump($r_terms);
							$related="";
							$sub_cats=array();

							$r_terms = wp_get_post_terms($post->ID, 'category');

							if($r_terms){
								$sub_terms=array();
								foreach($r_terms as $r_term){
									$sub_terms[] = $r_term->slug;
								}
							}

							//$p_terms = wp_get_post_terms($post->ID, 'tag');
							$p_terms = get_the_tags();
							if($p_terms){
								$prim_terms=array();
								foreach($p_terms as $p_term){
									$prim_terms[] = $p_term->slug;
								}
							}

							// foreach($r_terms as $r_term){
							// 	$related = $r_term->term_id.', ';
							// 	array_push ($sub_cats, $r_term->term_id);
							// }
							//var_dump(wp_get_post_categories($post->ID));
							 $args = array(
							    'post_type' => 'post',
							     'posts_per_page'=> 3,
							     //'order' => 'asc',
							      'orderby' => 'rand',
							     'tax_query' => array(
							     	//'relation' => 'AND',
							     	array(
						     			'taxonomy' => 'category',
							     		'terms' => $sub_terms,
							     		'field' => 'slug'
							     	),
							     	// array(
							     	// 	'taxonomy' => 'legal_subtopic',
							     	// 	'terms' => $sub_terms,
							     	// 	'field' => 'slug'
							     	// 	)
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
									$category = get_the_terms($post->ID, 'category');
									//var_dump($category);
									$cats_name="";
									$cats_slug="";
									if($category){
									foreach($category as $cat){
										$cats_name = $cat->name;
										$cats_slug = $cat->slug;
									}
									}
								?>
								<div class="blog-item related-item columns-4 no-padding">
									<div class="content">
										<?php //echo the_post_thumbnail('large', $post->ID); ?>
										<!-- <div><span class="metadata"><?php echo $cats_name; ?></span></div> -->
										<h3><?php the_date(); ?></h3>
										<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
										<div class="sub-categories tags">
											<?php echo $cats_name; ?>
										</div>
									</div>
								</div>

								<?php endwhile; endif; wp_reset_query(); ?>
								
							</div>
							
						</div>
					</div>
	</section>
	</div>
		
	<?php endwhile; ?>
	<?php echo get_template_part('partials/newsletter'); ?>
</div><!-- End of Content -->

<?php get_footer(); ?>