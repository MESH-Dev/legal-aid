 

<footer class="site-footer">
	<div class="footer-wrapper flex-container">
			<div class="flex-item flex-4">
				<p class="motto">Seeking Justice, <br />
				Changing Lives</p>
				<div class="logo">
					<?php echo get_template_part('partials/la-logo'); ?>
				</div>
			</div>
			<div class="flex-item flex-4 help">
				NEED HELP?<br />
				CALL OUR HELPLINE: </br>
				<a href="tel:1.866.255.4370">866-255-4370</a> <br />
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/get-help/apply-for-help">APPLY FOR HELP NOW<a><br />
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/legal-information ">FIND LEGAL INFORMATION</a>
			</div>

			<div class="flex-item flex-4">
				<nav class="footer-navigation">
					<?php if(has_nav_menu('main_nav')){
								$defaults = array(
									'theme_location'  => 'footer_nav',
									'menu'            => 'footer_nav',
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
								echo "<p><em>footer_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
				</nav>
			</div>

			<div class="flex-item flex-4">
				<div class="donate-button cta-button">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>/give-back/donate " target="_blank">Donate for Justice</a>
				</div>
				<nav class="social-nav">
					<p>Stay up to date: </p>
					<ul>
						<li><a href="https://www.facebook.com/pages/Legal-Aid-of-West-Virginia/138555296179069" target="_blank"><span class="dashicons dashicons-facebook-alt"></span></li>
						<li><a href="https://twitter.com/LegalAidWV" target="_blank"><span class="dashicons dashicons-twitter-alt"></span></a></li>
						<li><a href="https://www.youtube.com/channel/UCbEiKeyY6opKe_oeNOso3Yg" target="_blank"><span class="dashicons dashicons-youtube"></span></a></li>
						<!-- <li><span class="dashicons dashicons-facebook-alt"></span></li>
						<li><span class="dashicons dashicons-facebook-alt"></span></li> -->
					</ul>
				</nav>
				<div class="sponsors">
					<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/bbb-seal.svg"> -->
					<img src="<?php echo get_template_directory_uri(); ?>/img/LSC_Logo.jpeg">
				</div>
					<p class="signature">Designed by <a href="http://meshfresh.com" target="_blank">MESH</a></p>
			</div><!-- End of Footer -->
		</div>
	</div>
</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
