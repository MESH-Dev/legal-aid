<?php 
$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); 
//var_dump ($term);
?>
<section class="title-bar category">
		<div class="container">
			<div class="row">
				<div class="has-flex">
					<div class="columns-9 title">
						<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $term->slug; ?>_topic.svg"> <h2><?php echo $term->name; ?></h2>
					</div>
					<div class="columns-3 gateway">
						<div class="quicklinks">
							<ul class="quick-links">
								<li class="top-link">
									<div class="trigger">Other legal information <span class="directional down">></span></div>
								<ul class="links" style="display:none">
								<?php 


									$quick_terms = get_terms(array('post_type' => 'resource', 'taxonomy' => 'legal_topic', 'hide_empty' => 0, 'post_per_page' => -1)); 
									//var_dump()
									
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