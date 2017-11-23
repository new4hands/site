<?php
/*
 * Plugin Name: Instagram Gallery
 * Description: Display pictures on your website from Instagram.
 * Author: Karan Singh
 * Author URI: https://www.karansingh.ml/
 * Text Domain: insta-gallery
 * Version: 1.4.6
 */

// plugin global constants
define('INSGALLERY_VER', '1.4.6');
define('INSGALLERY_PATH', plugin_dir_path(__FILE__));
define('INSGALLERY_URL', plugins_url('', __FILE__));

// define('INSGALLERY_PLUGIN_DIR', plugin_basename(dirname(__FILE__)));
// define('INSGALLERY_DEBUG', false);
class INSGALLERY
{

    public function __construct()
    {
        register_activation_hook(__FILE__, array(
            $this,
            'activate'
        ));
        register_deactivation_hook(__FILE__, array(
            $this,
            'deactivate'
        ));
        
        if (is_admin()) {
            add_action('admin_menu', array(
                $this,
                'loadMenus'
            ));
            // add setting link
            add_filter('plugin_action_links', array(
                $this,
                'insgal_add_action_plugin'
            ), 10, 5);
        }
        
        add_action('admin_enqueue_scripts', array(
            $this,
            'load_admin_scripts'
        ));
        
        include_once (INSGALLERY_PATH . 'app/wp-front.php');
        
        // save ig adv. setting
        add_action('wp_ajax_save_igadvs', array(
            $this,
            'save_igadvs'
        ));
    }

    public function activate()
    {}

    public function deactivate()
    {}

    public function save_igadvs()
    {
        if (! isset($_POST['igadvs_nonce']) || ! wp_verify_nonce( $_POST['igadvs_nonce'], 'igadvs_nonce_key')) {
            exit(json_encode(array('igsuccess'=>true,'message'=>'Invalid Request.')));
        }
        $igs_spinner = '';
        $igs_flush = (isset($_POST['igs-flush']) && $_POST['igs-flush']) ? true : false;
        if(!empty($_POST['igs-spinner'])){
            $igs_spinner = $_POST['igs-spinner'];
            if (! filter_var($igs_spinner, FILTER_VALIDATE_URL)) {
                exit(json_encode(array('igsuccess'=>true,'message'=>'Invalid Spinner URL.')));
            }            
        }
        $insta_gallery_setting = array(
            'igs_spinner' => $igs_spinner,
            'igs_flush' => $igs_flush,
        );
        update_option('insta_gallery_setting', $insta_gallery_setting);
        $reponse = array('igsuccess'=>true,'message'=> 'setting updated successfully');
        echo json_encode($reponse);
        exit();
    }

    function load_admin_scripts($hook)
    {
        // Load only on plugin page
        if ($hook != 'settings_page_insta_gallery') {
            return;
        }
        wp_enqueue_style('insta-gallery-admin', INSGALLERY_URL . '/assets/admin-style.css');
    }

    function loadMenus()
    {
        add_options_page('Instagram Gallery', 'Instagram Gallery', 'manage_options', 'insta_gallery', array(
            $this,
            'loadPanel'
        ));
        // add_menu_page();
    }

    function loadPanel()
    {
        require_once (INSGALLERY_PATH . 'app/wp-panel.php');
    }

    function insgal_add_action_plugin($actions, $plugin_file)
    {
        static $plugin;
        
        if (! isset($plugin))
            $plugin = plugin_basename(__FILE__);
        if ($plugin == $plugin_file) {
            
            $settings = array(
                'settings' => '<a href="options-general.php?page=insta_gallery">' . __('Settings', 'General') . '</a>'
            );
            
            $actions = array_merge($settings, $actions);
        }
        
        return $actions;
    }
}
new INSGALLERY();
