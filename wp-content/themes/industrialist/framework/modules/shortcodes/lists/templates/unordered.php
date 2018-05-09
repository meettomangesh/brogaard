<?php //$icon_html = industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>

<div class="mkd-unordered-list <?php echo esc_attr($list_classes); ?>" <?php echo industrialist_mikado_get_inline_style($list_styles); ?>>

    <?php if ($unordered_list_items): ?>
        <ul>
            <?php foreach ($unordered_list_items as $list_items): ?>
                <li class="mkd-list-item">

                    <?php

                    //var_dump($list_items);

                    $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($list_items['icon_pack']);
                    $icon = $list_items[$icon_pack_name];
                    $icon_pack = $list_items['icon_pack'];
                    $icon_html = industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack, $params);

                    ?>

                    <span class="icon"><?php print $icon_html; ?></span>
                    <span class="text" <?php echo industrialist_mikado_get_inline_style($text_styles) ?>><?php echo esc_attr($list_items['text']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>