<?php
/*
Template Name:fellowships
*/
?>

<?php get_header(); ?>
<!--main content-->
<div class="showcase-wrapper">


    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; else : ?>
    <p>
        <?php __('No post found'); ?>
    </p>
    <?php endif;
        wp_reset_postdata(); ?>



    <!--footer -->
    <?php get_footer(); ?>