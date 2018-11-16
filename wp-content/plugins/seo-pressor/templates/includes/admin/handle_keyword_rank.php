<?php
/**
 * Template to show the plugin Keyword Rank page
 *
 * @package admin-panel
 * @version	v5.0
 *
 */
?>
<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <h2><?php _e('Keyword Rank','seo-pressor')?></h2>
        <div class="seops_main_tab_wrap">
        	<div id="seopressor-message-container">
				<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
            </div>
            <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
            <div class="seops_data seops_pt20 seops_pb20">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                    	<th><a href="<?= $sort_keyword ?>" class="<?= $class_keyword ?>"><?php _e('Keywords','seo-pressor')?><span></span></a></th>
                        <th><?php _e('Post/Page Title','seo-pressor')?></th>
                        <th><?php _e('Ranking','seo-pressor')?></th>
                    </tr>
                    <?php
                    if( count($result) > 0 )
                    {
                        foreach($result as $row)
                        {
                            echo '<tr>';
							echo '<td>'.$row->keyword.'</td>';
                            echo '<td>';
							$post_ids = explode(',', $row->post_ids);
							if( count($post_ids) > 0 )
							{
								$first = true;
								foreach( $post_ids as $post_id )
								{
									echo '<a href="'.get_edit_post_link($post_id).'">'.get_the_title($post_id).'</a>' . ($first == true ? '<br/>' : '');
									$first = false;
								}
							}
							echo '</td>';
                            echo '<td>N/A</td>';
                            echo '</tr>';
                        }
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
            <?php endif; ?>
        </div>
    </div>
</div>
