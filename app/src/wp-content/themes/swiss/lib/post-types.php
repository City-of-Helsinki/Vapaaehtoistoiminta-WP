<?php
namespace Evermade\Swiss\PostTypes;

/*
 * -----------------------------------------------------
 * EXAMPLE POST TYPE
 * -----------------------------------------------------
 */
/*
function serviceSetup()
{
    $labels = array(
        'name'                  => _x('Services', 'post type general name', 'swiss'),
        'singular_name'         => _x('Service', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Service', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Service', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Service', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Service', 'add new post text', 'swiss'),
        'all_items'             => _x('All Services', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Service', 'view post text', 'swiss'),
        'search_items'          => _x('Search Services', 'search post text', 'swiss'),
        'not_found'             => _x('No Services found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Services found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('Services', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('Services', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title','thumbnail' ),
        'taxonomies'            => array( '' ),
        'has_archive'           => false,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-star-filled',
        'rewrite'               => array(
            'slug' => _x('service', 'URL slug', 'swiss')
        )
    );

    register_post_type('service', $args);
}
*/

function noticeSetup()
{
    $labels = array(
        'name'                  => _x('Notices', 'post type general name', 'swiss'),
        'singular_name'         => _x('Notice', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Notice', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Notice', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Notice', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Notice', 'add new post text', 'swiss'),
        'all_items'             => _x('All Notices', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Notice', 'view post text', 'swiss'),
        'search_items'          => _x('Search Notices', 'search post text', 'swiss'),
        'not_found'             => _x('No Notices found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Notices found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('Notices', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('Notices', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title','thumbnail','editor'),
        'taxonomies'            => array( '' ),
        'has_archive'           => false,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-warning',
        'rewrite'               => array(
            'slug' => _x('notice', 'URL slug', 'swiss')
        )
    );

    register_post_type('notice', $args);
}

function featuredActivitySetup()
{
    $labels = array(
        'name'                  => _x('Featured activities', 'post type general name', 'swiss'),
        'singular_name'         => _x('Featured activity', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Featured activity', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Featured activity', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Featured activity', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Featured activity', 'add new post text', 'swiss'),
        'all_items'             => _x('All Featured activities', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Featured activity', 'view post text', 'swiss'),
        'search_items'          => _x('Search Featured activities', 'search post text', 'swiss'),
        'not_found'             => _x('No Featured activities found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Featured activities found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('Featured activities', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('Featured activities', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title' ),
        'taxonomies'            => array( 'featured_activity_date', 'featured_activity_type', 'featured_activity_location' ),
        'has_archive'           => false,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-tickets-alt',
        'rewrite'               => array(
            'slug' => _x('featured-activity', 'URL slug', 'swiss')
        )
    );

    register_post_type('featured_activity', $args);
}

function ideaSetup()
{
    $labels = array(
        'name'                  => _x('Idea', 'post type general name', 'swiss'),
        'singular_name'         => _x('Idea', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Idea', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Idea', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Idea', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Idea', 'add new post text', 'swiss'),
        'all_items'             => _x('Idea', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Idea', 'view post text', 'swiss'),
        'search_items'          => _x('Search Idea', 'search post text', 'swiss'),
        'not_found'             => _x('No Ideas found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Ideas found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('Ideas', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('This is an Idea description', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title', 'thumbnail' ),
        'taxonomies'            => array( '' ),
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => true,
        'menu_icon'             => 'dashicons-lightbulb',
        'rewrite'               => array(
        'slug' => _x('idea', 'URL slug', 'swiss')
        )
    );

    register_post_type('Idea', $args);
}

function create_type_taxonomy() {
	$labels = array(
		'name'              => _x( 'Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Types', 'textdomain' ),
		'all_items'         => __( 'All Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Type', 'textdomain' ),
		'update_item'       => __( 'Update Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Type', 'textdomain' ),
		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
		'menu_name'         => __( 'Type', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'rewrite'           => array( 'slug' => 'type' ),
        'has_archive'       => true
	);

	register_taxonomy( 'type', array( 'idea' ), $args );
}


function placeSetup()
{
    $labels = array(
        'name'                  => _x('Place', 'post type general name', 'swiss'),
        'singular_name'         => _x('Place', 'post type singular name', 'swiss'),
        'add_new'               => _x('Add New Place', 'the add new post text', 'swiss'),
        'add_new_item'          => _x('Add New Place', 'the add new post text', 'swiss'),
        'edit_item'             => _x('Edit Place', 'the edit post text', 'swiss'),
        'new_item'              => _x('New Place', 'add new post text', 'swiss'),
        'all_items'             => _x('Place', 'String for the submenu', 'swiss'),
        'view_item'             => _x('View Place', 'view post text', 'swiss'),
        'search_items'          => _x('Search Place', 'search post text', 'swiss'),
        'not_found'             => _x('No Places found', 'not found post text', 'swiss'),
        'not_found_in_trash'    => _x('No Places found in the Trash', 'not found trash post text', 'swiss'),
        'parent_item_colon'     => '',
        'menu_name'             => _x('Places', 'post type general name for menu', 'swiss')
    );

    $args = array(
        'labels'                => $labels,
        'description'           => _x('This is an Place description', 'post type description', 'swiss'),
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => array( 'title', 'thumbnail' ),
        'taxonomies'            => array( '' ),
        'has_archive'           => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'menu_icon'             => 'dashicons-location',
        'rewrite'               => array(
            'slug' => _x('place', 'URL slug', 'swiss')
        )
    );

    register_post_type('Place', $args);
}

function create_place_tag_taxonomy() {
	$labels = array(
		'name'              => _x( 'Place tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Place tag', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Place tags', 'textdomain' ),
		'all_items'         => __( 'All Place tags', 'textdomain' ),
		'edit_item'         => __( 'Edit Place tag', 'textdomain' ),
		'update_item'       => __( 'Update Place tag', 'textdomain' ),
		'add_new_item'      => __( 'Add New Place tag', 'textdomain' ),
		'new_item_name'     => __( 'New Place tag Name', 'textdomain' ),
		'menu_name'         => __( 'Place tag', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'rewrite'           => array( 'slug' => 'place_tag' ),
        'has_archive'       => true
	);

	register_taxonomy( 'place_tag', array( 'place' ), $args );
}

/*
 * -----------------------------------------------------
 * ENABLE/DISABLE CUSTOM POST TYPES
 * -----------------------------------------------------
 */

function setCustomTypes()
{
    //serviceSetup();
    noticeSetup();
    featuredActivitySetup();
    ideaSetup();
    placeSetup();
}

add_action('init', 'Evermade\Swiss\PostTypes\setCustomTypes');
add_action('init', 'Evermade\Swiss\PostTypes\create_type_taxonomy');
add_action('init', 'Evermade\Swiss\PostTypes\create_place_tag_taxonomy');
