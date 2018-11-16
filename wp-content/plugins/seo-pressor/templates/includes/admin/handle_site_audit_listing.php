<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
            <?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('SEOPressor Website Audit', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher_css">
        	<a href="<?= admin_url('admin.php?page=seopressor-site-audit') ?>"><?php _e('Summary', 'seo-pressor') ?></a>
        	<a class="active" href="<?= admin_url('admin.php?page=seopressor-site-audit#1') ?>"><?php _e('Errors & Alerts', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
				<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                    <a class="seops_s6" href="<?= admin_url('admin.php?page=seopressor-site-audit#1') ?>">&laquo; <?php _e('Back to Errors & Alerts', 'seo-pressor'); ?></a>
                    <div class="seops_audit_listing_wrap">
                    	<div class="seops_audit_listing_title">
                        	<?php echo $listing_title; ?>
                        </div>
                        <div class="seops_audit_listing_content">
                        <?php
						if( count($result) > 0 )
						{
							echo '<table cellspacing="0" cellpadding="0" border="0" width="100%">';
							foreach( $result as $row )
							{
								$edit_link = get_edit_post_link($row->post_id);
								echo '<tr>';
								echo '<td><a ' . ( empty($edit_link) ? '' : 'href="' . $edit_link . '"' ) . ' target="_blank">' . (empty($row->title) ? '(empty)' : $row->title) . '</a></td>';
								echo '<td width="60">' . ( empty($edit_link) ? '' : '<a href="' . $edit_link . '" target="_blank">Fix This</a>' ) . '</td>';
								echo '</tr>';
							}
							echo '</table>';
						}
						else
						{
							echo '<div class="seops_p20">' . __('Post not found.', 'seo-pressor') . '</div>';
						}
						?>
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
        <?php endif; ?>
    </div>
</div>




