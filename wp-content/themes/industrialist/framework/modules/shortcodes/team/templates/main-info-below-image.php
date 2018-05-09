<?php
/**
 * Team info on hover shortcode template
 */
?>
<div class="mkd-team <?php echo esc_attr($team_type) ?>">
    <div class="mkd-team-inner">
        <?php if ($team_image !== '') { ?>
            <div class="mkd-team-image-outer-wrapper">
                <div class="mkd-team-image">
                    <?php echo wp_get_attachment_image($team_image, 'full'); ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($team_name !== '' || $team_position !== '' || $team_description != "") { ?>
            <div class="mkd-team-info">
            <?php if ($team_name !== '' || $team_position !== '') { ?>
            <div class="mkd-team-title-holder <?php echo esc_attr($team_social_icon_type) ?>">
                <?php if ($team_name !== '') { ?>
                    <<?php echo esc_attr($team_name_tag); ?> class="mkd-team-name">
                    <?php echo esc_attr($team_name); ?>
                    </<?php echo esc_attr($team_name_tag); ?>>
                <?php } ?>
                <?php if ($team_position !== "") { ?>
                    <h6 class="mkd-team-position"><?php echo esc_attr($team_position) ?></h6>
                <?php } ?>
                </div>
            <?php } ?>

            <?php if ($team_description != "") { ?>
                <div class='mkd-team-text'>
                    <div class='mkd-team-text-inner'>
                        <div class='mkd-team-description'>
                            <p><?php echo esc_attr($team_description) ?></p>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>

        <div class="mkd-team-social-holder-between">
            <div class="mkd-team-social <?php echo esc_attr($team_social_icon_type) ?>">
                <div class="mkd-team-social-inner">
                    <div class="mkd-team-social-wrapp">

                        <?php foreach ($team_social_icons as $team_social_icon) {
                            print $team_social_icon;
                        } ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>