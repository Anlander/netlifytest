<?php 
//CSS OCH JS
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'jasny', '//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css' );
	// wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );	
	wp_enqueue_style( 'core', get_stylesheet_uri(), false,filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
}

function themeslug_enqueue_script() {
	//wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/jquery/jquery.min.js', '', '1.0', true );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'la-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true );
  wp_localize_script( 'la-js', 'localized', array( 'images' => trailingslashit( get_stylesheet_directory_uri() ) . 'img/' ) );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

/*============================
=            Menu            =
============================*/
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('small-menu',__( 'Small Menu' ));
}

add_action( 'init', 'register_my_menu' );

/*===============================
=            Widgets            =
===============================*/
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidfot',
		'id'            => 'footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<p><strong>',
		'after_title'   => '</strong></p>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/*======================================
=            Featured Image            =
======================================*/
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );

add_image_size( 'news-img-frontpage', 720, 9999 );
add_image_size( 'page-header', 1200, 9999 );
}

/*=========================================
=            Custom Post Types            =
=========================================*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'staff',
    array(
      'labels' => array(
        'name' => __( 'Medarbetare' ),
        'singular_name' => __( 'Medarbetare' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'medarbetare'),
    )
  );
}

/*=========================================
=            Custom Post Types            =
=========================================*/
// add_action( 'init', 'create_post_type' );
// function create_post_type() {
//   register_post_type( 'staff2',
//     array(
//       'labels' => array(
//         'name' => __( 'ourpeople' ),
//         'singular_name' => __( 'ourpeople' )
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'rewrite' => array('slug' => 'ourpeople'),
//     )
//   );
// }

/*====================================================
=            NEXT & PREV Single - buttons            =
====================================================*/
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
 
function post_link_attributes($output) {
    $code = 'class="button"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}


/*===========================================================
=            REMOVE CATEGORY: FROM ARCHIVE TITLE            =
===========================================================*/
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

/*===============================
=            Excerpt            =
===============================*/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/*==============================================
=            Add Utseende to Editor            =
==============================================*/
// add editor the privilege to edit theme

// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );


?>