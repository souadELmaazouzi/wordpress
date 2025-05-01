<section id="services" class="services section">
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo get_theme_mod('service_title', 'Our Services'); ?></h2>
    <p><?php echo get_theme_mod('service_description', 'Here are the services we offer.'); ?></p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <?php
      $number_of_services = get_theme_mod('number_of_services', 3);

      for ($i = 1; $i <= $number_of_services; $i++) {
        // Get the service details from the Customizer
        $icon = get_theme_mod("service_item_{$i}_icon", 'bi bi-activity');
        $title = get_theme_mod("service_item_{$i}_title", "Service $i");
        $description = get_theme_mod("service_item_{$i}_description", "Description for Service Item $i");
        $link = get_theme_mod("service_item_{$i}_link", '#');
        $details_image = get_theme_mod("service_item_{$i}_details_image", 'assets/img/services.jpg');
        $details_title = get_theme_mod("service_item_{$i}_details_title", "Detail Title $i");
        $paragraph = get_theme_mod("service_item_{$i}_paragraph", "Main paragraph for service $i.");
        $bullet1 = get_theme_mod("service_item_{$i}_bullet_1", "Default bullet 1");
        $bullet2 = get_theme_mod("service_item_{$i}_bullet_2", "Default bullet 2");
        $bullet3 = get_theme_mod("service_item_{$i}_bullet_3", "Default bullet 3");
        $extra_paragraph = get_theme_mod("service_item_{$i}_extra_paragraph", "Extra paragraph for service $i.");
      ?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item item-cyan position-relative">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class="<?php echo esc_attr($icon); ?>"></i>
            </div>

            <!-- Title without link -->
            <h3><?php echo esc_html($title); ?></h3>

            <!-- Button to open modal -->
            <a
              href="#"
              class="btn btn-primary mt-2 btn-view-details"
              data-bs-toggle="modal"
              data-bs-target="#serviceModal<?php echo $i; ?>">
              View Details
            </a>

            <!-- Description -->
            <p><?php echo esc_html($description); ?></p>
          </div>
        </div>

        <!-- Modal for each service -->
        <div class="modal fade" id="serviceModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="serviceModalLabel<?php echo $i; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel<?php echo $i; ?>"><?php echo esc_html($title); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <section id="service-details" class="service-details section">

                  <div class="container">

                    <div class="row gy-5">



                      <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                        <img src="<?php echo esc_url($details_image); ?>" alt="" class="img-fluid services-img">
                        <h3><?php echo esc_html($details_title); ?></h3>
                        <p><?php echo wp_kses_post($paragraph); ?></p>
                        <ul>
                          <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html($bullet1); ?></span></li>
                          <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html($bullet2); ?></span></li>
                          <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html($bullet3); ?></span></li>
                        </ul>
                        <p><?php echo wp_kses_post($extra_paragraph); ?></p>

                      </div>

                    </div>

                  </div>

                </section><!-- /Service Details Section -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->

      <?php
      }
      ?>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</section>