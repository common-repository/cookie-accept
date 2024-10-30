<?php 
/**
 * Plugin Name: Cookie Accept 
 * Plugin URI: https://rakhmad.com/plugin/cookie-accept
 * Description: Cookie Accept is a simple cookie consent, concern and compliance. Get your site ready for GDPR, CCPA or the others.
 * Version: 2.2.0
 * Author: Rakhmad
 * Author URI: https://rakhmad.com
 * License: GPLv2 or later
 * Text Domain: cookie-accept
 * 
 * @package Cookie Accept
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * Copyright 2021  Rakhmad Support (email : plugin@rakhmad.com)
 */

if ( !defined('ABSPATH') ) {
	die;
}


/**
 * Cookie Accept Class
 */
class Cookie_Accept 
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

		$this->_definite();
		$this->_loader();

	}


	/**
	 * Cookie Accept Definite
	 */
	public function _definite() {

		define( 'COOKIE_ACCEPT_VER', '2.1.0' );
		define( 'COOKIE_ACCEPT_URI', plugin_dir_url( __FILE__ ) );
		define( 'COOKIE_ACCEPT_PATH', plugin_dir_path(  __FILE__ ) );
		define( 'COOKIE_ACCEPT_BASE', plugin_basename(  __FILE__ ) );
		define( 'COOKIE_ACCEPT_INC', COOKIE_ACCEPT_PATH . 'inc' );

	}


	/**
	 * Load file packs.
	 */
	public function _loader() {

		require( COOKIE_ACCEPT_INC . '/core.php' );

	}




}
Cookie_Accept::run_this();