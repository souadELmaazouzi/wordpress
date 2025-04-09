<!-- Hero Section -->
<section id="hero" class="hero section light-background">


    <?php 
        $hero_image = get_field('hero_image'); 
        if ($hero_image): ?>
            <img src="<?= esc_url($hero_image['url']); ?>" alt="<?= esc_attr($hero_image['alt']); ?>">
    <?php endif; ?>

    <div class="container" data-aos="zoom-out">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <?php if ($user_name = get_field('user_name')): ?>
                    <h2><?= esc_html($user_name); ?></h2>
                <?php endif; ?>

                <?php if ($typed_items = get_field('typed_items')): ?>
                    <p>
                        I'm 
                        <span class="typed" data-typed-items="<?= esc_attr($typed_items); ?>">Designer</span>
                        <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                    </p>
                <?php endif; ?>

                <div class="social-links">
                    <?php if ($facebook = get_field('facebook_link')): ?>
                        <a href="<?= esc_url($facebook); ?>"><i class="bi bi-facebook"></i></a>
                    <?php endif; ?>

                    <?php if ($instagram = get_field('instagram_link')): ?>
                        <a href="<?= esc_url($instagram); ?>"><i class="bi bi-instagram"></i></a>
                    <?php endif; ?>

                    <?php if ($linkedin = get_field('linkedin_link')): ?>
                        <a href="<?= esc_url($linkedin); ?>"><i class="bi bi-linkedin"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
