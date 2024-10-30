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
 * Cookie Accept Frontend Class
 */
final class Cookie_Accept_Frontend
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
		$this->check();
	}


	/**
	 * Load Cookie if not accepted
	 */
	function cookie_name() {

		$url = site_url( '', null );
		$opening = array('http://', 'https://');
		$newUrl = '';

		foreach($opening as $d) {
			if(strpos($url, $d) === 0) {
				$newUrl = str_replace($d, '', $url);
			}
		}
		if (strpos($newUrl, '-') !== false) {
			$newUrl = str_replace("-", '--', $newUrl);
		}
		if (strpos($newUrl, '/') !== false) {
			$newUrl = str_replace("/", '_', $newUrl);
		}
		if (strpos($newUrl, '.') !== false) {
			$newUrl = str_replace(".", '-', $newUrl);
		}

		$cookieName = "wp_cookie_accept_". $newUrl;

		return $cookieName;

	}


	/**
	 * Load Cookie if not accepted yet
	 */
	function check() {

		if (isset($_COOKIE['wp_cookie_accept'])) {
			add_action( 'wp_footer', array( $this, 'unset_old') );
		}

		$cookieName = $this->cookie_name();

		if ( !isset($_COOKIE[$cookieName]) ){
			add_action( 'wp_head', array( $this, 'css') );
			add_action( 'wp_footer', array( $this, 'notice') );
		}

	}


	/**
	 * Load Cookie Consent and script
	 */
	function unset_old() {
	?>
<script>
	// remove old cookie
	document.cookie = "wp_cookie_accept=accepted;expires=Sun, 20 Aug 1990 12:00:00 UTC;path=<?php echo COOKIEPATH; ?>";
</script>
	<?php

	}


	/**
	 * Load Cookie Consent and script
	 */
	function notice() {
		// Load some default data here
		$ca_box_main_txt 	= __( '<strong>This website use cookies</strong> to personalize content and provide website features. You have the right to disable cookies at the browser level, though this may impact your experience.', 'cookie-accept' ); // main text content of the box
		$ca_accept_btn_lbl 	= __( 'Accept Cookies', 'cookie-accept' ); // label for 'accept' button
		$ca_use_pp 			= 'off'; // Use privacy policy page
		$ca_pp_link_lbl 	= 'Privacy Policy'; // Privacy policy page link Label
		$ca_use_icon 		= 'off'; // Use icon
		$ca_icon 			= 'cookie-big-chips-double-bite-heavy'; // The icon

		// get data from database, an array data
		$ca_data = get_option("cookie_accept_data");
		
		if ( $ca_data ) {
			// if data exist, replace all the data
			if ( !empty($ca_data['main_txt']) ) { 
				$ca_box_main_txt = $ca_data['main_txt']; // main text content of the box 
			}
			if ( !empty($ca_data['accept_label']) ) { 
				$ca_accept_btn_lbl 	= $ca_data['accept_label']; // label for 'accept' button
			}
			if ( array_key_exists('use', $ca_data['pp']) ) {
				$ca_use_pp 			= $ca_data['pp']['use']; // Use privacy policy page
				$ca_pp_link_lbl 	= $ca_data['pp']['label']; // Privacy policy page link Label
			}
			if ( array_key_exists('icon', $ca_data) ) {
				if ( array_key_exists('use', $ca_data['icon']) ) {
					$ca_use_icon 	= $ca_data['icon']['use']; // Use icon
				}
				$ca_icon 			= $ca_data['icon']['choice']; // The icon
			}
		}

	?>
<div id="cookie-consent-notice" class="cookie-consent-notice">
<?php if ($ca_use_icon == 'on') { ?>
	<div id="consent-icon"><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/'. $ca_icon .'.svg' ); ?></div>
<?php } ?>
	<div class="consent-container">
		<p><?php 
		echo $ca_box_main_txt;
		if( $ca_use_pp == 'on' ){ 
			$policy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );
			if ( !empty( $policy_page_id ) && get_post_status( $policy_page_id ) === 'publish' ) { ?>
				<a href="<?php echo get_privacy_policy_url(); ?>"><?php echo $ca_pp_link_lbl; ?></a>
        	<?php }
	    }
		?></p>
		<p><button id="accept-cookies"><?php echo $ca_accept_btn_lbl; ?></button></p>
		<?php 
	     ?>
	</div>
</div>
<script>document.getElementById("accept-cookies").addEventListener("click", function () { var dateNew = new Date(); dateNew.setTime(dateNew.getTime() + ( 10 * 365 * 24 * 60 * 60 * 1000 )); var expireTime = "expires=" + dateNew.toUTCString(); document.getElementById("cookie-consent-notice").classList.add("accepted"); document.cookie = "<?php echo $this->cookie_name(); ?>=accepted;" + expireTime + ";path=<?php echo COOKIEPATH; ?>"; }); </script>
	<?php

	}


	/**
	 * Load Cookie CSS
	 */
	function css() {

		// Set all default data here
		$ca_style 			= 'down-left'; // style position
		$ca_dist_d_left 	= 48; // distance from left for down vew
		$ca_dist_d_right 	= 48; // distance from right for down vew
		$ca_dist_d_bottom 	= 48; // distance from bottom for down vew
		$ca_dist_f_left 	= 0; // distance from left for fullwidth vew
		$ca_dist_f_right 	= 0; // distance from right for fullwidth vew
		$ca_dist_f_bottom 	= 0; // distance from bottom for fullwidth vew
		$ca_box_radius 		= 8; // box radius
		$ca_box_padd_top 	= 24; // padding right of box
		$ca_box_padd_left 	= 20; // padding left of box
		$ca_box_padd_right 	= 20; // padding right of box
		$ca_box_padd_bott 	= 24; // padding bottom of box
		$ca_box_width 		= 445; // box width
		$ca_btn_style 		= 'boxround'; // button style
		$ca_btn_padd_top 	= 12; // padding right of button
		$ca_btn_padd_left 	= 24; // padding left of button

		$ca_mode 			= 'light'; // color mode
		$ca_box_clr_l_ac	= '#00b358'; // color for accent in light mode
		$ca_box_clr_l_sac	= '#ffffff'; // color for side accent in light mode
		$ca_box_clr_d_ac	= '#00b358'; // color for accent in dark mode
		$ca_box_clr_d_sac	= '#ffffff'; // color for side accent in dark mode
		$ca_box_clr_l_txt	= '#444444'; // color for box text in light mode
		$ca_box_clr_l_bg	= '#ffffff'; // color for box background in light mode
		$ca_box_clr_l_lnk	= '#444444'; // color for box link text in light mode
		$ca_box_clr_d_txt	= '#eeeeee'; // color for box text in dark mode
		$ca_box_clr_d_bg	= '#121314'; // color for box background in dark mode
		$ca_box_clr_d_lnk	= '#eeeeee'; // color for box link text in dark mode

		$ca_use_pp 			= 'off'; // Use privacy policy page

		$ca_box_align		= 'center'; // text-align
		$ca_box_font_size	= 16; // font-size
		$ca_box_font_family	= ''; // font-family

		// get data from database, an array data
		$ca_data = get_option("cookie_accept_data");
		
		if ( $ca_data ) {
			// if data exist, replace all the data
			$ca_style 			= $ca_data['box']['style']; // style position
			$ca_dist_d_left 	= $ca_data['dist']['down']['left']; // distance from left for down vew
			$ca_dist_d_right 	= $ca_data['dist']['down']['right']; // distance from right for down vew
			$ca_dist_d_bottom 	= $ca_data['dist']['down']['bottom']; // distance from bottom for down vew
			$ca_dist_f_left 	= $ca_data['dist']['full']['left']; // distance from left for fullwidth vew
			$ca_dist_f_right 	= $ca_data['dist']['full']['right']; // distance from right for fullwidth vew
			$ca_dist_f_bottom 	= $ca_data['dist']['full']['bottom']; // distance from bottom for fullwidth vew
			$ca_box_radius 		= $ca_data['box']['radius']; // box radius
			$ca_box_padd_top 	= $ca_data['box']['padding']['top']; // box padding
			$ca_box_padd_left 	= $ca_data['box']['padding']['left']; // box padding
			$ca_box_padd_right 	= $ca_data['box']['padding']['right']; // box padding
			$ca_box_padd_bott 	= $ca_data['box']['padding']['bottom']; // box padding
			$ca_box_width 		= $ca_data['box']['width']; // box width
			$ca_btn_style 		= $ca_data['btn']['style']; // distance from bottom for fullwidth vew
			$ca_btn_padd_top 	= $ca_data['btn']['padding']['top']; // distance from bottom for fullwidth vew
			$ca_btn_padd_left 	= $ca_data['btn']['padding']['left']; // distance from bottom for fullwidth vew

			$ca_mode 			= $ca_data['mode']; // color mode
			$ca_box_clr_l_ac	= $ca_data['box']['color']['light']['acc']; // color for accent in light mode
			$ca_box_clr_l_sac	= $ca_data['box']['color']['light']['s_acc']; // color for side accent in light mode
			$ca_box_clr_d_ac	= $ca_data['box']['color']['dark']['acc']; // color for accent in dark mode
			$ca_box_clr_d_sac	= $ca_data['box']['color']['dark']['s_acc']; // color for side accent in dark mode
			$ca_box_clr_l_txt	= $ca_data['box']['color']['light']['txt']; // color for box text in light mode
			$ca_box_clr_l_bg	= $ca_data['box']['color']['light']['bg']; // color for box background in light mode
			$ca_box_clr_l_lnk	= $ca_data['box']['color']['light']['lnk']; // color for box link text in light mode
			$ca_box_clr_d_txt	= $ca_data['box']['color']['dark']['txt']; // color for box text in dark mode
			$ca_box_clr_d_bg	= $ca_data['box']['color']['dark']['bg']; // color for box background in dark mode
			$ca_box_clr_d_lnk	= $ca_data['box']['color']['dark']['lnk']; // color for box link text in dark mode

			if ( array_key_exists('use', $ca_data['pp']) ) {
				$ca_use_pp 			= $ca_data['pp']['use']; // Use privacy policy page
			}

			$ca_box_align		= $ca_data['box']['align']; // text-align
			$ca_box_font_size	= $ca_data['box']['font']['size']; // font-size
			$ca_box_font_family	= $ca_data['box']['font']['family']; // font-family
		}


	$final_css = 			"body { overflow-x: hidden; width: 100%; } ";

	// .cookie-consent-notice
	$final_css .= 			".cookie-consent-notice { ";
	$final_css .= 				"width: 100%; ";
	$final_css .= 				"position: fixed; ";
	$final_css .= 				"box-sizing: border-box; ";
	$final_css .= 				"box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2); ";
	$final_css .= 				"z-index: 10; ";
	$final_css .= 				"opacity: 1; ";
	$final_css .= 				"bottom: 0; ";
	if ($ca_box_font_size != 'blank') {
		$final_css .= 			"font-size: ".$ca_box_font_size."px; ";
	}
	if ($ca_box_font_family != '') {
	 	$custom_font_family = html_entity_decode($ca_box_font_family, ENT_QUOTES);
		$final_css .= 			"font-family: ".$custom_font_family."; ";
	}
	$final_css .= 				"line-height: 1.6; ";
	$final_css .= 				"padding: ".$ca_box_padd_top."px ".$ca_box_padd_right."px ".$ca_box_padd_bott."px ".$ca_box_padd_left."px; ";
	if ($ca_mode == 'dark') {
		// dark
		$final_css .= 			"background-color: ".$ca_box_clr_d_bg."; ";
		$final_css .= 			"color: ".$ca_box_clr_d_txt."; ";
	} else {
		// light
		$final_css .= 			"background-color: ".$ca_box_clr_l_bg."; ";
		$final_css .= 			"color: ".$ca_box_clr_l_txt."; ";
	}
	$final_css .= 				"text-align: ".$ca_box_align."; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice svg
	$final_css .= 			".cookie-consent-notice svg { ";
	$final_css .= 				"fill: currentColor; ";
	if ($ca_box_align == 'left') {
		$final_css .= 			"margin-left: -4px; ";
	} else if ($ca_box_align == 'right') {
		$final_css .= 			"margin-right: -4px; ";
	}
	$final_css .= 				"margin-bottom: 8px; ";
	if ($ca_mode == 'dark') {
		// dark
		$final_css .= 			"color: ".$ca_box_clr_d_txt."; ";
	} else {
		// light
		$final_css .= 			"color: ".$ca_box_clr_l_txt."; ";
	}
	$final_css .= 			"} ";

	// .cookie-consent-notice.accepted
	$final_css .= 			".cookie-consent-notice.accepted { ";
	$final_css .= 				"bottom: 100%; ";
	$final_css .= 				"opacity: 0; ";
	$final_css .= 				"transition: opacity 1s, bottom 4s linear; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container
	$final_css .= 			".cookie-consent-notice .consent-container { ";
	$final_css .= 				"display: grid; ";
	$final_css .= 				"grid-template-columns: auto; ";
	$final_css .= 				"width: 100%; ";
	$final_css .= 				"margin: 0 auto; ";
	$final_css .= 				"grid-gap: 0.5em 1.5em; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container p
	$final_css .= 			".cookie-consent-notice .consent-container p { ";
	$final_css .= 				"margin: 0; ";
	$final_css .= 				"font-size: 1em; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container a
	$final_css .= 			".cookie-consent-notice .consent-container a { ";
	$final_css .= 				"background-color: transparent; ";
	$final_css .= 				"text-decoration: underline; ";
	$final_css .= 				"font-size: 1em; ";
	if ($ca_mode == 'dark') {
		// dark
		$final_css .= 			"color: ".$ca_box_clr_d_lnk."; ";
	} else {
		// light
		$final_css .= 			"color: ".$ca_box_clr_l_lnk."; ";
	}
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container a:hover, .cookie-consent-notice .consent-container a:focus
	$final_css .= 			".cookie-consent-notice .consent-container a:hover, ";
	$final_css .= 			".cookie-consent-notice .consent-container a:focus { ";
	$final_css .= 				"text-decoration: none; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container button
	$final_css .= 			".cookie-consent-notice .consent-container button { ";
	$final_css .= 				"justify-self: center; ";
	$final_css .= 				"border: none; ";
	$final_css .= 				"width: auto; ";
	$final_css .= 				"padding: ".$ca_btn_padd_top."px ".$ca_btn_padd_left."px; ";
	$final_css .= 				"margin: 8px 0; ";
	$final_css .= 				"cursor: pointer; ";
	$final_css .= 				"opacity: 1; ";
	if ($ca_box_font_family != '') {
	 	$custom_font_family = html_entity_decode($ca_box_font_family, ENT_QUOTES);
		$final_css .= 			"font-family: ".$custom_font_family."; ";
	}
	$final_css .= 				"font-size: 1em; ";
	$final_css .= 				"font-weight: normal; ";
	if ($ca_btn_style == 'rounded') {
		// rounded
		$final_css .= 			"border-radius: 40px; ";
		if ($ca_box_align == 'left') {
			$final_css .= 		"margin-left: -3px; ";
		} else if ($ca_box_align == 'right') {
			// boxround
			$final_css .= 		"margin-right: -3px; ";
		}
	} else if ($ca_btn_style == 'boxround') {
		// boxround
		$final_css .= 			"border-radius: 4px; ";
	} else if ($ca_btn_style == 'boxed') {
		// boxed
		$final_css .= 			"border-radius: 0px; ";
	} else {
		// plain text
		$final_css .= 			"background-color: transparent; ";
		$final_css .= 			"text-decoration: underline; ";
		$final_css .= 			"border-radius: 0px; ";
	}
	if ($ca_mode == 'dark') {
		// dark
		if ($ca_btn_style == 'plain') {
			// plain
			$final_css .= 		"color: ".$ca_box_clr_d_lnk."; ";
		} else {
			// not plain
			$final_css .= 		"background-color: ".$ca_box_clr_d_ac."; ";
			$final_css .= 		"color: ".$ca_box_clr_d_sac."; ";
		}
	} else {
		// light
		if ($ca_btn_style == 'plain') {
			// plain
			$final_css .= 		"color: ".$ca_box_clr_l_lnk."; ";
		} else {
			// not plain
			$final_css .= 		"background-color: ".$ca_box_clr_l_ac."; ";
			$final_css .= 		"color: ".$ca_box_clr_l_sac."; ";
		}
	}
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container button:focus, .cookie-consent-notice .consent-container button:hover
	$final_css .= 			".cookie-consent-notice .consent-container button:focus, ";
	$final_css .= 			".cookie-consent-notice .consent-container button:hover { ";
	$final_css .= 				"opacity: 0.8; ";
	$final_css .= 				"text-decoration: none; ";
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container button:focus
	$final_css .= 			".cookie-consent-notice .consent-container button:focus { ";
	$final_css .= 				"outline: none; ";
	if ($ca_mode == 'dark') {
		// dark
		$final_css .= 			"box-shadow: 0 0 2px 3px ".$ca_box_clr_d_bg.", 0 0 4px 4px ".$ca_box_clr_d_ac."; ";
	} else {
		// light
		$final_css .= 			"box-shadow: 0 0 2px 3px ".$ca_box_clr_l_bg.", 0 0 4px 4px ".$ca_box_clr_l_ac."; ";
	}
	$final_css .= 			"} ";
	$final_css .= 		"";


	// Now for large screen
	$final_css .= 		"@media (min-width: 816px) { ";

	// .cookie-consent-notice
	$final_css .= 			".cookie-consent-notice { ";
	if ($ca_style == 'down-left') {
		// down left
		$final_css .= 			"width: ".$ca_box_width."px; ";
		$final_css .= 			"left: ".$ca_dist_d_left."px; ";
		$final_css .= 			"bottom: ".$ca_dist_d_bottom."px; ";
		$final_css .= 			"border-radius: ".$ca_box_radius."px; ";
		$final_css .= 			"box-shadow: 0 -1px 50px rgba(0, 0, 0, 0.2); ";
	} else if ($ca_style == 'down-right') {
		// down right
		$final_css .= 			"width: ".$ca_box_width."px; ";
		$final_css .= 			"right: ".$ca_dist_d_right."px; ";
		$final_css .= 			"bottom: ".$ca_dist_d_bottom."px; ";
		$final_css .= 			"border-radius: ".$ca_box_radius."px; ";
		$final_css .= 			"box-shadow: 0 -1px 50px rgba(0, 0, 0, 0.2); ";
	} else {
		// fullwidth
		$final_css .= 			"display: flex; ";
		$final_css .= 			"gap: 2rem; ";

		if ($ca_box_align == 'right') {
			$final_css .= 		"flex-direction: row-reverse; ";
		}		        
						                
		$final_css .= 			"left: ".$ca_dist_f_left."px; ";
		$final_css .= 			"right: ".$ca_dist_f_right."px; ";
		$final_css .= 			"bottom: ".$ca_dist_f_bottom."px; ";
		$final_css .= 			"border-radius: 0; ";
		$final_css .= 			"width: auto; ";
		$final_css .= 			"box-shadow: 0 -1px 50px rgba(0, 0, 0, 0.2); ";
	}
	$final_css .= 			"} ";

	if ($ca_style == 'fullwidth') {
	// .cookie-consent-notice svg
		$final_css .= 		".cookie-consent-notice svg { ";
		$final_css .= 			"margin-left: 0; ";
		$final_css .= 			"margin-bottom: 0; ";
		$final_css .= 		"} ";
	}

	// .cookie-consent-notice.accepted
	$final_css .= 			".cookie-consent-notice.accepted { ";
	$final_css .= 				"box-shadow: 0 -1px 50px rgba(0, 0, 0, 0.2); ";
	if ($ca_style == 'down-left') {
		// down left
		$final_css .= 			"left: 100%; ";
		$final_css .= 			"bottom: ".$ca_dist_d_bottom."px; ";
		$final_css .= 			"transition: opacity 2s, left 5s linear; ";
	} else if ($ca_style == 'down-right') {
		// down right
		$final_css .= 			"right: 100%; ";
		$final_css .= 			"bottom: ".$ca_dist_d_bottom."px; ";
		$final_css .= 			"transition: opacity 2s, right 5s linear; ";
	} else {
		// fullwidth
		$final_css .= 			"bottom: 100%; ";
	}
	$final_css .= 			"} ";

	// .cookie-consent-notice .consent-container
	if ($ca_style == 'fullwidth') {
		// fullwidth
		$final_css .= 		".cookie-consent-notice .consent-container{ ";
		$final_css .= 			"grid-template-columns: auto auto; ";
		$final_css .= 			"align-items: center; ";
		$final_css .= 		"} ";
	}


	$final_css .= 		"}";

	echo "<style>".$final_css."</style>";
	}

}

Cookie_Accept_Frontend::run_this();
