<div class="seop_onscreen_score_stat_wrap">
	<div class="seop_onscreen_score_stat">
        <p>Word Count : <span class="seop_result_wordcount">0</span></p>
        <p>Readability : <span class="seop_result_readability seop_tooltips_custom" title=""><span class="seop_number">0%</span><span class="seop_tips"><?php _e('Based on Flesch–Kincaid algorithm.', 'seo-pressor'); ?> <a href="http://seopressor.com/learn/#readability" target="_blank"><?php _e('Learn More', 'seo-pressor'); ?></a></span></span></p>
        <p>SQ Density : <span class="seop_result_density seop_tooltips_custom" title=""><span class="seop_number">0%</span><span class="seop_tips"><?php _e('Our proprietary SemantiQ Density.', 'seo-pressor'); ?> <a href="http://seopressor.com/learn/#semantiq" target="_blank"><?php _e('Learn More', 'seo-pressor'); ?></a></span></span></p>
        <div class="seop_onscreen_score_keyword">
            <input type="text" name="seop_attr[keyword][]" value="" placeholder="Your Keyword" />
            <input type="text" name="seop_attr[keyword][]" value="" placeholder="Your Keyword" />
            <input type="text" name="seop_attr[keyword][]" value="" placeholder="Your Keyword" />
        </div>
        <!--<img class="seop_onscreen_score_hint seop_hint" src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/icon-question-mark.png" alt="" />-->
        <div class="seop_onscreen_score_stat_percentage">
            <div class="seop_onscreen_score_stat_percentage_mark seop_result_score">0</div>
            <div class="seop_onscreen_score_stat_percentage_sign">score %</div>
        </div>
        <div class="seop_onscreen_score_stat_hint seop_tooltips" title=""><span>hello world</span></div>
        <a class="seop_screen_score_refresh seop_hint">
            <img src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/icon-refresh.png" alt="" />
        </a>
    </div>
</div>

<div class="seop_onscreen_score_result">
	<div class="seop_onscreen_score_divider">
        <a class="seop_onscreen_score_result_switch"><?php _e('Suggested Optimization', 'seo-pressor'); ?></a>
        <div class="seop_onscreen_score_result_content">
            <div class="seop_onscreen_score_result_css">
            	<div class="seop_onscreen_score_result_suggestion">
                	
                </div>
                <div class="seop_onscreen_score_result_suggestion_nokw">
                	<p><img src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/enterkw.png" alt="" /></p>
                	<p><?php _e('Enter keyword for SEO Analysis.', 'seo-pressor'); ?></p>	
                </div>
            </div>
        </div>
    </div>
    <div class="seop_onscreen_score_divider">
        <a class="seop_onscreen_score_result_switch"><?php _e('LSI Keywords Suggestion', 'seo-pressor'); ?></a>
        <div class="seop_onscreen_score_result_content">
            <div class="seop_onscreen_score_result_css">
                <div class="seop_onscreen_score_result_lsi">
                    
                </div>
                <div class="seop_onscreen_score_result_lsi_nokw">
                	<p><img src="<?php echo WPPostsRateKeys::$plugin_url; ?>templates/images/enterkw.png" alt="" /></p>
                	<p><?php _e('Enter keyword for LSI Analysis.', 'seo-pressor'); ?></p>	
                </div>
            </div>
        </div>
    </div>
    <p class="seop_onscreen_score_result_hint"><?php _e('Click', 'seo-pressor'); ?> <img src="<?php echo WPPostsRateKeys::$plugin_url ?>templates/images/icon-indicator.png" alt="" /> <?php _e('to expand SEO suggestions.', 'seo-pressor') ?></p>
</div>
<!--<div class="seop_onscreen_score_suggest">
    <div class="seop_onscreen_score_suggest_title"><?php _e('Suggested Optimization', 'seo-pressor'); ?></div>
    <div class="seops_onscreen_score_suggest_wrap" data-simplebar-direction="vertical">
        <div class="seop_onscreen_score_suggest_listing">
            <?php _e('There is no suggestion yet.', 'seo-pressor'); ?>
        </div>
    </div>
</div>
<div class="seop_onscreen_score_connect">
    
</div>-->
