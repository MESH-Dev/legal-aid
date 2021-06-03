<?php if (have_rows('page_module')):
	while(have_rows('page_module')):the_row();
	$type = get_sub_field('module_type');
	//var_dump($type);
	?>

	<?php if( $type == 'image-only'){ 
		$fw_image = get_sub_field('full_width_image');
		$fw_image_url = $fw_image['sizes']['background-fullscreen'];
		$fw_image_alt = $fw_image['alt'];
			?>
	<section class="fw-image">
		<img src="<?php echo $fw_image_url; ?>"  alt="<?php echo $fw_image_alt; ?>" >
	</section>
	
		<?php }elseif($type == 'two-col'){ ?>

			<?php if (have_rows('two_column')): ?>
			<div class="container two-col-row">
			<div class="row">
				<div class="content-row">
					<?php while(have_rows('two_column')):the_row();
						$two_col_image = get_sub_field('two_col_image');
						$twci_url = $two_col_image['sizes']['large'];
						$twci_alt = $two_col_image['alt'];
						$twc_title = get_sub_field('two_col_title');
						$twc_link = get_sub_field('two_col_link');
						$twc_external = get_sub_field('two_col_external');
						$twc_ext = '';
						if ($twc_external == true){
							$twc_ext = 'target="_blank"';
						}
					?>

				
				
					<div class="columns-6 col no-padding">
						<!-- <a href="<?php $twc_url ?>" <?php echo $twc_ext; ?> > -->
							<div class="content-wrapper">
								<div class="content">
									<img src="<?php echo $twci_url ?>" alt="<?php echo $twci_alt ?>">
									<div class="title desc"><?php echo $twc_title; ?></div>
								</div>
							</div>
						<!-- </a> -->
					</div>
				
				<?php endwhile; ?>
			</div></div></div>
			<?php endif; ?>
			<?php }elseif($type == 'three-col'){?>
			<div class="container three-col-row ">
			<div class="row">
				<div class="content-row">
				<?php	if (have_rows('three_column')): 
					while(have_rows('three_column')):the_row();
					$three_col_image = get_sub_field('three_col_image');
					$thci_url = $three_col_image['sizes']['large'];
					$thci_alt = $three_col_image['alt'];
					$thc_title = get_sub_field('three_col_title');
					$twc_link = get_sub_field('three_col_link');
					$twc_external = get_sub_field('three_col_external');
					$thc_ext = '';
					if ($twc_external == true){
						$twc_ext = 'target="_blank"';
					}
					?>
			
				<div class="columns-4 col no-padding">
					<!-- <a href="<?php $twc_url ?>" <?php echo $thc_ext; ?> > -->
						<div class="content-wrapper">
							<div class="content">
								<img src="<?php echo $thci_url ?>" alt="<?php echo $thci_alt ?>">
								<div class="title desc"><?php echo $thc_title; ?></div>
							</div>
						</div>
					<!-- </a> -->
				</div>
			
		<?php endwhile;?> 
	</div>
</div></div>
	<?php endif; ?>
			<?php }elseif($type == 'four-col'){ ?>
			<div class="container four-col-row">
				<div class="row">
					<div class="content-row">
					<?php 	if (have_rows('four_column')):
						while(have_rows('four_column')):the_row();
						//$three_col_image = get_sub_field('_col_image');
						//$thci_url = $two_col_image['sizes']['large'];
						//$thci_alt = $two_col_image['alt'];
						$fc_title = get_sub_field('four_col_title');
						$fc_link = get_sub_field('four_col_link');
						$fc_external = get_sub_field('fc_external');
						$fc_ext = '';
						if ($fc_external == true){
							$fc_ext = 'target="_blank"';
						}
						?>
			
				<div class="columns-3 col no-padding">
					<!-- <a href="<?php $fc_url; ?>" <?php echo $fc_ext; ?> > -->
						<div class="content-wrapper">
							<div class="content">
								<div class="title desc"><?php echo $fc_title; ?></div>
							</div>
						 </div>
					<!-- </a> -->
				</div>
			
				<?php endwhile; ?>
			</div></div></div>
			<?php endif; ?>
				<?php }elseif($type == 'alert') {
					$alert_text = get_sub_field('alert_text');
				?>
				<section class="alert">
					<div class="container">
						
						<?php echo $alert_text; ?>
							
					</div>
				</section>
			<?php }elseif($type == 'title-text') {?>

					<?php 
					 $title_bar_title = get_sub_field('text_on_green_backround');
					 //$title_bar_description = get_field('title_paragraph_text')
					?>

					<section class="title-bar landing">
						<div class="container">
							<h2 class="title-bar-title">
								<?php echo $title_bar_title; ?>
							</h2>
						</div>
					</section>


			<?php }elseif( $type == 'text-header' ){ ?>
			<div class="container">
				<h2 class="text-header"><?php echo get_sub_field('text_header')?></h2>
			</div>
			<?php }elseif($type == 'image-text') { ?>
				<?php if (have_rows('column_row')) : ?>
					<div class="container image-text-row">	
				<?php while (have_rows('column_row')) : the_row(); 
						$image = get_sub_field('img_column');
						$img_url = $image['sizes']['large'];
						$image_alt = $image['alt'];
						$image_bg = get_sub_field('image_background_color');
						$text = get_sub_field('text_column');
						$image_location = get_sub_field('image_column_location');
						$button_text = get_sub_field('button_text');
						$button_url = get_sub_field('button_url');

						$offwhite = '#FDF6ED';
						$coral = '#BE6C59';
						$lavender = '#A79CB4';
						$lightlavender = '#D6D7F0';
						$sand = '#B49D68';
						$brown = '#613800';
						$mint = '#7E9C8D';
						$evergreen = '#25454A';
						$darkgreen = '#233420';
						$green = '#335E4F';
						$gray = '#D8D8D8';
						$grayAlt = '#656868';
						$altBrown = '#8B572A';
						$olive = '#949568';

						if($image_bg == 'lavender'){
							$shadow = $lavender;
						}elseif($image_bg == 'brown'){
							$shadow = $brown;
						}else{
							$shadow = $evergreen;
						};
						if ($image_location == false){ 
					?>
					<section class="callout-row">
						<div class="container">
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
						</div>
					</section>
					<?php }else{ ?>
					<section class="callout-row">
						<div class="container">
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
					</div>
					</section>
					<?php } ?>




			<?php endwhile; ?>
		</div>
		<?php endif; ?>
						
				
			</div>
			<?php }elseif ($type == 'blog-feed') {?>
			<div class="landing-blog-feed">
				<?php echo get_template_part('partials/blog-feed'); ?>
			</div>
			<?php }elseif ($type == 'color-block-links'){?>
			<section class="callouts flex-container">
						<?php if (have_rows('callout')):
								while(have_rows('callout')):the_row();
								$color = get_sub_field('color');
								$text = get_sub_field('callout_text');
								$link = get_sub_field('callout_link');
								$external = get_sub_field('external_');
								$ext = '';
								if($external == 'true'){
									$ext = 'target="_blank"';
								}
						?>
						<div class="callout flex-item <?php echo $color; ?>">
							<h2 class="link-text">
								<a href="<?php echo $link; ?>" <?php echo $ext; ?>><?php echo $text; ?></a>
							</h2>
						</div>
					<?php endwhile; endif; ?>
				</section>
			<?php } ?>

<?php endwhile; endif; ?>