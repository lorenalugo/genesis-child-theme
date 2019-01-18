<?php
// Start Theme
require_once(get_template_directory() .'/lib/init.php');
// Defines the child theme (do not remove).
define('CHILD_THEME_NAME','Genesis Child Theme');
define('CHILD_THEME_URL','http://lorenalugo.github.io/genesis-child-theme/');
define('CHILD_THEME_VERSION','1.0,1');
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    /* Bootstrap */
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), PARENT_THEME_VERSION );
	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() .'/js/bootstrap.min.js' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
//* Add Viewport meta tag for mobile browsers (requires HTML5 theme support)
add_theme_support( 'genesis-responsive-viewport' );
// Editing copyright text
add_filter('genesis_footer_creds_text', 'prefix_footer_creds_filter');
function prefix_footer_creds_filter( $creds ) {
	$creds = '@' . date('Y') . ' Lorena Lugo Web Development';
	return $creds;
}
//Sidebars
  genesis_register_sidebar( array(
	'id'            => 'welcome-section',
	'name'          => 'Welcome Section',
	'description'   => 'This is the welcome section.',
	'before_widget' => '<div id="welcome-text">',
	'after_widget'  => '</div>',
) );

  genesis_register_sidebar( array(
	'id'          => 'sidebar-1',
	'name'        => 'sidebar-1',
	'description' => 'This is the section 1.'
) );

  genesis_register_sidebar( array(
    'id'          => 'sidebar-2',
    'name'        => 'sidebar-2',
    'description' => 'This is the section 2.'
) );

    genesis_register_sidebar( array(
    'id'          => 'sidebar-3',
    'name'        => 'sidebar-3',
    'description' => 'This is the section 3.'
) );
?>