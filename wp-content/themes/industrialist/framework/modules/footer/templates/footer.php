<?php
/**
 * Footer template part
 */

industrialist_mikado_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php if (!isset($_REQUEST["ajax_req"]) || $_REQUEST["ajax_req"] != 'yes') { ?>
<footer <?php industrialist_mikado_class_attribute($footer_classes); ?>>
	<div class="mkd-footer-inner clearfix">

		<?php

		if($display_footer_top) {
			industrialist_mikado_get_footer_top();
		}
		if($display_footer_bottom) {
			industrialist_mikado_get_footer_bottom();
		}
		?>

	</div>
</footer>
<?php } ?>

</div> <!-- close div.mkd-wrapper-inner  -->
</div> <!-- close div.mkd-wrapper -->
<?php wp_footer(); ?>
</body>
</html>