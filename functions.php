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
	
	
	
	// this function and the if statment below cover the_excerpt()
	function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>,<code>,<pre>,<blockquote>'; 
    }

	if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 
	
	    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
	    global $post;
	    $raw_excerpt = $wpse_excerpt;
	        if ( '' == $wpse_excerpt ) {
	
	            $wpse_excerpt = get_the_content('');
	            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
	            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
	            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
	            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */
	
	            //Set the excerpt word count and only break after sentence is complete.
	                $excerpt_word_count = 40;
	                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
	                $tokens = array();
	                $excerptOutput = '';
	                $count = 0;
	
	                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
	                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);
	
	                foreach ($tokens[0] as $token) { 
	
	                    if ($count >= $excerpt_word_count && preg_match('/[\?\.\!]\s*$/uS', $token)) { 
	                    // Limit reached, continue until , ; ? . or ! occur at the end
	                        $excerptOutput .= trim($token);
	                        break;
	                    }
	
	                    // Add words to complete sentence
	                    $count++;
	
	                    // Append what's left of the token
	                    $excerptOutput .= $token;
	                }
	
	            $wpse_excerpt = trim(force_balance_tags($excerptOutput));
	
	                
		            $excerpt_end = '<a class="read-more" alt= "' . get_the_title() . '" href="'. esc_url( get_permalink() ) . '">' . sprintf(__( 'Read more >' ), get_the_title()) . '</a>'; 
	                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 
	
	                //$pos = strrpos($wpse_excerpt, '</');
	                //if ($pos !== false)
	                // Inside last HTML tag
	                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
	                //else
	                // After the content
	                
		            $wpse_excerpt .= $excerpt_end; /*Add read more in new paragraph */
	
	            return $wpse_excerpt;   
	
	        }
	        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
	    }
	
	endif; 
	
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 

?>