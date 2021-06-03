<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	
	<!-- Global site tag (gtag.js) - Google Analytics 

	<script async src="https://www.googletagmanager.com/gtag/js?id=G-VS7H38R6EN"></script>

	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());
	 
	  gtag('config', 'G-VS7H38R6EN');

	</script>-->

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<!-- Bugherd -->
	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=vzaa39dxhxgv3xcq0tem7q" async="true"></script>

	<?php wp_head(); ?>

</head>
<script>
      (function(d){
         var s = d.createElement("script");
         /* uncomment the following line to override default position*/
          s.setAttribute("data-position", 3);
         /* uncomment the following line to override default size (values: small, large)*/
          s.setAttribute("data-size", "small");
         /* uncomment the following line to override default language (e.g., fr, de, es, he, nl, etc.)*/
         /* s.setAttribute("data-language", "language");*/
         /* uncomment the following line to override color set via widget (e.g., #053f67)*/
         /* s.setAttribute("data-color", "#053e67");*/
         /* uncomment the following line to override type set via widget (1=person, 2=chair, 3=eye, 4=text)*/
         /* s.setAttribute("data-type", "1");*/
         /* s.setAttribute("data-statement_text:", "Our Accessibility Statement");*/
         /* s.setAttribute("data-statement_url", "http://www.example.com/accessibility")";*/
         /* uncomment the following line to override support on mobile devices*/
         /* s.setAttribute("data-mobile", true);*/
         /* uncomment the following line to set custom trigger action for accessibility menu*/
         /* s.setAttribute("data-trigger", "triggerId")*/
         s.setAttribute("data-account", "yP5rArp9Wp");
         s.setAttribute("src", "https://cdn.userway.org/widget.js");
         (d.body || d.head).appendChild(s);})(document)
     </script>
<noscript>
Please ensure Javascript is enabled for purposes of 
<a href="https://userway.org">website accessibility</a>
</noscript>
<body <?php body_class(); ?>>
 		
 		<?php 
 		if (isset($_COOKIE['dismissed'])){
 			$dismissed = htmlspecialchars($_COOKIE['dismissed']);
 		}else{
 			$dismissed='false';
 		}
 		$alert_text = get_field('global_alert_message', 'options'); 
 		if($dismissed !== 'true'){
 		
	 		if ($alert_text != ''){
	 			?>
	 			<section class="global-alert">
	 				<div class="container">
	 				<?php echo $alert_text; ?>
	 				<div class="ga-close">
	 					X
					</div>
	 				</div>

	 			</section>
	 		<?php } 
	 			}	
	 		?>

	<header class="site-header">

		<div class="flex-container wrapper">
				<div class="logo flex-item flex-5">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_template_part('partials/la-logo'); ?><h1 class="site-title sr-only"><?php bloginfo( 'name' ); ?></h1></a>
				</div>
				<nav class="main-navigation flex-item flex-2">
					<div class="sidr-close"><?php echo get_template_part('/partials/close'); ?></div>
					<?php if(has_nav_menu('main_nav')){
								$defaults = array(
									'theme_location'  => 'main_nav',
									'menu'            => 'main_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
				</nav>
				<div class="gateway flex-item">
					<?php //echo do_shortcode('[language-switcher]'); ?>
					<?php //echo do_shortcode('[gtranslate]'); ?>
					<div class="toolbar">
						<div class="translate">
							<span class="label">Languages</span> <?php echo get_template_part('partials/gtranslate'); ?>
						</div>
						<div class="search"><a href="<?php echo esc_url( home_url( '/' ) ); ?>search "><?php echo get_template_part('partials/search-lif');?></a></div>
					<!-- <div class="access"><img src="<?php echo get_template_directory_uri(); ?>/img/access.svg"></div>-->
					</div>
					<div class="gateway-buttons">
						<div class="g-cta-button">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/get-help/apply-for-help">Apply for help now</a>
						</div>
						<div class="g-cta-button donate">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/give-back/donate ">Donate</a>
						</div>
					</div>
				</div>
				<div class="sidr-trigger"><?php echo get_template_part('partials/menu') ?></div>
		</div>
		

		<div onclick="leavenow()" class="safety-exit">
			SAFETY EXIT
		</div>
		<script>
         function leavenow() {
         window.open("http://www.google.com/search?q=weather");
         document.location="http://www.google.com";
		 }
		</script>
	</header>
