<?php
if (!function_exists ('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
class IndustrialistMikadoImport {

    public $message = "";
    public $attachments = false;
    function __construct() {
        add_action('admin_menu', array(&$this, 'mkd_admin_import'));
        add_action('admin_init', array(&$this, 'mkd_register_theme_settings'));

    }
    function mkd_register_theme_settings() {
        register_setting( 'mkd_options_import_page', 'mkd_options_import');
    }

    function init_mkd_import() {
        if(isset($_REQUEST['import_option'])) {
            $import_option = $_REQUEST['import_option'];
            if($import_option == 'content'){
                $this->import_content('proya_content.xml');
            }elseif($import_option == 'custom_sidebars') {
                $this->import_custom_sidebars('custom_sidebars.txt');
            } elseif($import_option == 'widgets') {
                $this->import_widgets('widgets.txt','custom_sidebars.txt');
            } elseif($import_option == 'options'){
                $this->import_options('options.txt');
            }elseif($import_option == 'menus'){
                $this->import_menus('menus.txt');
            }elseif($import_option == 'settingpages'){
                $this->import_settings_pages('settingpages.txt');
            }elseif($import_option == 'complete_content'){
                $this->import_content('proya_content.xml');
                $this->import_options('options.txt');
                $this->import_widgets('widgets.txt','custom_sidebars.txt');
                $this->import_menus('menus.txt');
                $this->import_settings_pages('settingpages.txt');
                $this->message = esc_html__("Content imported successfully", "mkd-core");
            }
        }
    }

    public function import_content($file){

        ob_start();
        require_once(MIKADO_CORE_ABS_PATH . '/import/class.wordpress-importer.php');
        $mkd_import = new WP_Import();
        set_time_limit(0);

        $mkd_import->fetch_attachments = $this->attachments;
        $returned_value = $mkd_import->import($file);
        if(is_wp_error($returned_value)){
            $this->message = esc_html__("An Error Occurred During Import", "mkd-core");
        }
        else {
            $this->message = esc_html__("Content imported successfully", "mkd-core");
        }
        ob_get_clean();
    }

    public function import_widgets($file, $file2){
        $this->import_custom_sidebars($file2);
        $options = $this->file_options($file);
        foreach ((array) $options['widgets'] as $mkd_widget_id => $mkd_widget_data) {
            update_option( 'widget_' . $mkd_widget_id, $mkd_widget_data );
        }
        $this->import_sidebars_widgets($file);
        $this->message = esc_html__("Widgets imported successfully", "mkd-core");
    }

    public function import_sidebars_widgets($file){
        $mkd_sidebars = get_option("sidebars_widgets");
        unset($mkd_sidebars['array_version']);
        $data = $this->file_options($file);
        if ( is_array($data['sidebars']) ) {
            $mkd_sidebars = array_merge( (array) $mkd_sidebars, (array) $data['sidebars'] );
            unset($mkd_sidebars['wp_inactive_widgets']);
            $mkd_sidebars = array_merge(array('wp_inactive_widgets' => array()), $mkd_sidebars);
            $mkd_sidebars['array_version'] = 2;
            wp_set_sidebars_widgets($mkd_sidebars);
        }
    }

    public function import_custom_sidebars($file){
        $options = $this->file_options($file);
        update_option( 'mkd_sidebars', $options);
        $this->message = esc_html__("Custom sidebars imported successfully", "mkd-core");
    }

    public function import_options($file){
        $options = $this->file_options($file);
        update_option( 'mkd_industrialist_options', $options);
        $this->message = esc_html__("Options imported successfully", "mkd-core");
    }

    public function import_menus($file){
        global $wpdb;
        $mkd_terms_table = $wpdb->prefix . "terms";
        $this->menus_data = $this->file_options($file);
        $menu_array = array();
        foreach ($this->menus_data as $registered_menu => $menu_slug) {
            $term_rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM $mkd_terms_table where slug=%s", $menu_slug), ARRAY_A);
            if(isset($term_rows[0]['term_id'])) {
                $term_id_by_slug = $term_rows[0]['term_id'];
            } else {
                $term_id_by_slug = null;
            }
            $menu_array[$registered_menu] = $term_id_by_slug;
        }
        set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );
    }
    
    public function import_settings_pages($file){
        $pages = $this->file_options($file);
        foreach($pages as $mkd_page_option => $mkd_page_id){
            update_option( $mkd_page_option, $mkd_page_id);
        }
    }

    public function file_options($file){
$file_content = "";
        $file_for_import = get_template_directory() . '/includes/import/files/' . $file;
        /*if ( file_exists($file_for_import) ) {
            $file_content = $this->mkd_file_contents($file_for_import);
        } else {
            $this->message = esc_html__("File doesn't exist", "mkd-core");
        }*/
        $file_content = $this->mkd_file_contents($file);
        if ($file_content) {
            $unserialized_content = unserialize(base64_decode($file_content));
            if ($unserialized_content) {
                return $unserialized_content;
            }
        }
        return false;
    }

    function mkd_file_contents( $path ) {
		$url      = "http://export.mikado-themes.com/".$path;
		$response = wp_remote_get($url);
		$body     = wp_remote_retrieve_body($response);
		return $body;
    }

    function mkd_admin_import() {
        if (mkd_core_theme_installed()) {
            global $industrialist_Framework;

            $slug = "_tabimport";
            $this->pagehook = add_submenu_page(
                'industrialist_mikado_theme_menu',
                esc_html__('Mikado Options - Mikado Import', 'mkd-core'),                  // The value used to populate the browser's title bar when the menu page is active
                esc_html__('Import',  'mkd-core'),                       // The text of the menu in the administrator's sidebar
                'administrator',                  // What roles are able to access the menu
                'industrialist_mikado_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
                array($industrialist_Framework->getSkin(), 'renderImport')
            );

            add_action('admin_print_scripts-'.$this->pagehook, 'industrialist_mikado_enqueue_admin_scripts');
            add_action('admin_print_styles-'.$this->pagehook, 'industrialist_mikado_enqueue_admin_styles');
        }            
    }
}

function mkd_init_import_object(){
    global $industrialist_import_object;
    $industrialist_import_object = new IndustrialistMikadoImport();
}

add_action('init', 'mkd_init_import_object');

if(!function_exists('industrialist_mikado_dataImport')){
    function industrialist_mikado_dataImport(){
        global $industrialist_import_object;

        if ($_POST['import_attachments'] == 1)
            $industrialist_import_object->attachments = true;
        else
            $industrialist_import_object->attachments = false;

        $folder = "industrialist/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $industrialist_import_object->import_content($folder.$_POST['xml']);

        die();
    }

    add_action('wp_ajax_mkd_dataImport', 'industrialist_mikado_dataImport');
}

if(!function_exists('industrialist_mikado_widgetsImport')){
    function industrialist_mikado_widgetsImport(){
        global $industrialist_import_object;

        $folder = "industrialist/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $industrialist_import_object->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');

        die();
    }

    add_action('wp_ajax_mkd_widgetsImport', 'industrialist_mikado_widgetsImport');
}

if(!function_exists('industrialist_mikado_optionsImport')){
    function industrialist_mikado_optionsImport(){
        global $industrialist_import_object;

        $folder = "industrialist/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $industrialist_import_object->import_options($folder.'options.txt');

        die();
    }

    add_action('wp_ajax_mkd_optionsImport', 'industrialist_mikado_optionsImport');
}

if(!function_exists('industrialist_mikado_otherImport')){
    function industrialist_mikado_otherImport(){
        global $industrialist_import_object;

        $folder = "industrialist/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $industrialist_import_object->import_options($folder.'options.txt');
        $industrialist_import_object->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');
        $industrialist_import_object->import_menus($folder.'menus.txt');
        $industrialist_import_object->import_settings_pages($folder.'settingpages.txt');

        die();
    }

    add_action('wp_ajax_mkd_otherImport', 'industrialist_mikado_otherImport');
}