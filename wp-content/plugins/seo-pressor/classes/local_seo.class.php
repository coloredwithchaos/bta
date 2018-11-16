<?php

class Local_SEO_Widget extends WP_Widget {
	
	
	function __construct() {
		parent::__construct(
			'seops_local_seo', // Base ID
			__( 'SEOPressor: Local SEO', 'seo-pressor' ), // Name
			array( 'description' => __( 'Print your local SEO.', 'seo-pressor' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];
		
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		
		$settings = WPPostsRateKeys_Settings::get_options();
		if( isset($settings['seop_local_type']) && !empty($settings['seop_local_type']) )
		{
			
			if( empty($instance['exclude_css']) )
			{
				?>
                <style type="text/css">
				.seops_local_seo_widget { width:100%; display:inline-block; font-family:Arial, Helvetica, sans-serif; line-height:1.5; color:#444;}
				.seops_local_seo_widget h3 { color:#000; margin:0; font-size:18px;}
				.seops_local_seo_widget h4 { margin:0; font-size:14px;}
				.seops_local_seo_widget > div { padding:0; font-size:14px;}
				.seops_local_seo_widget p { margin:0; padding:10px 0 3px; font-size:14px; font-weight:bold;}
				</style>
                <?php
			}
			
			echo '<div itemscope itemtype="http://schema.org/'.$settings['seop_local_type'].'" ' . (empty($instance['exclude_css']) ? 'class="seops_local_seo_widget"' : '') . '>';
			
				if( isset($settings['seop_local_name']) && !empty($settings['seop_local_name']) )
					echo '<h3><span itemprop="name">' . esc_attr($settings['seop_local_name']) . '</span></h3>';
				
				if( isset($settings['seop_local_website']) && !empty($settings['seop_local_website']) )
					echo '<p>' . __( 'Website:', 'seo-pressor' ) . '</p><div itemprop="url">' . esc_attr($settings['seop_local_website']) . '</div>';
				
				echo '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
					echo '<p>'.__( 'Address:', 'seo-pressor' ) . '</p>';
					if( isset($settings['seop_local_address']) && !empty($settings['seop_local_address']) )
						echo ' <span itemprop="streetAddress">' . esc_attr($settings['seop_local_address']) . '</span>';
					if( isset($settings['seop_local_city']) && !empty($settings['seop_local_city']) )
						echo ' <span itemprop="addressRegion">' . esc_attr($settings['seop_local_city']) . ',</span>';
					if( isset($settings['seop_local_state']) && !empty($settings['seop_local_state']) )
						echo ' <span itemprop="addressRegion">' . esc_attr($settings['seop_local_state']) . ',</span>';
					if( isset($settings['seop_local_postcode']) && !empty($settings['seop_local_postcode']) )
						echo ' <span itemprop="postalCode">' . esc_attr($settings['seop_local_postcode']) . ',</span>';
					if( isset($settings['seop_local_country']) && !empty($settings['seop_local_country']) )
						echo ' <span itemprop="addressCountry">' . esc_attr($settings['seop_local_country']) . '.</span>';
				echo '</div>';
				
				echo '<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">';
					if( isset($settings['seop_local_latitude']) && !empty($settings['seop_local_latitude']) )
						echo '<span itemprop="latitude">' . __( '<strong>Latitude: </strong>', 'seo-pressor' ) . esc_attr($settings['seop_local_latitude']) . '</span><br/>';
					if( isset($settings['seop_local_longitude']) && !empty($settings['seop_local_longitude']) )
						echo '<span itemprop="longitude">' . __( '<strong>Longitude: </strong>', 'seo-pressor' ) . esc_attr($settings['seop_local_longitude']) . '</span>';
				echo '</div>';
				
				if( isset($settings['seop_local_email']) && !empty($settings['seop_local_email']) )
					echo '<p>' . __( 'Email:', 'seo-pressor' ) . '</p><div itemprop="email">' . esc_attr($settings['seop_local_email']) . '</div>';
				
				if( isset($settings['seop_local_fax']) && !empty($settings['seop_local_fax']) )
					echo '<p>' . __( 'Fax:', 'seo-pressor' ) . '</p><div itemprop="faxNumber">+' . esc_attr($settings['seop_local_fax']) . '</div>';

				if( isset($settings['seop_local_contact']) && count($settings['seop_local_contact']) > 0 )
				{
					echo '<p>' . __( 'Contact:', 'seo-pressor' ) . '</p>';
					foreach( $settings['seop_local_contact'] as $contact )
					{
						echo '<div itemprop="contactPoint" itemscope itemtype="http://schema.org/ContactPoint">';
							echo '<span itemprop="contactType">'.ucwords(esc_attr($contact['contact_type'])).': </span>';
							echo '<span itemprop="telephone">+'.esc_attr($contact['contact']).'</span>';
						echo '</div>';
					}
				}
				
				if( isset($settings['seop_operating_hour']) && count($settings['seop_operating_hour']) > 0 )
				{
					echo '<p>' . __( 'Opening Hours:', 'seo-pressor' ) . '</p>';
					foreach( $settings['seop_operating_hour'] as $key=>$day )
					{
						if( !empty($day['from']) && !empty($day['to']) )
							echo '<div itemprop="openingHours">'.$key.' '.$day['from'].'-'.$day['to'].'</div>';
					}
				}
			
			echo '</div>';
		}
				
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Local SEO', 'seo-pressor' );
		$exclude_css = ! empty( $instance['exclude_css'] ) ? $instance['exclude_css'] : __( '', 'seo-pressor' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p><label><input type="checkbox" name="<?php echo $this->get_field_name( 'exclude_css' ); ?>" <?php if( $exclude_css == 'yes' ) echo 'checked="checked"'; ?> value="yes"> Exclude default CSS for output</label></p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['exclude_css'] = ( ! empty( $new_instance['exclude_css'] ) ) ? strip_tags( $new_instance['exclude_css'] ) : '';

		return $instance;
	}

}
