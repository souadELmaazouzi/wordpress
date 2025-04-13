<!-- Hero Section -->
<section id="hero" class="hero section light-background">
    <?php
    // Get the custom background image
    $hero_bg_image = get_theme_mod('hero_bg_image', get_template_directory_uri() . '/assets/img/hero-bg.jpg');
    ?>
    <img src="<?php echo esc_url($hero_bg_image); ?>" alt="">

    <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <?php
                // Get the custom hero name and role
                $hero_name = get_theme_mod('hero_name', 'Brandon Johnson');
                $hero_role = get_theme_mod('hero_role', 'Designer');
                ?>
                <h2><?php echo esc_html($hero_name); ?></h2>
                <p>I'm <span class="typed" data-typed-items="<?php echo esc_html($hero_role); ?>">Designer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>

                <div class="social-links">
                    <?php
                    // Get social media links
                    $hero_twitter = get_theme_mod('hero_twitter');
                    $hero_facebook = get_theme_mod('hero_facebook');
                    $hero_instagram = get_theme_mod('hero_instagram');
                    $hero_linkedin = get_theme_mod('hero_linkedin');
                    ?>
                    <?php if ($hero_twitter): ?>
                        <a href="<?php echo esc_url($hero_twitter); ?>"><i class="bi bi-twitter-x"></i></a>
                    <?php endif; ?>
                    <?php if ($hero_facebook): ?>
                        <a href="<?php echo esc_url($hero_facebook); ?>"><i class="bi bi-facebook"></i></a>
                    <?php endif; ?>
                    <?php if ($hero_instagram): ?>
                        <a href="<?php echo esc_url($hero_instagram); ?>"><i class="bi bi-instagram"></i></a>
                    <?php endif; ?>
                    <?php if ($hero_linkedin): ?>
                        <a href="<?php echo esc_url($hero_linkedin); ?>"><i class="bi bi-linkedin"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Hero Section -->
