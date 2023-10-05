<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('site'); ?>>

        <header class="site__header main-header">

        <aside class="header__bar">
            <ul>
                <?php dynamic_sidebar( 'header-bar' ); ?>
            </ul>
        </aside>

        </header>

        <?php if (is_category() || is_single() ){
        echo '<div id="second-nav">';
	        $image_url = wp_get_attachment_image_src(59, 'full');
	    echo '<img class="logo" src="'.$image_url[0].'">';

           
                wp_nav_menu( 
                    array( 
                        'theme_location' => 'second', 
                        'container' => 'ul', 
                        'menu_class' => 'site__second__nav',
                    ) 
                ); 
       echo  '</div>';
            }
       ?>
            
        <?php the_breadcrumb(); ?>
        

    <?php wp_body_open(); ?>