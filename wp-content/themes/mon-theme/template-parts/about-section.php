<!-- About Section -->
<section id="about" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2><?php the_field('section_title'); ?></h2>
    <p><?php the_field('section_content'); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      <div class="col-lg-4">
        <?php $image = get_field('profile_image'); ?>
        <?php if ($image): ?>
          <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="">
        <?php endif; ?>
      </div>

      <div class="col-lg-8 content">
        <h2><?php the_field('main_heading'); ?></h2>
        <p class="fst-italic py-3"><?php the_field('intro_text'); ?></p>

        <div class="row">
          <div class="col-lg-6">
          <ul>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('left_1_label'); ?>:</strong> <span><?php the_field('left_1_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('left_2_label'); ?>:</strong> <span><?php the_field('left_2_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('left_3_label'); ?>:</strong> <span><?php the_field('left_3_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('left_4_label'); ?>:</strong> <span><?php the_field('left_4_value'); ?></span></li>
</ul>
          </div>

          <div class="col-lg-6">
          <ul>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('right_1_label'); ?>:</strong> <span><?php the_field('right_1_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('right_2_label'); ?>:</strong> <span><?php the_field('right_2_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('right_3_label'); ?>:</strong> <span><?php the_field('right_3_value'); ?></span></li>
  <li><i class="bi bi-chevron-right"></i> <strong><?php the_field('right_4_label'); ?>:</strong> <span><?php the_field('right_4_value'); ?></span></li>
</ul>
          </div>
        </div>

        <p class="py-3"><?php the_field('bottom_paragraph'); ?></p>
      </div>
    </div>
  </div>
</section>
