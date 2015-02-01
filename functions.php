<?php

	//This theme uses wp_nav_nemu() in one location
	function strips_setup() {
		register_nav_menu('main', 'Main menu');
	}
	add_action( 'after_setup_theme', 'strips_setup');
	
	//Below are the widget areas
	function strips_widgets_init(){
		register_sidebar (array(
			'name' => __('Footer Widget Area 1', 'strips'),
			'id' => 'footer1', 
			'description' => __('Appears in the footer section of the site. Takes up the full width of the footer area. If Footer Widget Area 2 is being used, both areas will take up half of the footer each. On smaller screens, if both footers are active, Footer Widget Area 1 will stack on top of Footer Widget Area 2.', 'strips'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
			)
		);
		register_sidebar (array(
			'name' => __('Footer Widget Area 2', 'strips'),
			'id' => 'footer2', 
			'description' => __('Appears in the footer section of the site. If Footer Widget Area 2 is being used, it will split the footer area with Footer Widget Area 1. On smaller screens, if both footers are active, Footer Widget Area 1 will stack on top of Footer Widget Area 2.', 'strips'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
			)
		);
		register_sidebar (array(
			'name' => __('Sidebar Widget Area', 'strips'),
			'id' => 'blog-sidebar',
			'description' => __('The theme sidebar. Sits to the right of the main content area on large screens (limited to 300px in this case). Moves under the main content area on smaller screens (will dynamically resize in this case).', 'strips'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
			)
		);
	}
	add_action('widgets_init', 'strips_widgets_init');
	
	//images
	add_theme_support( 'post-thumbnails' );
	
	//add_image_size is called after theme setup to make sure the crop works correctly
	add_action( 'after_setup_theme', 'theme_setup' );
	function theme_setup() {
		add_image_size( 'blog-thumb', 1000, 200, true );
	}

	//make the add_image_size image user-selectable with a name
	add_filter( 'image_size_names_choose', 'my_custom_sizes' );
	function my_custom_sizes( $sizes ) {
    	return array_merge( $sizes, array(
        'blog-thumb' => __('Blog Thumb'),
        'page-thumb' => __('Page Thumb'),
		) );
	}
	
	//adds the "... Read more" link on the end of the_excerpt()
	function new_excerpt_more( $more ) {
		return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read more</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	//changes the length of the excerpt. the units are words. what about characters in Japanese? would an if statement based on language work? 
	function custom_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	//adds a class (.excerpt) to the_excerpt()
	add_filter( "the_excerpt", "add_class_to_excerpt" );
	function add_class_to_excerpt( $excerpt ) {
    	return str_replace('<p', '<p class="excerpt"', $excerpt);
	}
	
	function strips_customize_register( $wp_customize ) {
		$wp_customize->add_setting( 'header_textcolor' , array(
			'default'     => '#000000',
			'transport'   => 'refresh',
			) 
		);
		
		$wp_customize->add_section( 'strips_new_section_name' , array(
			'title'      => __( 'Visible Section Name', 'strips' ),
			'priority'   => 30,
			) 
		);
		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'link_color', 
				array(
					'label'      => __( 'Header Color', 'strips' ),
					'section'    => 'your_section_id',
					'settings'   => 'your_setting_id',
				) 
			) 
		);
	}
	add_action( 'customize_register', 'strips_customize_register' );
	
	// Register Custom Navigation Walker for Bootstrap collapsible navigation
	require_once('wp_bootstrap_navwalker.php');
	
	// Allow the user to set the Jetpack related posts headline
	/*function jetpackme_related_posts_headline( $headline ) {
		$headline = sprintf(
            '<h3 class="jp-relatedposts-headline"><em>%s</em></h3>',
            esc_html( 'Check These Out!' )
            );
		return $headline;
	}
	add_filter( 'jetpack_relatedposts_filter_headline', 'jetpackme_related_posts_headline' );*/

?>