<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Homepage Settings', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher">
        	<a class="active"><?php _e('Meta Settings', 'seo-pressor') ?></a>
        	<a><?php _e('Knowledge Graph', 'seo-pressor') ?></a>
        	<a><?php _e('Facebook Open Graph', 'seo-pressor') ?></a>
        	<a><?php _e('Twitter Card', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_homepage">
                	<div class="seops_message seops_hide"></div>
                	<p class="seops_color_black"><?php _e('Title Tag', 'seo-pressor') ?></p>
                    <textarea name="seops_attr[home][title]" placeholder="<?php _e('Default homepage title will be used if left blank. (Please disable your theme\'s title to avoid compatibility issue.)', 'seo-pressor') ?>" data-preview="This Is Your Title Tag"><?= $data['seop_home_title'] ?></textarea>
                    <p class="seops_color_black"><?php _e('Meta Description', 'seo-pressor') ?></p>
                    <textarea name="seops_attr[home][description]" placeholder="<?php _e('Briefly describe your website. (Please disable your theme\'s meta description to avoid compatibility issue.)', 'seo-pressor') ?>" data-preview="This is where your meta description may be displayed."><?= $data['seop_home_description'] ?></textarea>
                    <p class="seops_grey"><?php _e('Search Engine Preview', 'seo-pressor') ?></p>
                    <div class="seops_meta_preview">
                    	<p class="seops_meta_preview_title"><?php bloginfo('name') ?></p>
                    	<p class="seops_meta_preview_url"><?php bloginfo('url') ?></p>
                    	<p class="seops_meta_preview_description">Any</p>
                    </div>
                    <p class="seops_color_black"><?php _e('Canonical URL', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('This helps prevent duplicate content issues. <a href="http://seopressor.com/learn/#canonical" target="_blank">Learn More</a>', 'seo-pressor'); ?></span></span></p>
                    <input type="text" name="seops_attr[home][canonical]" value="<?= $data['seop_home_canonical'] ?>" />
                    <p class="seops_color_black"><?php _e('301 Redirect URL', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('This redirects visitors to the provided URL. <a href="http://seopressor.com/learn/#redirect" target="_blank">Learn More</a>', 'seo-pressor') ?></span></span></p>
                    <input type="text" name="seops_attr[home][redirect]" value="<?= $data['seop_home_redirect'] ?>" />
                    <p class="seops_color_black"><?php _e('Robot Rules', 'seo-pressor') ?> <span class="seops_tooltips" title=""><span><?php _e('This controls crawler\'s behavior when crawling your page. <a href="http://seopressor.com/learn/#robot_rules" target="_blank">Learn More</a>', 'seo-pressor') ?></span></span></p>
                    <p><label class="seops_grey"><input type="checkbox" class="seops_home_checkall" value="" /><?php _e('Check / Uncheck All', 'seo-pressor') ?></label></p>
                    <div class="seops_meta_robot">
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="noindex" <?php if(in_array('noindex', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-index</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="nosnippet" <?php if(in_array('nosnippet', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-snippet</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="noimageindex" <?php if(in_array('noimageindex', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-image-index</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="nofollow" <?php if(in_array('nofollow', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-follow</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="noodp" <?php if(in_array('noodp', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-odp</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="noarchive" <?php if(in_array('noarchive', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-archive</label>
                        <label><input type="checkbox" name="seops_attr[home][robot]" value="notranslate" <?php if(in_array('notranslate', $data['seop_home_robot'])) echo 'checked="checked"'; ?> />no-translate</label>
                    </div>
                </div>
                <div class="seops_action">
                    <a class="seops_update_home"><?php _e('Update', 'seo-pressor') ?></a>
                </div>
            </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_homepage">
                	<div class="seops_message seops_hide"></div>
                	<p class="seops_color_black"><?php _e('Company Logo', 'seo-pressor') ?></p>
                    <div class="seops_onscreen_uploader_wrap">
                        <div class="seops_onscreen_uploader_image" style="background-image:url(<?= $data['seop_home_logo'] ?>);"></div>
                        <a class="seops_onscreen_uploader_remove <?php if( empty($data['seop_home_logo']) ) echo 'seops_hide'; ?>"></a>
                        <input type="hidden" name="seops_attr[home][logo]" value="<?= $data['seop_home_logo'] ?>" />
                        <?php _e('Pick From Gallery', 'seo-pressor'); ?>
                    </div>
                    <p class="seops_color_black"><?php _e('Contact Number', 'seo-pressor') ?></p>
                    <div class="seops_contact_wrapper">
                    	<div class="seops_grid_wrap">
							<?php
                            if( count($data['seop_home_contact']) > 0 )
                            {
                                $first = true;
                                foreach( $data['seop_home_contact'] as $row_contact )
                                {
                                    ?>
                                    <div class="seops_grid_row">
                                        <div class="seops_grid_192 seops_mr_8">
                                            <select name="seops_attr[home][contact_type]">
                                                <option value="customer service" <?php if($row_contact['contact_type'] == 'customer service') echo 'selected="selected"'; ?>>Customer Service</option>
                                                <option value="technical support" <?php if($row_contact['contact_type'] == 'technical support') echo 'selected="selected"'; ?>>Technical Support</option>
                                                <option value="billing support" <?php if($row_contact['contact_type'] == 'billing support') echo 'selected="selected"'; ?>>Billing Support</option>
                                                <option value="bill payment" <?php if($row_contact['contact_type'] == 'bill payment') echo 'selected="selected"'; ?>>Bill Payment</option>
                                                <option value="sales" <?php if($row_contact['contact_type'] == 'sales') echo 'selected="selected"'; ?>>Sales</option>
                                                <option value="reservations" <?php if($row_contact['contact_type'] == 'reservations') echo 'selected="selected"'; ?>>Reservations</option>
                                                <option value="credit card support" <?php if($row_contact['contact_type'] == 'credit card support') echo 'selected="selected"'; ?>>Credit Card Support</option>
                                                <option value="emergency" <?php if($row_contact['contact_type'] == 'emergency') echo 'selected="selected"'; ?>>Emergency</option>
                                                <option value="baggage tracking" <?php if($row_contact['contact_type'] == 'baggage tracking') echo 'selected="selected"'; ?>>Baggage Tracking</option>
                                                <option value="roadside assistance" <?php if($row_contact['contact_type'] == 'roadside assistance') echo 'selected="selected"'; ?>>Roadside Assistance</option>
                                                <option value="package tracking" <?php if($row_contact['contact_type'] == 'package tracking') echo 'selected="selected"'; ?>>Package Tracking</option>
                                            </select>
                                        </div>
                                        <div class="seops_grid_272 seops_prefix_wrap">
                                            <span class="seops_prefix">+</span>
                                            <input type="text" name="seops_attr[home][contact]" value="<?= $row_contact['contact'] ?>" class="seops_prefix_field" />
                                        </div>
                                        <?php if( !$first ) echo '<a class="seops_contact_remove seops_contact_remove_css"></a>'; ?>
                                    </div>
                                    <?php
                                    $first = false;
                                }
                            }
                            else
                            {
                                ?>
                                <div class="seops_grid_row">
                                    <div class="seops_grid_192 seops_mr_8">
                                        <select name="seops_attr[home][contact_type]">
                                            <option value="customer service">Customer Service</option>
                                            <option value="technical support">Technical Support</option>
                                            <option value="billing support">Billing Support</option>
                                            <option value="bill payment">Bill Payment</option>
                                            <option value="sales">Sales</option>
                                            <option value="reservations">Reservations</option>
                                            <option value="credit card support">Credit Card Support</option>
                                            <option value="emergency">Emergency</option>
                                            <option value="baggage tracking">Baggage Tracking</option>
                                            <option value="roadside assistance">Roadside Assistance</option>
                                            <option value="package tracking">Package Tracking</option>
                                        </select>
                                    </div>
                                    <div class="seops_grid_272 seops_prefix_wrap">
                                        <span class="seops_prefix">+</span>
                                        <input type="text" name="seops_attr[home][contact]" class="seops_prefix_field" />
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <a class="seops_add_more"><?php _e('Add contact numbers', 'seo-pressor') ?></a>
                        </div>
                    </div>
                    <p class="seops_color_black seops_mt_24"><?php _e('Social Media Page URL', 'seo-pressor') ?></p>
                    <div class="seops_contact_wrapper">
                    	<div class="seops_grid_wrap">
							<?php
                            if( count($data['seop_home_social']) > 0 )
                            {
                                $first = true;
                                foreach( $data['seop_home_social'] as $row_social )
                                {
                                    ?>
                                    <div class="seops_grid_row">
                                        <div class="seops_grid_192 seops_mr_8">
                                            <select name="seops_attr[home][social_type]">
                                                <option value="Facebook" <?php if($row_social['social_type'] == 'Facebook') echo 'selected="selected"'; ?>>Facebook</option>
                                                <option value="Twitter" <?php if($row_social['social_type'] == 'Twitter') echo 'selected="selected"'; ?>>Twitter</option>
                                                <option value="Google+" <?php if($row_social['social_type'] == 'Google+') echo 'selected="selected"'; ?>>Google+</option>
                                                <option value="Instagram" <?php if($row_social['social_type'] == 'Instagram') echo 'selected="selected"'; ?>>Instagram</option>
                                                <option value="YouTube" <?php if($row_social['social_type'] == 'YouTube') echo 'selected="selected"'; ?>>YouTube</option>
                                                <option value="LinkedIn" <?php if($row_social['social_type'] == 'LinkedIn') echo 'selected="selected"'; ?>>LinkedIn</option>
                                                <option value="Myspace" <?php if($row_social['social_type'] == 'Myspace') echo 'selected="selected"'; ?>>Myspace</option>
                                                <option value="Pinterest" <?php if($row_social['social_type'] == 'Pinterest') echo 'selected="selected"'; ?>>Pinterest</option>
                                                <option value="SoundCloud" <?php if($row_social['social_type'] == 'SoundCloud') echo 'selected="selected"'; ?>>SoundCloud</option>
                                                <option value="Tumblr" <?php if($row_social['social_type'] == 'Tumblr') echo 'selected="selected"'; ?>>Tumblr</option>
                                            </select>
                                        </div>
                                        <div class="seops_grid_272">
                                            <input type="text" name="seops_attr[home][social]" value="<?= $row_social['social'] ?>" />
                                        </div>
                                        <?php if( !$first ) echo '<a class="seops_contact_remove seops_contact_remove_css"></a>'; ?>
                                    </div>
                                    <?php
                                    $first = false;
                                }
                            }
                            else
                            {
                                ?>
                                <div class="seops_grid_row">
                                    <div class="seops_grid_192 seops_mr_8">
                                        <select name="seops_attr[home][social_type]">
                                            <option value="Facebook">Facebook</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Google+">Google+</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="YouTube">YouTube</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Myspace">Myspace</option>
                                            <option value="Pinterest">Pinterest</option>
                                            <option value="SoundCloud">SoundCloud</option>
                                            <option value="Tumblr">Tumblr</option>
                                        </select>
                                    </div>
                                    <div class="seops_grid_272">
                                        <input type="text" name="seops_attr[home][social]" />
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <a class="seops_add_more"><?php _e('Add social profiles', 'seo-pressor') ?></a>
                        </div>
                    </div>
                    <p class="seops_color_black"></p>
                    <p class="seops_color_black"></p>
                </div>
                <div class="seops_action">
                    <a class="seops_update_home"><?php _e('Update', 'seo-pressor') ?></a>
                </div>
            </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_homepage">
                	<div class="seops_message seops_hide"></div>

                    <div class="seops_grid_wrap">
                    	<div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Enable Facebook Open Graph', 'seo-pressor') ?></p>
                			<input type="checkbox" class="seops_onoff_switch" name="seops_attr[home][fb_enable]" <?php if($data['seop_home_fb_enable'] == 1) echo 'checked="checked"'; ?> />
                        </div>
                        <div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Open Graph Title', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                    		<textarea name="seops_attr[home][fb_title]" placeholder="<?php _e('Default homepage title will be used if left blank.', 'seo-pressor') ?>"><?= $data['seop_home_fb_title'] ?></textarea>
                        </div>
                        <div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Open Graph Description', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                    		<textarea name="seops_attr[home][fb_description]" placeholder="<?php _e('Briefly describe your website.', 'seo-pressor'); ?>"><?= $data['seop_home_fb_description'] ?></textarea>
                        </div>
                        <div class="seops_grid_row">
                            <p class="seops_color_block"><?php _e('Open Graph Image', 'seo-pressor') ?></p>
                            <div class="seops_onscreen_uploader_wrap">
                                <div class="seops_onscreen_uploader_image" style="background-image:url(<?= $data['seop_home_fb_image'] ?>);"></div>
                                <a class="seops_onscreen_uploader_remove <?php if( empty($data['seop_home_logo']) ) echo 'seops_hide'; ?>"></a>
                                <input type="hidden" name="seops_attr[home][fb_image]" value="<?= $data['seop_home_fb_image'] ?>" />
                                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
                            </div>
                        </div>
                        <div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Publisher', 'seo-pressor') ?></p>
                    		<input type="text" name="seops_attr[home][fb_publisher]" value="<?= $data['seop_home_fb_publisher'] ?>" placeholder="<?php _e('Insert publisher\'s Facebook ID.', 'seo-pressor'); ?>" />
                        </div>
                        <div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Author', 'seo-pressor') ?></p>
                    		<input type="text" name="seops_attr[home][fb_author]" value="<?= $data['seop_home_fb_author'] ?>" placeholder="<?php _e('Insert author\'s Facebook ID.', 'seo-pressor'); ?>" />
                        </div>
                    </div>
                </div>
                <div class="seops_action">
                    <a class="seops_update_home"><?php _e('Update', 'seo-pressor') ?></a>
                </div>
            </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_homepage">
                	<div class="seops_message seops_hide"></div>

                    <div class="seops_grid_wrap">
                    	<div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Enable Twitter Card', 'seo-pressor') ?></p>
                			<input name="seops_attr[home][tw_enable]" type="checkbox" class="seops_onoff_switch" <?php if($data['seop_home_tw_enable'] == 1) echo 'checked="checked"'; ?> />
                        </div>
                    	<div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Twitter Card Title', 'seo-pressor') ?></p>
                    		<textarea name="seops_attr[home][tw_title]" placeholder="<?php _e('Default homepage title will be used if left blank.', 'seo-pressor') ?>"><?= $data['seop_home_tw_title'] ?></textarea>
                        </div>
                    	<div class="seops_grid_row">
                        	<p class="seops_color_black"><?php _e('Twitter Card Description', 'seo-pressor') ?></p>
                    		<textarea name="seops_attr[home][tw_description]" placeholder="<?php _e('Briefly describe your website.', 'seo-pressor'); ?>"><?= $data['seop_home_tw_description'] ?></textarea>
                        </div>
                    	<div class="seops_grid_row">
                        	<p class="seops_color_block"><?php _e('Twitter Card Image', 'seo-pressor') ?></p>
                            <div class="seops_onscreen_uploader_wrap">
                                <div class="seops_onscreen_uploader_image" style="background-image:url(<?= $data['seop_home_image'] ?>);"></div>
                                <a class="seops_onscreen_uploader_remove <?php if( empty($data['seop_home_image']) ) echo 'seops_hide'; ?>"></a>
                                <input type="hidden" name="seops_attr[home][tw_image]" value="<?= $data['seop_home_image'] ?>" />
                                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
                            </div>
                        </div>
                    	<div class="seops_grid_row">
                        	<p class="seops_color_block"><?php _e('Publisher\'s Twitter ID', 'seo-pressor') ?></p>
                            <div class="seops_prefix_wrap">
                                <span class="seops_prefix">@</span>
                                <input type="text" name="seops_attr[home][tw_profile]" placeholder="" value="<?= $data['seop_home_profile'] ?>" class="seops_prefix_field" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seops_action">
                    <a class="seops_update_home"><?php _e('Update', 'seo-pressor') ?></a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
