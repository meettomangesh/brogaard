<?php

//top header bar
add_action('industrialist_mikado_before_page_header', 'industrialist_mikado_get_header_top');

//mobile header
add_action('industrialist_mikado_after_page_header', 'industrialist_mikado_get_mobile_header');