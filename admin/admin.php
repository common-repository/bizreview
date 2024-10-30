<?php
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.2
  * @author     ThemeAtelier
  * @Websites: http://themeatelier.net
  *
  */
 
 class Bizreview_Settings_Page
{

    /**
     * Start up
     */
    public function __construct()
    {
		
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
		add_menu_page(
			esc_html__( 'BizReview', 'bizreview' ),
			esc_html__( 'BizReview', 'bizreview' ),
			'manage_options',
			'bizreview-setting-admin',
			array( $this, 'create_admin_page' ),
			'dashicons-star-filled',
			6
		);
        add_submenu_page('bizreview-setting-admin', __('👑 Upgrade to Pro!', 'bizreview'), sprintf('<span class="bizreview-get-pro-text">%s</span>', __('👑 Upgrade to Pro!', 'bizreview')), 'manage_options', 'http://1.envato.market/942x4');
    }

	
	/**
	 * Donor Admin Page Callback
	 */
    
    function page_init() {
        //register our settings
        register_setting( 'bizreview-plugin-settings-group', 'bizreview_options' );
    }


    /**
     * Options page callback
     */
    public function create_admin_page()
    {
		
        ?>
        <div class="bizreview-admin-wrap">

            <ul class="settings-menu">
				<li><a href="#admin_general" class="bizreview-tab"><?php esc_html_e( 'General', 'bizreview' ); ?></a></li>
				<li><a href="#admin_greview" class="bizreview-tab"><?php esc_html_e( 'Google Review', 'bizreview' ); ?></a></li>
				<li class="lite-menu"><a class="bizreview-tab"><?php esc_html_e( 'Facebook Review', 'bizreview' ); ?></a><span>Pro</span></li>
				<li class="lite-menu"><a class="bizreview-tab"><?php esc_html_e( 'Yelp Review', 'bizreview' ); ?></a><span>Pro</span></li>
                <li class="lite-menu"><a class="bizreview-tab"><?php esc_html_e( 'Custom Review', 'bizreview' ); ?></a><span>Pro</span></li>
			</ul>   

			<?php 
			// add error/update messages
	        
			// check if the user have submitted the settings
			if ( isset( $_GET['settings-updated'] ) ) {
			// add settings saved message with the class of "updated"
			add_settings_error( 'bizreview_messages', 'bizreview_message', __( 'Settings Saved', 'bizreview' ), 'updated' );
			}
			// show error/update messages
			settings_errors( 'bizreview_messages' );

            $bizrev_options = get_option( 'bizreview_options' );

			?>
            <form class="admin-bizreview" method="post" action="options.php">
			    <?php settings_fields( 'bizreview-plugin-settings-group' ); ?>
                <?php do_settings_sections( 'bizreview-plugin-settings-group' ); ?>

                <div id="admin_general" class="bizreview-admin-general bizr-active">
                    <div class="shortcode-generator">
                        <h2><?php esc_html_e( 'Shortcode Generator', 'bizreview' ); ?></h2>
                        <div class="scode-generator">
                            <select id="reviewtype">
                                <option value=""><?php esc_html_e( 'Select Review Type', 'bizreview' ); ?></option>
                                <option value="bizr_google_place"><?php esc_html_e( 'Google Review', 'bizreview' ); ?></option>
                            </select>
                            <select id="reviewcat">
                                <option value=""><?php esc_html_e( 'Select Custom Review Category', 'bizreview' ); ?></option>
                                <option value="google"><?php esc_html_e( 'Google Review', 'bizreview' ); ?></option>
                                <option value="custom"><?php esc_html_e( 'Custom Review', 'bizreview' ); ?></option>
                            </select>
                            <select id="gplaceinfo">
                                <option value=""><?php esc_html_e( 'Place Info', 'bizreview' ); ?></option>
                                <option value="show"><?php esc_html_e( 'Show', 'bizreview' ); ?></option>
                                <option value="hide"><?php esc_html_e( 'Hide', 'bizreview' ); ?></option>
                            </select>
                            <input type="text" id="gpid" placeholder="Google Place ID" name="placeid" />
                            <input type="number" id="max_rows" placeholder="Max Rows" value="5" name="max_rows" />
                            <input type="number" id="min_rating" placeholder="Min Rating" value="1" name="min_rating" />
                            <input type="number" id="padding_top" placeholder="Padding Top" value="50" name="padding_top" />
                            <input type="number" id="padding_bottom" placeholder="Padding Bottom" value="50" name="padding_bottom" />
                            <input type="text" id="bg_color" placeholder="Background Color" value="#fff" name="bg_color" />
                            <select id="bizstyle">
                                <option value=""><?php esc_html_e( 'Select Template Style', 'bizreview' ); ?></option>
                                <option value="1"><?php esc_html_e( 'Style 1 (Grid)', 'bizreview' ); ?></option>
                                <option value="2"><?php esc_html_e( 'Style 2 (Grid)', 'bizreview' ); ?></option>
                                <option value="3"><?php esc_html_e( 'Style 3 (Grid)', 'bizreview' ); ?></option>
                                <option value="4"><?php esc_html_e( 'Style 4 (Grid)', 'bizreview' ); ?></option>
                                <option value="5"><?php esc_html_e( 'Style 5 (Grid)', 'bizreview' ); ?></option>
                                <option value="6"><?php esc_html_e( 'Style 6 (Grid)', 'bizreview' ); ?></option>
                                <option value="7"><?php esc_html_e( 'Style 7 (Grid)', 'bizreview' ); ?></option>
                                <option value="8"><?php esc_html_e( 'Style 8 (Masonary)', 'bizreview' ); ?></option>
                                <option value="9"><?php esc_html_e( 'Style 9 (Slider)', 'bizreview' ); ?></option>
                                <option value="10"><?php esc_html_e( 'Style 10 (Slider)', 'bizreview' ); ?></option>
                                <option value="11"><?php esc_html_e( 'Style 11 (Slider)', 'bizreview' ); ?></option>
                                <option value="12"><?php esc_html_e( 'Style 12 (Slider)', 'bizreview' ); ?></option>
                                <option value="13"><?php esc_html_e( 'Style 13 (Slider)', 'bizreview' ); ?></option>
                                <option value="14"><?php esc_html_e( 'Style 14 (Slider)', 'bizreview' ); ?></option>
                            </select>
                            <div class="button-area">
                            <span id="scodegenerate"><?php esc_html_e( 'Generate', 'bizreview' ); ?></span>
                            <span id="scode-copy"><?php esc_html_e( 'Copy', 'bizreview' ); ?></span>
                            </div>
                        </div>
                        <div class="scode-show"></div>
                    </div>
                </div>
                <!-- Google Review -->
                <div id="admin_greview" class="bizreview-admin-greview bizr-hide">
                    <?php
                    $gookey = !empty( $bizrev_options['gookey'] ) ? $bizrev_options['gookey'] : '';
                    $gplaceid = !empty( $bizrev_options['gplaceid'] ) ? $bizrev_options['gplaceid'] : '';
                    ?>
                    <div class="bizreview-label bizreview-field-wrp">
                        <h5>Set Google Api Key</h5>
                        <input type="text" class="mt-8 input-control" name="bizreview_options[gookey]" value="<?php echo esc_html( $gookey ); ?>"/>
                    </div> 
                    <div class="bizreview-label bizreview-field-wrp">
                        <h5>Set Global Google Place ID</h5>
                        <input type="text" class="mt-8 input-control" name="bizreview_options[gplaceid]" value="<?php echo esc_html( $gplaceid ); ?>"/>
                    </div> 
                </div>
                <!-- Facebook Review -->
                <div id="admin_fbreview" class="bizreview-admin-fbreview bizr-hide">
                    <?php
                    $fbkey = !empty( $bizrev_options['fbkey'] ) ? $bizrev_options['fbkey'] : '';
                    ?>
                    <div class="bizreview-label bizreview-field-wrp">
                        <h5>Set Facebook Api Key</h5>
                        <input type="text" class="mt-8 input-control" name="bizreview_options[fbkey]" value="<?php echo esc_html( $fbkey ); ?>" />
                    </div> 
                </div>
                <!-- Yelp Review -->
                <div id="admin_yelpreview" class="bizreview-admin-yelpreview bizr-hide">
                    <?php
                    $yelpkey = !empty( $bizrev_options['yelpkey'] ) ? $bizrev_options['yelpkey'] : '';
                    ?>
                    <div class="bizreview-label bizreview-field-wrp">
                        <h5>Set Yelp Api Key</h5>
                        <input type="text" class="mt-8 input-control" name="bizreview_options[yelpkey]" value="<?php echo esc_html( $yelpkey ); ?>" />
                    </div> 
                </div>
            <?php
            // Save Button                    
            submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }
	
	
}

if( is_admin() )
    $bizreview_settings_page = new Bizreview_Settings_Page();

  