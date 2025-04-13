<!-- About Section -->
<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo esc_html(get_theme_mod('about_section_title', 'About')); ?></h2>
    <p><?php echo esc_html(get_theme_mod('about_section_description', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit.')); ?></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 justify-content-center">
      <div class="col-lg-4">
        <img src="<?php echo esc_url(get_theme_mod('profile_image', '')); ?>" class="img-fluid" alt="Profile Image">
      </div>
      <div class="col-lg-8 content">
        <h2><?php echo esc_html(get_theme_mod('uiux_designer_title', 'UI/UX Designer & Web Developer.')); ?></h2>
        <p class="fst-italic py-3">
          <?php echo esc_html(get_theme_mod('about_me_paragraph', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...')); ?>
        </p>
        <div class="row">
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo esc_html(get_theme_mod('birthday', '1 May 1995')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?php echo esc_html(get_theme_mod('website', 'www.example.com')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo esc_html(get_theme_mod('phone', '+123 456 7890')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo esc_html(get_theme_mod('city', 'New York, USA')); ?></span></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo esc_html(get_theme_mod('age', '30')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo esc_html(get_theme_mod('degree', 'Master')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo esc_html(get_theme_mod('email', 'email@example.com')); ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?php echo esc_html(get_theme_mod('freelance', 'Available')); ?></span></li>
            </ul>
          </div>
        </div>
        <p class="py-3">
          Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut.
        </p>
      </div>
    </div>

  </div>

</section><!-- /About Section -->
