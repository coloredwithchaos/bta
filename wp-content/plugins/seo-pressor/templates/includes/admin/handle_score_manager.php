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
	<div class="seops_wrap_wide">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Score Manager','seo-pressor')?></h2>
        <div class="seops_main_tab_wrap">
            <div class="seops_data seops_pt20 seops_pb20">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <th>
							<a href="<?= $sort_title ?>" class="<?= $class_title ?>"><?php _e('Post/Page Title','seo-pressor')?><span></span></a>
                        </th>
                        <th><?php _e('Author', 'seo-pressor'); ?></th>
                        <th width="100"><a href="<?= $sort_type ?>" class="<?= $class_type ?>"><?php _e('Type','seo-pressor')?><span></span></a></th>
                        <th width="100"><a href="<?= $sort_date ?>" class="<?= $class_date ?>"><?php _e('Date','seo-pressor')?><span></span></a></th>
                        <th><?php _e('Keyword(s)','seo-pressor')?></th>
                        <th width="100"><a href="<?= $sort_score ?>" class="<?= $class_score ?>"><?php _e('SEO Score','seo-pressor')?><span></span></a></th>
                    </tr>
                    <?php
                    if( count($result) > 0 )
                    {
                        foreach($result as $row)
                        {
							if( $row->score < 40 )
								$score_class = "seops_grey";
							elseif( $row->score < 80 )
								$score_class = "seops_blue";
							elseif( $row->score <= 100 )
								$score_class = "seops_green";
							else
								$score_class = "seops_red";
                            echo '<tr>';
                            echo '<td><a href="'.get_edit_post_link($row->ID).'">'.$row->post_title.'</a></td>';
							echo '<td>'.get_the_author_meta( 'display_name', $row->post_author ).'</td>';
                            echo '<td>'.ucfirst($row->post_type).'</td>';
                            echo '<td>'.$row->post_date.'</td>';
							echo '<td>';
							if( count($row->keywords) > 0 )
							{
								foreach( $row->keywords as $single )
								{
									echo '<span class="seops_sm_block">'.$single.'</span>';
								}
							}
							echo '</td>';
                            echo '<td><span class="'.$score_class.'">'.$row->score.'%</span></td>';
                            echo '</tr>';
                        }
                    }
					else
					{
						echo '<tr>';
						echo '<td colspan="5">There is no post yet.</td>';
						echo '</tr>';
					}
                    ?>
                </table>
            </div>
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
        </div>
        <?php endif; ?>
    </div>
</div>



