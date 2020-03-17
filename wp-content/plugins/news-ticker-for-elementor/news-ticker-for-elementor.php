<?php
/**
 Plugin Name: News Ticker for Elementor
 Description: News icker for Elementor lets you add news ticker with the Elementor Page builder.You can use any of  your blog post as news ticker. You can also add custom texts as as news ticker. There is no limitation, so you can add unlimited numbers of news ticker with this plugin.
 Author: Web Builders
 Author URI: https://web-lodge.com/
 Version: 1.1.0
 License: GPLv2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: news-ticker-for-elementor
*/

// Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) { exit; }

 /**
  * Main class for News Ticker
  */
 class WB_NEWS_TICKER
 {
 	
 	private static $instance;

	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new WB_NEWS_TICKER();
            self::$instance->init();
        }
        return self::$instance;
    }

    //Empty Construct
 	function __construct(){}
 	
 	//initialize Plugin
 	public function init(){
 		$this->defined_constants();
 		$this->include_files();
		add_action( 'elementor/init', array( $this, 'wb_nt_create_category') ); // Add a custom category for panel widgets
 	}

 	//Defined all constants for the plugin
 	public function defined_constants(){
 		define( 'WB_NT_PATH', plugin_dir_path( __FILE__ ) );
		define( 'WB_NT_URL', plugin_dir_url( __FILE__ ) ) ;
		define( 'WB_NT_VERSION', '1.0.0' ) ; //Plugin Version
		define( 'WB_NT_MIN_ELEMENTOR_VERSION', '2.0.0' ) ; //MINIMUM ELEMENTOR Plugin Version
		define( 'WB_NT_MIN_PHP_VERSION', '5.4' ) ; //MINIMUM PHP Plugin Version
 	}

 	//Include all files
 	public function include_files(){
 		require_once( WB_NT_PATH . 'admin/news-ticker-utils.php' );
 		if( is_admin() ){
 			require_once( WB_NT_PATH . 'admin/admin-pages.php' );	
 			require_once( WB_NT_PATH . 'class-plugin-deactivate-feedback.php' );	
 			require_once( WB_NT_PATH . 'support-page/class-support-page.php' );	
 		}
 		//require_once( WB_NT_PATH . 'admin/notices/support.php' );
 	}

 	//Elementor new category register method
 	public function wb_nt_create_category() {
	   \Elementor\Plugin::$instance->elements_manager->add_category( 
		   	'web-builder-element',
		   	[
		   		'title' => esc_html( 'Web Builders Element', 'news-ticker-for-elementor' ),
		   		'icon' => 'fa fa-plug', //default icon
		   	],
		   	2 // position
	   );
	}

 	// prevent the instance from being cloned
    private function __clone(){}

    // prevent from being unserialized
    private function __wakeup(){}
 }


function wb_news_ticker_register_function(){
	$wb_news_ticker = WB_NEWS_TICKER::getInstance();
	if( is_admin() ){
		$wbelnt_feedback = new WBELNT_Usage_Feedback(
			__FILE__,
			'webbuilders03@gmail.com',
			false,
			true
		);
	}
}
add_action('plugins_loaded', 'wb_news_ticker_register_function');

add_action('wp_footer', 'wbelnt_display_custom_css');
function wbelnt_display_custom_css(){
	$custom_css = get_option( 'wbelnt_custom_css' );
	$css ='';
	if ( ! empty( $custom_css ) ) {
		$css .= '<style type="text/css">';
		$css .= '/* Custom CSS */' . "\n";
		$css .= $custom_css . "\n";
		$css .= '</style>';
	}
	echo $css;
}

/**
 * Submenu filter function. Tested with Wordpress 4.1.1
 * Sort and order submenu positions to match your custom order.
 *
 */
function wbelnt_order_submenu( $menu_ord ) {

  global $submenu;

  // Enable the next line to see a specific menu and it's order positions
  //echo '<pre>'; print_r( $submenu['wbel-news-ticker'] ); echo '</pre>'; exit();

  $arr = array();

  $arr[] = $submenu['wbel-news-ticker'][1];
  $arr[] = $submenu['wbel-news-ticker'][2];
  $arr[] = $submenu['wbel-news-ticker'][5];
  $arr[] = $submenu['wbel-news-ticker'][4];

  $submenu['wbel-news-ticker'] = $arr;

  return $menu_ord;

}

// add the filter to wordpress
add_filter( 'custom_menu_order', 'wbelnt_order_submenu' );
