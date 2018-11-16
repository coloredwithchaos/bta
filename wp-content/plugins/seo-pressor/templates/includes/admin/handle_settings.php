<div class="seops_report_wrap seops_hide">
	<div class="seops_report_content">
    	<div class="seops_hide">
        	<input type="hidden" name="seops_attr[report][domain]" value="" />
        </div>
        <h3><?php _e('Report Fraud Domain', 'seo-pressor'); ?></h3>
        <table cellspacing="0" cellpadding="0" border="0">
        	<tr>
            	<td width="80">Domain</td>
            	<td><span class="seops_report_field_domain"></span></td>
            </tr>
            <tr>
            	<td>Reason</td>
            	<td>
                <select name="seops_attr[report][reason]">
                    <option value="1">I no longer have access to this domain.</option>
                    <option value="2">This is not my domain.</option>
                    <option value="3">The domain has expired.</option>
                    <option value="4">Others, as specify below.</option>
                </select>
                </td>
            </tr>
            <tr>
            	<td>Remark</td>
            	<td><textarea name="seops_attr[report][message]"></textarea></td>
            </tr>
            <tr>
            	<td></td>
                <td><a class="seops_trigger_report seops_s4 seops_mr_16">Submit Report</a><a class="seops_trigger_report_cancel seops_s17">Cancel</a></td>
            </tr>
        </table>
    </div>
</div>

<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && !$seopressor_has_permission ) {} else { ?>

        <h2><?php _e('Plugin Settings', 'seo-pressor') ?></h2>

    	<div class="seops_main_switcher">
        	<a class="active"><?php _e('Plugin Requirements & Activation', 'seo-pressor') ?></a>
            <?php if( $seopressor_is_active ) { ?>
            <a><?php _e('Advanced Options', 'seo-pressor') ?></a>
        	<a><?php _e('Plugin Update', 'seo-pressor') ?></a>
            <?php } ?>
        </div>

        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_requirement seops_p20">
                	<div class="seops_message seops_hide"></div>
                    <h3><?php _e('Server Requirements', 'seo-pressor'); ?></h3>
                    <ul class="seops_requirement_list">
                        <?php foreach( $requirement_msg_arr as $requirement_msg_arr_item ) { ?>
                            <li class="<?php echo ($requirement_msg_arr_item[0] == 0 ) ? 'seops_requirement_negative' : 'seops_requirement_positive' ?>">
                                <p><?php echo $requirement_msg_arr_item[1] ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                    <h3><?php _e('Licensing', 'seo-pressor'); ?></h3>
                    <?php
					if( WPPostsRateKeys_Settings::get_active() == 1 )
					{
						$license_type = WPPostsRateKeys_Settings::get_license_type();
						if( $license_type == 'single' )
						{
							echo '<p>' . __('You have a single-site license, and can be installed on this domain only.', 'seo-pressor') . '</p>';
						}
						if( $license_type == 'multi' )
						{

							echo '<p>' . __('You have a multi-site license.', 'seo-pressor') . '</p>';

							$audit_list = WPPostsRateKeys_Central::get_other_domain_audit_report();

                            if( count($audit_list) > 0 )
                            {
                                $total_pages = ceil( count($audit_list)/10 );

								echo '<div class="seops_domain_list" data-total="'.$total_pages.'">';

                                $count = 0;
                                echo '<table cellspacing="0" cellpadding="0" border="0" class="seops_multi_domain_list">';
                                echo '<tr>';
								echo '<th width="10%">No</th>';
                                echo '<th width="45%">Domain</th>';
                                echo '<th width="15%">Score</th>';
                                echo '<th width="15%">Health</th>';
								echo '<th width="15%"></th>';
                                echo '</tr>';
                                foreach($audit_list as $row)
                                {
                                    echo '<tr>';
									echo '<td>'.++$count.'</td>';
                                    echo '<td>'.$row['domain'].'</td>';
									echo '<td>';
									if( $row['score'] == '' )
									{
										echo '-';
									}
									else
									{
										echo '<span class="'.($row['score'] >= 80 ? 'seops_green' : 'seops_dark_blue').'">'.$row['score'].'</span>';
									}
									echo '</td>';
									echo '<td>';
									if( $row['health'] == '' )
									{
										echo '-';
									}
									else
									{
										echo '<span class="'.($row['health'] >= 80 ? 'seops_green' : 'seops_dark_blue').'">'.$row['health'].'</span>';
									}
									echo '</td>';
									echo '<td>';
									if( $row['domain'] != get_bloginfo('wpurl') )
										echo '<a class="seops_trigger_report_selection seops_s17" data-domain="'.$row['domain'].'">'.__('Report Domain', 'seo-pressor').'</a>';
									echo '</td>';
                                    echo '</tr>';

									if( $count%10 == 0 )
                                    {
                                        echo '</table>';
                                        echo '<table cellspacing="0" cellpadding="0" border="0" class="seops_multi_domain_list seops_hide">';
                                        echo '<tr>';
										echo '<th width="10%">No</th>';
										echo '<th width="45%">Domain</th>';
										echo '<th width="15%">Score</th>';
										echo '<th width="15%">Health</th>';
										echo '<th width="15%"></th>';
                                        echo '</tr>';
                                    }
                                }
                                echo '</table>';
                                echo '<ul class="seops_domain_list_paginate"></ul>';
                                echo '</div>';
                            }
						}
					}
					else
					{
						?>
                        <div class="seops_grid_wrap">
                        	<p>Enter your activation code. You can retrieve your activation code <a href="http://seopressor.com/activation/" target="_blank">here</a>.</p>
                        	<div class="seops_grid_row">
                            	<div class="seops_grid_272">
                                	<input type="text" name="seops_attr[activation][receipt]" value="" />
                                </div>
                            </div>
                            <p><a class="seops_update_activate seops_s4"><?php _e('Activate', 'seo-pressor') ?></a></p>
                        </div>
                        <?php
					}
					?>
                </div>
            </div>
        </div>

        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<?php if( $seopressor_is_active && $seopressor_has_permission ) { ?>
            	<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                	<div class="seops_grid_wrap">
                        <div class="seops_grid_row">
                        	<p><?php _e('Language', 'seo-pressor') ?></p>
                        	<div class="seops_grid_272">
                                <p><select name="seops_attr[advanced][locale]">
                                	<option <?php echo ( $data['locale'] == '' ) ? 'selected="selected"' : ''; ?> value=""><?php _e('Default (English)','seo-pressor');?></option>
									<?php foreach( $all_locales as $all_locales_item ) { ?>
                                        <option <?php echo ( $data['locale'] == $all_locales_item ) ? 'selected="selected"' : '' ?> value="<?php echo $all_locales_item?>"><?php echo $all_locales_item?></option>
                                    <?php }?>
                                </select></p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<div class="seops_grid_512">
                            	<p><?php _e('Select type of analysis', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('Full page analysis better emulates how search engines analyze your webpage', 'seo-pressor'); ?></span></span></p>
                                <p><label><input type="radio" name="seops_attr[advanced][analyze_full_page]" value="1" <?php echo ( $data['analize_full_page'] == 1 ? 'checked="checked"' : '' ); ?> /> <?php _e('Full Page Analysis (recommended)', 'seo-pressor') ?></label><br/>
                                <label><input type="radio" name="seops_attr[advanced][analyze_full_page]" value="0" <?php echo ( $data['analize_full_page'] == 0 ? 'checked="checked"' : '' ); ?> /> <?php _e('Content Only Analysis', 'seo-pressor'); ?></label></p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<div class="seops_grid_512">
                            	<p><?php _e('Automatically slides out the On-Page Analysis Panel', 'seo-pressor') ?></p>
                                <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[advanced][on_page_box_auto_slide]" value="1" <?php echo ( $data['on_page_box_auto_slide'] == '1' ) ? 'checked="checked"' : ''; ?> /></p>
                            </div>
                        </div>
												<div class="seops_grid_row">
                        	<div class="seops_grid_512">
                            	<p><?php _e('Automatically Perform Analysis On Page Load', 'seo-pressor') ?></p>
                                <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[advanced][on_page_box_auto_analysis]" value="1" <?php echo ( $data['on_page_box_auto_analysis'] == '1' ) ? 'checked="checked"' : ''; ?> /></p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<div class="seops_grid_512">
                            	<p><?php _e('Automatically generate', 'seo-pressor') ?>: <span class="seops_tooltips" title=""><span><?php _e('Meta description will be automatically generated from the first paragraph of the content if left blank.<br/>Canonical link will be the same as source URL if left blank.', 'seo-pressor') ?></span></span></p>
                                <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[advanced][on_page_automate_description]" value="1" <?php echo ( $data['on_page_automate_description'] == '1' ) ? 'checked="checked"' : ''; ?> /> &nbsp;&nbsp;&nbsp;&nbsp;Meta Description</p>
                                <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[advanced][on_page_automate_canonical]" value="1" <?php echo ( $data['on_page_automate_canonical'] == '1' ) ? 'checked="checked"' : ''; ?> /> &nbsp;&nbsp;&nbsp;&nbsp;Canonical Link</p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<p><?php _e('Omit the following characters when analyzing your content.', 'seo-pressor') ?><br/><span class="seops_s2">(<?php _e('One character per line', 'seo-pressor') ?>)</span></p>
                        	<div class="seops_grid_272">
                                <p><textarea name="seops_attr[advanced][special_characters_to_omit]"><?php echo $data['special_characters_to_omit'] ?></textarea></p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<p><?php _e('Minimum Publishing Score', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('Users will not be able to publish their post if the score is below the minimum publishing score. Leave this empty if minimum publishing score is not required.', 'seo-pressor') ?></span></span></p>
                        	<div class="seops_grid_90">
                                <p><input type="text" name="seops_attr[advanced][minimum_score_to_publish]" value="<?php echo $data['minimum_score_to_publish'] ?>" /></p>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<div class="seops_grid_512">
                            	<p><?php _e('Support Multibyte character encoding', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('Enable SEOPressor to analyze all character encodings such as Chinese characters.', 'seo-pressor') ?></span></span></p>
                                <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[advanced][support_multibyte]" value="1" <?php echo ( $data['support_multibyte'] == '1' ) ? 'checked="checked"' : ''; ?> /></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seops_action">
                    <a class="seops_update_setting_advanced"><?php _e('Update', 'seo-pressor') ?></a>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<?php if( $seopressor_is_active && $seopressor_has_permission ) { ?>
				<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                    <p><strong><?php _e('Step 1: ','seo-pressor');?></strong><?php _e('Make sure all requirements are met.','seo-pressor');?></p>
                    <div class="seops_upgrade_requirement">
                    	<ul>
                        	<li class="<?php echo ($write_permission_requirement ? 'seops_upgrade_requirement_positive' : 'seops_upgrade_requirement_negative'); ?>">
                            	<?php echo $file_list_msg; ?>
                                <?php if( !$write_permission_requirement ) echo '<a class="seops_s15 seops_check_file_lists seops_ml_8">&raquo; ' . __('Check File Lists', 'seo-pressor') . '</a>'; ?>
                                <div class="seops_permission_folders seops_hide">
                                	<?php
									if( count($file_list) > 0 )
									{
										echo '<ul class="seops_folder_list_wrap">';
										foreach( $file_list as $file_list_item )
										{
											echo '<li>' . $file_list_item . '</li>';
										}
										echo '</ul>';
									}
									?>
                                </div>
                            </li>
                            <li class="<?php echo ($outgoing_connection_requirement) ? 'seops_upgrade_requirement_positive' : 'seops_upgrade_requirement_negative'; ?>">
                            	<?php echo ($outgoing_connection_requirement) ? __('Connection to SEOPressor.', 'seo-pressor') : __('Connection to SEOPressor not established.', 'seo-pressor') ; ?>
                            </li>
                            <li class="<?php echo ($zip_archive_requirement) ? 'seops_upgrade_requirement_positive' : 'seops_upgrade_requirement_negative'; ?>">
                            	<?php $zip_archive_requirement ? _e('<a href="http://php.net/manual/en/class.ziparchive.php" target="_blank">ZipArchive</a> PHP library.','seo-pressor') : _e('<a href="http://php.net/manual/en/class.ziparchive.php" target="_blank">ZipArchive</a> PHP library is not installed.', 'seo-pressor');?>
                            </li>
                            <li class="<?php echo ($seopressor_is_active) ? 'seops_upgrade_requirement_positive' : 'seops_upgrade_requirement_negative'; ?>">
                            	<?php
								if( $seopressor_is_active )
								{
									_e('Active license.','seo-pressor');
								}
								else
								{
									_e("License is not activated.",'seo-pressor');
								}
								?>
                            </li>
                        </ul>
                    </div>
                    <p><strong><?php _e('Step 2: ','seo-pressor');?></strong><?php _e('Backup your plugin files.','seo-pressor');?></p>
                    <p><strong><?php _e('Step 3: ','seo-pressor');?></strong><?php _e('Start updating.','seo-pressor');?></p>
					<?php
                    if( !$seopressor_is_active ) {
                        echo __('Activate your plugin.','seo-pressor');
                    }
                    else
                    {
                        if( $need_upgrade )
                        {
                            echo '<a class="seops_s4 seops_update_upgrade">' . __('Update your plugin', 'seo-pressor') . '</a>';
                        }
                        else
                        {
                            echo '<div class="seops_upgrade_requirement">';
                            echo '<ul>';
                            echo '<li class="seops_upgrade_requirement_positive">' . __('You\'re using SEOPressor ' . WPPostsRateKeys::VERSION . '. Your plugin is up to date.', 'seo-pressor') . '</li>';
                            echo '</ul>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
