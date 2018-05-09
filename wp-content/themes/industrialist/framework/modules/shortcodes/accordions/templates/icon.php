<?php

$icon_html = '';

if ($icon_pack !== '') {
    $icon_html .= '<div class="mkd-accordion-icon-holder">';
    $icon_html .= industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack, $params);
    $icon_html .= '</div><!-- .mkd-accordion-icon-holder -->';
}

print $icon_html;