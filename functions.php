<?php

    require get_template_directory() . '/includes/widgets.php';

    //Agregar imagenes destacadas, logo titulo

    function templete_setup(){
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        add_theme_support( 'title-tag' );
    }

    add_action('after_setup_theme','templete_setup');

    function mytheme_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'main_menu' ),
            'footer_menu'  => __( 'Footer Menu', 'footer_menu' ),
        ) );
    }
    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );


    function styles_scripts_darkBlog() {
        //styles
    wp_enqueue_style('app',  get_template_directory_uri() . '/build/css/app.css', array(), '1.0.0');
        wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');

        //scripts
        wp_enqueue_script( 'main', get_template_directory_uri(  ) . '/build/js/main.js', array(), '1.0.0' );
    }

    add_action('wp_enqueue_scripts', 'styles_scripts_darkBlog');

    // Zona de widgets
    function add_theme_widget_zone(){

        register_sidebar(array(
            'name' => 'Theme sidebar 1',
            'id' => 'sidebar_1',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-center text-white">',
            'after_title' => '</h3>'
        ));

        register_sidebar(array(
            'name' => 'Theme sidebar 2',
            'id' => 'sidebar_2',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-center text-white">',
            'after_title' => '</h3>'
        ));
    }

    add_action( 'widgets_init','add_theme_widget_zone');
