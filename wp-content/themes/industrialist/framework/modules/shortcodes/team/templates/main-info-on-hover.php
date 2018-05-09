<?php
/**
 * Team info on hover shortcode template
 */
?>
<div class="mkd-team <?php echo esc_attr($team_type) ?>">
    <div class="mkd-team-inner">
        <?php if ($team_image !== '') { ?>
        <div class="mkd-team-image">
            <?php echo wp_get_attachment_image($team_image, 'full'); ?>
            <div class="mkd-team-content-holder">
                <div class="mkd-team-content">
                    <div class="mkd-team-content-inner">
                        <div class="mkd-team-title-holder">
                            <?php if ($team_name !== '') { ?>
                            <<?php echo esc_attr($team_name_tag); ?> class="mkd-team-name">
                            <?php echo esc_attr($team_name); ?>
                        </<?php echo esc_attr($team_name_tag); ?>>
                        <?php }
                        if ($team_position !== '') { ?>
                            <h6 class="mkd-team-position">
                                <?php echo esc_attr($team_position); ?>
                            </h6>
                        <?php } ?>
                    </div>
                    <div class="mkd-team-social-wrapp">

                        <?php foreach ($team_social_icons as $team_social_icon) {
                            print $team_social_icon;
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }

    if ($team_description !== '') { ?>
        <div class="mkd-team-text">
            <div class="mkd-team-text-inner">
                <div class="mkd-team-description">
                    <p><?php echo esc_attr($team_description); ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>