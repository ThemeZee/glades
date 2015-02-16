
	<div id="footernav-wrap">
	
		<nav id="footernav" class="container clearfix" role="navigation">
				<?php 
					// Get Navigation out of Theme Options
					wp_nav_menu( array(
						'theme_location' => 'footer', 
						'container' => false, 
						'menu_id' => 'footernav-menu', 
						'fallback_cb' => '', 
						'depth' => 1)
					);
				?>
				<h4 id="footernav-icon"></h4>
			</nav>
			
	</div>

	<div id="footer-wrap">
		
		<?php do_action('cardigan_before_footer'); ?>
		
		<footer id="footer" role="contentinfo">
				
			<div id="footer-line" class="container clearfix" >
			
				<span id="footer-text"><?php cardigan_display_footer_text(); ?></span>
				
				<div id="credit-link"><?php cardigan_display_credit_link(); ?></div>
				
			</div>
			
		</footer>
		
	</div>

</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>