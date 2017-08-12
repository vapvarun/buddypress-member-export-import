<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Bp_Xprofile_Export_Import
 * @subpackage Bp_Xprofile_Export_Import/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bp_Xprofile_Export_Import
 * @subpackage Bp_Xprofile_Export_Import/admin
 * @author     Wbcom Designs <admin@gmail.com>
 */
class Bp_Xprofile_Export_Import_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	* Initialize the class and set its properties.
	*
	* @since    1.0.0
	* @param      string    $plugin_name       The name of this plugin.
	* @param      string    $version    The version of this plugin.
	* @access   public
	* @author   Wbcom Designs
	*/
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	* Register admin menu page for plugin
	*
	* @since    1.0.0
	* @access   public
	* @author   Wbcom Designs
	*/
	public function bpxp_admin_menu() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bp_Xprofile_Export_Import_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bp_Xprofile_Export_Import_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		add_menu_page('Members Data' ,'Members Data','manage_options', 'bpxp-member-export', array($this, 'bpxp_dashboard_page' ),'dashicons-download');
		add_submenu_page('bpxp-member-export', 'Members Export' , 'Members Export', 'manage_options' , 'bpxp-member-export');
        add_submenu_page( 'bpxp-member-export', 'Members Import', 'Members Import',
    'manage_options', 'bpxp-member-import' , array($this , 'bpxp_import_data_page'));

	}

	/**
	* Display Admin menu page export into CSV fields
	*
	* @since    1.0.0
	* @access   public
	* @author   Wbcom Designs
	*/
	public function bpxp_dashboard_page(){
		include BPXP_PLUGIN_PATH . 'admin/partials/bp-xprofile-export-admin-display.php';
	}

	/**
	* Display Admin menu subpage content.
	*
	* @since    1.0.0
	* @access   public
	* @author   Wbcom Designs
	*/
	public function bpxp_import_data_page(){
		include BPXP_PLUGIN_PATH . 'admin/partials/bp-xprofile-import-admin-display.php';
	}

	/**
	* Register the stylesheets for the admin area.
	*
	* @since    1.0.0
	* @access   public
	* @author   Wbcom Designs
	*/
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bp_Xprofile_Export_Import_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bp_Xprofile_Export_Import_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bp-xprofile-export-import-admin.css', array(), $this->version, 'all' );

	}


	/**
	* Register the JavaScript for the admin area.
	*
	* @since    1.0.0
	* @access   public
	* @author   Wbcom Designs
	*/
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bp_Xprofile_Export_Import_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bp_Xprofile_Export_Import_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bp-xprofile-export-import-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name, 'bpxp_ajax_url', array('ajaxurl' => admin_url('admin-ajax.php')));
	}
}