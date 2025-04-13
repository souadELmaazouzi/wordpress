<footer id="footer" class="footer position-relative light-background">
    <div class="container">
        <h3 class="sitename"><?php echo esc_html(get_theme_mod('footer_site_name', get_bloginfo('name'))); ?></h3>
        <p><?php echo esc_html(get_theme_mod('footer_description', get_bloginfo('description'))); ?></p>
        <div class="social-links d-flex justify-content-center">
            <a href="<?php echo esc_url(get_theme_mod('footer_facebook', 'https://facebook.com/')); ?>"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('footer_instagram', 'https://instagram.com/')); ?>"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('footer_skype', 'https://skype.com/')); ?>"><i class="bi bi-skype"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('footer_linkedin', 'https://linkedin.com/')); ?>"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="container">
            <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename"><?php echo esc_html(get_theme_mod('footer_site_name', get_bloginfo('name'))); ?></strong> <span><?php echo esc_html(get_theme_mod('footer_copyright', 'All Rights Reserved')); ?></span>
            </div>
            <div class="credits">
                <?php echo esc_html(get_theme_mod('footer_credits', 'Designed by Master SDA')); ?> Distributed by <a href="">souad</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
