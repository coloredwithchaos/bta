<?php
/**
 * Template to show the plugin dashboard
 *
 * @package admin-panel
 * @version	v5.0
 *
 */
?>
<div class="wrap">
    <div class="seops_wrap">
        <h2></h2>
        <div id="seopressor-message-container">
            <?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <div class="seops_tutorials">
            <h2><?php _e( 'Tutorials & Support', 'seo-pressor' ) ?></h2>
            <div class="seops_tutorials_block seops_bb_dashed">
                <p><img src="<?php echo self::$plugin_url; ?>templates/images/icons/tut/1.png" alt="" /></p>
                <p><?php _e('To get the most out of SEOPressor, visit our tutorial page.', 'seo-pressor'); ?></p>
                <p><a class="seops_s4" href="http://seopressor.com/tutorials" target="_blank"><?php _e('Visit Tutorial Page', 'seo-pressor'); ?></a></p>
            </div>
            <div class="seops_tutorials_block ">
                <p><img src="<?php echo self::$plugin_url; ?>templates/images/icons/tut/2.png" alt="" /></p>
                <p><?php _e('If you still have unsolved issue, talk to us instead.', 'seo-pressor'); ?></p>
                <p><a class="seops_s4" href="http://seopressor.com/tutorials#support" target="_blank"><?php _e('Get Support', 'seo-pressor'); ?></a></p>
            </div>
        </div>
    </div>
</div>
