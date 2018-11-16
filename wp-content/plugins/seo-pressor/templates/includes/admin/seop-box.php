<div class="seop_offscreen_wrap">
	<?php if( $seopressor_has_permission_analysis ) { ?>
	<div class="seop_offscreen_summary">
        <p>Word Count : <span class="seop_result_wordcount">0</span></p>
        <p>Readability : <span class="seop_result_readability seop_tooltips_custom" title=""><span class="seop_number">0%</span><span class="seop_tips"><?php _e('Based on Flesch–Kincaid algorithm.', 'seo-pressor'); ?> <a href="http://seopressor.com/learn/#readability" target="_blank"><?php _e('Learn More', 'seo-pressor'); ?></a></span></span></p>
        <p>SQ Density : <span class="seop_result_density seop_tooltips_custom" title=""><span class="seop_number">0%</span><span class="seop_tips"><?php _e('Our proprietary SemantiQ Density.', 'seo-pressor'); ?> <a href="http://seopressor.com/learn/#semantiq" target="_blank"><?php _e('Learn More', 'seo-pressor'); ?></a></span></span></p>
        <div class="seop_onscreen_score_stat_percentage">
            <div class="seop_onscreen_score_stat_percentage_mark seop_result_score">0</div>
            <div class="seop_onscreen_score_stat_percentage_sign">score %</div>
        </div>
        <div class="seop_onscreen_score_stat_hint seop_tooltips" title=""><span>hello world</span></div>
        <a class="seop_screen_score_refresh seop_hint">
            <img src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/icon-refresh.png" alt="" />
        </a>
    </div>
    <?php } ?>
    <div class="seop_offscreen_expand">
    	<a>Expand SEOPressor</a>
    </div>
</div>


<a class="seop_panel_action seop_panel_expand" rel="show"><img src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/minify-right.png" alt="" /></a>

<span id="seop_attr_plugin_url" class="seop_hide"><?php echo WPPostsRateKeys::$plugin_url; ?></span>
<span id="seop_attr_post_id" class="seop_hide"><?php echo $post_id; ?></span>
<span id="seop_attr_post_permalink" class="seop_hide"><?php echo get_permalink($post_id); ?></span>
<span id="seop_attr_post_title" class="seop_hide"><?php echo get_the_title($post_id); ?></span>
<span id="seop_attr_post_description" class="seop_hide"><?php echo $meta_description; ?></span>

<div class="seop_onscreen_box_wrap">

    <?php if ( $seopressor_is_active ) { // Plugin is activated and user have permission to manage ?>

    <div class="seop_onscreen_box">

        <!-- Main Navigation Top -->
        <div class="seop_onscreen_nav_main">
        	<a class="seop_onscreen_nav_main_switch active always_on" rel="tab_seop_score"><?php _e('Score', 'seo-pressor'); ?></a>
            <a class="seop_onscreen_nav_main_switch" rel="tab_seop_meta"><?php _e('Meta', 'seo-pressor'); ?></a>
            <a class="seop_onscreen_nav_main_switch" rel="tab_seop_social"><?php _e('Social', 'seo-pressor'); ?></a>
            <a class="seop_onscreen_nav_main_switch" rel="tab_seop_schema"><?php _e('Schema', 'seo-pressor'); ?></a>
        </div>


        <!-- Score Tab -->
        <div class="seop_onscreen_tab" id="tab_seop_score" data-title="SEOPressor Score">
        	<div class="seop_onscreen_tab_scroll" data-simplebar-direction="vertical">
				<?php
                if( !$seopressor_has_permission_analysis )
                {
                    echo '<div class="seop_p20">' . __('Permission denied. You can check this with WordPress or SEOPressor plugin administrator.', 'seo-pressor') . '</div>';
                }
                else
                {
                    include("seop-onscreen-score.php");
                }
                ?>
            </div>
        </div>


        <!-- Meta Settings Tab -->
        <div class="seop_onscreen_tab tab_seop_meta_wrap" id="tab_seop_meta" data-title="Meta Settings">
        	<div class="seop_onscreen_tab_scroll_action" data-simplebar-direction="vertical">
				<?php
                if( !$seopressor_has_permission_meta )
                {
                    echo '<div class="seop_p20">' . __('Permission denied. You can check this with WordPress or SEOPressor plugin administrator.', 'seo-pressor') . '</div>';
                }
                else
                {
                    include("seop-onscreen-meta.php");
					?>
                    <div class="seop_onscreen_box_action">
                        <a class="seop_onscreen_box_action_preview">Preview</a>
                        <a class="seop_onscreen_setting_update">Update</a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="seop_onscreen_box_meta_preview_wrap">
                <div class="seop_onscreen_box_meta_preview">
                    <p class="seop_s3" id="seop_meta_preview_title"></p>
                    <p class="seop_s4" id="seop_meta_preview_url"></p>
                    <p class="seop_s5" id="seop_meta_preview_description"></p>
                </div>
            </div>
        </div>


        <!-- Social SEO Tab -->
        <div class="seop_onscreen_tab" id="tab_seop_social" data-title="Social SEO">
        	<?php
			if( !$seopressor_has_permission_social )
			{
				echo '<div class="seop_p20">' . __('Permission denied. You can check this with WordPress or SEOPressor plugin administrator.', 'seo-pressor') . '</div>';
			}
			else
			{
				?>
				<div class="seop_onscreen_subtab">
					<a class="seop_onscreen_nav_sub_switch_social active" rel="subtab_seop_facebook"><?php _e('Facebook', 'seo-pressor'); ?></a>
					<a class="seop_onscreen_nav_sub_switch_social" rel="subtab_seop_twitter"><?php _e('Twitter', 'seo-pressor'); ?></a>
				</div>
				<div class="seop_onscreen_subtab_social" id="subtab_seop_facebook">
					<!-- Facebook Content -->
                    <div class="seop_onscreen_subtab_scroll" data-simplebar-direction="vertical">
						<?php include("seop-onscreen-facebook.php"); ?>
                        <div class="seop_onscreen_box_action">
                            <a class="seop_onscreen_setting_update"><?php _e('Update', 'seo-pressor'); ?></a>
                        </div>
                    </div>
				</div>
				<div class="seop_onscreen_subtab_social" id="subtab_seop_twitter">
					<!-- Twitter Content -->
                    <div class="seop_onscreen_subtab_scroll" data-simplebar-direction="vertical">
						<?php include("seop-onscreen-twitter.php"); ?>
                        <div class="seop_onscreen_box_action">
                            <a class="seop_onscreen_setting_update"><?php _e('Update', 'seo-pressor'); ?></a>
                        </div>
                    </div>
				</div>
				<?php
			}
			?>
        </div>


        <!-- Schema Snippets Tab -->
        <div class="seop_onscreen_tab" id="tab_seop_schema" data-title="Schema Snippets">
        	<?php
			if( !$seopressor_has_permission_schema )
			{
				echo '<div class="seop_p20">' . __('Permission denied. You can check this with WordPress or SEOPressor plugin administrator.', 'seo-pressor') . '</div>';
			}
			else
			{
				?>
                 <div class="seop_onscreen_subtab">
                    <a class="seop_onscreen_nav_sub_switch_schema active" rel="subtab_seop_schema"><?php _e('Schema.org', 'seo-pressor'); ?></a>
                    <a class="seop_onscreen_nav_sub_switch_schema" rel="subtab_seop_dublincore"><?php _e('Dublin Core', 'seo-pressor'); ?></a>
                </div>
                <div class="seop_onscreen_subtab_schema" id="subtab_seop_schema">
                    <!-- Schema Content -->
                    <div class="seop_onscreen_subtab_scroll" data-simplebar-direction="vertical">
                    	<?php include("seop-onscreen-schema.php"); ?>
                        <div class="seop_onscreen_box_action">
                            <a class="seop_onscreen_setting_update"><?php _e('Update', 'seo-pressor'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="seop_onscreen_subtab_schema" id="subtab_seop_dublincore">
                    <!-- Dublin Core Content -->
                    <div class="seop_onscreen_subtab_scroll" data-simplebar-direction="vertical">
                    	<?php include("seop-onscreen-dublincore.php"); ?>
                        <div class="seop_onscreen_box_action">
                            <a class="seop_onscreen_setting_update"><?php _e('Update', 'seo-pressor'); ?></a>
                        </div>
                    </div>
                </div>
                <?php
			}
			?>
        </div>

    </div>

    <?php } else { // Plugin inactived ?>
    	<div class="seop_p20">
			<?php _e('SEOPressor is <strong>inactive</strong>.','seo-pressor');?>
    	</div>
    <?php } ?>

</div>
