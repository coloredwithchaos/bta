<div class="wrap">
	<h2></h2>
	<div class="seops_wrap_wide">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Automatic Smart Linking', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher_css">
        	<a href="<?= admin_url('admin.php?page=seopressor-link-manager') ?>"><?php _e('Link Profile\'s Health', 'seo-pressor') ?></a>
        	<a class="active" href="<?= admin_url('admin.php?page=seopressor-smart-linking') ?>"><?php _e('Automatic Smart Linking', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_sub_switcher">
                	<a class="active"><?php _e('Smart Linking List', 'seo-pressor') ?></a>
                    <a><?php _e('Add New', 'seo-pressor') ?></a>
                    <a class="seops_hide"></a>
                </div>
                <div class="seops_sub_tab">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_data">
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <th><a href="<?= $sort_keyword ?>" class="<?= $class_keyword ?>"><?php _e('Keyword','seo-pressor')?><span></span></a></th>
                                    <th><a href="<?= $sort_url ?>" class="<?= $class_url ?>"><?php _e('URL','seo-pressor')?><span></span></a></th>
                                    <th><a href="<?= $sort_cloaking ?>" class="<?= $class_cloaking ?>"><?php _e('Cloaking Folder','seo-pressor')?><span></span></a></th>
                                    <th><a href="<?= $sort_howmany ?>" class="<?= $class_howmany ?>"><?php _e('Times','seo-pressor')?><span></span></a></th>
                                    <th><?php _e('Action','seo-pressor')?></th>
                                </tr>
                                <?php
                                if( count($result) > 0 )
                                {
                                    foreach($result as $row)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.esc_attr($row->keywords).'</td>';
                                        echo '<td>'.esc_url($row->url).'</td>';
                                        echo '<td>'.( empty($row->cloaking_folder) ? 'N/A' : esc_attr($row->cloaking_folder) ).'</td>';
                                        echo '<td>'.$row->how_many.'</td>';
                                        echo '<td><a class="seops_edit_smart_linking" data-id="'.$row->id.'">Edit</a> | <a class="seops_delete_smart_linking" data-id="'.$row->id.'">' . __('Delete', 'seo-pressor') . '</a></td>';
                                        echo '</tr>';
                                    }
                                }
								else
								{
									echo '<tr>';
									echo '<td colspan="5">' . __('Oops, there seems to be nothing here. Create smart links now', 'seo-pressor') . '</td>';
									echo '</tr>';
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
                <div class="seops_sub_tab seops_hide">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_smart_linking">
                        	<div class="seops_message seops_hide"></div>
                            <div class="seops_grid_wrap">
                            	<div class="seops_grid_row">
                                	<p class="seops_color_black"><?php _e('Keyword to link', 'seo-pressor') ?> <span class="seops_red">*</span> <span class="seops_tooltips" title=""><span><?php _e('Creates a link whenever this keyword is present. <a href="http://seopressor.com/learn/#keyword_to_link" target="_blank">Learn More</a>', 'seo-pressor'); ?></span></span></p>
                            		<input type="text" name="seops_attr[smart_linking][keyword]" value="" placeholder="<?php _e('Specify which keyword to link', 'seo-pressor'); ?>" />
                                </div>
                                <div class="seops_grid_row">
                                	<p class="seops_color_black"><?php _e('Target URL') ?> <span class="seops_red">*</span></p>
                            		<input type="text" name="seops_attr[smart_linking][url]" value="" placeholder="<?php _e('Specify target URL', 'seo-pressor') ?>" />
                                </div>
                                <div class="seops_grid_row">
                                	<p class="seops_color_black">Cloaking Folder <span class="seops_grey">(optional)</span> <span class="seops_tooltips" title=""><span><?php _e('This changes how your link appears. <a href="http://seopressor.com/learn#cloaking" target="_blank">Learn More</a>', 'seo-pressor') ?></span></span></p>
                            		<input type="text" name="seops_attr[smart_linking][cloaking]" value="" placeholder="<?php _e('Leave blank if cloaking is not required.', 'seo-pressor') ?>" />
                                </div>
                                <div class="seops_grid_row">
                                	<p class="seops_color_black"><?php _e('Maximum links per page', 'seo-pressor') ?> <span class="seops_red">*</span></p>
                            		<input type="text" name="seops_attr[smart_linking][times]" value="" placeholder="<?php _e('Specify the maximum amount of links to be created. (Insert whole number)', 'seo-pressor') ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seops_action">
                        <a class="seops_update_smart_linking"><?php _e('Create', 'seo-pressor') ?></a>
                    </div>
                </div>
                <div class="seops_sub_tab seops_hide">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_smart_linking">
                        	<div class="seops_message seops_hide"></div>
                            <a class="seops_sl_back"><< <?php _e('Back to Smart Linking List', 'seo-pressor') ?></a>
                            <input type="hidden" name="seops_attr[smart_linking][edit_id]" value="" />
                            <div class="seops_grid_wrap">
                            	<div class="seops_grid_row">
                                	<p class="seops_color_black">Keyword to Link</p>
                            		<input type="text" name="seops_attr[smart_linking][edit_keyword]" value="" placeholder="Insert the keyword you want to auto-link" />
                                </div>
                            	<div class="seops_grid_row">
                                	<p class="seops_color_black">URL to Link</p>
                                    <input type="text" name="seops_attr[smart_linking][edit_url]" value="" placeholder="Insert the URL you want your keyword to auto-link to" />
                                </div>
                            	<div class="seops_grid_row">
                                	<p class="seops_color_black">Cloaking Folder <span class="seops_grey">(optional)</span></p>
                                    <input type="text" name="seops_attr[smart_linking][edit_cloaking]" value="" placeholder="Name of your cloaking folder. Leave it blank if cloaking is unnecessary." />
                                </div>
                            	<div class="seops_grid_row">
                                	<p class="seops_color_black">Times to Link per Page</p>
                                    <input type="text" name="seops_attr[smart_linking][edit_times]" value="" placeholder="How many times do you want to auto-link " />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seops_action">
                        <a class="seops_update_smart_linking_edit"><?php _e('Update', 'seo-pressor') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>