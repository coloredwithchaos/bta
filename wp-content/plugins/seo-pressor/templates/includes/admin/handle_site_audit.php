<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
            <?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('SEOPressor Site Audit', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher">
        	<a class="active"><?php _e('Summary', 'seo-pressor') ?></a>
        	<a><?php _e('Errors & Alerts', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
				<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                	<div class="seops_audit_action">
						<?php 
						if( $is_auditing !== FALSE )
						{
							echo '<a class="seops_s4 seops_mr_8">Analyzing <span class="seops_ajax_loader_analysis_wrap">
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_1"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_2"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_3"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_4"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_5"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_6"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_7"></span>
	<span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_8"></span>
</span></a>';
							echo '<a class="seops_trigger_cancel_audit seops_s16 seops_mr_16"></a>';
						}
						else
						{
							echo '<a class="seops_update_site_audit seops_s4 seops_mr_8">Analyze Website</a>';
						}
						?>
                        <span class="seops_audit_ect">
                        	<?php if( $is_auditing !== FALSE ) echo __('Estimated Completion Time: ' ,'seo-pressor') . $audit_ect;  ?>
                        </span>
                        <div class="seops_audit_date">
                        	<?php if( isset($audit_date) ) echo __( 'Last audited: ', 'seo-pressor') . $audit_date->format('d/m/Y'); ?>
                        </div>
                    </div>
                    
                    <?php if( $audit != FALSE ) : ?>
                    
                    <div class="seops_audit_summary">
                    	<div class="seops_audit_score seops_audit_summary_grid">
                            <h3><?php _e('Average Score & Health', 'seo-pressor') ?></h3>
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
                        <div class="seops_audit_chart seops_audit_summary_grid">
                            <h3><?php _e('Score & Health Trends', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('Graph will be plotted every 30 days.', 'seo-pressor') ?></span></span></h3>
                            <div id="seops_audit_chart_content"></div>
                        </div>
                    </div>
                    <div class="seops_audit_summary">
                        <div class="seops_audit_error seops_audit_summary_grid">
                            <h3><?php _e('Errors', 'seo-pressor') ?> <span class="seops_color_red">(<?php echo count($listing['error']['red']) ?>)</span></h3>
                            <a class="seops_view_all">View All &raquo;</a>
                            <?php 
							if( count($listing['error']['red']) > 0 )
							{
								$max = 3;
								$idx = 0;
								foreach( $listing['error']['red'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}
									echo '</div>';
									
									if( ++$idx >= $max )
										break;
								}
							}
							else
							{
								echo '<p>' . __('Well done! No errors found.', 'seo-pressor') . '</p>';
							}
							?>
                        </div>
                        <div class="seops_audit_warning seops_audit_summary_grid">
                            <h3><?php _e('Alerts', 'seo-pressor') ?> <span class="seops_color_yellow">(<?php echo count($listing['warning']['red']); ?>)</span></h3>
                            <a class="seops_view_all">View All &raquo;</a>
                            <?php 
							if( count($listing['warning']['red']) > 0 )
							{
								$max = 3;
								$idx = 0;
								foreach( $listing['warning']['red'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}
									echo '</div>';
									
									if( ++$idx >= $max )
										break;
								}
							}
							else
							{
								echo '<p>' . __('Well done! No warning signs found.', 'seo-pressor') . '</p>';
							}
							?>
                        </div>
                    </div>
                    
                    <?php 
					else:
					echo '<p>' . __('Oops, there seems to be nothing here. Analyze your website now.', 'seo-pressor') . '</p>';
					endif; 
					?>
                    
                </div>
            </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_p20">
                
                	<?php if( $audit != FALSE ) : ?>
                    
                    <p class="seops_s9"><?php echo __( 'Last audited: ', 'seo-pressor') . $audit_date->format('d/m/Y'); ?></p>
                	<div class="seops_audit_summary">
                    	<div class="seops_audit_error seops_audit_summary_grid">
                        	<h3><?php _e('Errors', 'seo-pressor') ?> <span class="seops_color_red">(<?php echo count($listing['error']['red']); ?>)</span></h3>
                            <?php 
							if( count($listing['error']['red']) > 0 )
							{
								foreach( $listing['error']['red'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}
									echo '</div>';
								}
							}
							else
							{
								echo '<p>' . __('Well done! No errors found.', 'seo-pressor') . '</p>';	
							}
							
							if( count($listing['error']['green']) > 0 )
							{
								echo '<div class="seops_divider"></div>';
								foreach( $listing['error']['green'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									/*if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}*/
									echo '</div>';
								}
							}
							?>
                        </div>
                    	<div class="seops_audit_warning seops_audit_summary_grid">
                        	<h3><?php _e('Alerts', 'seo-pressor') ?> <span class="seops_color_yellow">(<?php echo count($listing['warning']['red']); ?>)</span></h3>
                            <?php 
							if( count($listing['warning']['red']) > 0 )
							{
								foreach( $listing['warning']['red'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}
									echo '</div>';
								}
							}
							else
							{
								echo '<p>' . __('Well done! No warning signs found.', 'seo-pressor') . '</p>';
							}
							
							if( count($listing['warning']['green']) > 0 )
							{
								echo '<div class="seops_divider"></div>';
								foreach( $listing['warning']['green'] as $row )
								{
									echo '<div class="seops_audit_block">';
									echo '<div class="seops_audit_block_content">';
									echo '<p>' . $row['msg'] . '</p>';
									echo '<p>' . $row['msg_s'] . '</p>';
									echo '</div>';
									/*if( !empty($row['url']) )
									{
										echo '<div class="seops_audit_block_action"><a href="' . $row['url'] . '" target="' . $row['target'] . '">' . $row['label'] . '</a></div>';
									}*/
									echo '</div>';
								}
							}
							?>
                        </div>
                    </div>
                    
                    <?php 
					else:
					echo '<p>' . __('Start analyzing your report.', 'seo-pressor') . '</p>';
					endif; 
					?>
                    
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>