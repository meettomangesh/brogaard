<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'industrialist'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php esc_html_e('Search...', 'industrialist'); ?>" value="" name="s" title="<?php  esc_html_e('Search for:', 'industrialist'); ?>"/>
        <button type="submit"><span class="icon_search"></span></button>
    </div>
</form>