<?php
namespace MikadoCore\CPT\Clients;

use MikadoCore\Lib\PostTypeInterface;


/**
 * Class ClientsRegister
 * @package MikadoCore\CPT\Clients
 */
class ClientsRegister implements PostTypeInterface
{
    /**
     * @var string
     */
    private $base;
    /**
     * @var string
     */
    private $taxBase;

    public function __construct() {
        $this->base = 'clients';
        $this->taxBase = 'clients-category';
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $industrialist_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        if (mkd_core_theme_installed()) {
            $menuPosition = $industrialist_Framework->getSkin()->getMenuItemPosition('clients');
            $menuIcon = $industrialist_Framework->getSkin()->getMenuIcon('clients');
        }

        register_post_type($this->base,
            array(
                'labels' => array(
                    'name' => esc_html__('Clients', 'mkd-core'),
                    'menu_name' => esc_html__('Clients', 'mkd-core'),
                    'all_items' => esc_html__('Clients', 'mkd-core'),
                    'add_new' => esc_html__('Add New Client', 'mkd-core'),
                    'singular_name' => esc_html__('Client', 'mkd-core'),
                    'add_item' => esc_html__('New Client', 'mkd-core'),
                    'add_new_item' => esc_html__('Add New Client', 'mkd-core'),
                    'edit_item' => esc_html__('Edit Client', 'mkd-core')
                ),
                'public' => false,
                'show_in_menu' => true,
                'rewrite' => array('slug' => 'clients'),
                'menu_position' => $menuPosition,
                'show_ui' => true,
                'has_archive' => false,
                'hierarchical' => false,
                'supports' => array('title'),
                'menu_icon' => $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__('Clients Category', 'mkd-core'),
            'singular_name' => esc_html__('Clients Category', 'mkd-core'),
            'search_items' => esc_html__('Search Clients Categories', 'mkd-core'),
            'all_items' => esc_html__('All Clients Categories', 'mkd-core'),
            'parent_item' => esc_html__('Parent Clients Category', 'mkd-core'),
            'parent_item_colon' => esc_html__('Parent Clients Category:', 'mkd-core'),
            'edit_item' => esc_html__('Edit Clients Category', 'mkd-core'),
            'update_item' => esc_html__('Update Clients Category', 'mkd-core'),
            'add_new_item' => esc_html__('Add New Clients Category', 'mkd-core'),
            'new_item_name' => esc_html__('New Clients Category Name', 'mkd-core'),
            'menu_name' => esc_html__('Clients Categories', 'mkd-core'),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'clients-category'),
        ));
    }

}