<div class="wrap">
	<h2></h2>
    <div class="seops_wrap_wide">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <h2><?php _e('SEOPressor Error Log', 'seo-pressor') ?></h2>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_data seops_pt20 seops_pb20">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                        	<th><?php _e('Date','seo-pressor')?></th>
                            <th><?php _e('Type','seo-pressor')?></th>
                            <th><?php _e('Error Code','seo-pressor')?></th>
                            <th><?php _e('Message','seo-pressor')?></th>
                        </tr>
                        <?php
						if( count($result) > 0 )
						{
							foreach($result as $row)
							{
								echo '<tr>';
								echo '<td>'.$row->dt.'</td>';
								echo '<td>'.$row->type.'</td>';
								echo '<td>'.$row->msg_code.'</td>';
								echo '<td>'.$row->message.'</td>';
								echo '</tr>';
							}
						}
						else
						{
							echo '<tr>';
							echo '<td colspan="3">' . __('No error found.', 'seo-pressor') . '</td>';
							echo '</tr>';
						}
						?>
                    </table>
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
    </div>
</div>