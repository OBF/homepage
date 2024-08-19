<?php
/*
Template Name: meeting minutes
*/
?>

<?php get_header(); ?>

<div class="showcase-wrapper">


    <div class="container-fluid">
        <div>
        <p></p>Starting in July 2019, OBF Board public meeting minutes can be found in
            <a href="https://github.com/OBF/obf-docs/tree/master/minutes">our GitHub repository</a>.</p>
        </div>
        <?php custom_breadcrumbs(); ?>
        <article>
            <?php $query2 = new WP_Query( array( 'category_name' => 'meeting-minutes' ) ); ?>
            <?php if($query2->have_posts()) : ?>
            <?php while($query2->have_posts()) : $query2->the_post(); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="meeting-minutes-heading">
                        <h2><a href="<?php the_permalink(); ?>" target="_blank">
                                <?php the_title(); ?></a></h2>
                    </div>
                    <div class="meeting-minutes-excerpt">
                        <p>

                            <?php echo get_the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" target="_blank">Read more&raquo;</a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </article>

    </div>
</div>

<?php get_footer(); ?>
