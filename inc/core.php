<?php 
/**
 * @package Cookie Accept
 * 
 * Kill session if accessed directly
 */
if ( !defined('ABSPATH') ) {
	die;
}


/**
 * Cookie Accept Core Class
 */
class Cookie_Accept_Core
{


	/**
	 *  Do the construct
	 */
	private static $run_this;
	public static function run_this() {
		if ( ! isset( self::$run_this ) ) {
			self::$run_this = new self;
		}
		return self::$run_this;
	}


	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_page') );
		add_action( 'admin_init', array( $this, 'display_options') );
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_enqueue_admin') );
		add_filter( 'plugin_action_links_'. COOKIE_ACCEPT_BASE, array( $this, 'action_links') );
		$this->_loader();
	}


	/**
	 * Load file packs.
	 */
	public function _loader() {

		require( COOKIE_ACCEPT_INC . '/frontend.php' );
		require( COOKIE_ACCEPT_INC . '/options.php' );
	}


    /**
     *  Add Option Page
     *  Put it as sub-menu of Option
     */
	function add_admin_page() {
		$backend = new Cookie_Accept_Options();
		add_submenu_page( 'options-general.php', 'Cookie Accept Settings', 'Cookie Accept', 'manage_options', 'cookie-accept', array( $backend, 'options') );
	}


	function action_links( $links ) {
		$links[] = '<a href="' . admin_url( 'options-general.php?page=cookie-accept' ) . '">Settings</a>';
		return array_merge( $links );
	}


	/**
	 * Enqueue on Back End.
	 */
	function wp_enqueue_admin($hook) {
		if ('settings_page_cookie-accept' != $hook) {
			return;
		}
		wp_enqueue_style ( 'cookie-accept-opt', COOKIE_ACCEPT_URI . 'assets/css/options.css', false, '012' );

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'cookie-accept-admin', COOKIE_ACCEPT_URI . 'assets/js/admin.min.js', null, false, true ); 
 
    		// Custom CSS
		global $_wp_admin_css_colors; 
		$admin_color = get_user_option( 'admin_color' ); 
		$colors = $_wp_admin_css_colors[$admin_color]->colors; 
		if ($admin_color == 'light') { 
			$the_color = $colors[3]; 
		} else if ($admin_color == 'modern') { 
			$the_color = $colors[1]; 
		} else if ($admin_color == 'blue') { 
			$the_color = $colors[0]; 
		} else if ($admin_color == 'midnight') { 
			$the_color = $colors[3]; 
		} else { 
			$the_color = $colors[2]; 
		}
		
 
        $custom_css = "
			.cookie-accept-style label>span::before{
			    background-color: $the_color;
			}
			.cookie-accept-align label>span{
			    color: $the_color;
			}
			.cookie-accept-btn-style label>span::before{
			    background-color: $the_color;
			}
			.cookie-accept-btn-style label>span.plain::before{
			    color: $the_color;
			}
			.cookie-accept-icon.selected{
			    color: $the_color;
			}
			.label#cookie_accept_live_preview_label input:checked + span.toggle-round{
			    background-color: $the_color;
			    border-color: $the_color;
			}
			label#cookie_accept_live_preview_label input:checked + span.toggle-round::before{
			    box-shadow: 0 0 0 1px $the_color;
			}
	    ";
 
		// get data from database, an array data
		$ca_data = get_option("cookie_accept_data");

		if ( $ca_data ) {
        	$custom_css .= "
        	.cookie-consent-notice { 
        		padding: ". $ca_data['box']['padding']['top'] ."px ". $ca_data['box']['padding']['right'] ."px ". $ca_data['box']['padding']['bottom'] ."px ". $ca_data['box']['padding']['left'] ."px;
        		width: 100%;"; 
	 	if ($ca_data['box']['font']['size'] != 'blank') {
	 		$custom_css .= "font-size: ". $ca_data['box']['font']['size'] ."px; ";
	 	}
	 	if ($ca_data['box']['font']['family'] != '') {
	 		$custom_font_family = htmlspecialchars_decode($ca_data['box']['font']['family'], ENT_QUOTES);
	 		$custom_css .= "font-family: ". $custom_font_family ."; ";
	 	}
        	$custom_css .= "
				background-color: ". $ca_data['box']['color']['light']['bg'] .";
				color: ". $ca_data['box']['color']['light']['txt'] .";
        	}
        	.cookie-consent-notice.dark { 
				background-color: ". $ca_data['box']['color']['dark']['bg'] .";
				color: ". $ca_data['box']['color']['dark']['txt'] .";
        	}
			.cookie-consent-notice .consent-container a {
				color: ". $ca_data['box']['color']['light']['lnk'] .";
				background-color: transparent;
			}
			.cookie-consent-notice.dark .consent-container a {
				color: ". $ca_data['box']['color']['dark']['lnk'] .";
			}
        	.cookie-consent-notice .consent-container button { 
        		padding: ". $ca_data['btn']['padding']['top'] ."px ". $ca_data['btn']['padding']['left'] ."px;
        	}
			.cookie-consent-notice .consent-container button { 
				background-color: ". $ca_data['box']['color']['light']['acc'] .";
				color: ". $ca_data['box']['color']['light']['s_acc'] .";
			}
			.cookie-consent-notice.dark .consent-container button { 
				background-color: ". $ca_data['box']['color']['dark']['acc'] .";
				color: ". $ca_data['box']['color']['dark']['s_acc'] .";
			}
			.cookie-consent-notice .consent-container button.plain {
				color: ". $ca_data['box']['color']['light']['lnk'] .";
				background-color: transparent;
			}
			.cookie-consent-notice.dark .consent-container button.plain {
				color: ". $ca_data['box']['color']['dark']['lnk'] .";
			}
			.cookie-consent-notice .consent-container button:focus {
				box-shadow: 0 0 2px 3px ". $ca_data['box']['color']['light']['txt'] .", 0 0 4px 4px". $ca_data['box']['color']['dark']['acc'] .";
			}
			.cookie-consent-notice.dark .consent-container button:focus {
				box-shadow: 0 0 2px 3px ". $ca_data['box']['color']['dark']['txt'] .", 0 0 4px 4px ". $ca_data['box']['color']['dark']['acc'] .";
			}
        	@media (min-width: 816px) {
				.cookie-consent-notice.down-left {
					left: ". $ca_data['dist']['down']['left'] ."px;
					bottom: ". $ca_data['dist']['down']['bottom'] ."px;
					border-radius: ". $ca_data['box']['radius'] ."px;
        			width: ". $ca_data['box']['width'] ."px;
				}
				.cookie-consent-notice.down-right {
					right: ". $ca_data['dist']['down']['right'] ."px;
					bottom: ". $ca_data['dist']['down']['bottom'] ."px;
					border-radius: ". $ca_data['box']['radius'] ."px;
       				width: ". $ca_data['box']['width'] ."px;
				}
				.cookie-consent-notice.fullwidth {
					left: ".$ca_data['dist']['full']['left']."px;
					right: ".$ca_data['dist']['full']['right']."px;
					bottom: ".$ca_data['dist']['full']['bottom']."px;
				}
			}
	    	";
	    }
        wp_add_inline_style( 'cookie-accept-opt', $custom_css );
	}


    /**
     *  Set settings fields inside form.
     */
    function cookie_accept_sanitize_data( $data ){
    	$updatedData = [];

		foreach ( $data as $key => $value ) {
			if ( $key == 'main_txt' || $key == 'accept_label' ) {
				$newstr = strip_tags( $value,"<b><strong><em><s><strike><i><cite><code>" );
				$updatedData[$key] = $newstr;
				continue;
			}
			if ( $key == 'box' ) {
				$updatedBox = [];
				foreach ( $value as $k => $v ) {
					if ($k == 'width') {
						$newV = (int) $v;
						if ($newV < 175) {
							$newV = 175;
						}
						$updatedBox[$k] = (string) $newV;
						continue;
					}
					if ($k == 'font') {
						$updatedFont = [];
						foreach ( $v as $font_key => $font_value ) {
							if ($font_key == 'size') {
								if ($font_value != 'blank') {
									$font_value = filter_var($font_value, FILTER_SANITIZE_NUMBER_INT);
								}
							}
							if ($font_key == 'family') {
								if ($font_value != '') {
									$font_value = filter_var($font_value, FILTER_SANITIZE_STRING);
								}
							}
							$updatedFont = array_merge($updatedFont, [$font_key => $font_value]);
						}
						$updatedBox[$k] =  $updatedFont;
						continue;
					}
					$updatedBox = array_merge($updatedBox, [$k => $v]);
				}
				$updatedData[$key] = $updatedBox;
				continue;
			}
			$updatedData = array_merge($updatedData, [$key => $value]);
		}
		return $updatedData;
    }


    /**
     *  Set settings fields inside form.
     */
    function display_options(){
        register_setting( "cookie-accept_options-default", "cookie_accept_data", array('sanitize_callback' => array( $this, 'cookie_accept_sanitize_data' ) ) );
    }


}
Cookie_Accept_Core::run_this();
