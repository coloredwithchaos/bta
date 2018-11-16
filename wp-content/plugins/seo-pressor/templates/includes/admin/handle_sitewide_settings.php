<div class="wrap">
	<h2></h2>
	<div class="seops_wrap">
    	<div class="seops_overlay seops_hide"></div>
        <div class="seops_notify"></div>
        <div id="seopressor-message-container">
			<?php include( WPPostsRateKeys::$template_dir . '/includes/msg.php'); ?>
        </div>
        <?php if( $seopressor_is_active && $seopressor_has_permission ) : ?>
        <h2><?php _e('Sitewide SEO', 'seo-pressor') ?></h2>
    	<div class="seops_main_switcher">
        	<a class="active"><?php _e('Local SEO', 'seo-pressor') ?></a>
        	<a><?php _e('XML Sitemap', 'seo-pressor') ?></a>
        	<a><?php _e('Link Policy', 'seo-pressor') ?></a>
					<a><?php _e('Default Social Settings', 'seo-pressor') ?></a>
        </div>
        <div class="seops_main_tab">
        	<div class="seops_main_tab_wrap">
        		<div class="seops_sub_switcher seops_switcher_local">
            	<a class="active"><?php _e('Address', 'seo-pressor') ?></a>
              <a><?php _e('Contact', 'seo-pressor') ?></a>
              <a><?php _e('Operating Hours', 'seo-pressor') ?></a>
              <a><?php _e('Publish Local SEO', 'seo-pressor') ?></a>
            </div>
            <div class="seops_sub_tab">
            	<div class="seops_sub_tab_wrap">
              	<div class="seops_message seops_hide"></div>
              	<div class="seops_grid_wrap">
                  <div class="seops_grid_row">
                    <div class="seops_grid_272 seops_mr_16">
                      <p><?php _e('Company/Business Name', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <input type="text" name="seops_attr[local][name]" value="<?= $data['seop_local_name'] ?>" />
                    </div>
                    <div class="seops_grid_272">
                      <p><?php _e('Business Type', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <select name="seops_attr[local][type]">
                      	<?php
												if( count($business_types) > 0 )
												{
													foreach( $business_types as $type )
													{
														$type_strip = preg_replace('/\s+/', '', $type);
														echo '<option value="'.$type_strip.'" '.($data['seop_local_type'] == $type_strip ? 'selected="selected"' : '').'>'.$type.'</option>';
													}
												}
												?>
                      </select>
                    </div>
                  </div>
                  <div class="seops_grid_row">
                    <div class="seops_grid_560">
                      <p><?php _e('Street Address', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <input type="text" name="seops_attr[local][address]" value="<?= $data['seop_local_address'] ?>" />
                    </div>
                  </div>
                  <div class="seops_grid_row">
                    <div class="seops_grid_272 seops_mr_16">
                      <p><?php _e('City', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <input type="text" name="seops_attr[local][city]" value="<?= $data['seop_local_city'] ?>" />
                    </div>
                    <div class="seops_grid_272">
                      <p><?php _e('State', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <input type="text" name="seops_attr[local][state]" value="<?= $data['seop_local_state'] ?>" />
                    </div>
                  </div>
                  <div class="seops_grid_row">
                    <div class="seops_grid_272 seops_mr_16">
                      <p><?php _e('Postcode', 'seo-pressor') ?>  <span class="seops_color_red">*</span></p>
                      <input type="text" name="seops_attr[local][postcode]" value="<?= $data['seop_local_postcode'] ?>" />
                    </div>
                    <div class="seops_grid_272">
                      <p><?php _e('Country', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
                      <select name="seops_attr[local][country]">
                      	<option value="">--</option>
                          <?php
													if( count($countries) > 0 )
													{
														foreach( $countries as $country )
														{
															echo '<option value="'.$country.'" '.($data['seop_local_country'] == $country ? 'selected="selected"' : '').'>'.$country.'</option>';
														}
													}
													?>
                      </select>
                    </div>
                  </div>
                  <div class="seops_grid_row">
                    <div class="seops_grid_272 seops_mr_16">
                      <p><?php _e('Latitude', 'seo-pressor') ?></p>
                      <input type="text" name="seops_attr[local][latitude]" value="<?= $data['seop_local_latitude'] ?>" placeholder="Eg: 37.387474" />
                    </div>
                    <div class="seops_grid_272">
                      <p><?php _e('Longitude', 'seo-pressor') ?></p>
                      <input type="text" name="seops_attr[local][longitude]" value="<?= $data['seop_local_longitude'] ?>" placeholder="Eg: -122.057543" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="seops_action">
                <a class="seops_update_local"><?php _e('Update', 'seo-pressor') ?></a>
              </div>
            </div>
            <div class="seops_sub_tab seops_hide">
            	<div class="seops_sub_tab_wrap">
              	<div class="seops_message seops_hide"></div>
                <p><?php _e('Website', 'seo-pressor'); ?></p>
                <div class="seops_grid_wrap">
                	<div class="seops_grid_row">
                  	<div class="seops_grid_272">
                    	<input type="text" name="seops_attr[local][website]" value="<?= $data['seop_local_website'] ?>" />
                    </div>
                  </div>
                </div>
                <p><?php _e('Contact Number', 'seo-pressor') ?> <span class="seops_color_red">*</span></p>
              	<div class="seops_contact_wrapper">
                	<div class="seops_grid_wrap">
										<?php
                    if( count($data['seop_local_contact']) > 0 )
                    {
											$first = true;
                      foreach($data['seop_local_contact'] as $row_contact)
                      {
                    ?>
	                    <div class="seops_grid_row">
                        <div class="seops_grid_192 seops_mr_8">
                          <select name="seops_attr[local][contact_type]">
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
                          <input type="text" name="seops_attr[local][contact]" value="<?= $row_contact['contact'] ?>" class="seops_prefix_field" />
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
                              <select name="seops_attr[local][contact_type]">
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
                              <input type="text" name="seops_attr[local][contact]" class="seops_prefix_field" />
                          </div>
                      </div>
                    <?php
	                  }
	                  ?>
                                <a class="seops_add_more"><?php _e('Add numbers', 'seo-pressor') ?></a>
                            </div>

                        </div>
						<div class="seops_grid_wrap">

                            <div class="seops_grid_row">
                                <div class="seops_grid_272 seops_mr_16">
                                	<p><?php _e('Fax', 'seo-pressor') ?></p>
                                    <div class="seops_prefix_wrap">
                                    	<span class="seops_prefix">+</span>
                                    	<input type="text" name="seops_attr[local][fax]" value="<?= $data['seop_local_fax'] ?>" class="seops_prefix_field" />
                                    </div>
                                </div>
                                <div class="seops_grid_272">
                                    <p><?php _e('Email', 'seo-pressor') ?></p>
                                    <input type="text" name="seops_attr[local][email]" value="<?= $data['seop_local_email'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seops_action">
                        <a class="seops_update_local"><?php _e('Update', 'seo-pressor') ?></a>
                    </div>
                </div>
                <div class="seops_sub_tab seops_hide">
                	<div class="seops_sub_tab_wrap">
                        <div class="seops_message seops_hide"></div>
                    	<p><?php _e('Opening Hours', 'seo-pressor') ?></p>
                    	<div class="seops_grid_wrap">
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Monday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_monday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Mo']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Mo']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_monday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Mo']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Mo']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Tuesday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_tuesday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Tu']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Tu']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_tuesday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
											echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Tu']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Tu']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Wednesday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_wednesday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['We']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['We']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_wednesday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['We']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['We']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Thursday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_thursday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                           echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Th']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Th']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_thursday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Th']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Th']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Friday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_friday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Fr']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Fr']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_friday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Fr']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Fr']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Saturday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_saturday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Sa']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Sa']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_saturday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Sa']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Sa']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                                <div class="seops_grid_90 seops_mt_8"><?php _e('Sunday', 'seo-pressor') ?></div>
                                <div class="seops_grid_224 seops_mr_16">
                                    <select name="seops_attr[local][opening_from_sunday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                           echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Su']['from'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Su']['from'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="seops_grid_auto seops_mr_16 seops_mt_8">-</div>
                                <div class="seops_grid_224">
                                    <select name="seops_attr[local][opening_to_sunday]">
                                    	<option value="">-</option>
                                        <?php
                                        for($i=0; $i<24; $i++)
                                        {
                                            echo '<option value="'.$i.':00" '.( $data['seop_operating_hour']['Su']['to'] == $i.':00' ? 'selected="selected"' : '' ).'>'.$i.':00</option>';
                                            echo '<option value="'.$i.':30" '.( $data['seop_operating_hour']['Su']['to'] == $i.':30' ? 'selected="selected"' : '' ).'>'.$i.':30</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="seops_action">
                        <a class="seops_update_local"><?php _e('Update', 'seo-pressor') ?></a>
                    </div>
                </div>
                <div class="seops_sub_tab seops_hide">
                	<div class="seops_sub_tab_wrap">
                    	<div class="seops_message seops_hide"></div>
                    	<div class="seops_grid_wrap">
                        	<div class="seops_grid_row">
                            	<div class="seops_grid_auto seops_mr_16">
                                	<span class="seops_s1 seops_mt_8">1</span>
                                </div>
                                <div class="seops_grid_512">
                                	<p><?php _e('Setup your local SEO settings.', 'seo-pressor') ?></p>
                                    <p><input name="seops_attr[local][complete_address]" type="checkbox" disabled="disabled" <?php if($complete_address) echo 'checked="checked"'; ?> /> <?php _e('Your business address', 'seo-pressor') ?> <span class="seops_color_red">*</span> - <a class="seops_local_switch_tab" data-index="0"><em class="seops_s8"><?php _e('Setup Now', 'seo-pressor') ?></em></a></p>
                                    <p><input name="seops_attr[local][complete_contact]" type="checkbox" disabled="disabled" <?php if($complete_contact) echo 'checked="checked"'; ?> /> <?php _e('Your business contact', 'seo-pressor') ?> <span class="seops_color_red">*</span> - <a class="seops_local_switch_tab" data-index="1"><em class="seops_s8"><?php _e('Setup Now', 'seo-pressor') ?></em></a></p>
                                    <p><input name="seops_attr[local][complete_operating]" type="checkbox" disabled="disabled" <?php if($complete_operating) echo 'checked="checked"'; ?> /> <?php _e('Your business operating hours (optional)', 'seo-pressor') ?> - <a class="seops_local_switch_tab" data-index="2"><em class="seops_s8"><?php _e('Setup Now', 'seo-pressor') ?></em></a></p>
                                </div>
                            </div>
                            <div class="seops_grid_row">
                            	<div class="seops_grid_auto seops_mr_16">
                                	<span class="seops_s1 seops_mt_8">2</span>
                                </div>
                                <div class="seops_grid_512">
                                	<p><?php _e('To publish your Local SEO, head over to WordPress Widget settings and insert SEOPressor’s Local SEO widget into your footer/sidebar.', 'seo-pressor') ?></p>
                                    <p><a class="seops_s5 seops_mr_8" href="<?php echo admin_url('widgets.php'); ?>"><?php _e('WordPress Widget', 'seo-pressor'); ?></a><a class="seops_s5" href="http://seopressor.com/setup-local-seo" target="_blank"><?php _e('Watch the tutorial', 'seo-pressor') ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
          	<div class="seops_p20">
              <div class="seops_message seops_hide"></div>
            	<p><?php _e('Enable XML Sitemap Generator','seo-pressor'); ?></p>
              <input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitemap][enable]" <?php if($data['seop_enable_sitemap'] == 1) echo 'checked="checked"'; ?> />
              <div class="seops_sitemap_info <?php if( $data['seop_enable_sitemap'] != 1 ) echo 'seops_hide'; ?>">
              	<div class="seops_sitemap_info_valid <?php if(!$hasSitemap) echo 'seops_hide'; ?>">
              		<p class="seops_s3"><?php _e('XML Sitemap URL: ', 'seo-pressor'); ?><a class="seops_sitemap_url" href="<?php if(isset($hasSitemap)) echo get_bloginfo('url').'/sitemap.xml'; ?>" target="_blank"><?php if(isset($hasSitemap)) echo get_bloginfo('url').'/sitemap.xml'; ?></a><br /><?php _e('Last updated on: ', 'seo-pressor') ?><span class="seops_sitemap_date"><?php if(isset($hasSitemap)) echo $sitemapCreationDate; ?></span></p>
                  <a class="seops_s4 seops_sitemap_info seops_update_sitemap"><?php _e('Re-generate XML Sitemap', 'seo-pressor') ?></a>
              	</div>
                <div class="seops_sitemap_info_invalid <?php if($hasSitemap) echo 'seops_hide'; ?>">
                	<p class="seops_s3"><?php _e('No sitemap generated yet.', 'seo-pressor') ?></p>
                </div>
              </div>
            </div>

            <div class="seops_p20 seops_bt_dashed">
            	<div class="seops_grid_wrap">
              	<div class="seops_grid_row">
                	<p><?php _e('XML Sitemap Update Frequency','seo-pressor'); ?></p>
                  <div class="seops_grid_192">
                    <select name="seops_attr[sitemap][frequency]">
                      <option value="1" <?php if($data['seop_sitemap_frequency'] == 1) echo 'selected="selected"'; ?>><?php _e('Always','seo-pressor'); ?></option>
                      <option value="2" <?php if($data['seop_sitemap_frequency'] == 2) echo 'selected="selected"'; ?>><?php _e('Hourly','seo-pressor'); ?></option>
                      <option value="3" <?php if($data['seop_sitemap_frequency'] == 3) echo 'selected="selected"'; ?>><?php _e('Daily','seo-pressor'); ?></option>
                      <option value="4" <?php if($data['seop_sitemap_frequency'] == 4) echo 'selected="selected"'; ?>><?php _e('Weekly','seo-pressor'); ?></option>
                    </select>
                  </div>
                </div>
              	<div class="seops_grid_row">
                	<p>Pages to be included into XML Sitemap</p>
                  <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitemap][enable_home]" <?php if($data['seop_sitemap_content_homepage'] == 1) echo 'checked="checked"'; ?> /> <?php _e('Homepage','seo-pressor'); ?></p>
                  <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitemap][enable_post]" <?php if($data['seop_sitemap_content_posts'] == 1) echo 'checked="checked"'; ?> /> <?php _e('Posts','seo-pressor'); ?></p>
                  <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitemap][enable_page]" <?php if($data['seop_sitemap_content_pages'] == 1) echo 'checked="checked"'; ?> /> <?php _e('Pages','seo-pressor'); ?></p>
                  <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitemap][enable_category]" <?php if($data['seop_sitemap_content_categories'] == 1) echo 'checked="checked"'; ?> /> <?php _e('Categories','seo-pressor'); ?></p>
                </div>
              </div>
            </div>
            <div class="seops_action">
              <a class="seops_update_sitemap"><?php _e('Update','seo-pressor'); ?></a>
            </div>
          </div>
        </div>
        <div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
            	<div class="seops_p20">
                	<div class="seops_message seops_hide"></div>
                    <div class="seops_grid_wrap">
                    	<div class="seops_grid_row">
                        	<p><?php _e('No-follow External Links:','seo-pressor'); ?> <span class="seops_tooltips" title=""><span><?php _e('Allow SEOPressor to automatically add rel="nofollow" to external links.','seo-pressor'); ?></span></span></p>
                            <input type="checkbox" class="seops_onoff_switch" name="seops_attr[link][external]" <?php if($data['seop_allow_no_follow_external_link'] == 1) echo 'checked="checked"'; ?> />
                        </div>
                        <div class="seops_grid_row">
                        	<p><?php _e('No-follow Image Links:','seo-pressor'); ?> <span class="seops_tooltips" title=""><span><?php _e('Allow SEOPressor to automatically add rel="nofollow" to external image links.','seo-pressor'); ?></span></span></p>
                    		<input type="checkbox" class="seops_onoff_switch" name="seops_attr[link][img]" <?php if($data['seop_allow_no_follow_img'] == 1) echo 'checked="checked"'; ?> />
                        </div>
                    </div>
                </div>
                <div class="seops_action">
                    <a class="seops_update_link"><?php _e('Update','seo-pressor'); ?></a>
                </div>
            </div>
        </div>

				<div class="seops_main_tab seops_hide">
        	<div class="seops_main_tab_wrap">
						<div class="seops_sub_switcher">
            	<a class="active"><?php _e('Facebook', 'seo-pressor') ?></a>
              <a><?php _e('Twitter', 'seo-pressor') ?></a>
            </div>
          	<div class="seops_sub_tab">
							<div class="seops_sub_tab_wrap">
								<div class="seops_message seops_hide"></div>
	              <div class="seops_grid_wrap">
									<div class="seops_grid_row">
										<p>Enable Sitewide Facebook Open Graph</p>
						        <p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitewide_social][enable_sitewide_fb]" <?php if($data['sitewide_fb_enable'] == 1) echo 'checked="checked"'; ?> /> </p>
									</div>
	              	<div class="seops_grid_row">
										<p>Type:</p>
						        <select name="seops_attr[sitewide_fb_type]">
						            <option value="Article" <?php if($data['sitewide_fb_type'] == "Article") echo 'selected="selected"'; ?>>Article</option>
						            <option value="Website" <?php if($data['sitewide_fb_type'] == "Website") echo 'selected="selected"'; ?>>Website</option>
						            <option value="Blog" <?php if($data['sitewide_fb_type'] == "Blog") echo 'selected="selected"'; ?>>Blog</option>
						        </select>
	                </div>
	                <div class="seops_grid_row">
										<p>URL <span class="seop_red">*</span></p>
				            <input name="seops_attr[sitewide_fb_url]" type="text" value="<?= $data['sitewide_fb_url'] ?>" />
	                </div>
									<div class="seops_grid_row">
										<p>Site Name</p>
				            <input name="seops_attr[sitewide_fb_site_name]" type="text" value="<?= $data['sitewide_fb_url'] ?>" />
									</div>
									<div class="seops_grid_row">
										<p>Title <span class="seop_red">*</span></p>
										<input name="seops_attr[sitewide_fb_title]" placeholder="Default title will be used if left blank." type="text" value="<?= $data['sitewide_fb_url'] ?>" />
									</div>
									<div class="seops_grid_row">
										<p>Image <span class="seop_red">*</span></p>
				            <div class="seop_sitewide_social_uploader_wrap">
				                <div class="seop_sitewide_social_uploader_image"></div>
				                <a class="seop_sitewide_social_uploader_remove seops_hide"></a>
				                <input type="hidden" name="seops_attr[sitewide_fb_img]" value="<?= $data['sitewide_fb_img'] ?>" />
				                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
				            </div>
									</div>
									<div class="seops_grid_row">
										<p>Description</p>
				            <textarea name="seops_attr[sitewide_fb_description]" placeholder="Briefly describe what your page is about."><?= $data['sitewide_fb_desc'] ?></textarea>
									</div>
									<div class="seops_grid_row">
										<p>Publisher</p>
				            <input name="seops_attr[sitewide_fb_publisher]" placeholder="Insert publisher's Facebook ID." type="text" value="<?= $data['sitewide_fb_publisher'] ?>" />
									</div>
									<div class="seops_grid_row">
										<p>Author</p>
				            <input name="seops_attr[sitewide_fb_author]" placeholder="Insert author's Facebook ID." type="text" value="<?= $data['sitewide_fb_author'] ?>" />
									</div>
									<div class="seops_grid_row">
										<p>FB Admin</p>
										<textarea class="seop_s2" name="seops_attr[sitewide_fb_admin]" placeholder="Insert admin(s) Facebook ID (seperate line by line)"><?= $data['sitewide_fb_admin'] ?></textarea>
									</div>
									<div class="seops_grid_row">
										<p>FB App ID</p>
				            <input name="seops_attr[sitewide_fb_appid]" placeholder="Insert your Facebook App ID." type="text" value="<?= $data['sitewide_fb_appid'] ?>" />
									</div>
	              </div>
							</div>
							<div class="seops_action">
	              <a class="seops_update_sitewide_social"><?php _e('Update','seo-pressor'); ?></a>
	            </div>
            </div>
						<div class="seops_sub_tab seops_hide">
							<div class="seops_sub_tab_wrap">
								<div class="seops_message seops_hide"></div>
	              <div class="seops_grid_wrap">
	              	<div class="seops_grid_row">
										<p>Enable Twitter Card</p>
										<p><input type="checkbox" class="seops_onoff_switch" name="seops_attr[sitewide_social][enable_sitewide_tw]" <?php if($data['sitewide_tw_enable'] == 1) echo 'checked="checked"'; ?> /> </p>
	                </div>
	                <div class="seops_grid_row">
										<p>Type:</p>
						        <select name="seops_attr[sitewide_tw_type]">
						            <option value="summary" <?php if($data['sitewide_tw_type'] == "summary") echo 'selected="selected"'; ?>>Summary</option>
						            <option value="summary_large_image" <?php if($data['sitewide_tw_type'] == "summary_large_image") echo 'selected="selected"'; ?>>Summary with Large Image</option>
						        </select>
	                </div>
									<div class="seops_grid_row">
										<p>Site <span class="seop_red">*</span></p>
										<div class="seops_prefix_wrap">
											<span class="seops_prefix">@</span>
												<input class="seops_prefix_field" name="seops_attr[sitewide_tw_site]" placeholder="Publisher's Twitter ID" type="text" value="<?= $data['sitewide_tw_site'] ?>" />
										</div>
									</div>
									<div class="seops_grid_row">
										<p>Creator</p>
										<div class="seops_prefix_wrap">
											<span class="seops_prefix">@</span>
												<input class="seops_prefix_field" name="seops_attr[sitewide_tw_creator]" placeholder="Author's Twitter ID" type="text" value="<?= $data['sitewide_tw_creator'] ?>" />
										</div>
									</div>
									<div class="seops_grid_row">
										<p>Title <span class="seop_red">*</span></p>
										<input name="seops_attr[sitewide_tw_title]" placeholder="Default title will be used if left blank." type="text" value="<?= $data['sitewide_tw_title'] ?>" />
									</div>
									<div class="seops_grid_row">
										<p>Description <span class="seop_red">*</span></p>
										<textarea name="seops_attr[sitewide_tw_description]" placeholder="Briefly describe what your page is about."><?= $data['sitewide_tw_desc'] ?></textarea>
									</div>
									<div class="seops_grid_row">
										<p>Image <span class="seop_red">*</span></p>
										<div class="seop_sitewide_social_uploader_wrap">
												<div class="seop_sitewide_social_uploader_image"></div>
												<a class="seop_sitewide_social_uploader_remove seops_hide"></a>
												<input type="hidden" name="seops_attr[sitewide_tw_img]" value="<?= $data['sitewide_tw_img'] ?>" />
												<?php _e('Pick From Gallery', 'seo-pressor'); ?>
										</div>
									</div>
	              </div>
							</div>
							<div class="seops_action">
	              <a class="seops_update_sitewide_social"><?php _e('Update','seo-pressor'); ?></a>
	            </div>
            </div>

          </div>
        </div>

        <?php endif; ?>
    </div>
</div>
