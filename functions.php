<?php

// Register Styles and Scripts
function yeltsin_styles() {

    wp_enqueue_script( 'jquery', 
                        get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', 
                        array(), 
                        null, 
                        true );

    wp_enqueue_script( 'what-input', 
                        get_template_directory_uri() . '/node_modules/what-input/dist/what-input.min.js', 
                        array('jquery'), 
                        null, 
                        true );

    wp_enqueue_script( 'foundation-js', 
                        get_template_directory_uri() . '/node_modules/foundation-sites/dist/js/foundation.min.js', 
                        array('what-input'), 
                        null,
                        true );

    wp_enqueue_script( 'app-js', 
                        get_template_directory_uri() . '/js/app.js', 
                        'foundation-js', 
                        '1.0.0', 
                        true );

    wp_enqueue_style( 'icons8', 
                       'https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css', 
                       array(), 
                       null );

    wp_enqueue_style( 'heebo-font', 
                       'https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;900&display=swap', 
                       array(), 
                       null );

    wp_enqueue_style( 'app-css', 
                       get_template_directory_uri() . '/css/app.css', 
                       array(), 
                       null );

}
add_action( 'wp_enqueue_scripts', 'yeltsin_styles' );

// Register User Contact Methods
function custom_user_contact_methods( $user_contact_method ) {

	$user_contact_method['facebook'] = __( 'Facebook', 'text_domain' );
	$user_contact_method['twitter'] = __( 'Twitter', 'text_domain' );
	$user_contact_method['instagram'] = __( 'Instagram', 'text_domain' );
	$user_contact_method['linkedin'] = __( 'LinkedIn', 'text_domain' );
	$user_contact_method['github'] = __( 'GitHub', 'text_domain' );

	return $user_contact_method;

}
add_filter( 'user_contactmethods', 'custom_user_contact_methods' );

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1000;

if ( ! function_exists('custom_theme_features') ) {

// Register Theme Features
function custom_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post', 'work' ) );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( 'css/editor-style.css' );

    add_image_size( 'workshome', 600, 376, true );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

}

if ( ! function_exists('yeltsin_works') ) {

    // Register Custom Post Type
    function yeltsin_works() {
    
        $labels = array(
            'name'                  => _x( 'Works', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Works', 'text_domain' ),
            'name_admin_bar'        => __( 'Works', 'text_domain' ),
            'archives'              => __( 'Item Archives', 'text_domain' ),
            'attributes'            => __( 'Item Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
            'all_items'             => __( 'All Items', 'text_domain' ),
            'add_new_item'          => __( 'Add New Item', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Item', 'text_domain' ),
            'edit_item'             => __( 'Edit Item', 'text_domain' ),
            'update_item'           => __( 'Update Item', 'text_domain' ),
            'view_item'             => __( 'View Item', 'text_domain' ),
            'view_items'            => __( 'View Items', 'text_domain' ),
            'search_items'          => __( 'Search Item', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Work', 'text_domain' ),
            'description'           => __( 'Works', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( 'services' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'work', $args );
    
    }
    add_action( 'init', 'yeltsin_works', 0 );
    
}

if ( ! function_exists( 'services' ) ) {

    // Register Custom Taxonomy
    function services() {
    
        $labels = array(
            'name'                       => _x( 'Serviços', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Serviço', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Serviços', 'text_domain' ),
            'all_items'                  => __( 'All Items', 'text_domain' ),
            'parent_item'                => __( 'Parent Item', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
            'new_item_name'              => __( 'New Item Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Item', 'text_domain' ),
            'edit_item'                  => __( 'Edit Item', 'text_domain' ),
            'update_item'                => __( 'Update Item', 'text_domain' ),
            'view_item'                  => __( 'View Item', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Items', 'text_domain' ),
            'search_items'               => __( 'Search Items', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No items', 'text_domain' ),
            'items_list'                 => __( 'Items list', 'text_domain' ),
            'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
        );
        register_taxonomy( 'services', array( 'work' ), $args );
    
    }
    add_action( 'init', 'services', 0 );
    
    }

