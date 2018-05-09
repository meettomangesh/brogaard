<?php
$icon_html = industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack, $icon_styles);
?>

<div class="mkd-message-icon-holder">
	<div class="mkd-message-icon">
		<div class="mkd-message-icon-inner">
			<?php
				print $icon_html;
			?>			
		</div> 
	</div>	 
</div>

