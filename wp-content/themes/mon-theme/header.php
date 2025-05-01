<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- Bootstrap CSS -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?> <!-- Ensure styles and scripts are loaded -->
    <style>
:root {
    --nav-hover-color: <?php echo get_theme_mod('nav_hover_color', '#ba7b15'); ?>;
}
</style>

</head>
<body <?php body_class(); ?>>

<header id="header" class="header d-flex flex-column justify-content-center" style="background-image: url('<?php echo esc_url(get_header_image()); ?>');">
    <!-- Toggle button for mobile -->
    <i class="header-toggle d-xl-none bi bi-list"></i>

    

    <nav id="navmenu" class="navmenu">
<?php 
$menu = wp_get_nav_menu_items(get_nav_menu_locations()['header-menu'] ?? '');

if (!empty($menu)) {
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'menu_class'     => 'navmenu-list',
        'container'      => false,
        'walker'         => new Custom_Nav_Walker(),
    ));
} else {
    // Default menu if no menu items exist
    ?>
    <ul class="navmenu-list">
        <li class="menu-item"><a href="<?php echo home_url('#hero'); ?>"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#about'); ?>"><i class="bi bi-person navicon"></i><span>About</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#resume'); ?>"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#testimonials'); ?>"> <i class="bi bi-diagram-3 navicon"></i><span>Projects</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#services'); ?>"><i class="bi bi-images navicon"></i><span>Services</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#skills'); ?>"><i class="bi bi-hdd-stack navicon"></i><span>Skills</span></a></li>
        <li class="menu-item"><a href="<?php echo home_url('#contact'); ?>"><i class="bi bi-envelope navicon"></i><span>Contact</span></a></li>
    </ul>
    <?php
}
?>
</nav>

</header>

<?php wp_footer(); ?> <!-- Ensures proper WordPress functionality -->
</body>
</html>
