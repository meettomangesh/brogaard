<thead>
<tr>
    <?php
    for ($i = 0; $i < sizeof($table_titles); $i++) { ?>
        <th>
            <?php $separator = ($table_prices[$i] !== '') ? '/' : ''; ?>
            <span>
                <span><?php echo esc_attr($table_titles[$i]) . ' ' . esc_attr($separator) . ' ' . esc_attr($table_currencies[$i]) . '</span>' . esc_attr($table_prices[$i]); ?>
            </span>
            <span class="mkd-interval"><?php echo esc_attr($table_price_periods[$i]); ?></span>
        </th>
    <?php } ?>
</tr>
</thead>

<tbody>

<?php foreach ($table_rows as $row) { ?>
    <tr>
        <td class="mkd-service-table-feature-title">
            <h6><?php echo esc_attr($row['title']); ?></h6>
        </td>
        <?php foreach ($row['features_enabled'] as $feature) { ?>
            <td> <?php if ($feature == 'yes') { ?>
                    <span class="mkd-mark mkd-checked ion-android-checkmark-circle"></span>
                <?php } else { ?>
                    <span class="mkd-mark ion-android-close"></span>
                <?php } ?>
            </td>
        <?php } ?>
    </tr>
<?php } ?>

<tr>
    <?php
    for ($i = 0; $i < sizeof($table_button_texts); $i++) { ?>
        <td>
            <?php if ($table_button_texts[$i] !== '') {
                echo industrialist_mikado_get_button_html(array(
                    'link' => $table_button_links[$i],
                    'text' => $table_button_texts[$i],
                    'type' => 'solid',
                ));
            } ?>
        </td>
    <?php } ?>
</tr>
</tbody>