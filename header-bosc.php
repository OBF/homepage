<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bioinformatics Open Source Conference">
    <meta name="keywords" content="Bioinformatics, Technology, OBF, BOSC, Open Bioinformatics Foundation">
    <meta name="author" content="kushinauwu">
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>
        <?php bloginfo('name'); ?>
        <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper" id="main">
        <nav class="navbar navbar-fixed-top" id="navigation-bar" role="navigation" aria-label="Secondary Menu">
            <div class="navbar-header">
                <a class="navbar-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_bloginfo('template_url') ?>/img/logos/obf_logo_icon-circle-tr.png">
                </a>
                <a class="navbar-logo" href="/events/bosc/">
                    <img src="<?php echo get_bloginfo('template_url') ?>/img/logos/BOSC2021-square-icon-color.png">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <span class="sr-only">
                    <?php esc_html_e( 'Secondary Menu', 'obf-new' ); ?></span>
                <?php
                            wp_nav_menu( array(
                            'theme_location'  => 'secondary',
                            'depth'	          => 3, // 1 = no dropdowns, 2 = with dropdowns.
                            'container'       => false,
                            'menu_class'      => 'nav',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        ) );
                     ?>
            </div>
        </nav>
        <!--navigation bar end -->
