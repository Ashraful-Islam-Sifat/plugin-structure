<?php 
/**
 * Plugin Name: weDevs Academy
 * Description: A tutorial plugin
 * Author: Sifat
 * Version: 1.0.0
 */

 if ( ! defined('ABSPATH') ) {
    exit;
 }

 require_once __DIR__ . '/vendor/autoload.php';

 /**
  * The main plugin class
  */
  final class WeDevs_Academy {

    /**
     * Plugin version
     * 
     * @var string
     */
    const version = '1.0';

    /**
     * Class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate' ] );

        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
    }

    /**
     * Initializes a singleton insetance
     * 
     * @return \WeDevs_Academy
     */
    public static function init() {
        static $instance = false;

        if( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     * 
     * @return void
     */
    public function define_constants() {
        define( 'WD_ACADEMY_VERSION', self::version );
        define( 'WD_ACADEMY_FILE', __FILE__ );
        define( 'WD_ACADEMY_PATH', __DIR__ );
        define( 'WD_ACADEMY_URL', plugins_url( '', WD_ACADEMY_FILE ) );
        define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     * 
     * @return void
     */
    public function init_plugin() {
        new WeDevs\Academy\Admin\Menu();
    }


    /**
     * Do stuff upn plugin activation
     * 
     * @return void
     */
    public function activate() {
        $installed = get_option( 'wd_academy_installed' );

        if ( ! $installed ) {
            update_option( 'wd_academy_installed', time() );
        }
        update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
    }
  }

  /**
   * Initializes the main plugin
   * 
   * @return \WeDevs_Academy
   */
  function wedevs_academy() {
    return WeDevs_Academy::init();
  }

  //kick-off the plugin
  wedevs_academy();

?>