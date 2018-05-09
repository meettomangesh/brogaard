<div class="mkd-two-columns-66-33 clearfix">
    <div class="mkd-column1">
        <div class="mkd-column-inner">
            <div class="mkd-ps-image-holder">
                <div class="mkd-ps-image-inner">
                    <?php
                    $media = industrialist_mikado_get_portfolio_single_media();
            
                    if(is_array($media) && count($media)) : ?>
                        <?php foreach($media as $single_media) : ?>
                            <div class="mkd-ps-image">
                                <?php industrialist_mikado_portfolio_get_media_html($single_media); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mkd-column2">
        <div class="mkd-column-inner">
            <div class="mkd-ps-info-holder mkd-ps-info-sticky-holder">
                <?php
                //get portfolio content section
                industrialist_mikado_get_module_template_part('templates/single/parts/content', 'portfolio', $item_layout);
    
                //get portfolio custom fields section
                industrialist_mikado_get_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);
    
                //get portfolio categories section
                industrialist_mikado_get_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
    
                //get portfolio date section
                industrialist_mikado_get_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
    
                //get portfolio tags section
                industrialist_mikado_get_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
    
                //get portfolio share section
                industrialist_mikado_get_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
                ?>
            </div>
        </div>
    </div>
</div>