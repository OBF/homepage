<?php
/*
Template Name:board
*/
?>

<?php get_header(); ?>

<div class="showcase-wrapper">
    <div class="container-fluid">
        <?php custom_breadcrumbs(); ?>
    </div>
    <section class="current-members">
        <div class="container-fluid">
            <h1>Board of Directors</h1>
            <div class="members-contact">
                <p>The Board can be contacted via email at <a href="mailto:board@open-bio.org">board@open-bio.org</a> (or, in case of mailing list problems, try <a href="mailto:obf-board@googlegroups.com">obf-board@googlegroups.com</a> as a fallback)
                 You can also find us on <a href="https://www.linkedin.com/groups/9539620/">LinkedIn</a>.
                    The minutes of the previous public Board meetings can be found on
                    <a href="https://github.com/OBF/obf-docs/tree/master/minutes">our GitHub repository</a>
                    (pre-2019 meeting minutes are linked <a href="/board/meeting-minutes/">here</a>).</p>
            </div>

            <ul class="list-inline members-list">
                <div class="current-members-grid">

                    <?php
                                $args = array(
                                                'post_type' => 'obf-board',
                                                'tax_query' => array(
                                                            array (
                                                                'taxonomy' => 'member-type',
                                                                'field' => 'slug',
                                                                'terms' => 'current-member',
                                                            )
                                                        ),
                                            );
                                $present_member = new WP_Query( $args );
                            ?>
                    <?php if ( $present_member->have_posts() ) : while ( $present_member->have_posts() ) : $present_member->the_post(); ?>

                    <li class="member-details">
                        <?php $member_url = get_post_meta( get_the_ID(), 'external_url', true ); ?>
                        <a href="<?php echo $member_url; ?>" target="_blank">
                            <?php the_post_thumbnail(); ?></a>
                        <div class="member-name">
                            <?php $member_url = get_post_meta( get_the_ID(), 'external_url', true ); ?>
                            <a href="<?php echo $member_url; ?>" target="_blank">
                                <?php the_title(); ?></a>
                        </div>
                        <div class="member-position">
                            <?php the_field('member_position'); ?>
                        </div>
                        <div class="member-info">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; else : ?>
                    <p>
                        <?php __('No post found'); ?>
                    </p>
                    <?php endif;
                                wp_reset_postdata(); ?>
                </div>
            </ul>
        </div>
    </section>

    <section class="past-members">
        <div class="container-fluid">
            <h1>Past board members</h1>
            <ul class="list-inline members-list">
                <div class="past-members-grid">
                    <?php
                                $args = array(
                                                'post_type' => 'obf-board',
                                                'tax_query' => array(
                                                            array (
                                                                'taxonomy' => 'member-type',
                                                                'field' => 'slug',
                                                                'terms' => 'past-member',
                                                            )
                                                        ),
                                            );
                                $past_member = new WP_Query( $args );
                            ?>
                    <?php if ( $past_member->have_posts() ) : while ( $past_member->have_posts() ) : $past_member->the_post(); ?>
                    <li class="member-details">
                        <?php $member_url = get_post_meta( get_the_ID(), 'external_url', true ); ?>
                        <a href="<?php echo $member_url; ?>" target="_blank">
                            <?php the_post_thumbnail(); ?></a>
                        <div class="member-name">
                            <?php $member_url = get_post_meta( get_the_ID(), 'external_url', true ); ?>
                            <a href="<?php echo $member_url; ?>" target="_blank">
                                <?php the_title(); ?></a>
                        </div>
                        <div class="member-position">
                            <?php the_field('member_position'); ?>
                        </div>
                        <div class="member-info">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; else : ?>
                    <p>
                        <?php __('No post found'); ?>
                    </p>
                    <?php endif;    wp_reset_postdata(); ?>
                </div>
            </ul>
        </div>
    </section>

    <div class="container-fluid">
        <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p>
            <?php __('No post found'); ?>
        </p>
        <?php endif;    wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>
