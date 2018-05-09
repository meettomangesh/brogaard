<?php

if(!function_exists('industrialist_mikado_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function industrialist_mikado_is_responsive_on() {
        return industrialist_mikado_options()->getOptionValue('responsiveness') !== 'no';
    }
}