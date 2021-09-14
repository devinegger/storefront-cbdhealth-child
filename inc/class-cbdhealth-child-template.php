<?php
/**
 * CBDHealth_Template Class
 *
 * @author   Dreamscape Development
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CBDHealth_Template' ) ) {

class CBDHealth_Template {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper' ), 45 );
		add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper_close' ), 65 );

		add_action( 'storefront_header', array( $this, 'tob_bar_wrapper' ), 15 );
		add_action( 'storefront_header', array( $this, 'tob_bar_wrapper_close' ), 35 );
	}

	/**
	 * Primary navigation wrapper
	 * @return void
	 */
	public function primary_navigation_wrapper() {
		echo '<section class="cbdhealth-primary-navigation">';
	}

	/**
	 * Primary navigation wrapper close
	 * @return void
	 */
	public function primary_navigation_wrapper_close() {
		echo '</section>';
	}

	/**
	 * Top Bar wrapper
	 * @return void
	*/
	
	function tob_bar_wrapper() {
		echo '<div class="cbdhealth-tob-bar-wrapper">';
	}
	
	/**
	 * Top Bar wrapper close
	 * @return void
	 */
	function tob_bar_wrapper_close() {
		echo '</div>';
	}
}

}

return new CBDHealth_Template();