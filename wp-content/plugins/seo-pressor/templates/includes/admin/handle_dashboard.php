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
	<h2></h2>
    <div id="seopressor-message-container">
		<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
    </div>
    <div class="seops_wrap_dashboard">
        <h2><?php _e( 'SEOPressor Dashboard', 'seo-pressor' ) ?></h2>
        <div class="seops_dashboard">
            <div class="seops_dashboard_content">
                <div class="seops_dashboard_score">
                    <h3><?php _e('Average Score & Health', 'seo-pressor'); ?></h3>
                    <div class="seops_tooltips_custom seops_s10 seops_s11" title="">
                    	<span class="seops_hide">Average SEO score of all your contents. <a href="http://seopressor.com/learn/#score_dashboard" target="_blank">Learn More</a></span>
                        <div class="seops_dashboard_pie_score seops_dashboard_pie" role="progressbar" data-goal="<?= $score ?>" data-barcolor="<?= $score_color ?>" data-barsize="11" data-trackcolor="#c6c6c6">
                            <div class="seops_dashboard_pie_number"><?= $score ?>%</div>
                            <div class="seops_dashboard_pie_label <?= $score_label_class ?>"><?php _e('Score', 'seo-pressor') ?></div>
                        </div>
                    </div>
                    <div class="seops_tooltips_custom seops_s10" title="">
                    	<span class="seops_hide">Average SEO health of your website. <a href="http://seopressor.com/learn/#health" target="_blank">Learn More</a></span>
                        <div class="seops_dashboard_pie_health seops_dashboard_pie" role="progressbar" data-goal="<?= $health ?>" data-barcolor="<?= $health_color ?>" data-barsize="11" data-trackcolor="#c6c6c6">
                            <div class="seops_dashboard_pie_number"><?= $health ?>%</div>
                            <div class="seops_dashboard_pie_label <?= $health_label_class ?>"><?php _e('Health', 'seo-pressor') ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="seops_dashboard_stream">
                    <h3><?php _e('News Stream', 'seo-pressor') ?></h3>
                    <a class="seops_viewall" href="http://seopressor.com/seopressor-news/" target="_blank"><?php _e('View All News', 'seo-pressor') ?> &raquo;</a>
                    <?php
                    if( isset($rss_items) && count($rss_items) > 0 )
                    {
						echo '<ul>';
                        foreach($rss_items as $item)
                        {
                            echo '<li><a href="'.$item->get_permalink().'" target="_blank">'.$item->get_title().'</a></li>';
                        }
                        echo '</ul>';
                    }
                    else
                    {
                        echo '<p>'._e( 'No news.', 'seo-pressor' ).'</p>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="seops_dashboard_nav">
                <a href="<?= admin_url('admin.php?page=seopressor-site-audit') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/1.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Site Audit', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-sitewide') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/2.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Sitewide SEO', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-homepage-settings') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/3.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Homepage Settings', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-link-manager'); ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/4.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Link Manager', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-score-manager') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/6.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Score Manager', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-role-settings') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/7.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Role Settings', 'seo-pressor') ?></span>
                </a>
                <a href="<?= admin_url('admin.php?page=seopressor-settings') ?>">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/8.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Plugin Settings', 'seo-pressor') ?></span>
                </a>
                <a href="http://seopressor.com/tutorials/" target="_blank">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/10.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Tuts & Support', 'seo-pressor') ?></span>
                </a>
                <?php /*?><a href="http://askdanieltan.com/" target="_blank">
                    <span class="seops_dashboard_nav_list">
                        <span><img src="<?= WPPostsRateKeys::$plugin_url; ?>/templates/images/icons/dashboard/9.png" alt="" /></span>
                    </span>
                    <span class="seops_dashboard_nav_list_title"><?php _e('Support', 'seo-pressor') ?></span>
                </a><?php */?>
            </div>
        </div>
    </div>
</div>
