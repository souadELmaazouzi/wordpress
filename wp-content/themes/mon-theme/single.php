<?php get_header(); ?>

<div class="container">
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="project">
                <h2><?php the_title(); ?></h2>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="project-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="project-content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
