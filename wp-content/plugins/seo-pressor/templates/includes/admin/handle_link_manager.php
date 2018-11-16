<div class="wrap">
	<h2></h2>
	<div class="seops_wrap_wide">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Link Manager', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher_css">
        	<a class="active"><?php _e('Link Profile\'s Health', 'seo-pressor') ?></a>
        	<a href="<?= admin_url('admin.php?page=seopressor-smart-linking') ?>"><?php _e('Automatic Smart Linking', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_refreshall">
                	<div class="seops_message seops_hide"></div>
                    <?php if( $total > 0 ) { ?>
                		<a class="seops_s4 seops_update_refreshall seops_mr_16 seops_mb_20"><?php _e('Refresh All', 'seo-pressor') ?></a>
                    	<span class="seops_refreshall_message"><?php _e('Your link profile is refreshed every 7 days. For real time status, please refresh your link profile manually.', 'seo-pressor'); ?></span>
                    <?php } ?>
                    <?php if( !empty($crawl_status) ) { ?>
                    	<div class="seops_link_notification seops_mb_20 seops_color_red"><?php _e('We are analyzing and updating your link profile. It may take a while for us to go through everything, please come back in a while.', 'seo-pressor') ?></div>
                    <?php } ?>
                </div>
            	<div class="seops_data seops_pt10 seops_pb20">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <th><?php _e('Post/Page Title','seo-pressor')?></th>
                            <th><?php _e('Anchor Text','seo-pressor')?></th>
                            <th width="80"><a href="<?= $sort_status ?>" class="<?= $class_status ?>"><?php _e('Status','seo-pressor')?><span></span></a></th>
                            <th width="120"><a href="<?= $sort_last ?>" class="<?= $class_last ?>"><?php _e('Last Checked','seo-pressor')?><span></span></a></th>
                            
                        </tr>
                        <?php
						if( count($result) > 0 )
						{
							foreach($result as $row)
							{
								if( $row->status_code >= 400 || $row->status_code == 0 )
								{
									$status = '<span class="seops_red">Broken</span>';
								}
								else
								{
									$status = '<span class="seops_green">Alive</span>';
								}
								
								$row->last_checked = date('Y/m/d', strtotime($row->last_checked));
								
								echo '<tr data-id="'.$row->id.'">';
								echo '<td><a href="'.get_edit_post_link($row->post_id).'">'.get_the_title($row->post_id).'</a></td>';
								echo '<td><a href="'.$row->url.'" target="_blank">'.( empty($row->anchor_text) ? '(empty)' : $row->anchor_text ).'</a></td>';
								echo '<td class="col_status">'.ucfirst($status).'</td>';
								echo '<td>'.$row->last_checked.'</td>';
								//echo '<td><a>' . __('Refresh', 'seo-pressor') . '</a></td>';
								echo '</tr>';
							}
						}
						else
						{
							echo '<tr>';
							echo '<td colspan="4">' . __('Link not found.', 'seo-pressor') . '</td>';
							echo '</tr>';
						}
						?>
                    </table>
                </div>
                <?php if( count($result) > 0 ) { ?>
                <div class="seops_manage">
                    <div class="seops_manage_pagination">
                        <?php
						if ( $page_links ) {
							echo '<div class="seops_pagination seops_s12">';
							echo '<span class="seops_pagination_info">Post ' . number_format_i18n( ( $paged - 1 ) * $limit + 1 ) . ' to ' . number_format_i18n( min( $paged * $limit, $total ) ) . '</span>';
							echo '<div class="seops_pagination_pagilink">' . $page_links . '</div>';
							echo '</div>';
						}
						?>
                    </div>
                    <div class="seops_manage_view">
                        <select class="seops_number_perpage">
                            <option value="10" <?php echo ($limit == 10 ? 'selected="selected"' : ''); ?>>10 <?php _e('per page', 'seo-pressor') ?></option>
                            <option value="20" <?php echo ($limit == 20 ? 'selected="selected"' : ''); ?>>20 <?php _e('per page', 'seo-pressor') ?></option>
                            <option value="50" <?php echo ($limit == 50 ? 'selected="selected"' : ''); ?>>50 <?php _e('per page', 'seo-pressor') ?></option>
                            <option value="100" <?php echo ($limit == 100 ? 'selected="selected"' : ''); ?>>100 <?php _e('per page', 'seo-pressor') ?></option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>