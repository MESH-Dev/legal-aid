<?php
/* Template Name: Homepage Template*/
get_header(); ?>

<main id="content">

	<!-- <div class="container">
		<div class="row"> -->
			<!-- <div class="homepage-banner" style="background-image:url(http://localhost:8888/legalaid/wp-content/uploads/2021/02/istockphoto-992048656-2048x2048-1.png); background-size:cover; background-repeat:no-repeat; height:100vh;">
			</div> -->
			<div class="">
				<?php 
						$hero_bg = get_field('hero_image');
						//$hero_bg_img = $hero_bg['sizes']['background-fullscreen'];
						$hero_bg_img = $hero_bg['url'];
						$hero_statement = get_field('hero_statement');
						$hero_layout = get_field('hero_layout');
						if($hero_layout == 'center'){
							$layout = "on-center";
						}elseif($hero_layout =="right"){
							$layout="on-right";
						}
						
					?>
				<div class="homepage-hero <?php echo $layout; ?>" style="background-image:url(<?php echo $hero_bg_img; ?>)">
					<div class="curtain"></div>
					<div class="hero-content">
						<h2 class="hero-statement"><?php echo $hero_statement; ?></h2>
						<div class="hero-buttons">
							<?php if (have_rows('hero_buttons')): 
									while(have_rows('hero_buttons')):the_row(); 
										$hb_text = get_sub_field('button_text');
										$hb_url = get_sub_field('button_link');
									?>

									<div class="cta-button">
										<a href="<?php echo $hb_url; ?>"><?php echo $hb_text; ?></a>
									</div>

							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>	
				<?php echo get_template_part('partials/global-title-bar'); ?>
				<?php echo get_template_part('partials/topics-list'); ?>
				<section class="blog-feed">
					<div class="container">
						<div class="row">
							<h2 class="row-title">News &amp; Events</h2>
							<?php $args = array(
							    'post_type' => 'post',
							     'posts_per_page'=> 3,
							     'order' => 'DESC'
								);
								$query = new WP_Query( $args );
								if ( $query->have_posts() ) :
									while ( $query->have_posts() ) : $query->the_post();
									$category = '';
									$category = get_terms('category');
									$pid  = get_the_id();
									$category = get_the_category($post->ID);
									foreach($category as $cat){
										$cats_name = $cat->name;
										$cats_slug = $cat->slug;
									}
								?>
								<div class="blog-item columns-4 no-padding">
									<div class="content">
										<?php echo the_post_thumbnail('large', $post->ID); ?>
										<div><span class="metadata"><?php echo $cats_name; ?></span></div>

										<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
									</div>
								</div>

								<?php endwhile; endif; wp_reset_query(); ?>
							</div>
							<div class="read-more-link-wrap">
									<a class="read-more-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Read all news > </a>
								</div>
						</div>
					</section>

					<?php 
					 $title_bar_title = get_field('title_header_text');
					 $title_bar_description = get_field('title_paragraph_text')
					?>

					<section class="title-bar">
						<div class="container">
							<h2 class="title-bar-title">
								<?php echo $title_bar_title; ?>
							</h2>
							<?php if($title_bar_description != ''){ ?>
							<p class="title-bar-text">
								<?php echo $title_bar_description; ?>
							</p>
								<?php } ?>
						</div>
				</section>
				<?php if (have_rows('column_row')) : ?>
									<div class="container">
									<?php while (have_rows('column_row')) : the_row(); 
										$image = get_sub_field('img_column');
										$img_url = $image['sizes']['large'];
										$image_alt = $image['alt'];
										$image_bg = get_sub_field('image_background_color');
										$text = get_sub_field('text_column');
										$image_location = get_sub_field('image_column_location');
										$button_text = get_sub_field('button_text');
										$button_url = get_sub_field('button_url');

										$offwhite =  '#FDF6ED';
										$coral = '#BE6C59';
										$lavender = '#A79CB4';
										$lightlavender= '#D6D7F0';
										$sand= '#B49D68';
										$brown= '#613800';
										$mint= '#7E9C8D';
										$evergreen= '#25454A';
										$darkgreen= '#233420';
										$green= '#335E4F';
										$gray= '#D8D8D8';
										$grayAlt= '#656868';
										$altBrown= '#8B572A';
										$olive= '#949568';

										if($image_bg == 'lavender'){
											$shadow = $lavender;
										}elseif($image_bg == 'brown'){
											$shadow = $brown;
										}else{
											$shadow = $evergreen;
										}
										if ($image_location == false){ 
									?>
									<section class="callout-row left">
										<div class="flex-container">
											<div class="image-block flex-item">
												<img src="<?php echo $img_url; ?>" alt="<?php echo $image_alt; ?>" style="-webkit-box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>; -moz-box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>; box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>;">
											</div>
											<div class="text-block flex-item">
												<?php echo $text; ?>
												<div class="cta-button">
													<a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
												</div>
											</div>
									</section>
									<?php }else{ ?>
									<section class="callout-row right">
										<div class="flex-container">
											<div class="text-block flex-item">
												<?php echo $text; ?>
												<div class="cta-button">
													<a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
												</div>
											</div>
											<div class="image-block flex-item">
												<img src="<?php echo $img_url; ?>" alt="<?php echo $image_alt; ?>" style="-webkit-box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>; -moz-box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>; box-shadow: -20px -20px 0px 0px <?php echo $shadow; ?>;">
											</div>
										</div>
									</section>
									<?php } ?>




							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						
				
			</div>

			

	
	<?php 
		$banner_bg = get_field('hp_cta_banner_image');
		//$banner_bg_url = $banner_bg['sizes']['background-fullscreen'];
		$banner_bg_url = $banner_bg['url'];
		$banner_text = get_field('banner_text');
		$banner_button_link = get_field('banner_button_link_url');
		$banner_button_text = get_field('banner_button_link_text');
	?>
	<section class="cta-banner" style="background-image:url(<?php echo $banner_bg_url; ?>);">
		<div class="curtain"></div>
		<div class="content">
			<h2 class="cta-banner-callout"><?php echo $banner_text; ?></h2>
			<div class="cta-button">
				<a href="<?php echo $banner_button_link; ?>"><?php echo $banner_button_text; ?></a>
			</div>
		</div>
	</section>

	<?php echo get_template_part('partials/newsletter'); ?>

</main><!-- End of Content -->

<?php get_footer(); ?>
