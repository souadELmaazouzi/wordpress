<?php

// Enregistrer les menus

// Ajouter le support des images à la une
function register_my_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'your-theme'),
    ));
}
add_action('init', 'register_my_menus');
function theme_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_custom_logo_setup');
add_theme_support('custom-header', array(
    'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
    'width'         => 1920,
    'height'        => 500,
    'flex-width'    => true,
    'flex-height'   => true,
));
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $icon_class = get_field('menu_icon', $item); // Get custom field from ACF
        $output .= '<li class="menu-item"><a href="' . esc_url($item->url) . '">';
        
        if ($icon_class) {
            $output .= '<i class="' . esc_attr($icon_class) . ' navicon"></i> ';
        }

        $output .= '<span>' . esc_html($item->title) . '</span></a></li>';
    }
}
add_theme_support('custom-header', array(
    'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
    'width'         => 1920,
    'height'        => 500,
    'flex-width'    => true,
    'flex-height'   => true,
));

function mon_theme_support() {
    add_theme_support('post-thumbnails'); // Permet d'ajouter des images à la une
}
add_action('after_setup_theme', 'mon_theme_support');

// Enregistrer les styles et scripts
function mon_theme_styles() {
    // Enqueue GLightbox CSS
    wp_enqueue_style('glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    
    // Enqueue Bootstrap CSS (if you're using Bootstrap)
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    
    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
    
    // Enqueue Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css');
    
    // Enqueue main theme styles
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mon_theme_styles');

// Enregistrer les scripts JavaScript
function mon_theme_scripts() {
    // Enqueue Swiper JS
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '', true);
    
    // Enqueue AOS (Animate On Scroll) JS
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('mon-theme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '', true);
    
    // Enqueue PHP email form validation script
    wp_enqueue_script('php-email-form-js', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), '', true);
    
    // Enqueue Typed.js
    wp_enqueue_script('typed-js', get_template_directory_uri() . '/assets/vendor/typed.js/typed.umd.js', array(), '', true);
    
    // Enqueue PureCounter.js
    wp_enqueue_script('purecounter-js', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), '', true);
    
    // Enqueue Waypoints.js
    wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), '', true);
    
    // Enqueue GLightbox.js
    wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '', true);
    
    // Enqueue ImagesLoaded.js
    wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), '', true);
    
    // Enqueue Isotope.js
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), '', true);
    
    // Enqueue your custom JavaScript file (main.js)
    wp_enqueue_script('mon-theme-main-js', get_template_directory_uri() . '/main.js', array('jquery', 'mon-theme-bootstrap'), '', true);
}
add_action('wp_enqueue_scripts', 'mon_theme_scripts');

// Add Favicons
function mon_theme_favicons() {
    echo '<link href="' . get_template_directory_uri() . '/assets/img/favicon.png" rel="icon">';
    echo '<link href="' . get_template_directory_uri() . '/assets/img/apple-touch-icon.png" rel="apple-touch-icon">';
}
add_action('wp_head', 'mon_theme_favicons');
