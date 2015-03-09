
	<div id="footer-wrap">
		
		<?php do_action('cardigan_before_footer'); ?>
		
		<footer id="footer" role="contentinfo">
				
			<div id="footer-line" class="container clearfix" >
			
				<span id="footer-text"><?php cardigan_display_footer_text(); ?></span>
				
				<div id="credit-link"><?php do_action('cardigan_credit_link'); ?></div>
				
			</div>
			
		</footer>
		
	</div>

</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>