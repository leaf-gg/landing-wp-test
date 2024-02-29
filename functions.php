<?php

// remove margin top from admin bar

function remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('init', 'remove_admin_login_header');

function registerScripts() {
	// base concatenated app.js (contains all non-cdn vendors, look at readme.md, gulpfile.js and src/js folders if you have any questions);
	wp_register_script( 'app', get_bloginfo('template_url') . '/dist/script.js', '', null, false );

	$load_array = array('templateUrl' => get_stylesheet_directory_uri() );

	wp_enqueue_script('app');

	//after wp_enqueue_script
	wp_localize_script( 'app', 'object_name', $load_array );
}

add_action( 'wp_enqueue_scripts', 'registerScripts' );

function registerStyles() {
    // base stylesheet (contains all non-cdn vendors, look at readme.md, gulpfile.js, src/main.css and src/stylus)
	wp_register_style( 'basic-stylesheet', get_bloginfo('template_url') . '/dist/main.css', '',  null, 'all' );
	wp_enqueue_style( 'basic-stylesheet');
}

add_action( 'wp_enqueue_scripts', 'registerStyles' );


add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
show_admin_bar(false);
}
}

function deregister_scripts() {
	wp_deregister_script( 'wp-embed' );

	if ( !is_admin() ) {

        // i do this because i generally concatenate jquery into my app.js
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
	}
}

add_theme_support( 'post-thumbnails' );

?>