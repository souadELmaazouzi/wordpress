<section id="skills" class="skills section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Skills</h2>
    <p><?php echo get_theme_mod('skills_section_description'); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row skills-content skills-animation">

      <?php for ($i = 1; $i <= 6; $i++): 
        $name = get_theme_mod("skill_{$i}_name");
        $percent = get_theme_mod("skill_{$i}_percent");
        $color = get_theme_mod("skill_{$i}_color", '#00aaff');
        if ($name): ?>
          <div class="col-lg-6">
            <div class="progress">
              
              <span class="skill">
                <span><?php echo esc_html($name); ?></span> 
                <i class="val"><?php echo esc_html($percent); ?>%</i>
              </span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" style="width: <?php echo esc_attr($percent); ?>%; background-color: <?php echo esc_attr($color); ?>;"></div>
              </div>
            </div>
          </div>
      <?php endif; endfor; ?>

    </div>
  </div>
</section>
