<head>
    <!-- Other meta tags and links -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@6.8.4/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@6.8.4/swiper-bundle.min.js"></script>
</head>

<?php
get_header();  // Include header template

?>



<main class="main">

    
    <!-- Hero Section -->
    <?php get_template_part('template-parts/hero-section'); ?>

<!-- /Hero Section -->

      <!-- About Section -->
      <?php get_template_part('template-parts/about-section'); ?>

        <!-- /About Section -->
 <!-- Resume Section -->
 <?php get_template_part('template-parts/Resume-section'); ?>
<!-- /Resume Section -->
<!-- Testimonials Section -->
<?php get_template_part('template-parts/Testimonials-section'); ?>
<!-- /Testimonials Section -->
<!-- Services Section -->
<?php get_template_part('template-parts/service-section'); ?>
<!-- /Services Section -->

    <!-- Skills Section -->
    <?php get_template_part('template-parts/skills-section'); ?>
   <!-- /Skills Section -->
<!-- Contact Section -->
<?php get_template_part('template-parts/contact-section'); ?>
<!-- End Contact Form -->

</main>

<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/aos/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/typed.js/typed.umd.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

 <!-- Scroll Top -->
 <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
<?php
get_footer();  // Include footer template

