<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?> <!-- Ensure styles and scripts are loaded -->
</head>
<body <?php body_class(); ?>>

<header id="header" class="header d-flex flex-column justify-content-center" style="background-image: url('<?php echo esc_url(get_header_image()); ?>');">
    <!-- Toggle button for mobile -->
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <!-- Logo (if available) -->
    <div class="header-logo">
        <a href="<?php echo home_url(); ?>">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo(); 
            } else { ?>
                <h1><?php bloginfo('name'); ?></h1>
            <?php } ?>
        </a>
    </div>

    <!-- Navigation menu -->
    <nav id="navmenu" class="navmenu">
    <?php 
wp_nav_menu(array(
    'theme_location' => 'header-menu',
    'menu_class'     => 'navmenu-list',
    'container'      => false,
    'walker'         => new Custom_Nav_Walker(),
));
?>

    </nav>
</header>

<?php wp_footer(); ?> <!-- Ensures proper WordPress functionality -->
</body>
</html>
