<?php

if ($icon_parameters !== '') {
    echo industrialist_mikado_execute_shortcode('mkd_icon', $icon_parameters);
} else { ?>
    <span class="mkd-process-item-numeration"></span>
<?php }

?>