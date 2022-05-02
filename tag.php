<?php get_header(); ?>
<div class="showcase-wrapper">
    <div class="container-fluid">
        <?php custom_breadcrumbs(); ?>
        <h4>Tag:
            <?php single_tag_title(); ?>
        </h4>
        <div class="navigation-wrapper">
            <div class="posts-navigation">
                <?php // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'obf-new' ),
                'next_text'          => __( 'Next page', 'obf-new' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'obf-new' ) . ' </span>',
            ) ); ?>
            </div>
        </div>
        <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?></a>
        </h2>
        <p>
            <?php echo get_the_date('F j, Y'); ?> :
            <?php the_excerpt(); ?>
        </p>
        <?php endwhile;
            else: ?>
        <p>not working</p>
        <?php endif; ?>

        <div class="navigation-wrapper">
            <div class="posts-navigation">
                <?php // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'obf-new' ),
                'next_text'          => __( 'Next page', 'obf-new' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'obf-new' ) . ' </span>',
            ) ); ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
