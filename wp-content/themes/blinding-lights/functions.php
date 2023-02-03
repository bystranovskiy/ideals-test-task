<?php

defined('THEME_URI') || define('THEME_URI', get_template_directory_uri());
defined('THEME_DIR') || define('THEME_DIR', get_template_directory());
const THEME_NAME = 'blinding-lights';

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('theme_setup')) {

    function theme_setup()
    {
        load_theme_textdomain(THEME_NAME, get_template_directory() . '/languages');

        register_nav_menus(array(
            'primary' => __('Primary Menu', THEME_NAME),
            'secondary' => __('Secondary Menu', THEME_NAME),
        ));

        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('editor-styles');
        add_theme_support('html5', array('style', 'script'));
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-logo', array(
            'height' => 37,
            'width' => 64,
            'flex-height' => true,
            'flex-width' => true,
            'unlink-homepage-logo' => true,
        ));

        add_image_size('featured-image', 810, 455);
        add_image_size('square', 450, 450, true);

    }
}

add_action('after_setup_theme', 'theme_setup');


function theme_scripts()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style('ideals-icons', THEME_URI . '/src/fonts/ideals-icons/css/ideals.css', array(), _S_VERSION);
    wp_enqueue_style('main-styles', THEME_URI . '/build/main.min.css', array(), _S_VERSION);

    wp_enqueue_script('main-scripts', THEME_URI . '/build/main.min.js', array('jquery'), _S_VERSION);

    if (is_front_page()) {
        wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
        wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
    }

    if (is_home() || is_archive() || is_category()) {
        wp_enqueue_style('archive', THEME_URI . '/build/archive.min.css', array());
    }
}

add_action('wp_enqueue_scripts', 'theme_scripts');


function register_cpt_clients()
{

    $supports = array(
        'title',
    );

    $labels = array(
        'name' => 'Clients',
        'singular_name' => 'Client',
        'all_items' => 'All Clients'
    );

    $args = array(
        'labels' => $labels,
        'supports' => $supports,
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBVcGxvYWRlZCB0bzogU1ZHIFJlcG8sIHd3dy5zdmdyZXBvLmNvbSwgR2VuZXJhdG9yOiBTVkcgUmVwbyBNaXhlciBUb29scyAtLT4NCjxzdmcgZmlsbD0iIzAwMDAwMCIgaGVpZ2h0PSI4MDBweCIgd2lkdGg9IjgwMHB4IiB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiANCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yMDguMDU3LDM2Mi41MTVjLTE1LjYwMy0xMC4wODItMzYuNDI0LTUuNjA2LTQ2LjUwNiw5Ljk5NmMxMC4wODItMTUuNjAzLDUuNjA2LTM2LjQyNC05Ljk5Ni00Ni41MDYNCgkJCWMtMTUuNjAzLTEwLjA4Mi0zNi40MjQtNS42MDYtNDYuNTA2LDkuOTk2YzEwLjA4Mi0xNS42MDMsNS42MDYtMzYuNDI0LTkuOTk2LTQ2LjUwNmMtMTUuNjAzLTEwLjA4Mi0zNi40MjQtNS42MDYtNDYuNTA2LDkuOTk2DQoJCQlsLTM0LjQ4NCw1My4zNjdjLTEwLjA4MiwxNS42MDMtNS42MDYsMzYuNDI0LDkuOTk2LDQ2LjUwNmMxNS42MDMsMTAuMDgyLDM2LjQyNCw1LjYwNiw0Ni41MDYtOS45OTYNCgkJCWMtMTAuMDgyLDE1LjYwMy01LjYwNiwzNi40MjQsOS45OTYsNDYuNTA2YzE1LjYwMywxMC4wODIsMzYuNDI0LDUuNjA2LDQ2LjUwNi05Ljk5NmMtMTAuMDgyLDE1LjYwMy01LjYwNiwzNi40MjQsOS45OTYsNDYuNTA2DQoJCQlzMzYuNDI0LDUuNjA2LDQ2LjUwNi05Ljk5NmwzNC40ODQtNTMuMzY3QzIyOC4xMzUsMzkzLjQxOCwyMjMuNjU5LDM3Mi41OTYsMjA4LjA1NywzNjIuNTE1eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNNDM2LjYwMSwyNzAuNDlsLTAuOTAyLTAuNTg3TDI2NC4zMSwxNTguMzExbC0yNy4zMDksNDEuNDQ4Yy0xMi4yMDEsMTguNzc3LTMyLjg0NywyOS45ODMtNTUuMjY0LDI5Ljk4Mw0KCQkJYy0xMi42ODYsMC0yNS4wMzctMy42NDctMzUuNzE2LTEwLjU0OGMtMzAuNTA1LTE5LjcxMi0zOS4yODctNjAuNTY2LTE5LjYwMy05MS4wMjlsMTYuNDA1LTI1LjQ3NUw4NS4yNjYsODguODQzTDAsMjY0Ljg3Nw0KCQkJbDIwLjkwOSwxNy45OTZsMC41NjUtMC44NzVjMTIuMTktMTguODY1LDMyLjg4NS0zMC4xMjcsNTUuMzU4LTMwLjEyNWMxMi42ODYsMC4wMDEsMjUuMDM2LDMuNjQ5LDM1LjcxMywxMC41NDgNCgkJCWMxMC4xMSw2LjUzMiwxOC4wNjYsMTUuNDkyLDIzLjI2NywyNi4wMDhjMTEuODEyLDAuNDQ0LDIzLjI1NSw0LjA1MywzMy4yMzUsMTAuNTAyYzEwLjExLDYuNTMyLDE4LjA2NiwxNS40OTIsMjMuMjY3LDI2LjAwNw0KCQkJYzExLjgxMiwwLjQ0NCwyMy4yNTQsNC4wNTEsMzMuMjM1LDEwLjUwM2MzMC41MDUsMTkuNzExLDM5LjI4Nyw2MC41NjYsMTkuNTc1LDkxLjA3MWwtMTguMjg0LDI4LjI5NmwyOC4zMDcsMTguNzY3DQoJCQljMTUuNjAzLDEwLjA4MiwzNi40MjQsNS42MDYsNDYuNTA2LTkuOTk2YzEwLjA4Mi0xNS42MDMsNS42MDYtMzYuNDI0LTkuOTk2LTQ2LjUwNmwxMS40NDIsNy4zOTQNCgkJCWMxNS42MDMsMTAuMDgyLDM2LjQyNCw1LjYwNiw0Ni41MDYtOS45OTZjMTAuMDgyLTE1LjYwMyw1LjYwNi0zNi40MjMtOS45OTUtNDYuNTA1bDExLjQ0MSw3LjM5Mw0KCQkJYzE1LjYwMywxMC4wODIsMzYuNDI0LDUuNjA2LDQ2LjUwNi05Ljk5NmMxMC4wODEtMTUuNjAyLDUuNjA4LTM2LjQyLTkuOTkyLTQ2LjUwM2wxMS40MzgsNy4zOTENCgkJCWMxNS42MDMsMTAuMDgyLDM2LjQyNCw1LjYwNiw0Ni41MDYtOS45OTZDNDU1LjM1NCwzMDEuMDIyLDQ1MS4zMTYsMjgwLjgyMSw0MzYuNjAxLDI3MC40OXoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTQ2Ny4wNjgsMzMuMDM1bC0yNDYuMTAxLDcuODM5bC02Ny40NDksMTA0Ljc0Yy0xMC4wODIsMTUuNjAzLTUuNjA2LDM2LjQyNCw5Ljk5Niw0Ni41MDYNCgkJCWMxNS42MDMsMTAuMDgyLDM2LjQyNCw1LjYwNiw0Ni41MDYtOS45OTZsNDUuMDEzLTY4LjMxNmw5Ljg1NCw2LjQxNmwxNzcuNjI1LDExNS42NTJMNTEyLDE4NC40MTlMNDY3LjA2OCwzMy4wMzV6Ii8+DQoJPC9nPg0KPC9nPg0KPC9zdmc+',
        'show_in_rest' => true,
        'public' => true,
        'has_archive' => false,
        'query_var' => true,
    );
    register_post_type('clients', $args);
}

add_action('init', 'register_cpt_clients');


function redirect_single_clients()
{
    if (!is_singular('clients'))
        return;
    wp_redirect(get_home_url(), 301);
    exit;
}

add_action('template_redirect', 'redirect_single_clients');


function add_sidebar()
{
    $args = array(
        'id' => 'sidebar',
        'name' => 'Sidebar',
        'class' => 'widget',
        'before_title' => '<header><h2 class="widget-title">',
        'after_title' => '</h2></header>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    );
    register_sidebar($args);
}

add_action('widgets_init', 'add_sidebar');


function filter_block_categories_when_post_provided($block_categories, $editor_context)
{
    if (!empty($editor_context->post)) {
        $block_categories[] = array(
            'slug' => 'frontpage',
            'title' => 'Frontpage Blocks',
            'icon' => 'admin-home',
        );
    }
    return $block_categories;
}

add_filter('block_categories_all', 'filter_block_categories_when_post_provided', 10, 2);


if (!function_exists('pagination')) :

    function pagination($paged = '', $max_page = '')
    {
        $big = 999999999; // need an unlikely integer
        if (!$paged) {
            $paged = get_query_var('paged');
        }

        if (!$max_page) {
            global $wp_query;
            $max_page = $wp_query->max_num_pages ?? 1;
        }
        echo '<div class="nav-links">' . paginate_links(
                array(
                    'current' => max(1, $paged),
                    'total' => $max_page,
                    'mid_size' => 1,
                    'prev_text' => '<i class="icon-left-dir"></i>',
                    'next_text' => '<i class="icon-right-dir"></i>',
                )
            ) . '</div>';
    }
endif;


function admin_frontpage_styles()
{
    if (get_the_ID() == get_option('page_on_front')) {
        echo '<link rel="stylesheet" id="frontpage-style-css" href="'.THEME_URI.'/build/main.min.css" type="text/css" media="all" />
        <link rel="stylesheet" id="ideals-icons" href="' . THEME_URI . '/src/fonts/ideals-icons/css/ideals.css" type="text/css" media="all" />
        <style>
            html :where(.wp-block){max-width:100%;}
            .acf-block-body{color: #838383;}
        </style>
        ';
    }
}

add_action('admin_head', 'admin_frontpage_styles');