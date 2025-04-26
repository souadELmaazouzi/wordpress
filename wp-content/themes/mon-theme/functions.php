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
        $icon_class = get_theme_mod('menu_icon_' . $item->ID, ''); // Retrieve custom icon class from customizer
        $output .= '<li class="menu-item"><a href="' . esc_url($item->url) . '">';
        
        // Display the icon if available
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
// Register Customizer Section for Menu Icons
function custommenu_customize_register($wp_customize) {
    // Create a new section for Menu Icons in Customizer
    $wp_customize->add_section('menu_icons_section', array(
        'title'    => __('Menu Icons', 'your-theme'),
        'priority' => 30,
    ));

    // Get all registered menus
    $locations = get_registered_nav_menus();
    
    // Loop through each menu location to add an icon setting for each item
    foreach ($locations as $location => $description) {
        $menu_items = wp_get_nav_menu_items($location);
        
        foreach ($menu_items as $item) {
            $wp_customize->add_setting('menu_icon_' . $item->ID, array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control('menu_icon_' . $item->ID, array(
                'label'       => __('Icon for ' . $item->title, 'your-theme'),
                'section'     => 'menu_icons_section',
                'type'        => 'text',
                'description' => __('Enter a Font Awesome or Bootstrap icon class, e.g., "bi-house" or "bi-person".'),
            ));
        }
    }
}
add_action('customize_register', 'custommenu_customize_register');



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
function customize_resume_section($wp_customize) {

    // Section
    $wp_customize->add_section('resume_section', array(
        'title'    => __('Resume Section', 'yourtheme'),
        'priority' => 30,
    ));

    // === Section Title ===
    $wp_customize->add_setting('resume_title', array(
        'default' => 'Resume',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_title', array(
        'label' => __('Section Title', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_description', array(
        'default' => 'Magnam dolores commodi suscipit...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_description', array(
        'label' => __('Section Description', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));

    // === Summary ===
    $wp_customize->add_setting('resume_summary_name', array(
        'default' => 'User name',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_summary_name', array(
        'label' => __('Summary Name', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_summary_desc', array(
        'default' => 'Innovative and deadline-driven Graphic Designer...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_summary_desc', array(
        'label' => __('Summary Description', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('resume_summary_address', array(
        'default' => 'Portland par 127,Orlando, FL',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_summary_address', array(
        'label' => __('Address', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_summary_phone', array(
        'default' => '(123) 456-7891',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_summary_phone', array(
        'label' => __('Phone', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_summary_email', array(
        'default' => 'alice.barkley@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('resume_summary_email', array(
        'label' => __('Email', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'email',
    ));

    // === Education and Experience would follow the same way...
        // === Education ===
    // Education Item 1
    $wp_customize->add_setting('resume_edu1_title', array(
        'default' => 'Master of Fine Arts & Graphic Design',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu1_title', array(
        'label' => __('Education 1: Title', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu1_years', array(
        'default' => '2015 - 2016',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu1_years', array(
        'label' => __('Education 1: Years', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu1_school', array(
        'default' => 'Rochester Institute of Technology, Rochester, NY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu1_school', array(
        'label' => __('Education 1: School', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu1_desc', array(
        'default' => 'Qui deserunt veniam. Et sed aliquam labore...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_edu1_desc', array(
        'label' => __('Education 1: Description', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));

    // Education Item 2
    $wp_customize->add_setting('resume_edu2_title', array(
        'default' => 'Bachelor of Fine Arts & Graphic Design',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu2_title', array(
        'label' => __('Education 2: Title', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu2_years', array(
        'default' => '2010 - 2014',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu2_years', array(
        'label' => __('Education 2: Years', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu2_school', array(
        'default' => 'Rochester Institute of Technology, Rochester, NY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_edu2_school', array(
        'label' => __('Education 2: School', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_edu2_desc', array(
        'default' => 'Quia nobis sequi est occaecati aut...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_edu2_desc', array(
        'label' => __('Education 2: Description', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));
        // === Experience ===
    // Experience 1
    $wp_customize->add_setting('resume_exp1_title', array(
        'default' => 'Senior graphic design specialist',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp1_title', array(
        'label' => __('Experience 1: Title', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp1_years', array(
        'default' => '2019 - Present',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp1_years', array(
        'label' => __('Experience 1: Years', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp1_company', array(
        'default' => 'Experion, New York, NY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp1_company', array(
        'label' => __('Experience 1: Company', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp1_tasks', array(
        'default' => "Lead in the design, development, and implementation of the graphic, layout, and production communication materials\nDelegate tasks to the 7 members of the design team and provide counsel on all aspects of the project.\nSupervise the assessment of all graphic materials in order to ensure quality and accuracy of the design\nOversee the efficient use of production project budgets ranging from \$2,000 - \$25,000",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_exp1_tasks', array(
        'label' => __('Experience 1: Tasks (one per line)', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));

    // Experience 2
    $wp_customize->add_setting('resume_exp2_title', array(
        'default' => 'Graphic design specialist',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp2_title', array(
        'label' => __('Experience 2: Title', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp2_years', array(
        'default' => '2017 - 2018',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp2_years', array(
        'label' => __('Experience 2: Years', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp2_company', array(
        'default' => 'Stepping Stone Advertising, New York, NY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('resume_exp2_company', array(
        'label' => __('Experience 2: Company', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('resume_exp2_tasks', array(
        'default' => "Developed numerous marketing programs (logos, brochures, infographics, presentations, and advertisements).\nManaged up to 5 projects or tasks at a given time while under pressure\nRecommended and consulted with clients on the most appropriate graphic design\nCreated 4+ design presentations and proposals a month for clients and account managers",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('resume_exp2_tasks', array(
        'label' => __('Experience 2: Tasks (one per line)', 'yourtheme'),
        'section' => 'resume_section',
        'type' => 'textarea',
    ));


}
add_action('customize_register', 'customize_resume_section');
// === Skills Section ===
function customize_skills_settings($wp_customize) {
    // Add Skills section
    $wp_customize->add_section('skills_section', array(
        'title' => __('Skills', 'yourtheme'),
        'priority' => 40,
    ));

    // Section description
    $wp_customize->add_setting('skills_section_description', array(
        'default' => 'Customize your skills',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('skills_section_description', array(
        'label' => __('Section Description', 'yourtheme'),
        'type' => 'text',
        'section' => 'skills_section',
    ));

    // Add up to 6 skills
    for ($i = 1; $i <= 6; $i++) {
        // Skill Name
        $wp_customize->add_setting("skill_{$i}_name", array(
            'default' => "Skill $i",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("skill_{$i}_name", array(
            'label' => __("Skill $i Name", 'yourtheme'),
            'type' => 'text',
            'section' => 'skills_section',
        ));

        // Skill Percentage
        $wp_customize->add_setting("skill_{$i}_percent", array(
            'default' => 100,
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control("skill_{$i}_percent", array(
            'label' => __("Skill $i Percentage", 'yourtheme'),
            'type' => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
            'section' => 'skills_section',
        ));

        // Optional: Skill Color
        $wp_customize->add_setting("skill_{$i}_color", array(
            'default' => '#00aaff',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "skill_{$i}_color", array(
            'label' => __("Skill $i Color", 'yourtheme'),
            'section' => 'skills_section',
        )));
    }
}
add_action('customize_register', 'customize_skills_settings');
function mytheme_customize_register( $wp_customize ) {
    // Add section for services
    $wp_customize->add_section( 'services_section', array(
        'title'    => __('Services Section', 'mytheme'),
        'priority' => 30,
    ));

    // Add setting for the number of service items
    $wp_customize->add_setting('number_of_services', array(
        'default'   => 4, // Default to 4 services
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('number_of_services', array(
        'label'   => __('Number of Service Items', 'mytheme'),
        'section' => 'services_section',
        'type'    => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ));

    // Loop through the number of services selected by the user
    $number_of_services = get_theme_mod('number_of_services', 3);

    for ($i = 1; $i <= $number_of_services; $i++) {
        // Service Icon
        $wp_customize->add_setting("service_item_{$i}_icon", array(
            'default'   => 'bi bi-activity', // Default icon
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("service_item_{$i}_icon", array(
            'label'   => __("Icon for Service Item $i", 'mytheme'),
            'section' => 'services_section',
            'type'    => 'text',
        ));

        // Service Title
        $wp_customize->add_setting("service_item_{$i}_title", array(
            'default'   => "Service $i",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("service_item_{$i}_title", array(
            'label'   => __("Title for Service Item $i", 'mytheme'),
            'section' => 'services_section',
            'type'    => 'text',
        ));

        // Service Description
        $wp_customize->add_setting("service_item_{$i}_description", array(
            'default'   => "Description for Service Item $i",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("service_item_{$i}_description", array(
            'label'   => __("Description for Service Item $i", 'mytheme'),
            'section' => 'services_section',
            'type'    => 'textarea',
        ));

        // Service Link
        $wp_customize->add_setting("service_item_{$i}_link", array(
            'default'   => '#',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("service_item_{$i}_link", array(
            'label'   => __("Link for Service Item $i", 'mytheme'),
            'section' => 'services_section',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'mytheme_customize_register');
function mythemes_customize_register($wp_customize) {
  
    // Add About Section
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'mytheme'),
        'priority' => 30,
    ));

    // About Section Title
    $wp_customize->add_setting('about_section_title', array(
        'default'   => 'About',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_section_title', array(
        'label'   => __('About Section Title', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // About Section Description
    $wp_customize->add_setting('about_section_description', array(
        'default'   => 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_section_description', array(
        'label'   => __('About Section Description', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'textarea',
    ));

    // Profile Image
    $wp_customize->add_setting('profile_image', array(
         'default'   => get_template_directory_uri() . '/assets/img/hero.jpeg', // set default image
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'profile_image', array(
        'label'    => __('Profile Image', 'mytheme'),
        'section'  => 'about_section',
        'settings' => 'profile_image',
    )));

    // UI/UX Designer Title
    $wp_customize->add_setting('uiux_designer_title', array(
        'default'   => 'UI/UX Designer & Web Developer.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('uiux_designer_title', array(
        'label'   => __('UI/UX Designer Title', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // About Me Paragraph
    $wp_customize->add_setting('about_me_paragraph', array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_me_paragraph', array(
        'label'   => __('About Me Paragraph', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'textarea',
    ));

    // Birthday
    $wp_customize->add_setting('birthday', array(
        'default'   => '1 May 1995',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('birthday', array(
        'label'   => __('Birthday', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // Website URL
    $wp_customize->add_setting('website', array(
        'default'   => 'www.example.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('website', array(
        'label'   => __('Website URL', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'url',
    ));

    // Phone Number
    $wp_customize->add_setting('phone', array(
        'default'   => '+123 456 7890',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('phone', array(
        'label'   => __('Phone Number', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // City
    $wp_customize->add_setting('city', array(
        'default'   => 'New York, USA',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('city', array(
        'label'   => __('City', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // Age
    $wp_customize->add_setting('age', array(
        'default'   => '30',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('age', array(
        'label'   => __('Age', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'number',
    ));

    // Degree
    $wp_customize->add_setting('degree', array(
        'default'   => 'Master',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('degree', array(
        'label'   => __('Degree', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('email', array(
        'default'   => 'email@example.com',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('email', array(
        'label'   => __('Email', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'email',
    ));

    // Freelance Status
    $wp_customize->add_setting('freelance', array(
        'default'   => 'Available',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('freelance', array(
        'label'   => __('Freelance Status', 'mytheme'),
        'section' => 'about_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'mythemes_customize_register');
function custom_customize_register($wp_customize) {
    // Hero Section Title
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'your-theme'),
        'priority' => 30,
    ));

    // Hero Background Image
    $wp_customize->add_setting('hero_bg_image', array(
        'default'   => get_template_directory_uri() . '/assets/img/hero.jpeg', // set default image
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize, 'hero_bg_image', array(
            'label' => __('Hero Background Image', 'your-theme'),
            'section' => 'hero_section',
            'settings' => 'hero_bg_image',
        )
    ));

    // Hero Name (Title)
    $wp_customize->add_setting('hero_name', array(
        'default' => 'Brandon Johnson',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_name', array(
        'label' => __('Hero Name', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Hero Role (Text)
    $wp_customize->add_setting('hero_role', array(
        'default' => 'Designer',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_role', array(
        'label' => __('Hero Role', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Social Media Links (Twitter)
    $wp_customize->add_setting('hero_twitter', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_twitter', array(
        'label' => __('Twitter URL', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Social Media Links (Facebook)
    $wp_customize->add_setting('hero_facebook', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_facebook', array(
        'label' => __('Facebook URL', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Social Media Links (Instagram)
    $wp_customize->add_setting('hero_instagram', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_instagram', array(
        'label' => __('Instagram URL', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Social Media Links (LinkedIn)
    $wp_customize->add_setting('hero_linkedin', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('hero_linkedin', array(
        'label' => __('LinkedIn URL', 'your-theme'),
        'section' => 'hero_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'custom_customize_register');
// footer 
function customs_customize_register($wp_customize) {
    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Section', 'your-theme'),
        'priority' => 30,
    ));

    // Footer Site Name
    $wp_customize->add_setting('footer_site_name', array(
        'default' => get_bloginfo('name'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_site_name', array(
        'label' => __('Footer Site Name', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default' => get_bloginfo('description'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_description', array(
        'label' => __('Footer Description', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Social Media Links
    $wp_customize->add_setting('footer_facebook', array(
        'default' => 'https://facebook.com/',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_facebook', array(
        'label' => __('Facebook URL', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('footer_instagram', array(
        'default' => 'https://instagram.com/',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_instagram', array(
        'label' => __('Instagram URL', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('footer_skype', array(
        'default' => 'https://skype.com/',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_skype', array(
        'label' => __('Skype URL', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('footer_linkedin', array(
        'default' => 'https://linkedin.com/',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_linkedin', array(
        'label' => __('LinkedIn URL', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'url',
    ));

    // Footer Credits
    $wp_customize->add_setting('footer_credits', array(
        'default' => 'Designed by Master SDA',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_credits', array(
        'label' => __('Footer Credits', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'All Rights Reserved',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label' => __('Footer Copyright Text', 'your-theme'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customs_customize_register');
function customContact_customize_register($wp_customize) {
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title' => __('Contact Section', 'your-theme'),
        'priority' => 30,
    ));

    // Contact Section Title
    $wp_customize->add_setting('contact_section_title', array(
        'default' => __('Contact', 'your-theme'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_section_title', array(
        'label' => __('Contact Section Title', 'your-theme'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // Contact Section Description
    $wp_customize->add_setting('contact_section_description', array(
        'default' => __('Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit', 'your-theme'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_section_description', array(
        'label' => __('Contact Section Description', 'your-theme'),
        'section' => 'contact_section',
        'type' => 'textarea',
    ));

    // Contact Address
    $wp_customize->add_setting('contact_address', array(
        'default' => __('A108 Adam Street, New York, NY 535022', 'your-theme'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_address', array(
        'label' => __('Contact Address', 'your-theme'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default' => __('+1 5589 55488 55', 'your-theme'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Contact Phone', 'your-theme'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default' => __('info@example.com', 'your-theme'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_email', // Important for email validation
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'your-theme'),
        'section' => 'contact_section',
        'type' => 'email',
    ));
}
add_action('customize_register', 'customContact_customize_register');
function customize_Projects_section($wp_customize) {
    // Add Section for Testimonials
    $wp_customize->add_section('Projects_section', array(
        'title'    => __('Projets', 'your-theme'),
        'priority' => 30,
    ));

    // Add Title Setting
    $wp_customize->add_setting('Projects_title', array(
        'default'   => 'Projects',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('Projects_title', array(
        'label'    => __('Section Title', 'your-theme'),
        'section'  => 'Projects_section',
        'type'     => 'text',
    ));

    // Add Description Setting
    $wp_customize->add_setting('Project_description', array(
        'default'   => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('Project_description', array(
        'label'    => __('Section Description', 'your-theme'),
        'section'  => 'Projects_section',
        'type'     => 'text',
    ));

    // Add Customizable Testimonial Fields (you can add more fields for more testimonials)
    for ($i = 1; $i <= 4; $i++) {
       

        // Testimonial Name
        $wp_customize->add_setting('testimonial_' . $i . '_name', array(
            'default'   => 'Person Name',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('testimonial_' . $i . '_name', array(
            'label'    => __('app name  ' . $i . ' Name', 'your-theme'),
            'section'  => 'Projects_section',
            'type'     => 'text',
        ));

        // Testimonial Position
        $wp_customize->add_setting('testimonial_' . $i . '_position', array(
            'default'   => 'Position',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('testimonial_' . $i . '_position', array(
            'label'    => __('Type application ' . $i . ' Position', 'your-theme'),
            'section'  => 'Projects_section',
            'type'     => 'text',
        ));
      
            $wp_customize->add_setting('view_project_link' . $i . '_url', array(
                'default'   => 'http://',
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control('view_project_link' . $i . '_url', array(
                'label'    => __('View Project Link ' . $i, 'your-theme'),
                'section'  => 'Projects_section', 
                'type'     => 'url',
            ));
        
        
// Testimonial Image Upload
$wp_customize->add_setting('testimonial_' . $i . '_image', array(
    'default'   => '',
    'transport' => 'refresh',
));

$wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize,
    'testimonial_' . $i . '_image',
    array(
        'label'    => __('Image ' . $i, 'your-theme'),
        'section'  => 'Projects_section',
        'settings' => 'testimonial_' . $i . '_image',
    )
));

     
    }
}
add_action('customize_register', 'customize_Projects_section');
function enqueue_contact_form_scripts() {
    wp_enqueue_script( 'contact-form-ajax', get_template_directory_uri() . '/js/contact-form.js', array('jquery'), null, true );
    wp_localize_script( 'contact-form-ajax', 'contact_form_ajax_obj', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'enqueue_contact_form_scripts' );
function handle_contact_form_submission() {
    // Sanitize and get form data
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Email recipient
    $to = "your-email@example.com"; // Replace with your email
    $headers = array(
        'Content-Type' => 'text/html; charset=UTF-8',
        'From' => $email,
        'Reply-To' => $email,
    );

    // Email subject and body
    $email_subject = "New Message from $name: $subject";
    $email_body = "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Message:</strong><br>$message</p>";

    // Send email
    if (wp_mail($to, $email_subject, $email_body, $headers)) {
        echo 'Your message has been sent. Thank you!';
    } else {
        echo 'There was an error sending your message.';
    }

    // Always die to terminate the Ajax request
    wp_die();
}
add_action('wp_ajax_send_contact_form', 'handle_contact_form_submission'); 
add_action('wp_ajax_nopriv_send_contact_form', 'handle_contact_form_submission');

function mytheme_customiz_register($wp_customize) {
    // Add setting for nav hover color
    $wp_customize->add_setting('nav_hover_color', array(
        'default'           => '#ba7b15', // default color
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    // Add control (color picker)
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_hover_color', array(
        'label'    => __('themes colors ', 'your-theme'),
        'section'  => 'colors', // or your own section
        'settings' => 'nav_hover_color',
    )));
}
add_action('customize_register', 'mytheme_customiz_register');
