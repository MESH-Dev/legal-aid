<?php 
/*
 Template Name: Information Toggles
 Template Post Type: resource
*/
get_header(); 
 if ( have_posts() ) while ( have_posts() ) : the_post(); 
 //$terms = wp_get_post_terms( $query->post->ID, array( 'legal-topic' ) ); 
 //$s_terms = wp_get_post_terms( $query->post->ID, array( 'legal-subtopic' ) ); 
 $terms = get_the_terms($post->ID, 'legal_topic');
 $s_terms = get_the_terms($post->ID, 'legal_subtopic');
 $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
 $c_terms = get_the_terms($post->ID, 'content_type');
 //$term_name = $term->slug;

 foreach($terms as $term){
 	$topic = $term->name;
 	$t_slug = $term->slug;
 }
 
 $sub_topics="";
 $separator=", ";
 $s_slug="";
 $s_topic="";
 //$sub_count = count();
if($s_terms != ''){
 foreach ($s_terms as $s_term){
 	$s_topic = $s_term->name;
 	$s_slug = $s_slug->slug;
 	$sub_topics .= $s_topic.$separator;
 }
}
foreach ($c_terms as $c_term){
 	$c_name = $c_term->slug;
 }
 $tags_list = rtrim($sub_topics, ', ');
?>
<?php echo get_template_part('partials/landing-page-banner'); ?>
<?php //echo get_template_part('partials/global-title-bar'); ?>
<?php //echo get_template_part('partials/legal-library-title-bar'); ?>
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
<div id="content">
	
	
		<div class="title-row lt">
			<div class="the-content">
			<h1><?php the_title(); ?></h1>
			<div class="meta">
				<div class="badge">
				<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $c_name; ?>_content-type.svg">
				</div>
				<div class="data">
					<div class="sub-topics">
						<?php echo $tags_list; ?>
					</div>
					<div class="time">
						<?php $u_time = get_the_time('U'); 
							$u_modified_time = get_the_modified_time('U'); 
							if ($u_modified_time >= $u_time + 86400) { 
							echo "<p>Last updated on "; 
							echo get_the_modified_time('m/d/Y'); 
							echo " at "; 
							echo get_the_modified_time(); 
							echo "</p> "; } else{
								echo "<p>Posted on ";
								echo get_the_time('m/d/Y');
								echo "at";
								echo get_the_time();
								echo "</p> "; 
							}
						?>
					</div>
				</div>

			</div>	
			<div class="underline" aria-hidden="true"></div>
		</div>
		</div>
	
		<?php $the_alert = get_field('alert_text');
	if($the_alert != ''){?>
	<section class="alert">
		<div class="container">
		<?php echo $the_alert?> 
		</div>
	</section>
	<?php } ?>
	<div class="the-content">
		<div class="the-body">
		<?php the_content(); ?>

	<section class="accordions">
		<?php if (have_rows('accordion')):
				while (have_rows('accordion')):the_row();
				$header = get_sub_field('header_optional');
				$a_title = get_sub_field('accordion_title');
				$a_content = get_sub_field('accordion_text');
				if($header != ""){
				?>
				<h2><?php echo $header; ?></h2>
				<?php } ?>
				<section class="accordion">
					<h3 class="accordion-title"><?php echo $a_title; ?></h3>
					<div class="accordion-content" style="display:none;">
						<?php echo $a_content; ?>
					</div>
				</section>

			<?php endwhile; endif; ?>
	</section>
</div>
		<?php get_template_part('partials/related-feed')?>
	</div>
		
		

</div><!-- End of Content -->

<?php endwhile; ?>

<?php get_footer(); ?>