<section id="testimonials" class="testimonials section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2><?php echo get_theme_mod('Projects_title', 'Testimonials'); ?></h2>
  <p><?php echo get_theme_mod('Project_description', 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit'); ?></p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        }
      }
    </script>
    <div class="swiper-wrapper">

      <?php 
      // Loop through each testimonial entry
      for ($i = 1; $i <= 4; $i++) { 
        $testimonial_text = get_theme_mod('testimonial_' . $i . '_text', 'Testimonial text here...');
        $testimonial_name = get_theme_mod('testimonial_' . $i . '_name', 'Person Name');
        $testimonial_position = get_theme_mod('testimonial_' . $i . '_position', 'Position');
        $testimonial_image = get_theme_mod('testimonial_' . $i . '_image', '');
        $testimonial_link = get_theme_mod('view_project_link' . $i . '_url', 'http://');


        if ($testimonial_text && $testimonial_name && $testimonial_position) {
      ?>
        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="row gy-4 justify-content-center">
              <div class="col-lg-6">
                <div class="testimonial-content">
                  
                  <h3><?php echo esc_html($testimonial_name); ?></h3>
                  <h4><?php echo esc_html($testimonial_position); ?></h4>
                 
                </div>
              </div>
              <div class="col-lg-2 text-center">
                <?php if ($testimonial_image) { ?>
                  <a href="<?php echo esc_url($testimonial_link); ?>">
                  <img src="<?php echo esc_url($testimonial_image); ?>" alt="" class="img-fluid testimonial-img" ></a>
                <?php } ?>
              </div>
            </div>
            
          </div>
        </div><!-- End testimonial item -->
      <?php } } ?>

    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>

</section>
