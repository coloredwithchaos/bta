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
        	<a href="<?= admin_url('admin.php?page=seopressor-role-settings') ?>"><?php _e('Wordpress Default', 'seo-pressor') ?></a>
        	<a class="active"><?php _e('Custom Role', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_sub_switcher_css">
                    <a class="active"><?php _e('Create Custom Role', 'seo-pressor') ?></a>
                    <a href="<?= admin_url('admin.php?page=seopressor-edit-custom-role') ?>"><?php _e('Edit Custom Role', 'seo-pressor') ?></a>
                    <a href="<?= admin_url('admin.php?page=seopressor-apply-custom-role') ?>"><?php _e('Assign Custom Role', 'seo-pressor') ?></a>
                </div>
                <div class="seops_sub_tab">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_grid_wrap">
                        	<div class="seops_message seops_hide"></div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_560">
                                    <p><?php _e('Custom Role Name', 'seo-pressor') ?> <span class="seops_red">*</span></p>
                                    <input type="text" value="" name="seops_attr[role][name]" placeholder="<?php _e('Create a name for your custom role.', 'seo-pressor') ?>" />
                                </div>
                            </div>
                            <p><?php _e('Custom Role\'s App Accesibility', 'seo-pressor') ?></p>
                            <form class="seops_form_role_create_capabilities">
                                <table cellpadding="0" cellspacing="0" border="0" class="seops_capabilities_table">
                                    <tr>
                                        <th width="200">Accessibility</th>
                                        <th width="100"></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><label for="capabilities_1">On-Page Analysis</label></p>
                                            <p><label for="capabilities_2">On-Page Social SEO</label></p>
                                            <p><label for="capabilities_3">On-Page Schema Setting</label></p>
                                            <p><label for="capabilities_4">On-Page Meta Setting</label></p>
                                        </td>
                                        <td>
                                            <p><input id="capabilities_1" type="checkbox" name="seops_attr[role][capabilities][]" value="on_page_analysis" checked="checked" /></p>
                                            <p><input id="capabilities_2" type="checkbox" name="seops_attr[role][capabilities][]" value="on_page_social_seo" checked="checked" /></p>
                                            <p><input id="capabilities_3" type="checkbox" name="seops_attr[role][capabilities][]" value="on_page_schema_setting" checked="checked" /></p>
                                            <p><input id="capabilities_4" type="checkbox" name="seops_attr[role][capabilities][]" value="on_page_meta_setting" checked="checked" /></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="capabilities_5">Score Manager</label></td>
                                        <td><input id="capabilities_5" type="checkbox" name="seops_attr[role][capabilities][]" value="score_manager" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="capabilities_6">Link Manager</label></td>
                                        <td><input id="capabilities_6" type="checkbox" name="seops_attr[role][capabilities][]" value="link_manager" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	<p><label for="capabilities_7">Sitewide SEO</label></p>
                                            <p><label for="capabilities_8">Homepage Settings</label></p>
                                            <p><label for="capabilities_9">Site Audit</label></p>
                                        </td>
                                        <td>
                                        	<p><input id="capabilities_7" type="checkbox" name="seops_attr[role][capabilities][]" value="sitewide_seo" /></p>
                                            <p><input id="capabilities_8" type="checkbox" name="seops_attr[role][capabilities][]" value="homepage_seo" /></p>
                                            <p><input id="capabilities_9" type="checkbox" name="seops_attr[role][capabilities][]" value="site_audit" /></p>
                                        </td>
                                    </tr>
                                </table>
							</form>
                        </div>
                    </div>
                    <div class="seops_action">
                        <a class="seops_update_role"><?php _e('Create', 'seo-pressor') ?></a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php endif; ?>
    </div>
</div>