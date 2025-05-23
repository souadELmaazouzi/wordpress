<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo esc_html(get_theme_mod('contact_section_title', 'Contact')); ?></h2>
    <p><?php echo esc_html(get_theme_mod('contact_section_description', 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit')); ?></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p><?php echo esc_html(get_theme_mod('contact_address', 'A108 Adam Street, New York, NY 535022')); ?></p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p><?php echo esc_html(get_theme_mod('contact_phone', '+1 5589 55488 55')); ?></p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p><?php echo esc_html(get_theme_mod('contact_email', 'info@example.com')); ?></p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="col-lg-8">
        <form  action="https://api.web3forms.com/submit" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">

          <div class="row gy-4">
          <input type="hidden" name="access_key" value="aa469c4d-ff2e-4525-8905-ff4d3bd9b5b7">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message" style="display:none;color:red;"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        
      </div>
    </div>
  </div>
</section><!-- End Contact Section -->
