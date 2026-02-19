<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_title_rss(  ); ?></title>
    <link rel="stylesheet" href="/build/css/app.css">
    
    <?php wp_head(); ?> 
</head>
<body>
<nav class="navbar">
    <div class="nav-left">
        <a href="<?php echo site_url(); ?>">
            <div class="logo">
                <h2><?php echo get_bloginfo('name') ?></h2>
            </div>
        </a>
    </div>

    <?php
        $args = [
            'theme_location' => 'primary_menu',
            'container' => false, // Quitamos el div contenedor innecesario
            'items_wrap' => '<ul class="menu">%3$s</ul>' // Forzamos la clase .menu al UL
        ];
        wp_nav_menu( $args );
    ?>
    <div class="burguer-button" id="mobile-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>            
    </div>
</nav>


<div class="menu-layout" id="menu-mobile">
    <a href="<?php echo site_url(); ?>">
        <div class="logo">
            <h2><?php echo get_bloginfo('name') ?></h2>
        </div>
    </a>
    <?php
        wp_nav_menu( [
            'theme_location' => 'primary_menu',
            'container' => false,
            'items_wrap' => '<ul class="menu-mobile-list">%3$s</ul>'
        ] );
    ?>
</div>
    <!---Menu Layout-->