<?php

/*
 * Enqueue scripts and stylesheet for pages
 */
function obf_scripts_styles() {
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '3.3.7', true );
    wp_enqueue_script( 'obf', get_template_directory_uri() . '/js/obf.js', array('jquery') );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7' );
    if ( is_page_template( 'about.php' ) ) {
        wp_enqueue_style('style-about.css', get_template_directory_uri().'/css/style-about.css',false,'1.0','all');
    }
    else if ( is_page_template( 'travel-awards.php' ) ) {
        wp_enqueue_style('style-travel-awards.css', get_template_directory_uri().'/css/style-travel-awards.css',false,'5.0.1','all');
    }
    else if ( is_page_template( 'board.php' ) ) {
        wp_enqueue_style('style-board.css', get_template_directory_uri().'/css/style-board.css',false,'5.0.7','all');
    }
    else if ( is_page_template( 'projects.php' ) ) {
        wp_enqueue_style('style-projects.css', get_template_directory_uri().'/css/style-projects.css', false, '1.0','all');
    }
    else if ( is_page_template( 'events.php' ) ) {
        wp_enqueue_style('style-events.css', get_template_directory_uri().'/css/style-events.css',false,'1.0','all');
    }
    else if ( is_page_template( 'gsoc.php' ) ) {
        wp_enqueue_style('style-gsoc.css', get_stylesheet_directory_uri().'/css/style-gsoc.css',false,'1.0','all');
    }
    else if ( is_page_template( 'meeting-minutes.php' ) ) {
        wp_enqueue_style('style-meeting-minutes.css', get_template_directory_uri().'/css/style-meeting-minutes.css',false,'1.0','all');
    }

    else if ( is_page_template( 'membership.php' ) ) {
        wp_enqueue_style('style-membership.css', get_template_directory_uri().'/css/style-membership.css',false,'1.0','all');
    }

    else if ( is_page_template( 'donate.php' ) ) {
        wp_enqueue_style('style-donate.css', get_template_directory_uri().'/css/style-donate.css',false,'1.0','all');
    }

    else if ( is_single() ) {
        wp_enqueue_style('style-single.css', get_template_directory_uri().'/css/style-single.css',false,'1.1','all');
    }

    else if ( is_home() ) {
        wp_enqueue_style('style-home.css', get_template_directory_uri().'/css/style-home.css',false,'1.1','all');
    }


    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts','obf_scripts_styles' );

/*
 * Enqueue styles for page templates, with the same styles applicable for child pages of those templates
 */
function obf_enqueue_page_template_styles() {
    if ( is_page_template( 'gsoc.php' ) ) {
        wp_enqueue_style( 'style-gsoc.css', get_template_directory_uri() . '/css/style-gsoc.css' );
    }
    else if ( is_page_template( 'bosc.php' ) ) {
        wp_enqueue_style( 'style-bosc.css', get_template_directory_uri() . '/css/style-bosc.css' );
    }

    else if ( is_page_template( 'about.php' ) ) {
        wp_enqueue_style( 'style-about.css', get_template_directory_uri() . '/css/style-about.css' );
    }

}
add_action( 'wp_enqueue_scripts', 'obf_enqueue_page_template_styles' );

/*
 * Get nav walker file from the website directory
 */
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/*
 * Theme setup supports
 */
function obf_theme_setup() {
    //navigation menu support
    register_nav_menus(array(
        'primary' => __('Primary Menu','obf-new'),
        'secondary' => __('Secondary Menu','obf-new')
    ));

}

add_action('after_setup_theme','obf_theme_setup');
//add support for thumbnails
add_theme_support( 'post-thumbnails' );

/*
 * OBF Custom Post Types
 */
function obf_post_type() {

   // Labels for board members profile custom post type
	$obf_board_labels = array(
		'name' => _x("Board", "post type general name"),
		'singular_name' => _x("Board", "post type singular name"),
		'menu_name' => 'Board Member Profiles',
		'add_new' => _x("Add New", "board item"),
		'add_new_item' => __("Add New Profile"),
		'edit_item' => __("Edit Profile"),
		'new_item' => __("New Profile"),
		'view_item' => __("View Profile"),
		'search_items' => __("Search Profiles"),
		'not_found' =>  __("No Profiles Found"),
		'not_found_in_trash' => __("No Profiles Found in Trash"),
		'parent_item_colon' => ''
	);

    // Labels for OBF projects custom post type
    $obf_projects_labels = array(
		'name' => _x("Projects", "post type general name"),
		'singular_name' => _x("Project", "post type singular name"),
		'menu_name' => 'Projects',
		'add_new' => _x("Add New", "project item"),
		'add_new_item' => __("Add New Project"),
		'edit_item' => __("Edit Project"),
		'new_item' => __("New Project"),
		'view_item' => __("View Project"),
		'search_items' => __("Search Projects"),
		'not_found' =>  __("No Projects Found"),
		'not_found_in_trash' => __("No Projects Found in Trash"),
		'parent_item_colon' => ''
	);

    // Labels for OBF related events custom post type
    $obf_events_labels = array(
		'name' => _x("Events", "post type general name"),
		'singular_name' => _x("Event", "post type singular name"),
		'menu_name' => 'Events',
		'add_new' => _x("Add New", "event item"),
		'add_new_item' => __("Add New Event"),
		'edit_item' => __("Edit Event"),
		'new_item' => __("New Event"),
		'view_item' => __("View Event"),
		'search_items' => __("Search Events"),
		'not_found' =>  __("No Events Found"),
		'not_found_in_trash' => __("No Events Found in Trash"),
		'parent_item_colon' => ''
	);

	// Register post types
	register_post_type('obf-board' , array(
		'labels' => $obf_board_labels,
		'public' => true,
		'has_archive' => false,
		'rewrite' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
	) );

    register_post_type('obf-projects' , array(
		'labels' => $obf_projects_labels,
		'public' => true,
		'has_archive' => false,
		'rewrite' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
	) );

    register_post_type('obf-events' , array(
		'labels' => $obf_events_labels,
		'public' => true,
		'has_archive' => false,
		'rewrite' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields','excerpt')
	) );
}
add_action( 'init', 'obf_post_type', 0 );

// Register taxonomies
function obf_post_taxonomy() {

	// Labels taxonomy of board member profiles
	$obf_board_singular = 'Member-Type';
	$obf_board_plural = 'Member-Types';
	$obf_board_labels = array(
		'name' => _x( $obf_board_plural, "taxonomy general name"),
		'singular_name' => _x( $obf_board_singular, "taxonomy singular name"),
		'search_items' =>  __("Search $obf_board_singular"),
		'all_items' => __("All $obf_board_singular"),
		'parent_item' => __("Parent $obf_board_singular"),
		'parent_item_colon' => __("Parent $obf_board_singular:"),
		'edit_item' => __("Edit $obf_board_obf_board_singular"),
		'update_item' => __("Update $obf_board_singular"),
		'add_new_item' => __("Add New $obf_board_singular"),
		'new_item_name' => __("New $obf_board_singular Name"),
	);

    // Labels taxonomy of OBF projects
    $obf_projects_singular = 'Project-Type';
	$obf_projects_plural = 'Project-Types';
	$obf_projects_labels = array(
		'name' => _x( $obf_projects_plural, "taxonomy general name"),
		'singular_name' => _x( $obf_projects_singular, "taxonomy singular name"),
		'search_items' =>  __("Search $obf_projects_singular"),
		'all_items' => __("All $obf_projects_singular"),
		'parent_item' => __("Parent $obf_projects_singular"),
		'parent_item_colon' => __("Parent $obf_projects_singular:"),
		'edit_item' => __("Edit $obf_projects_singular"),
		'update_item' => __("Update $obf_projects_singular"),
		'add_new_item' => __("Add New $obf_projects_singular"),
		'new_item_name' => __("New $obf_projects_singular Name"),
	);

	// Register and attach to respective post type
	register_taxonomy( strtolower($obf_board_singular), 'obf-board', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => false,
		'labels' => $obf_board_labels,
        'show_admin_column' => true
	) );

    register_taxonomy( strtolower($obf_projects_singular), 'obf-projects', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => false,
		'labels' => $obf_projects_labels,
        'show_admin_column' => true
	) );
}
add_action( 'init', 'obf_post_taxonomy', 0 );


/*
 * Offset the main query on the home page
 */
function obf_offset_main_query ( $query ) {
     if ( $query->is_home() && $query->is_main_query() && !$query->is_paged() ) {
         $query->set( 'offset', '2' );
    }
 }
add_action( 'pre_get_posts', 'obf_offset_main_query' );

/*
 * Move comment field from default top position to bottom of comment form
 */
function obf_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'obf_move_comment_field_to_bottom' );

/*
 * Change excerpt length to 20 words
 */
function obf_custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'obf_custom_excerpt_length', 10 );

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function obf_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'obf_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}

	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;

	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {

		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			//'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );

		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}

		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_obf_duplicate_post_as_draft', 'obf_duplicate_post_as_draft' );

/*
 * Add the duplicate link to action list for post_row_actions
 */
function obf_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=obf_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}

add_filter( 'page_row_actions', 'obf_duplicate_post_link', 10, 2 );

// Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrumbs
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page_template() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        }

        else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }
}

/*
Register widgets areas
*/

if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Widgetized Area',
		'id'   => 'widgetized-area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

  //Credits across main and BOSC site
  register_sidebar( array(
	'id'          => 'footer-credits',
	'name'        => 'Footer credits',
	'description' => __( 'Site credits in footer', 'footer_credits' ),
  'before_widget' => '',
  'after_widget' => ''
) );

  //Main Page footer links
  register_sidebar( array(
	'id'          => 'footer-links',
	'name'        => 'Normal Footer links',
	'description' => __( 'Links in footer on normal pages - doesn\'t display on BOSC pages', 'footer_links' ),
  'before_widget' => '',
  'after_widget' => ''
) );

  //BOSC Page footer links
  register_sidebar( array(
  'id'          => 'bosc-footer-links',
  'name'        => 'BOSC Footer links',
  'description' => __( 'Links in footer on BOSC pages - doesn\'t display on normal pages', 'footer_links' ),
  'before_widget' => '',
  'after_widget' => ''
  ) );

}



/*
    Add meta box on about page for instructions
*/
function obf_add_meta_boxes_callback() {
    echo 'Please use the code editor for editing timeline events.';
}

function obf_add_meta_boxes_page() {
    global $post;
    if ( 'about.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box( 'about_meta_box', 'Timeline editing instructions', 'obf_add_meta_boxes_callback', 'page', 'side', 'high' );
    }
}
add_action( 'add_meta_boxes_page', 'obf_add_meta_boxes_page' );
