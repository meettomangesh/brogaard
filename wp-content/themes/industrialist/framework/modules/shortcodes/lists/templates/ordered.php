<div class="mkd-ordered-list <?php echo esc_attr($list_classes); ?>" <?php echo industrialist_mikado_get_inline_style($list_styles); ?>>

    <ol>
        <?php foreach ($ordered_list_items as $list_items): ?>
            <li class="mkd-list-item" <?php echo industrialist_mikado_get_inline_style($text_styles) ?>>
                <?php echo esc_attr($list_items['text']); ?>
            </li>
        <?php endforeach; ?>
    </ol>

</div>