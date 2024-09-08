<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */



function enqueue_song_similarity_scripts() {
    // Enqueue custom style (if you have a custom CSS for this form)
    wp_enqueue_style('song-similarity-style', get_template_directory_uri() . '/css/song-similarity-style.css');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('song-similarity-scripts', get_template_directory_uri() . '/js/song-similarity-scripts.js', array('jquery'), null, true);
    
    // Pass the API URL to the script
    wp_localize_script('song-similarity-scripts', 'songSimilarity', array(
        'ajax_url' => 'https://5000-omarabdelke-songsimilar-cvc2qmcoho8.ws-eu116.gitpod.io//compare-professor-song'
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_song_similarity_scripts');

if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


