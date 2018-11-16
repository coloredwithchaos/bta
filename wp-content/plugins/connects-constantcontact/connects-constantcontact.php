<?php
/**
* Plugin Name: Connects - Constant Contact Addon
* Plugin URI: 
* Description: Use this plugin to integrate Constant Contact with Connects.
* Version: 2.2.0
* Author: Brainstorm Force
* Author URI: https://www.brainstormforce.com/
* License: http://themeforest.net/licenses
*/


if(!class_exists('Smile_Mailer_Constantcontact')){

	class Smile_Mailer_Constantcontact{
	
		//Class variables
		private $slug;
		private $setting;
		
		/*
		 * Function Name: __construct
		 * Function Description: Constructor
		 */
		
		function __construct(){
			require_once( 'lib/class.cc.php' );
			add_action( 'wp_ajax_get_constantcontact_data', array($this,'get_constantcontact_data' ));
			add_action( 'wp_ajax_update_constantcontact_authentication', array($this,'update_constantcontact_authentication' ));
			add_action( 'admin_init', array( $this, 'enqueue_scripts' ) );
			add_action( 'wp_ajax_disconnect_constantcontact', array($this,'disconnect_constantcontact' ));
			add_action( 'wp_ajax_constantcontact_add_subscriber', array($this,'constantcontact_add_subscriber' ));
			add_action( 'wp_ajax_nopriv_constantcontact_add_subscriber', array($this,'constantcontact_add_subscriber' ));
			$this->setting  = array(
				'name' => 'Constant Contact',
				'parameters' => array(),
				'where_to_find_url' => 'https://developer.constantcontact.com/api-keys.html',
				'logo_url' => plugins_url('images/logo.png', __FILE__)
			);
			$this->slug = 'constantcontact';
		}
		
		/*
		 * Function Name: enqueue_scripts
		 * Function Description: Add custon scripts
		 */
		
		function enqueue_scripts() {
			if( function_exists( 'cp_register_addon' ) ) {
				cp_register_addon( $this->slug, $this->setting );
			}
			wp_register_script( $this->slug.'-script', plugins_url('js/'.$this->slug.'-script.js', __FILE__), array('jquery'), '1.1', true );
			wp_enqueue_script( $this->slug.'-script' );
			add_action( 'admin_head', array( $this, 'hook_css' ) );
		}

		/*
		 * Function Name: hook_css
		 * Function Description: Adds background style script for mailer logo.
		 */
		function hook_css() {
			if( isset( $this->setting['logo_url'] ) ) {
				if( $this->setting['logo_url'] != '' ) {
					$style = '<style>table.bsf-connect-optins td.column-provider.'.$this->slug.'::after {background-image: url("'.$this->setting['logo_url'].'");}.bend-heading-section.bsf-connect-list-header .bend-head-logo.'.$this->slug.'::before {background-image: url("'.$this->setting['logo_url'].'");}</style>';
					echo $style;
				}
			}	
		}
		
		/*
		 * Function Name: get_constantcontact_data
		 * Function Description: Get constantcontact input fields
		 */
		 
		function get_constantcontact_data() {

			if ( ! current_user_can( 'access_cp' ) ) {
	
				die(-1);
			}

			$isKeyChanged = false;

			$connected = false;
			ob_start();

			//$constantcontact_api = get_option($this->slug.'_api_key');
			$constantcontact_username = get_option($this->slug.'_username');
			$constantcontact_password = get_option($this->slug.'_password');

            if( $constantcontact_username != '' && $constantcontact_password != '' ) {
            	try{
            		$ccObj = new cp_cc( $constantcontact_username, $constantcontact_password );
	            	//$ccObj->set_api_key( $constantcontact_api );
	            	$lists = $ccObj->get_all_lists();
	            	if( $ccObj->http_response_code == 401 ) {
	            		$formstyle = '';
						$isKeyChanged = true;
	            	} else {
	            		$formstyle = 'style="display:none;"';
	            	}
            	} catch( Exception $ex ) {
            		$formstyle = '';
					$isKeyChanged = true;
            	}
	            	
            } else {
            	$formstyle = '';
            }
            ?>

	        <div class="bsf-cnlist-form-row" <?php echo $formstyle; ?>>
				<label for="cp-list-name" ><?php _e( $this->setting['name'] . " Username", "smile" ); ?></label>
            	<input type="text" autocomplete="off" id="<?php echo $this->slug; ?>_username" name="<?php echo $this->slug; ?>_username" value="<?php echo esc_attr( $constantcontact_username ); ?>"/>
	        </div>

	        <div class="bsf-cnlist-form-row" <?php echo $formstyle; ?>>
				<label for="cp-list-name" ><?php _e( $this->setting['name'] . " Password", "smile" ); ?></label>
            	<input type="password" autocomplete="off" id="<?php echo $this->slug; ?>_password" name="<?php echo $this->slug; ?>_password" value="<?php echo esc_attr( $constantcontact_password ); ?>"/>
	        </div>

            <div class="bsf-cnlist-form-row <?php echo $this->slug; ?>-list">
	            <?php
	            if( $constantcontact_username != '' && $constantcontact_password != '' && !$isKeyChanged ) {
	            	$constantcontact_lists = $this->get_constantcontact_lists( $constantcontact_username, $constantcontact_password );

					if( !empty( $constantcontact_lists ) ){
						$connected = true;
					?>
					<label for="<?php echo $this->slug; ?>-list"><?php echo __( "Select List", "smile" ); ?></label>
					<select id="<?php echo $this->slug; ?>-list" class="bsf-cnlist-select" name="<?php echo $this->slug; ?>-list">
					<?php
						foreach($constantcontact_lists as $id => $name) {
					?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
					<?php
						}
					?>
					</select>
					<?php
					} else {
					?>
						<label for="<?php echo $this->slug; ?>-list"><?php echo __( "You need at least one list added in " . $this->setting['name'] . " before proceeding.", "smile" ); ?></label>
					<?php
					}
	            }
		        ?>
            </div>

            <div class="bsf-cnlist-form-row">
            	<?php if( $constantcontact_username == "" ) { ?>
	            	<button id="auth-<?php echo $this->slug; ?>" class="button button-secondary auth-button" disabled><?php _e( "Authenticate " . $this->setting['name'], "smile" ); ?></button><span class="spinner" style="float: none;"></span>
	            <?php } else {
	            		if( $isKeyChanged ) {
	            ?>
	            	<div id="update-<?php echo $this->slug; ?>" class="update-mailer" data-mailerslug="<?php echo $this->setting['name']; ?>" data-mailer="<?php echo $this->slug; ?>"><span><?php _e( "Your credentials seems to be changed.</br>Use different '" . $this->setting['name'] . "' credentials?", "smile" ); ?></span></div><span class="spinner" style="float: none;"></span>
	            <?php
	            		} else {
	            ?>
	            	<div id="disconnect-<?php echo $this->slug; ?>" class="button button-secondary" data-mailerslug="<?php echo $this->setting['name']; ?>" data-mailer="<?php echo $this->slug; ?>"><span><?php _e( "Use different '" . $this->setting['name'] . "' account?", "smile" ); ?></span></div><span class="spinner" style="float: none;"></span>
	            <?php
	            		}
	            ?>
	            <?php } ?>
	        </div>

            <?php
            $content = ob_get_clean();

            $result['data'] = $content;
            $result['helplink'] = esc_url( $this->setting['where_to_find_url'] );
            $result['isconnected'] = $connected;
            echo json_encode($result);
            exit();
        }
	
		/*
		 * Function Name: update_constantcontact_authentication
		 * Function Description: Update constantcontact values to ConvertPlug
		 */
		function update_constantcontact_authentication() {
			$post = $_POST;
			if ( ! current_user_can( 'access_cp' ) ) {
				die(-1);
			}
			$data = array();
			$constantcontact_username = sanitize_text_field( $_POST['constantcontact_username'] );
			$constantcontact_password = sanitize_text_field( $_POST['constantcontact_password'] );

			if( $constantcontact_username == "" ){
				print_r(json_encode(array(
					'status' => "error",
					'message' => __( "Please provide valid Username for your " . $this->setting['name'] . " account.", "smile" )
				)));
				exit();
			}
			if( $constantcontact_password == "" ){
				print_r(json_encode(array(
					'status' => "error",
					'message' => __( "Please provide valid Password for your " . $this->setting['name'] . " account.", "smile" )
				)));
				exit();
			}
			ob_start();
			try{
				$ccObj = new cp_cc( $constantcontact_username, $constantcontact_password );
	        	//$ccObj->set_api_key( $constantcontact_api );
	        	$campaigns = $ccObj->get_all_lists();
			} catch( Exception $ex ){
				print_r(json_encode(array(
					'status' => "error",
					'message' => $ccObj->http_get_response_code_error( $ccObj->http_response_code )
				)));
				exit();
			}
			
			if( $ccObj->http_response_code == 200 )  {
				if( $campaigns == '' ) {
					 print_r(json_encode(array(
	                    'status' => "error",
	                    'message' => __( "You have zero lists in your " . $this->setting['name'] . " account. You must have at least one list before integration." , "smile" )
	                )));
	                exit();
				}

				if( $campaigns != '' ) {
					$query = '';
				?>
				<label for="<?php echo $this->slug; ?>-list">Select List</label>
				<select id="<?php echo $this->slug; ?>-list" class="bsf-cnlist-select" name="<?php echo $this->slug; ?>-list">
				<?php
					foreach ($campaigns as $key => $cm) {
						$query .= $cm['id'].'|'.$cm['Name'].',';
						$constContact_lists[$cm['id']] = $cm['Name'];
				?>
					<option value="<?php echo $cm['id']; ?>"><?php echo $cm['Name']; ?></option>
				<?php
					}
				?>
				</select>
				<input type="hidden" id="mailer-all-lists" value="<?php echo $query; ?>"/>
				<input type="hidden" id="mailer-list-action" value="update_<?php echo $this->slug; ?>_list"/>
				<div class="bsf-cnlist-form-row">
					<div id="disconnect-<?php echo $this->slug; ?>" class="" data-mailerslug="<?php echo $this->setting['name']; ?>" data-mailer="<?php echo $this->slug; ?>">
						<span>
							<?php _e( "Use different '" . $this->setting['name'] . "' account?", "smile" ); ?>
						</span>
					</div>
					<span class="spinner" style="float: none;"></span>
				</div>
				<?php
				} else {
				?>
					<label for="<?php echo $this->slug; ?>-list"><?php echo __( "You need at least one list added in " . $this->setting['name'] . " before proceeding.", "smile" ); ?></label>
				<?php
				}

			} else {
				print_r(json_encode(array(
					'status' => "error",
					'message' => $ccObj->http_get_response_code_error( $ccObj->http_response_code )
				)));
				exit();
			}
			
			$html = ob_get_clean();

			//update_option( $this->slug.'_api_key', $constantcontact_api );
			update_option( $this->slug.'_username', $constantcontact_username );
			update_option( $this->slug.'_password', $constantcontact_password );
			update_option( $this->slug.'_lists', $constContact_lists );

			print_r(json_encode(array(
				'status' => "success",
				'message' => $html
			)));

			exit();
		}		
		
		/*
		 * Function Name: constantcontact_add_subscriber
		 * Function Description: Add subscriber
		 */
		function constantcontact_add_subscriber() {
			
			$ret = true;
			$email_status = false;
            $style_id = isset( $_POST['style_id'] ) ? esc_attr( $_POST['style_id'] ) : '';
            $contact = array_map( 'sanitize_text_field', wp_unslash( $_POST['param'] ) );
            $list_id = isset( $_POST['list_id'] ) ? esc_attr( $_POST['list_id'] ) : '';
            $contact['source'] = ( isset( $_POST['source'] ) ) ? $_POST['source'] : '';
            $msg = isset( $_POST['message'] ) ? sanitize_text_field( $_POST['message'] ) : __( 'Thanks for subscribing. Please check your mail and confirm the subscription.', 'smile' );
			$optinvar   = get_option( 'convert_plug_debug' );
            $d_optin    = isset($optinvar['cp-double-optin']) ? $optinvar['cp-double-optin'] : 1;
            $sub_def_action = isset( $optinvar['cp-post-sub-action'] ) ? $optinvar['cp-post-sub-action'] : 'process_success';

            if( $style_id !==''){
            	check_ajax_referer( 'cp-submit-form-'.$style_id );
        	}

            if ( is_user_logged_in() && current_user_can( 'access_cp' ) ) {
                $default_error_msg = __( 'THERE APPEARS TO BE AN ERROR WITH THE CONFIGURATION.', 'smile' );
            } else {
                $default_error_msg = __( 'THERE WAS AN ISSUE WITH YOUR REQUEST. Administrator has been notified already!', 'smile' );
            }

			//	Check Email in MX records
			if( isset( $contact['email'] ) ) {
                $email_status = ( !( isset( $_POST['only_conversion'] ) ? true : false ) ) ? apply_filters('cp_valid_mx_email', $contact['email'] ) : false;
            }

			$constantcontact_username = get_option( 'constantcontact_username' );
			$constantcontact_password = get_option( 'constantcontact_password' );
			
			if( $email_status ) {
				if( function_exists( "cp_add_subscriber_contact" ) ){
					$isuserupdated = cp_add_subscriber_contact( '' , $contact );
				}

				if ( !$isuserupdated ) {  // if user is updated dont count as a conversion
					// update conversions 
					smile_update_conversions( $style_id );
				}
				if( isset( $contact['email'] ) ) {
					$status = 'success';
                    $errorMsg = '';					
					try {
						$ccObj = new cp_cc( $constantcontact_username, $constantcontact_password );

						unset( $contact['source'] );

			        	foreach( $contact as $key => $p ) {
	                        if( $key != 'email' && $key != 'user_id' && $key != 'date' ){
	                        	$custom_fields[$key] = $p;
	                        }
	                    }
	                    
	                    $ccObj->set_action_type('contact');	

	                    //check if contact is already present or not
	                    $existing_contact = $ccObj->get_contacts();
	                    $existing_in_camp_user = false;
	                    $updated_all = false;
	                    $existing_list = false;
	                    $ex_id = $ch_id = '';

	                    //check if contact present already
	                   	$ch_contact = $ccObj->query_contacts($contact['email']);
	                   	if( $ch_contact ){
	                    	$ch_id = $ch_contact['id']; 
	                    	$existing_in_camp_user = true; 
	                    	$ex_id = $ch_id;
	                    } 	                 
	                   
	                   	if( $existing_in_camp_user ){                   		
	                   			
							try{
								$get_contact_info = $ccObj->get_contact($ch_id);
			                    $contact_list_id = $get_contact_info['lists'];
			                   if ( !in_array( $list_id, $contact_list_id ) )
								{
								   array_push($contact_list_id, $list_id) ; 
								}else{
									$existing_list = true;
								}

								$ccObj->update_contact( $ch_id ,$_POST['param']['email'], $contact_list_id, isset( $custom_fields ) ? $custom_fields : array() );
								
								if ( $existing_list && $sub_def_action !== 'process_success' ) {	
									$ccObj->http_response_code = '409';
								}
								
							}catch ( Exception $ex ) {}
							
						} else {
							$ccObj->create_contact( $contact['email'], isset( $contact['FirstName'] ) ? $contact['FirstName'] : '', array( 0 => $list_id ), isset( $custom_fields ) ? $custom_fields : array() );
						}						
					
					} catch ( Exception $ex ) {
						if( isset( $_POST['source'] ) ) {
			        		return false;
			        	} else {
			        		if ( is_user_logged_in() && current_user_can( 'access_cp' ) ) {
				                $detailed_msg = $ccObj->http_response_error;
				            } else {
				                $detailed_msg = '';
				            }
				            
			        		print_r(json_encode(array(
								'action' => ( isset( $_POST['message'] ) ) ? 'message' : 'redirect',
								'email_status' => $email_status,
								'status' => 'error',
								'message' => $default_error_msg,
								'detailed_msg' => $detailed_msg,
								'url' => ( isset( $_POST['message'] ) ) ? 'none' : esc_url( $_POST['redirect'] ),
							)));
							exit();
			        	}
					}
					
					if( $ccObj->http_response_code != 201 )  {
						if( $ccObj->http_response_code == 409 ) {							
							//	Show message for already subscribed users
							$optinvar =	get_option( 'convert_plug_settings' );
							
	                        $msg = ( $optinvar['cp-default-messages'] ) ? isset( $optinvar['cp-already-subscribed']) ? stripslashes( $optinvar['cp-already-subscribed'] ) : __( 'Already Subscribed!', 'smile' ) : __( 'Already Subscribed!', 'smile' );
						
						} else if( $ccObj->http_response_code == 204 && $existing_in_camp_user) {
							//	Show message for already subscribed users							
	                        $msg = isset( $_POST['message'] ) ? sanitize_text_field( $_POST['message'] ) : __( 'Thanks for subscribing. Please check your mail and confirm the subscription.', 'smile' );
							$ret = true;
							$status = 'success';							
						} else {
							$error_code = $error_msg = '';
							$error_code = $ccObj->http_response_error;
							if($ccObj->http_response_code == 400){
								$error_code =  __('Provided List is not present', 'smile' );
							}

							$ret = false;
							$status = 'error';
							$msg = $default_error_msg;
							$errorMsg = $error_code;
						}
					}
				}
			} else {

				if( isset( $_POST['only_conversion'] ) ? true : false ){
					// update conversions 
					$status = 'success';
					smile_update_conversions( $style_id );
					$ret = true;
				} else if( isset( $_POST['param']['email'] ) ) {
                    $msg = ( isset( $_POST['msg_wrong_email']  )  && $_POST['msg_wrong_email'] !== '' ) ? sanitize_text_field( $_POST['msg_wrong_email'] ) : __( 'Please enter correct email address.', 'smile' );
                    $status = 'error';
                    $ret = false;
                } else if( !isset( $contact['email'] ) ) {
                    //$msg = __( 'Something went wrong. Please try again.', 'smile' );
                    $msg  = $default_error_msg;
                    $errorMsg = __( 'Email field is mandatory to set in form.', 'smile' );
                    $status = 'error';
                }
			}

			if ( is_user_logged_in() && current_user_can( 'access_cp' ) ) {
                $detailed_msg = $errorMsg;
            } else {
                $detailed_msg = '';
            }

            if( $detailed_msg !== '' && $detailed_msg !== null ) {
                $page_url = isset( $_POST['cp-page-url'] ) ? esc_url( $_POST['cp-page-url'] ) : '';

                // notify error message to admin
                if( function_exists('cp_notify_error_to_admin') ) {
                    $result   = cp_notify_error_to_admin($page_url);
                }
            }

			if( isset( $_POST['source'] ) ) {
        		return $ret;
        	} else {
        		print_r(json_encode(array(
					'action' => ( isset( $_POST['message'] ) ) ? 'message' : 'redirect',
					'email_status' => $email_status,
					'status' => $status,
					'message' => $msg,
					'detailed_msg' => $detailed_msg,
					'url' => ( isset( $_POST['message'] ) ) ? 'none' : esc_url( $_POST['redirect'] ),
				)));

				exit();
        	}
		}
		
		/*
		 * Function Name: disconnect_constantcontact
		 * Function Description: Disconnect current Constant Contact from wp instance
		 */
		
		function disconnect_constantcontact() {

			//delete_option( 'constantcontact_api_key' );
			delete_option( 'constantcontact_username' );
			delete_option( 'constantcontact_password' );
						
			$smile_lists = get_option('smile_lists');			
			if( !empty( $smile_lists ) ){ 
				foreach( $smile_lists as $key => $list ) {
					$provider = $list['list-provider'];
					if( strtolower( $provider ) == strtolower( $this->slug ) ){
						$smile_lists[$key]['list-provider'] = "Convert Plug";
						$contacts_option = "cp_" . $this->slug . "_" . preg_replace( '#[ _]+#', '_', strtolower( $list['list-name'] ) );
                        $contact_list = get_option( $contacts_option );
                        $deleted = delete_option( $contacts_option );
                        $status = update_option( "cp_connects_" . preg_replace( '#[ _]+#', '_', strtolower( $list['list-name'] ) ), $contact_list );
					}
				}
				update_option( 'smile_lists', $smile_lists );
			}			
			
			print_r(json_encode(array(
                'message' => "disconnected",
			)));
			exit();
		}

		/*
		 * Function Name: get_constantcontact_lists
		 * Function Description: Get Constant Contact Mailer Campaign list
		 */

		function get_constantcontact_lists( $constantcontact_username = '', $constantcontact_password = '' ) {
			if( $constantcontact_username != '' && $constantcontact_password != '' ) {

				$ccObj = new cp_cc( $constantcontact_username, $constantcontact_password );
	        	//$ccObj->set_api_key( $constantcontact_api );
	        	$campaigns = $ccObj->get_all_lists();
	        	
				if( $ccObj->http_response_code == 200 )  {
					$lists = array();
					foreach($campaigns as $offset => $cm) {
						$lists[$cm['id']] = $cm['Name'];
					}
					return $lists;
				} else {
					return array();
				}
			} else {
				return array();
			}
		}
	}
	new Smile_Mailer_Constantcontact;	
}