<?php
/*
Template Name:bosc
*/
?>
<style>
    h5{
        color:black;
    }
</style>
<?php get_header('bosc'); ?>

<div class="showcase-wrapper">
    <div class="container">
        <?php custom_breadcrumbs(); ?>


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h5>
            <?php the_content(); ?>
        </h5>
        <?php endwhile; else : ?>
        <p>
            <?php __('No post found'); ?>
        </p>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer('bosc'); ?>
