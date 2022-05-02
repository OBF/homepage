<?php get_header(); ?>

<div class="showcase-wrapper">
    <div class="container-fluid">
        <?php custom_breadcrumbs(); ?>
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

        <!--first post-->
        <?php
        $obf_exclude = get_cat_ID('home');

        $q = '-'.$obf_exclude;

        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        $query = new WP_query ( array(

            'posts_per_page' => 1,
            'cat' => $q,
            'post_type' => 'post',
            'post_status' => 'publish',
        ) );
        if ( $query->have_posts() ) { ?>
        <section class="latest-post">
            <?php while ( $query->have_posts() ) : $query->the_post();
                 if ( is_paged() == false ) { ?>
            <article id="post-<?php the_ID(); ?>">
                <div class="post-display">
                    <div class="latest-post-wrapper">

                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                            <div class="latest-post-content">

                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <p class="date"> [
                                    <?php echo get_the_date('F j, Y'); ?> ]</p>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </a>


                    </div>
                </div>
            </article>
            <?php } ?>
            <?php endwhile;
                                     rewind_posts();
                                     ?>
            <?php

                wp_reset_postdata(); ?>
        </section>

        <?php } ?>

        <?php
        $obf_exclude = get_cat_ID('home');
        $q = '-'.$obf_exclude;

        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $paged == 1 ){
      $offset=1;
  } else{
      $offset='';
  }
        $query = new WP_query ( array(
            'paged' => $paged,
            'cat' => $q,
            'post_type' => 'post',
            'post_status' => 'publish',
            'offset' => $offset,
            'number_of_posts' => 15,
        ) );

        if ( $query->have_posts() ) { ?>
        <section class="recent-posts grid-container">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="post-display">
                <article>

                    <div class="recent-post-wrapper">
                        <div class="recent-post-photo">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/logos/obf-logo.png" alt="<?php the_title(); ?>" />
                                <?php } ?></a></div>
                        <div class="recent-post-content">
                            <a href="<?php the_permalink(); ?>">
                                <h1>
                                    <?php echo wp_trim_words( get_the_title(), 5 ); ?>
                                </h1>
                                <p class="date"> [
                                    <?php echo get_the_date('F j, Y'); ?> ]</p>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                            </a>
                        </div>



                    </div>
                </article>
            </div>

            <?php endwhile;
                    rewind_posts(); ?>

            <?php

                wp_reset_postdata(); ?>
        </section>

        <?php } ?>
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
