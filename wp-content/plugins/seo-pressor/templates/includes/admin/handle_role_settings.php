<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Role Settings', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher_css">
        	<a class="active"><?php _e('Wordpress Default', 'seo-pressor') ?></a>
        	<a href="<?= admin_url('admin.php?page=seopressor-create-custom-role') ?>"><?php _e('Custom Role', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                	<p><?php _e('Enable SEOPressor Role Management System','seo-pressor'); ?></p>
                    <input type="checkbox" class="seops_onoff_switch" name="seops_attr[role][enable]" <?php if($enable_role_settings) echo 'checked="checked"'; ?> />
                </div>
                <div class="seops_wprole_wrap">
                    <div class="seops_data seops_pb20">
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <th><a href="<?= $sort ?>" class="<?= $class ?>"><?php _e('WordPress Role','seo-pressor')?><span></span></a></th>
                                <th><?php _e('App Accessibility','seo-pressor')?></th>
                            </tr>
                            <?php
                            if( count($result) > 0 )
                            {
                                foreach($result as $row)
                                {
                                    ?>
                                    <tr>
                                        <td width="180"><?php echo ucfirst(esc_attr($row->role_name)); ?></td>
                                        <td>
                                            <?php if( $row->role_name == 'administrator' ) { ?>
                                            
                                            <form data-id="<?php echo $row->id; ?>" class="seops_form_accessibility">
                                                <label><input type="checkbox" name="seops_attr[role][on_page_analysis]" value="on_page_analysis" <?php if( in_array( 'on_page_analysis', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> On-Page Analysis</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_social_seo]" value="on_page_social_seo" <?php if( in_array( 'on_page_social_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> On-Page Social SEO</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_schema_setting]" value="on_page_schema_setting" <?php if( in_array( 'on_page_schema_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> On-Page Schema Setting</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_meta_setting]" value="on_page_meta_setting" <?php if( in_array( 'on_page_meta_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> On-Page Meta Setting</label>
                                                <label><input type="checkbox" name="seops_attr[role][score_manager]" value="score_manager" <?php if( in_array( 'score_manager', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Score Manager</label>
                                                <label><input type="checkbox" name="seops_attr[role][link_manager]" value="link_manager" <?php if( in_array( 'link_manager', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Link Manager</label>
                                                <label><input type="checkbox" name="seops_attr[role][sitewide_seo]" value="sitewide_seo" <?php if( in_array( 'sitewide_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Sitewide SEO</label>
                                                <label><input type="checkbox" name="seops_attr[role][homepage_seo]" value="homepage_seo" <?php if( in_array( 'homepage_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Homepage Settings</label>
                                                <label><input type="checkbox" name="seops_attr[role][site_audit]" value="site_audit" <?php if( in_array( 'site_audit', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Site Audit</label>
                                                <label><input type="checkbox" name="seops_attr[role][role_setting]" value="role_setting" <?php if( in_array( 'role_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Role Settings</label>
                                                <label><input type="checkbox" name="seops_attr[role][plugin_setting]" value="plugin_setting" <?php if( in_array( 'plugin_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> disabled="disabled" /> Plugin Settings</label>
                                            </form>
                                            
                                            <?php } else { ?>
                                            
                                            <form data-id="<?php echo $row->id; ?>" class="seops_form_accessibility">
                                                <label><input type="checkbox" name="seops_attr[role][on_page_analysis]" value="on_page_analysis" <?php if( in_array( 'on_page_analysis', $row->capabilities ) ) echo 'checked="checked"'; ?> /> On-Page Analysis</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_social_seo]" value="on_page_social_seo" <?php if( in_array( 'on_page_social_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> /> On-Page Social SEO</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_schema_setting]" value="on_page_schema_setting" <?php if( in_array( 'on_page_schema_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> /> On-Page Schema Setting</label>
                                                <label><input type="checkbox" name="seops_attr[role][on_page_meta_setting]" value="on_page_meta_setting" <?php if( in_array( 'on_page_meta_setting', $row->capabilities ) ) echo 'checked="checked"'; ?> /> On-Page Meta Setting</label>
                                                <label><input type="checkbox" name="seops_attr[role][score_manager]" value="score_manager" <?php if( in_array( 'score_manager', $row->capabilities ) ) echo 'checked="checked"'; ?> /> Score Manager</label>
                                                <label><input type="checkbox" name="seops_attr[role][link_manager]" value="link_manager" <?php if( in_array( 'link_manager', $row->capabilities ) ) echo 'checked="checked"'; ?> /> Link Manager</label>
                                                <label><input type="checkbox" name="seops_attr[role][sitewide_seo]" value="sitewide_seo" <?php if( in_array( 'sitewide_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> /> Sitewide SEO</label>
                                                <label><input type="checkbox" name="seops_attr[role][homepage_seo]" value="homepage_seo" <?php if( in_array( 'homepage_seo', $row->capabilities ) ) echo 'checked="checked"'; ?> /> Homepage Settings</label>
                                                <label><input type="checkbox" name="seops_attr[role][site_audit]" value="site_audit" <?php if( in_array( 'site_audit', $row->capabilities ) ) echo 'checked="checked"'; ?> /> Site Audit</label>
                                            </form>
                                            
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <?php
				if ( $page_links ) {
					echo '<div class="seops_pagination seops_p20">';
					echo '<span class="seops_pagination_info">Post ' . number_format_i18n( ( $paged - 1 ) * $limit + 1 ) . ' to ' . number_format_i18n( min( $paged * $limit, $total ) ) . '</span>';
					echo '<div class="seops_pagination_pagilink">' . $page_links . '</div>';
					echo '</div>';
				}
				?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>