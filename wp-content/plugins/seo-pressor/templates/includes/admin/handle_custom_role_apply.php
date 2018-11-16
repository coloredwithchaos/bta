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
                    <a href="<?= admin_url('admin.php?page=seopressor-create-custom-role') ?>"><?php _e('Create Custom Role', 'seo-pressor') ?></a>
                    <a href="<?= admin_url('admin.php?page=seopressor-edit-custom-role') ?>"><?php _e('Edit Custom Role', 'seo-pressor') ?></a>
                    <a class="active"><?php _e('Assign Custom Role', 'seo-pressor') ?></a>
                </div>
                <div class="seops_sub_tab">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_message seops_hide"></div>
                        <div class="seops_data seops_pb20">
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <th width="130"><a href="<?= $sort ?>" class="<?= $class ?>"><?php _e('Custom Role','seo-pressor') ?><span></span></a></th>
                                    <th width="290"><?php _e('Add User','seo-pressor') ?></th>
                                    <th><?php _e('Current Active', 'seo-pressor') ?></th>
                                </tr>
                                <?php
                                if( count($result) > 0 )
                                {
                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr id="seops_role_wrap_id_<?php echo $row->id; ?>">
                                            <td><?php echo ucfirst(esc_attr($row->role_name)); ?></td>
                                            <td width="292">
                                                <div class="seops_apply_role">
                                                	<input class="seops_user_search" type="text" name="seops_attr[role][user_input]" value="" placeholder="Enter username" data-role="<?php echo $row->id; ?>" />
                                                    <div class="seops_role_user_suggest seops_role_user_suggest_css seops_hide">
                                                    	
                                                    </div>
                                                </div>
                                                <a class="seops_update_apply_user seops_s5 seops_ml_8"><?php _e('Add User','seo-pressor'); ?></a>
                                            </td>
                                            <td>
                                            	<div class="seops_role_active_users" data-role="<?php echo $row->id; ?>">
                                            	<?php
												if( count($row->users) > 0 )
												{
													foreach( $row->users as $user )
													{
														 echo '<span class="seops_user_block" data-name="'.$user.'">'.$user.'<a class="seops_user_block_remove"></a></span>';
													}
												}
												?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
								else
								{
									?>
                                    <tr>
                                    	<td colspan="3"><p><?php _e('Oops, there seems to be nothing here. Create a new custom role now.', 'seo-pressor'); ?></p></td>
                                    </tr>
                                    <?php
								}
                                ?>
                            </table>
                        </div>
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