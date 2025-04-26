<section id="resume" class="resume section">
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo get_theme_mod('resume_title', 'Resume'); ?></h2>
    <p><?php echo get_theme_mod('resume_description', 'Magnam dolores commodi suscipit...'); ?></p>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Summary</h3>
        <div class="resume-item pb-0">
          <h4><?php echo get_theme_mod('resume_summary_name', 'User name'); ?></h4>
          <p><em><?php echo get_theme_mod('resume_summary_desc', 'Graphic Designer...'); ?></em></p>
          <ul>
            <li><?php echo get_theme_mod('resume_summary_address', 'Portland par 127,Orlando, FL'); ?></li>
            <li><?php echo get_theme_mod('resume_summary_phone', '(123) 456-7891'); ?></li>
            <li><?php echo get_theme_mod('resume_summary_email', 'alice.barkley@example.com'); ?></li>
          </ul>
        </div>
        <!-- Education & Experience would go here in the same way -->
        <h3 class="resume-title">Education</h3>

        <div class="resume-item">
          <h4><?php echo get_theme_mod('resume_edu1_title', 'Master of Fine Arts & Graphic Design'); ?></h4>
          <h5><?php echo get_theme_mod('resume_edu1_years', '2015 - 2016'); ?></h5>
          <p><em><?php echo get_theme_mod('resume_edu1_school', 'Rochester Institute of Technology, Rochester, NY'); ?></em></p>
          <p><?php echo get_theme_mod('resume_edu1_desc', 'Qui deserunt veniam...'); ?></p>
        </div>

        <div class="resume-item">
          <h4><?php echo get_theme_mod('resume_edu2_title', 'Bachelor of Fine Arts & Graphic Design'); ?></h4>
          <h5><?php echo get_theme_mod('resume_edu2_years', '2010 - 2014'); ?></h5>
          <p><em><?php echo get_theme_mod('resume_edu2_school', 'Rochester Institute of Technology, Rochester, NY'); ?></em></p>
          <p><?php echo get_theme_mod('resume_edu2_desc', 'Quia nobis sequi est occaecati aut...'); ?></p>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <h3 class="resume-title">Professional Experience</h3>

      <div class="resume-item">
        <h4><?php echo get_theme_mod('resume_exp1_title', 'Senior graphic design specialist'); ?></h4>
        <h5><?php echo get_theme_mod('resume_exp1_years', '2019 - Present'); ?></h5>
        <p><em><?php echo get_theme_mod('resume_exp1_company', 'Experion, New York, NY'); ?></em></p>
        <ul>
          <?php
          $exp1_tasks = explode("\n", get_theme_mod('resume_exp1_tasks'));
          foreach ($exp1_tasks as $task) {
            echo '<li>' . esc_html(trim($task)) . '</li>';
          }
          ?>
        </ul>
      </div>

      <div class="resume-item">
        <h4><?php echo get_theme_mod('resume_exp2_title', 'Graphic design specialist'); ?></h4>
        <h5><?php echo get_theme_mod('resume_exp2_years', '2017 - 2018'); ?></h5>
        <p><em><?php echo get_theme_mod('resume_exp2_company', 'Stepping Stone Advertising, New York, NY'); ?></em></p>
        <ul>
          <?php
          $exp2_tasks = explode("\n", get_theme_mod('resume_exp2_tasks'));
          foreach ($exp2_tasks as $task) {
            echo '<li>' . esc_html(trim($task)) . '</li>';
          }
          ?>
        </ul>
      </div>
      </div>
    </div>
  </div>

</section>