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
 * Cookie Accept Options Class
 */
final class Cookie_Accept_Options
{


    /**
     *  This is for plugin settings page
     */
	function options() {

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

		$ca_box_main_txt 	= __( '<strong>This website use cookies</strong> to personalize content and provide website features. You have the right to disable cookies at the browser level, though this may impact your experience.', 'cookie-accept' ); // main text content of the box
		$ca_accept_btn_lbl 	= __( 'Accept Cookies', 'cookie-accept' ); // label for 'accept' button
		$ca_use_pp 			= 'off'; // Use privacy policy page
		$ca_pp_link_lbl 	= 'Privacy Policy'; // Privacy policy page link Label
		$ca_use_icon 		= 'off'; // Use icon
		$ca_icon 			= 'cookie-big-chips-double-bite-heavy'; // The icon

		$ca_box_align		= 'center'; // text-align
		$ca_box_font_size	= 'blank'; // font-size
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

			if ( !empty($ca_data['main_txt']) ) { 
				$ca_box_main_txt 	= $ca_data['main_txt']; // main text content of the box 
			}
			if ( !empty($ca_data['accept_label']) ) { 
				$ca_accept_btn_lbl 	= $ca_data['accept_label']; // label for 'accept' button
			}
			if ( array_key_exists('use', $ca_data['pp']) ) {
				$ca_use_pp 			= $ca_data['pp']['use']; // Use privacy policy page
			}
			if ( !empty($ca_data['pp']['label']) ) { 
				$ca_pp_link_lbl 	= $ca_data['pp']['label']; // Privacy policy page link Label
			}
			if ( array_key_exists('icon', $ca_data) ) {
				if ( array_key_exists('use', $ca_data['icon']) ) {
					$ca_use_icon 	= $ca_data['icon']['use']; // Use icon
				}
				$ca_icon 			= $ca_data['icon']['choice']; // The icon
			}
			$ca_box_align		= $ca_data['box']['align']; // text-align
			$ca_box_font_size	= $ca_data['box']['font']['size']; // font-size
			$ca_box_font_family	= $ca_data['box']['font']['family']; // font-family
		}

		?>
		<div id="cookie-accept-wrapper" class="wrap">
            <header id="page-options-header" class="page-options-header container">
                <h1><?php echo __( 'Cookie Accept Settings', 'default' ); ?></h1>
            </header>
                <form id="cookie-accept-options-form" method="post" action="options.php" class="use <?php if($ca_use_icon == 'on'){echo 'icon';} ?>">
                    <noscript><p class="warning noscript">Javascript is required to make live preview work.</p></noscript>
				    <table class="form-table live-preview-set">
				        <tbody>
				            <tr>
				                <th scope="row" id="cookie_accept_live_preview_title" class="live"><label for="cookie_accept_live_preview">Live Preview </label></th>
				                <td id="core">
				                    <fieldset>
				                        <legend class="screen-reader-text"><span>Check for Live Preview</span></legend>
				                        <p><label id="cookie_accept_live_preview_label" for="cookie_accept_live_preview">
				                            <input type="checkbox" name="cookie_accept_live_preview" id="cookie_accept_live_preview" <?php if ( isset($_COOKIE['accept_cookie_preview']) && $_COOKIE['accept_cookie_preview'] == 'show' ){ echo 'checked'; } ?>><span class="toggle-round"></span> Live preview on this settings page.
				                        </label></p>
				                        <p class="description">It is just a preview, and it is not 100% accurate. On front-end, your theme could also have control over your site element's style.</p>
				                    </fieldset>
				                </td>
				            </tr>
				        </tbody>
				    </table>
                    <?php

                        // add_settings_section callback is displayed here. For every new section we need to call settings_fields.
                        settings_fields("cookie-accept_options-default");
                        
                        // The page where fields belongs to. All the add_settings_field callbacks is also displayed here.
                        // do_settings_sections("cookie-accept");
                    
                        
                    ?>          
	                <div class="options-tab-head">
	                	<div id="tabs-head">
							<span tabindex="0" id="cookie-accept-basic" class="tab-head<?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'basic' ){ echo ' current'; } ?>" data-tab="basic" data-focus="cookie_accept_text_consent">Content</span>
							<!-- <span tabindex="0" id="cookie-accept-advan" class="tab-head<?php// if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'advance' ){ echo ' current'; } ?>" data-tab="advance" data-focus="">Advance Content</span> -->
							<span tabindex="0" id="cookie-accept-typogr" class="tab-head<?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'typogr' ){ echo ' current'; } ?>" data-tab="typogr" data-focus="cookie_accept_font_size">Typography</span>
							<span tabindex="0" id="cookie-accept-layout" class="tab-head<?php if ( !isset($_COOKIE['cookie_accept_tab']) || $_COOKIE['cookie_accept_tab'] == 'layout' ){ echo ' current'; } ?>" data-tab="layout" data-focus="cookie_a_style_downleft">Layout</span>
							<span tabindex="0" id="cookie-accept-colors" class="tab-head<?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'colors' ){ echo ' current'; } ?>" data-tab="colors" data-focus="cookie_a_mode_light">Colors</span>
	                	</div>
	                	<div class="save"><?php submit_button( __('Save Changes'), 'small', 'submit-form', false, array( 'id' => 'ca-tab-head-save') ); ?> </div>
	                </div>
	                <div id="tab-body-basic" class="tab-body <?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'basic' ){ echo ' current'; } ?>">
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-basic"></span>
	                	<noscript><h2>Basic</h2></noscript>
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_text_consent">Consent Text</label> </th>
		                            <td>
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Text</span></legend>
		                                    <textarea name="cookie_accept_data[main_txt]" id="cookie_accept_text_consent" cols="30" rows="5"><?php echo $ca_box_main_txt; ?></textarea>
		                                    <!-- <p class="description">Some HTML tags allowed. Like &lt;b&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;s&gt;, &lt;strike&gt;, &lt;i&gt;, &lt;cite&gt;, and &lt;code&gt;</p> -->
		                                </fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_text_button">Accept Button Label</label></th>
		                            <td id="accept-button-fields">
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Accept Cookie Button Label</span></legend>
		                                    <!-- <label for="cookie_accept_text_button">Label</label> <br> -->
		                                    <input type="text" id="cookie_accept_text_button" name="cookie_accept_data[accept_label]" value="<?php echo $ca_accept_btn_lbl; ?>">
		                                </fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_policy_page">Privacy Policy</label></th>
		                            <td id="privacy-policy-settings" class="<?php echo $ca_use_pp; ?>">
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Links to Privacy Policy Page</span></legend>
					                        <p><label for="cookie_accept_policy_use">
					                            <input type="checkbox" name="cookie_accept_data[pp][use]" id="cookie_accept_policy_use" <?php if( $ca_use_pp == 'on' ){ echo "checked"; } ?> > Show Your Privacy Policy Page Link.
					                        </label></p>
					                        <?php 
					                        $policy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );
					                        $pp_warn = 'good';
					                        if ( empty( $policy_page_id ) ) {
					                        	// it is empty, show warning
					                        	$pp_warn = 'warn';
					                        	$privacy_edit_link = admin_url( 'options-privacy.php', 'admin' );
					                        	echo "<p class='warning'>";
					                        	echo __( "Your Privacy Policy Page are not set yet." );
					                        	echo " <a href='". $privacy_edit_link ."'>";
					                        	echo __( "Set it here" );
					                        	echo "</a></p>";
					                        } else {
					                        	// it is not empty, continue
					                        	if ( get_post_status( $policy_page_id ) !== 'publish' ) {
					                        		// Wait. it is not published, show warning
					                        		$pp_warn = 'warn';
						                        	echo "<p class='warning'>";
						                        	echo __( "Your Privacy Policy Page are not published." );
						                        	echo " <a href='". get_edit_post_link( $policy_page_id ) ."'>";
						                        	echo __( "Edit here" );
						                        	echo "</a></p>";
					                        	}
					                        }
					                        ?>
		                                </fieldset>
		                                <fieldset class="sub <?php echo($pp_warn); ?>">
		                                    <legend class="screen-reader-text"><span>Link Label Text</span></legend>
		                                    <label for="cookie_accept_policy_link_text"><strong>Link Label</strong></label> <br>
		                                    <input type="text" id="cookie_accept_policy_link_text" name="cookie_accept_data[pp][label]" value="<?php echo $ca_pp_link_lbl; ?>">
		                                </fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_icon_use">Consent Icon</label></th>
		                            <td id="icon-settings" class="<?php echo $ca_use_icon; ?>">
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Use icon on the consent.</span></legend>
					                        <p><label for="cookie_accept_icon_use">
					                            <input type="checkbox" name="cookie_accept_data[icon][use]" id="cookie_accept_icon_use" <?php if( $ca_use_icon == 'on' ){ echo "checked"; } ?> > Use icon on the cookie consent.
					                        </label></p>
		                                </fieldset>
								        <fieldset class="cookie-accept-icon-list">
								        	<label><strong>Icons</strong></label><br>
								            <legend class="screen-reader-text"><span>Icons</span></legend>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-accept' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-accept" <?php if( $ca_icon == 'cookie-accept' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-accept.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-big-bite-crumbs' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-big-bite-crumbs" <?php if( $ca_icon == 'cookie-big-bite-crumbs' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-big-bite-crumbs.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-big-chips-bite' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-big-chips-bite" <?php if( $ca_icon == 'cookie-big-chips-bite' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-big-chips-bite.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-big-chips-double-bite-heavy' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-big-chips-double-bite-heavy" <?php if( $ca_icon == 'cookie-big-chips-double-bite-heavy' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-big-chips-double-bite-heavy.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-big-chips-double-bite-light' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-big-chips-double-bite-light" <?php if( $ca_icon == 'cookie-big-chips-double-bite-light' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-big-chips-double-bite-light.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-cute-tetric' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-cute-tetric" <?php if( $ca_icon == 'cookie-cute-tetric' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-cute-tetric.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon duo <?php if( $ca_icon == 'cookie-double' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-double" <?php if( $ca_icon == 'cookie-double' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-double.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-hepta-chip' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-hepta-chip" <?php if( $ca_icon == 'cookie-hepta-chip' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-hepta-chip.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-hex-light' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-hex-light" <?php if( $ca_icon == 'cookie-hex-light' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-hex-light.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-moon-heavy' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-moon-heavy" <?php if( $ca_icon == 'cookie-moon-heavy' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-moon-heavy.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-multi-bite' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-multi-bite" <?php if( $ca_icon == 'cookie-multi-bite' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-multi-bite.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-octa-heavy' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-octa-heavy" <?php if( $ca_icon == 'cookie-octa-heavy' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-octa-heavy.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-rich-chips-bite' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-rich-chips-bite" <?php if( $ca_icon == 'cookie-rich-chips-bite' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-rich-chips-bite.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-single-bite' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-single-bite" <?php if( $ca_icon == 'cookie-single-bite' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-single-bite.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-triple-bite-crumbs-heavy' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-triple-bite-crumbs-heavy" <?php if( $ca_icon == 'cookie-triple-bite-crumbs-heavy' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-triple-bite-crumbs-heavy.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-triple-bite-crumbs-light' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-triple-bite-crumbs-light" <?php if( $ca_icon == 'cookie-triple-bite-crumbs-light' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-triple-bite-crumbs-light.svg' ); ?>
												</label>
											</div>
											<div class="cookie-accept-icon <?php if( $ca_icon == 'cookie-triple-bite-heavy' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_icon" name="cookie_accept_data[icon][choice]" value="cookie-triple-bite-heavy" <?php if( $ca_icon == 'cookie-triple-bite-heavy' ){ echo "checked='checked'"; } ?>><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/cookie-triple-bite-heavy.svg' ); ?>
												</label>
											</div>
								            <p class="description"><?php _e( 'All icons listed are free for commercial use. No attribution required.', 'cookie-accept' ); ?></p>
								        </fieldset>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		                <span tabindex="0" class="auto-skip" data-focus="cookie-accept-typogr"></span>
	                </div>
<!-- 	                <div id="tab-body-advance" tabindex="0" class="tab-body <?php // if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'advance' ){ echo ' current'; } ?>">
	                	cookie-names <br>
	                	show custom <br>

	                	<?php // submit_button( 'Save Changes', 'primary', 'submit-form' ); ?>
	                </div>
 -->
 					<div id="tab-body-typogr" class="tab-body <?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'typogr' ){ echo ' current'; } ?>">
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-typogr"></span>
	                	<noscript><h2>Typography</h2></noscript>
	                	<p class="message">Make your live preview typography match with frontend. And tweak it.</p>
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_text_consent">Font Size</label> </th>
		                            <td>
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Font Size</span></legend>
		                                    <select name="cookie_accept_data[box][font][size]" id="cookie_accept_font_size">
												<option value="blank" <?php if( $ca_box_font_size == 'blank' ){ echo "selected"; } ?>> </option>
												<option value="13" <?php if( $ca_box_font_size == '13' ){ echo "selected"; } ?>>13</option>
												<option value="14" <?php if( $ca_box_font_size == '14' ){ echo "selected"; } ?>>14</option>
												<option value="15" <?php if( $ca_box_font_size == '15' ){ echo "selected"; } ?>>15</option>
												<option value="16" <?php if( $ca_box_font_size == '16' ){ echo "selected"; } ?>>16</option>
												<option value="17" <?php if( $ca_box_font_size == '17' ){ echo "selected"; } ?>>17</option>
												<option value="18" <?php if( $ca_box_font_size == '18' ){ echo "selected"; } ?>>18</option>
												<option value="19" <?php if( $ca_box_font_size == '19' ){ echo "selected"; } ?>>19</option>
												<option value="20" <?php if( $ca_box_font_size == '20' ){ echo "selected"; } ?>>20</option>
											</select>
		                                    <p class="description">In pixels. Leave Blank to inherit from your theme on frontend automatically (not work on the live preview).</p>
		                                </fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row"><label for="cookie_accept_text_consent">Font Family</label> </th>
		                            <td>
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Font Family</span></legend>
		                                    <input type="text" id="cookie_accept_font_family" name="cookie_accept_data[box][font][family]" value="<?php echo $ca_box_font_family; ?>" >
		                                    <p class="">Example. <code>'Helvetica', Roboto, sans-serif</code></p>
		                                    <p class="description">Leave blank if you don't wanna use it.</p>
		                                </fieldset>
		                            </td>
		                        </tr>
	                    </tbody>
		                </table>
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-layout"></span>
					</div>
	                <div id="tab-body-layout" class="tab-body<?php if ( !isset($_COOKIE['cookie_accept_tab']) || $_COOKIE['cookie_accept_tab'] == 'layout' ){ echo ' current'; } ?>">
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-layout"></span>
	                	<noscript><h2>Layout</h2></noscript>
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <th scope="row"><label>Consent Box</label></th>
		                            <td id="consent-box-layout-settings" class="consent-box-layout-settings <?php echo $ca_style; ?>">
		                                <fieldset>
		                                	<label><strong>Style Position</strong> <span class="mobile-message"></span></label><br>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Style Position</span></legend>
		                                    <div class="cookie-accept-style <?php if( $ca_style == 'down-left' ){ echo "selected"; } ?>">
		                                    	<label>
			                                        <input id="cookie_a_style_downleft" type="radio" class="cookie_a_style" name="cookie_accept_data[box][style]" value="down-left" <?php if( $ca_style == 'down-left' ){ echo "checked='checked'"; } ?>> Down Left <br> <span class="down-left"></span>
			                                    </label>
			                                </div>
		                                    <div class="cookie-accept-style <?php if( $ca_style == 'down-right' ){ echo "selected"; } ?>">
		                                    	<label>
			                                        <input type="radio" class="cookie_a_style" name="cookie_accept_data[box][style]" value="down-right" <?php if( $ca_style == 'down-right' ){ echo "checked='checked'"; } ?>> Down Right <br> <span class="down-right"></span>
			                                    </label>
			                                </div>
		                                    <div class="cookie-accept-style <?php if( $ca_style == 'fullwidth' ){ echo "selected"; } ?>">
		                                    	<label>
			                                        <input type="radio" class="cookie_a_style" name="cookie_accept_data[box][style]" value="fullwidth" <?php if( $ca_style == 'fullwidth' ){ echo "checked='checked'"; } ?>> Fullwidth <br> <span class="fullwidth"></span>
			                                    </label>
			                                </div>
		                                    <p class="description">Some options may show depends on what style did you choose.</p>
		                                </fieldset>
										<fieldset>
											<label><strong>Content Align</strong> <span class="mobile-message"></span></label><br>
										    <legend class="screen-reader-text"><span>Cookie Consent Content Align</span></legend>
										    <div class="cookie-accept-align <?php if( $ca_box_align == 'left' ){ echo "selected"; } ?>">
										    	<label>
										            <input type="radio" class="cookie_a_align" name="cookie_accept_data[box][align]" value="left" <?php if( $ca_box_align == 'left' ){ echo "checked='checked'"; } ?>> Left <br> <span class="left"></span>
										        </label>
										    </div>
										    <div class="cookie-accept-align <?php if( $ca_box_align == 'center' ){ echo "selected"; } ?>">
										    	<label>
										            <input type="radio" class="cookie_a_align" name="cookie_accept_data[box][align]" value="center" <?php if( $ca_box_align == 'center' ){ echo "checked='checked'"; } ?>> Center <br> <span class="center"></span>
										        </label>
										    </div>
										    <div class="cookie-accept-align <?php if( $ca_box_align == 'right' ){ echo "selected"; } ?>">
										    	<label>
										            <input type="radio" class="cookie_a_align" name="cookie_accept_data[box][align]" value="right" <?php if( $ca_box_align == 'right' ){ echo "checked='checked'"; } ?>> Right <br> <span class="right"></span>
										        </label>
										    </div>
										    <p class="description">Some options may show depends on what style did you choose.</p>
										</fieldset>
		                                <fieldset id="distance-sets" class="distance-sets">
		                                	<label><strong>Distance</strong> <span class="mobile-message"></span></label><br>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Box Distance</span></legend>
		                                    
											<div class="distance-set for-downleft distance-from-left">
												<label for="cookie_a_box_d_from_left">From Left </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_d_from_left" class="cookie_a_box_d_from_left" name="cookie_accept_data[dist][down][left]" value="<?php echo $ca_dist_d_left; ?>" >
												<span id="box_d_from_left_val" class="num_value_px"><?php echo $ca_dist_d_left; ?></span>
											</div>
											<div class="distance-set for-downright distance-from-left">
												<label for="cookie_a_box_d_from_right">From Right </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_d_from_right" class="cookie_a_box_d_from_right" name="cookie_accept_data[dist][down][right]" value="<?php echo $ca_dist_d_right; ?>" >
												<span id="box_d_from_right_val" class="num_value_px"><?php echo $ca_dist_d_right; ?></span>
											</div>
											<div class="distance-set for-downleft for-downright distance-from-bottom">
												<label for="cookie_a_box_d_from_bottom">From Bottom </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_d_from_bottom" class="cookie_a_box_d_from_bottom" name="cookie_accept_data[dist][down][bottom]" value="<?php echo $ca_dist_d_bottom; ?>" >
												<span id="box_d_from_bot_val" class="num_value_px"><?php echo $ca_dist_d_bottom; ?></span>
											</div>
											<div class="distance-set for-fullwidth distance-from-left">
												<label for="cookie_a_box_f_from_left">From Left </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_f_from_left" class="cookie_a_box_f_from_left" name="cookie_accept_data[dist][full][left]" value="<?php echo $ca_dist_f_left; ?>" >
												<span id="box_f_from_left_val" class="num_value_px"><?php echo $ca_dist_f_left; ?></span>
											</div>
											<div class="distance-set for-fullwidth distance-from-right">
												<label for="cookie_a_box_f_from_right">From Right </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_f_from_right" class="cookie_a_box_f_from_right" name="cookie_accept_data[dist][full][right]" value="<?php echo $ca_dist_f_right; ?>" >
												<span id="box_f_from_right_val" class="num_value_px"><?php echo $ca_dist_f_right; ?></span>
											</div>
											<div class="distance-set for-fullwidth distance-from-bottom">
												<label for="cookie_a_box_f_from_bottom">From Bottom </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_box_f_from_bottom" class="cookie_a_box_f_from_bottom" name="cookie_accept_data[dist][full][bottom]" value="<?php echo $ca_dist_f_bottom; ?>" >
												<span id="box_f_from_bot_val" class="num_value_px"><?php echo $ca_dist_f_bottom; ?></span>
											</div>
		                                </fieldset>
		                                <fieldset id="corner-radius-sets" class="corner-radius-sets">
		                                	<label for="cookie_a_box_corner_round"><strong>Radius Corner</strong> <span class="mobile-message"></span></label><br>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Box Distance</span></legend>

											<div class="corner-radius-set">
												<input type="range" min="0" max="50" id="cookie_a_box_corner_round" class="cookie_a_box_corner_round w-50" name="cookie_accept_data[box][radius]" value="<?php echo $ca_box_radius; ?>" >
												<span id="box_corner_round_val" class="num_value_px"><?php echo $ca_box_radius; ?></span>
											</div>
		                                </fieldset>
								        <fieldset id="padding-sets" class="padding-sets">
								        	<label><strong>Paddings</strong></label><br>
								            <legend class="screen-reader-text"><span>Consent Box's Padding</span></legend>
								            
											<div class="padding-set">
												<label for="cookie_a_box_padd_top">Top </label> <br> 
												<input type="range" min="0" max="50" id="cookie_a_box_padd_top" class="cookie_a_box_padd_top w-50" name="cookie_accept_data[box][padding][top]" value="<?php echo $ca_box_padd_top; ?>" >
												<span id="box_padd_top_val" class="num_value_px"><?php echo $ca_box_padd_top; ?></span>
											</div>
											<div class="padding-set">
												<label for="cookie_a_box_padd_left">Left</label> <br> 
												<input type="range" min="0" max="50" id="cookie_a_box_padd_left" class="cookie_a_box_padd_left w-50" name="cookie_accept_data[box][padding][left]" value="<?php echo $ca_box_padd_left; ?>" >
												<span id="box_padd_left_val" class="num_value_px"><?php echo $ca_box_padd_left; ?></span>
											</div>
											<div class="padding-set">
												<label for="cookie_a_box_padd_right">Right </label> <br> 
												<input type="range" min="0" max="50" id="cookie_a_box_padd_right" class="cookie_a_box_padd_right w-50" name="cookie_accept_data[box][padding][right]" value="<?php echo $ca_box_padd_right; ?>" >
												<span id="box_padd_right_val" class="num_value_px"><?php echo $ca_box_padd_right; ?></span>
											</div>
											<div class="padding-set">
												<label for="cookie_a_box_padd_bott">Bottom </label> <br> 
												<input type="range" min="0" max="50" id="cookie_a_box_padd_bott" class="cookie_a_box_padd_bott w-50" name="cookie_accept_data[box][padding][bottom]" value="<?php echo $ca_box_padd_bott; ?>" >
												<span id="box_padd_bott_val" class="num_value_px"><?php echo $ca_box_padd_bott; ?></span>
											</div>
								        </fieldset>
		                                <fieldset id="box-width-set" class="box-width-set">
		                                	<label for="cookie_a_box_width"><strong>Box Width</strong> <span class="mobile-message"></span></label><br>
		                                    <legend class="screen-reader-text"><span>Cookie Consent Box Width</span></legend>

											<div class="box-width-set">
												<input type="range" min="0" max="700" id="cookie_a_box_width" class="cookie_a_box_width w-700" name="cookie_accept_data[box][width]" value="<?php echo $ca_box_width; ?>" >
												<span id="box_width_val" class="num_value_px"><?php echo $ca_box_width; ?></span><noscript> Minimum width is 175 pixels.</noscript>
											</div>
		                                </fieldset>
		                            </td>
		                        </tr>
								<tr>
								    <th scope="row"><label>Button</label></th>
								    <td id="btn-layout-settings" class="btn-layout-settings <?php echo $ca_style; ?>">
								        <fieldset>
								        	<label><strong>Style</strong></label><br>
								            <legend class="screen-reader-text"><span>Button Style</span></legend>
											<div class="cookie-accept-btn-style <?php if( $ca_btn_style == 'rounded' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_btn_style" name="cookie_accept_data[btn][style]" value="rounded" <?php if( $ca_btn_style == 'rounded' ){ echo "checked='checked'"; } ?>> Rounded <br> <span class="rounded"></span>
												</label>
											</div>
											<div class="cookie-accept-btn-style <?php if( $ca_btn_style == 'boxed' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_btn_style" name="cookie_accept_data[btn][style]" value="boxed" <?php if( $ca_btn_style == 'boxed' ){ echo "checked='checked'"; } ?>> Boxed <br> <span class="boxed"></span>
												</label>
											</div>
											<div class="cookie-accept-btn-style <?php if( $ca_btn_style == 'boxround' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_btn_style" name="cookie_accept_data[btn][style]" value="boxround" <?php if( $ca_btn_style == 'boxround' ){ echo "checked='checked'"; } ?>> Box Rounded <br> <span class="boxround"></span>
												</label>
											</div>
											<div class="cookie-accept-btn-style <?php if( $ca_btn_style == 'plain' ){ echo "selected"; } ?>">
												<label>
													<input type="radio" class="cookie_a_btn_style" name="cookie_accept_data[btn][style]" value="plain" <?php if( $ca_btn_style == 'plain' ){ echo "checked='checked'"; } ?>> Plain Link Text <br> <span class="plain"></span>
												</label>
											</div>
								            <p class="description">Some options may show depends on what style did you choose.</p>
								        </fieldset>
								        <fieldset id="padding-sets" class="padding-sets">
								        	<label><strong>Paddings</strong></label><br>
								            <legend class="screen-reader-text"><span>Button Padding</span></legend>
								            
											<div class="padding-set">
												<label for="cookie_a_btn_padd_left">Left & Right </label> <br> 
												<input type="range" min="0" max="100" id="cookie_a_btn_padd_left" class="cookie_a_btn_padd_left" name="cookie_accept_data[btn][padding][left]" value="<?php echo $ca_btn_padd_left; ?>" >
												<span id="btn_padd_left_val" class="num_value_px"><?php echo $ca_btn_padd_left; ?></span>
											</div>
											<div class="padding-set">
												<label for="cookie_a_btn_padd_top">Top & Bottom </label> <br> 
												<input type="range" min="0" max="30" id="cookie_a_btn_padd_top" class="cookie_a_btn_padd_top w-30" name="cookie_accept_data[btn][padding][top]" value="<?php echo $ca_btn_padd_top; ?>" >
												<span id="btn_padd_top_val" class="num_value_px"><?php echo $ca_btn_padd_top; ?></span>
											</div>
								        </fieldset>
								    </td>
								</tr>
		                    </tbody>
		                </table>
		                <span tabindex="0" class="auto-skip" data-focus="cookie-accept-colors"></span>
		            </div>
	                <div id="tab-body-colors" class="tab-body <?php if ( isset($_COOKIE['cookie_accept_tab']) && $_COOKIE['cookie_accept_tab'] == 'colors' ){ echo ' current'; } ?>">
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-colors"></span>
	                	<noscript><h2>Colors</h2></noscript>
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <th scope="row">Color Mode </th>
		                            <td>
		                                <fieldset>
		                                    <legend class="screen-reader-text"><span>Color Mode</span></legend>
		                                    <div class="cookie-accept-mode">
		                                    	<label><input id="cookie_a_mode_light" type="radio" class="cookie_a_mode" name="cookie_accept_data[mode]" value="light" <?php if( $ca_mode == 'light' ){ echo "checked='checked'"; } ?>> Light Mode</label>
			                                </div>
		                                    <div class="cookie-accept-mode">
		                                    	<label><input type="radio" class="cookie_a_mode" name="cookie_accept_data[mode]" value="dark" <?php if( $ca_mode == 'dark' ){ echo "checked='checked'"; } ?>> Dark Mode</label>
			                                </div>
		                                    <p class="description">Some options may show depends on what color mode did you choose.</p>
		                                </fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row">Accent</th>
		                            <td id="accent_color_sets" class="<?php echo $ca_mode; ?>">
										<fieldset>
											<div class="inline-color mode-light">
												<legend class="screen-reader-text"><span>Accent Color</span></legend>
												<label for="cookie_accept_color_l_accent">Accent Color</label> <br>
												<input type="color" id="cookie_accept_color_l_accent" name="cookie_accept_data[box][color][light][acc]" value="<?php echo $ca_box_clr_l_ac; ?>">
											</div>
											<div class="inline-color mode-light">
												<legend class="screen-reader-text"><span>On Accent Color</span></legend>
												<label for="cookie_accept_color_l_saccent">On Accent Color</label> <br>
												<input type="color" id="cookie_accept_color_l_saccent" name="cookie_accept_data[box][color][light][s_acc]" value="<?php echo $ca_box_clr_l_sac; ?>">
											</div>
											<div class="inline-color mode-dark">
												<legend class="screen-reader-text"><span>Accent Color</span></legend>
												<label for="cookie_accept_color_d_accent">Accent Color</label> <br>
												<input type="color" id="cookie_accept_color_d_accent" name="cookie_accept_data[box][color][dark][acc]" value="<?php echo $ca_box_clr_d_ac; ?>">
											</div>
											<div class="inline-color mode-dark">
												<legend class="screen-reader-text"><span>On Accent Color</span></legend>
												<label for="cookie_accept_color_d_saccent">On Accent Color</label> <br>
												<input type="color" id="cookie_accept_color_d_saccent" name="cookie_accept_data[box][color][dark][s_acc]" value="<?php echo $ca_box_clr_d_sac; ?>">
											</div>
										</fieldset>
		                            </td>
		                        </tr>
		                        <tr>
		                            <th scope="row">Base</th>
		                            <td id="box_color_sets" class="<?php echo $ca_mode; ?>">
										<fieldset>
											<div class="inline-color mode-light">
												<legend class="screen-reader-text"><span>Base Colors</span></legend>
												<label for="cookie_accept_color_l_box_bg">Background Color</label> <br>
												<input type="color" id="cookie_accept_color_l_box_bg" name="cookie_accept_data[box][color][light][bg]" value="<?php echo $ca_box_clr_l_bg; ?>">
											</div>
											<div class="inline-color mode-light">
												<legend class="screen-reader-text"><span>Consent Box Text Colors Pick</span></legend>
												<label for="cookie_accept_color_l_box_txt">Text Color</label> <br>
												<input type="color" id="cookie_accept_color_l_box_txt" name="cookie_accept_data[box][color][light][txt]" value="<?php echo $ca_box_clr_l_txt; ?>">
											</div>
											<div class="inline-color mode-light">
												<legend class="screen-reader-text"><span>Consent Box Link Colors Pick</span></legend>
												<label for="cookie_accept_color_l_box_lnk">Link Color</label> <br>
												<input type="color" id="cookie_accept_color_l_box_lnk" name="cookie_accept_data[box][color][light][lnk]" value="<?php echo $ca_box_clr_l_lnk; ?>">
											</div>
											<div class="inline-color mode-dark">
												<legend class="screen-reader-text"><span>Consent Box Background Colors</span></legend>
												<label for="cookie_accept_color_d_box_bg">Background Color</label> <br>
												<input type="color" id="cookie_accept_color_d_box_bg" name="cookie_accept_data[box][color][dark][bg]" value="<?php echo $ca_box_clr_d_bg; ?>">
											</div>
											<div class="inline-color mode-dark">
												<legend class="screen-reader-text"><span>Consent Box Text Colors Pick</span></legend>
												<label for="cookie_accept_color_d_box_txt">Text Color</label> <br>
												<input type="color" id="cookie_accept_color_d_box_txt" name="cookie_accept_data[box][color][dark][txt]" value="<?php echo $ca_box_clr_d_txt; ?>">
											</div>
											<div class="inline-color mode-dark">
												<legend class="screen-reader-text"><span>Consent Box Link Colors Pick</span></legend>
												<label for="cookie_accept_color_d_box_lnk">Link Color</label> <br>
												<input type="color" id="cookie_accept_color_d_box_lnk" name="cookie_accept_data[box][color][dark][lnk]" value="<?php echo $ca_box_clr_d_lnk; ?>">
											</div>
										</fieldset>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
	                	<span tabindex="0" class="auto-skip" data-focus="cookie-accept-basic"></span>
	                </div>


<!-- 					<div class="tab-body sample">
						<h2>Did You Enjoy Cookie Accept Plugin?</h2>
						<p>You are using Cookie Accept Plugin version <?php // echo COOKIE_ACCEPT_VER; ?></p>
						<p>Give Our plugin ratings.</p>
						<p>Ask Our Developer.</p>

					</div>
 -->		            <?php submit_button( 'Save Changes', 'primary', 'submit-form' ); ?>
                </form>
        </div>
<div id="cookie-consent-notice" class="cookie-consent-notice <?php echo $ca_style; ?> <?php echo $ca_mode; ?> <?php echo $ca_box_align; ?>" style="">
	<div id="consent-icon" class="<?php if($ca_use_icon == 'on') { echo $ca_use_icon; } ?>"><?php echo file_get_contents( COOKIE_ACCEPT_URI. 'assets/icon/'. $ca_icon .'.svg' ); ?></div>
	<div class="consent-container">
		<p class="consent-message">
			<span id="main-text"><?php echo $ca_box_main_txt; ?></span><?php 
			if ( !empty( $policy_page_id ) && get_post_status( $policy_page_id ) === 'publish' ) { ?>
			<span id="privacy-policy-link-container" class="<?php echo $ca_use_pp; ?>">
				<a href="<?php echo get_permalink( $policy_page_id, false ); ?>"><?php echo $ca_pp_link_lbl; ?></a>
    		</span><?php } ?>
        </p>
		<p class="consent-action"><button id="accept-cookies" class="<?php echo $ca_btn_style; ?>"><?php echo $ca_accept_btn_lbl; ?></button></p>
	</div>
</div> 
<script>
	var datePreview = new Date();
	datePreview.setTime(datePreview.getTime() + ( 24 * 60 * 60 * 1000 ));
	var expireTime = "expires=" + datePreview.toUTCString();

	// Save current Tab with cookie, and focus function
	tabHeads = document.getElementById('tabs-head').children;
	tabsBody = document.getElementsByClassName('tab-body');
	for (var i = 0; i < tabHeads.length; i++) {
		function activateTab() {
			tabBodyId = 'tab-body-'+ this.dataset.tab;

			for (var j = 0; j < tabsBody.length; j++) {
				tabsBody[j].classList.remove('current');
			}
			for (var k = 0; k < tabHeads.length; k++) {
				tabHeads[k].classList.remove('current');
			}
			document.getElementById(tabBodyId).classList.add('current');
			this.classList.add('current');
			document.cookie = "cookie_accept_tab="+ this.dataset.tab +";" + expireTime + ";path=<?php echo COOKIEPATH; ?>";
		}
		// Trigger click
		tabHeads[i].addEventListener('click', activateTab);
		// focus content after focus header
		tabHeads[i].addEventListener('keydown', function(e) {
			if (e.key == 'Enter') {
				tabBodyFirstContent = this.dataset.focus;
				if (this.classList.contains('current')) {
					document.getElementById(tabBodyFirstContent).focus();
				}
			}
		});
		// focus header if not yet
		tabHeads[i].addEventListener('keydown', function(e) {
			if (e.key == 'Enter') {
				tabBodyId = 'tab-body-'+ this.dataset.tab;

				for (var j = 0; j < tabsBody.length; j++) {
					tabsBody[j].classList.remove('current');
				}
				for (var k = 0; k < tabHeads.length; k++) {
					tabHeads[k].classList.remove('current');
				}
				document.getElementById(tabBodyId).classList.add('current');
				this.classList.add('current');
				document.cookie = "cookie_accept_tab="+ this.dataset.tab +";" + expireTime + ";path=<?php echo COOKIEPATH; ?>";
			}
		});
	}

	cbPreview = document.getElementById('cookie_accept_live_preview');

	// save preview status with cookie.
	cbPreview.addEventListener('click', function() {
		// access properties using this keyword
		if ( this.checked ) {
			// save show with cookie
			document.cookie = "accept_cookie_preview=show;" + expireTime + ";path=<?php echo COOKIEPATH; ?>";
		} else {
			// save hide with cookie
			document.cookie = "accept_cookie_preview=hide;" + expireTime + ";path=<?php echo COOKIEPATH; ?>";
		}
	});

	// accept cookie click
	document.getElementById("accept-cookies").addEventListener("click", function () {
		setTimeout(function(){ 
			document.cookie = "accept_cookie_preview=hide;" + expireTime + ";path=<?php echo COOKIEPATH; ?>";
		}, 2000);
	});

	cookieConsentStyle = document.getElementById('cookie-accept-opt-inline-css');
	<?php global $_wp_admin_css_colors; $admin_color = get_user_option( 'admin_color' ); $colors = $_wp_admin_css_colors[$admin_color]->colors; if ($admin_color == 'light') { $the_color = $colors[3]; } else if ($admin_color == 'modern') { $the_color = $colors[1]; } else if ($admin_color == 'blue') { $the_color = $colors[0]; } else if ($admin_color == 'midnight') { $the_color = $colors[3]; } else { $the_color = $colors[2]; } ?>

	// Edit preview on input change
	document.getElementById('cookie-accept-options-form').addEventListener('input', function () {
	 	css = 	".cookie-accept-style label>span::before{ ";
	 	css += 		"background-color: <?php echo $the_color; ?>;";
	 	css += 	"}";
	 	css += 	".cookie-accept-align label>span{ ";
	 	css += 		"color: <?php echo $the_color; ?>;";
	 	css += 	"}";
	 	css += 	".cookie-accept-btn-style label>span::before{ ";
	 	css += 		"background-color: <?php echo $the_color; ?>;";
	 	css += 	"}";
	 	css += 	".cookie-accept-btn-style label>span.plain::before{ ";
	 	css += 		"color: <?php echo $the_color; ?>;";
	 	css += 	"}";
	 	css += 	".cookie-accept-icon.selected{ ";
	 	css += 		"color: <?php echo $the_color; ?>;";
	 	css += 	"}";
		css += 	"label#cookie_accept_live_preview_label input:checked + span.toggle-round{ ";
	 	css += 		"background-color: <?php echo $the_color; ?>;";
	 	css += 		"border-color: <?php echo $the_color; ?>;";
	 	css += 	"}";
		css += 	"label#cookie_accept_live_preview_label input:checked + span.toggle-round::before{ ";
	 	css += 		"box-shadow: 0 0 0 1px <?php echo $the_color; ?>;";
	 	css += 	"}";
		// load css on input change
	 		distance_box_left = document.getElementById('cookie_a_box_d_from_left').value;
	 		distance_box_right = document.getElementById('cookie_a_box_d_from_right').value;
	 		distance_box_bottom = document.getElementById('cookie_a_box_d_from_bottom').value;
	 		distance_box_f_left = document.getElementById('cookie_a_box_f_from_left').value;
	 		distance_box_f_right = document.getElementById('cookie_a_box_f_from_right').value;
	 		distance_box_f_bottom = document.getElementById('cookie_a_box_f_from_bottom').value;

	 		box_padd_top = document.getElementById('cookie_a_box_padd_top').value;
	 		box_padd_right = document.getElementById('cookie_a_box_padd_right').value;
	 		box_padd_bott = document.getElementById('cookie_a_box_padd_bott').value;
	 		box_padd_left = document.getElementById('cookie_a_box_padd_left').value;
	 		box_rad_corner = document.getElementById('cookie_a_box_corner_round').value;
	 		box_width = document.getElementById('cookie_a_box_width').value;

	 		box_clr_l_ac = document.getElementById('cookie_accept_color_l_accent').value;
	 		box_clr_l_sac = document.getElementById('cookie_accept_color_l_saccent').value;
	 		box_clr_d_ac = document.getElementById('cookie_accept_color_d_accent').value;
	 		box_clr_d_sac = document.getElementById('cookie_accept_color_d_saccent').value;

	 		box_clr_l_bg = document.getElementById('cookie_accept_color_l_box_bg').value;
	 		box_clr_l_txt = document.getElementById('cookie_accept_color_l_box_txt').value;
	 		box_clr_l_lnk = document.getElementById('cookie_accept_color_l_box_lnk').value;
	 		box_clr_d_bg = document.getElementById('cookie_accept_color_d_box_bg').value;
	 		box_clr_d_txt = document.getElementById('cookie_accept_color_d_box_txt').value;
	 		box_clr_d_lnk = document.getElementById('cookie_accept_color_d_box_lnk').value;

	 		btn_padd_top = document.getElementById('cookie_a_btn_padd_top').value;
	 		btn_padd_left = document.getElementById('cookie_a_btn_padd_left').value;

	 		font_size = document.getElementById('cookie_accept_font_size').value;
	 		font_family = document.getElementById('cookie_accept_font_family').value;
		css += 	".cookie-consent-notice { ";
	 	css += 		"padding: "+ box_padd_top +"px "+ box_padd_right +"px "+ box_padd_bott +"px "+ box_padd_left +"px; ";
	 	css += 		"width: 100%; ";
	 	if (font_size != 'blank') {
	 	css += 		"font-size: "+ font_size +"px; ";
	 	}
	 	if (font_family != '') {
	 	css += 		"font-family: "+ font_family +"; ";
	 	}
	 	css += 		"background-color: "+ box_clr_l_bg +"; ";
	 	css += 		"color: "+ box_clr_l_txt +"; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice.dark { ";
	 	css += 		"background-color: "+ box_clr_d_bg +"; ";
	 	css += 		"color: "+ box_clr_d_txt +"; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice .consent-container a { ";
	 	css += 		"color: "+ box_clr_l_lnk +"; ";
	 	css += 		"background-color: transparent; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice.dark .consent-container a { ";
	 	css += 		"color: "+ box_clr_d_lnk +"; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice .consent-container button { ";
	 	css += 		"padding: "+ btn_padd_top +"px "+ btn_padd_left +"px; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice .consent-container button { ";
	 	css += 		"color: "+ box_clr_l_sac +"; ";
	 	css += 		"background-color: "+ box_clr_l_ac +"; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice.dark .consent-container button { ";
	 	css += 		"color: "+ box_clr_d_sac +"; ";
	 	css += 		"background-color: "+ box_clr_d_ac +"; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice .consent-container button.plain { ";
	 	css += 		"color: "+ box_clr_l_lnk +"; ";
	 	css += 		"background-color: transparent; ";
	 	css += 	"}";
		css += 	".cookie-consent-notice.dark .consent-container button.plain { ";
	 	css += 		"color: "+ box_clr_d_lnk +"; ";
	 	css += 	"}";
	 	// Responsive
		css += 	"@media (min-width: 816px) { ";
		css += 		".cookie-consent-notice.down-left { ";
	 	css += 			"min-width: 175px; ";
	 	css += 			"width: "+ box_width +"px; ";
	 	css += 			"left: "+ distance_box_left +"px; ";
	 	css += 			"bottom: "+ distance_box_bottom +"px; ";
	 	css += 			"border-radius: "+ box_rad_corner +"px; ";
	 	css += 		"}";
		css += 		".cookie-consent-notice.down-right { ";
	 	css += 			"min-width: 175px; ";
	 	css += 			"width: "+ box_width +"px; ";
	 	css += 			"right: "+ distance_box_right +"px; ";
	 	css += 			"bottom: "+ distance_box_bottom +"px; ";
	 	css += 			"border-radius: "+ box_rad_corner +"px; ";
	 	css += 		"}";
		css += 		".cookie-consent-notice.fullwidth { ";
	 	css += 			"left: "+ distance_box_f_left +"px; ";
	 	css += 			"right: "+ distance_box_f_right +"px; ";
	 	css += 			"bottom: "+ distance_box_f_bottom +"px; ";
	 	css += 		"}";
	 	css += 	"}";

		cookieConsentStyle.innerHTML = css;


		// Box Content text change every type
 		text_consent = document.getElementById('cookie_accept_text_consent').value;
		document.getElementById('main-text').innerHTML = text_consent;

		// Accept Button Label text change every type
 		text_ac_btn = document.getElementById('cookie_accept_text_button').value;
		document.getElementById('accept-cookies').innerHTML = text_ac_btn;

		// Show Hide Privacy Policy Link
<?php if ( !empty( $policy_page_id ) && get_post_status( $policy_page_id ) === 'publish' ) { ?>
 		ac_pp_show = document.getElementById('cookie_accept_policy_use');
 		ac_pp_cont = document.getElementById('privacy-policy-link-container');
 		if (ac_pp_show.checked) {
 			ac_pp_cont.classList.add('on');
 		} else {
 			ac_pp_cont.classList.remove('on');
 		}
		ac_pp_label = document.getElementById('cookie_accept_policy_link_text').value;
    	ac_pp_cont.children[0].innerHTML = ac_pp_label;
<?php } ?>
		


		// Update value on field description .num_value_px get the ID
		// Variables of container
		dist_box_dl_cont = document.getElementById('box_d_from_left_val');
		dist_box_dr_cont = document.getElementById('box_d_from_right_val');
		dist_box_db_cont = document.getElementById('box_d_from_bot_val');
		dist_box_fl_cont = document.getElementById('box_f_from_left_val');
		dist_box_fr_cont = document.getElementById('box_f_from_right_val');
		dist_box_fb_cont = document.getElementById('box_f_from_bot_val');
		box_padd_top_cont = document.getElementById('box_padd_top_val');
		box_padd_right_cont = document.getElementById('box_padd_right_val');
		box_padd_left_cont = document.getElementById('box_padd_left_val');
		box_padd_bott_cont = document.getElementById('box_padd_bott_val');
		box_rad_corner_cont = document.getElementById('box_corner_round_val');
		box_width_cont = document.getElementById('box_width_val');
		btn_padd_t_cont = document.getElementById('btn_padd_top_val');
		btn_padd_l_cont = document.getElementById('btn_padd_left_val');

		// Treat box width special
		if (box_width < 175) {
			document.getElementById('cookie_a_box_width').value = 175;
			box_width_cont.innerText = 175;
			box_width_cont.classList.add('minimum');
		} else {
			box_width_cont.innerText = box_width;
			box_width_cont.classList.remove('minimum');
		}

		// Array number of values from inputs
		numeral_values = [
			distance_box_left, 
			distance_box_right,
			distance_box_bottom,
			distance_box_f_left, 
			distance_box_f_right,
			distance_box_f_bottom,
			box_padd_top,
			box_padd_right,
			box_padd_bott,
			box_padd_left,
			box_rad_corner,
			btn_padd_top,
			btn_padd_left,
		];
		// Array of container to display the value
		numeral_containers = [
			dist_box_dl_cont, 
			dist_box_dr_cont,
			dist_box_db_cont,
			dist_box_fl_cont, 
			dist_box_fr_cont,
			dist_box_fb_cont,
			box_padd_top_cont,
			box_padd_right_cont,
			box_padd_bott_cont,
			box_padd_left_cont,
			box_rad_corner_cont,
			btn_padd_t_cont,
			btn_padd_l_cont,
		];

		// Give each container the same treat
		for (var i = 0; i < numeral_values.length; i++) {
			// add remove class of single value 
			if (numeral_values[i] == 1) {
				numeral_containers[i].classList.add('singular');
			} else {
				numeral_containers[i].classList.remove('singular');
			}
			// Display the value
			numeral_containers[i].innerText = numeral_values[i];
		}

	})

</script>
<?php }




}
