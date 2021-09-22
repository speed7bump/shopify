<?php

if ( ! function_exists( 'win95_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function win95_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on win95, use a find and replace
		 * to change 'win95' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'win95', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'win95' ),
				'footer'  => __( 'Secondary menu', 'win95' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'win95_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'win95_setup' );

/* 
	Display random animated gif 
	via https://www.kodingmadesimple.com/2018/02/display-random-image-from-folder-php.html
*/

function getRandomImage($dir_path = NULL){
	$dir_path = 'wp-content/themes/win95/assets/gifs';
    if(!empty($dir_path)){
	    
		$files = scandir($dir_path);
		$count = count($files);
		$index = rand(2, ($count-1));
		
        if($count > 2){
            $index = rand(2, ($count-1));
            $filename = $files[$index];
            return '<div class="row" style="text-align:center;"><div class="col-12"><img src="/'.$dir_path."/".$filename.'" alt="'.$filename.'" style="margin:1em auto;"></div></div>';
            echo $dir_path . $filename;
        } else {
            return "The directory is empty!";
        }
    } else {
        return "Please enter valid path to image directory!";
    }
}