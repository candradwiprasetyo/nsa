<div class="md-overlay"></div>
<?php
global $redux_webtocrat;
$webtocrat = 'http://webtocrat.com';
?>
	<div class="wrapFooter rich_text">
		<h6>Copyright &copy; <?php echo date( 'Y' ); ?>, <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>. All rights reserved. <?php _e( 'Powered by', 'webtocrat' ); ?> <a href="<?php echo $webtocrat; ?>" target="_blank" title="Webtocrat Motion">Webtocrat Motion</a></h6>
	</div><!-- end.wrapFooter -->
	
</div>
<!-- W3TC-include-js-head -->
<?php wp_footer(); ?>
<!-- END W3TC-include-js-head -->
<?php
	// Tracking Code
	$tracking_code = $redux_webtocrat['tracking-code'];
	echo ( ! empty( $tracking_code ) ) ? "\n" . $tracking_code . "\n\n" : '';
?>

<script src="wp-content/themes/nsa-webtocrat/webtocrat/js/modal/classie.js"></script>
<script src="wp-content/themes/nsa-webtocrat/webtocrat/js/modal/modalEffects.js"></script>

</body>
</html>