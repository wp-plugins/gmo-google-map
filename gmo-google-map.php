<?php
/*
Plugin Name: GMO Google Map
Author: GMO WP Cloud
Plugin URI:https://www.wpcloud.jp/en/plugins
Description: With "GMO Google Map" plugin, you can use Google Maps on your website by simply embedding a shortcode in anywhere you desire. No special coding skill is required. Simply enter information (eg. address) to create a shortcode and paste it to complete.
Version: 1.1
Author URI: https://wpcloud.jp/en/
Domain Path: 
Text Domain: GMO Google Map
*/

$Gmo_Google_Map = new Gmo_Google_Map();

class Gmo_Google_Map {

	private $shortcode_tag  = 'map';
	private $class_name     = 'gmogooglemap';
	private $width          = '100%';
	private $height         = '200px';
	private $zoom           = 16;
	private $breakpoint     = 480;
	private $max_breakpoint = 640;



	function __construct()
	{
		/* admin_menu フィルタで mt_add_pages を実行 */
		add_action('admin_menu', array($this, 'mt_add_pages'));
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_enqueue_scripts', array($this, 'gmo_google_map_scripts'));
	}


	function mt_add_pages() {
		// 「設定」にサブメニューを追加
		add_options_page('GMO　Google　Map Plugin','GMO　Google　Map','level_8',__FILE__, array($this,'gmo_google_map_setting'), '',26);
	}


	public function gmo_google_map_scripts() {
		if (preg_match('/gmo-google-map/', $_GET['page'])) {
			wp_enqueue_style( 'gmo_google_map_css', plugins_url( 'css/gmo_google_map.css', __FILE__ ));
		}
	}












function gmo_google_map_setting() {
		$post_address = $_POST["input_Address"];
		$post_width = $_POST["input_Width"];
		$post_height = $_POST["input_Heignt"];
		$post_zoom = $_POST["input_Zoom"];
		$post_breakpoint = $_POST["input_Breakpoint"];

function options_page() {
	require_once(dirname(__FILE__).'/includes/admin.php');
}
options_page();


}





public function init()
	{
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_shortcode( $this->get_shortcode_tag(), array( $this, 'shortcode' ) );

		wp_embed_register_handler(
			'google-map',
			'#( https://( www|maps ).google.[a-z]{2,3}\.?[a-z]{0,3}/maps( /ms )?\?.+ )#i',
			array( &$this, 'oembed_handler' )
		);
	}

	public function oembed_handler( $match )
	{
		return sprintf(
			'[%s url="%s"]',
			$this->get_shortcode_tag(),
			esc_url( $match[0] )
		);
	}

	public function wp_head()
	{
		echo "<style>.gmogooglemap img{max-width:none !important;padding:0 !important;margin:0 !important;}.staticmap,.staticmap img{max-width:100% !important;height:auto !important;}</style>\n";
	}
	public function wp_enqueue_scripts()
	{
		wp_register_script(
			'google-maps-api',
			'//maps.google.com/maps/api/js?sensor=false',
			false,
			null,
			true
		);

		wp_register_script(
			'gmogooglemap',
			apply_filters(
				'gmogooglemap_script',
				plugins_url( 'js/gmo-google-map.min.js' , __FILE__ )
			),
			array( 'jquery', 'google-maps-api' ),
			filemtime( dirname( __FILE__ ).'/js/gmo-google-map.min.js' ),
			true
		);
		wp_enqueue_script( 'gmogooglemap' );
	}

	public function shortcode( $p, $content = null )
	{
		add_action( 'wp_footer', array( &$this, 'wp_enqueue_scripts' ) );

		if ( isset( $p['width'] ) && preg_match( '/^[0-9]+(%|px)$/', $p['width'] ) ) {
			$w = $p['width'];
		} else {
			$w = apply_filters( 'gmogooglemap_default_width', $this->width );
		}
		if ( isset( $p['height'] ) && preg_match( '/^[0-9]+(%|px)$/', $p['height'] ) ) {
			$h = $p['height'];
		} else {
			$h = apply_filters( 'gmogooglemap_default_height', $this->height );
		}
		if ( isset( $p['zoom'] ) && $p['zoom'] ) {
			$zoom = $p['zoom'];
		} else {
			$zoom = apply_filters( 'gmogooglemap_default_zoom', $this->zoom );
		}
		if ( isset( $p['breakpoint'] ) && intval( $p['breakpoint'] ) ) {
			if ( intval( $p['breakpoint'] ) > $this->max_breakpoint ) {
				$breakpoint = $this->max_breakpoint;
			} else {
				$breakpoint = intval( $p['breakpoint'] );
			}
		} else {
			$breakpoint = apply_filters(
				'gmogooglemap_default_breakpoint',
				$this->breakpoint
			);
		}
		
		

		
		
		
		
		
		
		
		if ( $content ) {
			$content = do_shortcode( $content );
		}

		$addr = '';
		$lat  = '';
		$lng  = '';

		if ( isset( $p['url'] ) && $p['url'] ) {
			$iframe = '<iframe width="%s" height="%s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="%s"></iframe>';

			return sprintf(
				$iframe,
				$w,
				$h,
				esc_url( $p['url'].'&output=embed' )
			);
		} elseif ( isset( $p['lat'] ) && preg_match( '/^\-?[0-9\.]+$/', $p['lat'] )
					&& isset( $p['lng'] ) && preg_match( '/^\-?[0-9\.]+$/', $p['lng'] ) ){
			$lat = $p['lat'];
			$lng = $p['lng'];
		} elseif ( isset( $p['addr'] ) && $p['addr'] ) {
			if ( $content ) {
				$addr = esc_html( $p['addr'] );
			} else {
				$content = esc_html( $p['addr'] );
			}
		} elseif ( ! $content ) {
			return;
		}
		return sprintf(
			'<div class="%s"><div data-breakpoint="%s" data-lat="%s" data-lng="%s" data-zoom="%s" data-addr="%s" style="width:%s;height:%s;">%s</div></div>',
			apply_filters( 'gmogooglemap_class_name', $this->class_name ),
			$breakpoint,
			$lat,
			$lng,
			$zoom,
			$addr,
			$w,
			$h,
			trim( $content )
		);
	}

	private function get_shortcode_tag()
	{
		return apply_filters( 'gmogooglemap_shortcode_tag', $this->shortcode_tag );
	}

} // end class


// EOF
