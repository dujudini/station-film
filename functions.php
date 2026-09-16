<?php
/**
 * Station 19 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package station19
 */
if (! function_exists("array_key_last")) {
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }
        
        return array_keys($array)[count($array)-1];
    }
}
if ( ! function_exists( 'station19_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function station19_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Station 19, use a find and replace
		 * to change 'station19' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'station19', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'station19' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'station19_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'station19_setup' );

	// Removes from admin menu
	add_action( 'admin_menu', 'pk_remove_admin_menus' );
	function pk_remove_admin_menus() {
	    remove_menu_page( 'edit-comments.php' );
	}
 
	// Removes from post and pages
	add_action('init', 'pk_remove_comment_support', 100);
 	function pk_remove_comment_support() {
	   remove_post_type_support( 'post', 'comments' );
	   remove_post_type_support( 'page', 'comments' );
	}
 
	// Removes from admin bar
	add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
	function pk_remove_comments_admin_bar() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('comments');
	}

/**
 * Infinite Scroll para Posts (somente 'post' publicados)
 */

// Endpoint REST para carregar mais posts
add_action('rest_api_init', function () {
    register_rest_route('my/v1', '/infinite-posts', [
        'methods'  => 'GET',
        'callback' => function (\WP_REST_Request $req) {
            $paged = max(1, absint($req->get_param('paged')));
            $ppp   = max(1, (int) get_option('posts_per_page'));

            $q = new WP_Query([
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => $ppp,
                'paged'               => $paged,
                'ignore_sticky_posts' => true,
                'no_found_rows'       => false, // precisamos de max_num_pages
            ]);

            ob_start();
            if ($q->have_posts()) {
                while ($q->have_posts()) {
                    $q->the_post();
                    // Reutiliza seu template
                    $tpl = locate_template('template-parts/content.php');
                    if ($tpl) {
                        include $tpl;
                    } else {
                        // Fallback simples
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('infinite-item'); ?>>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                        </article>
                        <?php
                    }
                }
                wp_reset_postdata();
            }
            $html = ob_get_clean();

            return new \WP_REST_Response([
                'html'       => $html,
                'paged'      => $paged,
                'max_pages'  => (int) $q->max_num_pages,
                'next_paged' => ($paged < $q->max_num_pages) ? $paged + 1 : null,
                'count'      => (int) $q->post_count,
            ]);
        },
        'permission_callback' => '__return_true',
        'args' => [
            'paged' => [
                'type'     => 'integer',
                'required' => true,
            ],
        ],
    ]);
});

// Enfileira JS só na Posts page (Settings → Reading → Posts page)
add_action('wp_enqueue_scripts', function () {
    if (!is_admin() && is_home()) {
        wp_enqueue_script(
            'infinite-posts',
            get_stylesheet_directory_uri() . '/js/infinite-news.js',
            [], // se quiser usar jQuery, adicione 'jquery'
            '1.0.0',
            true
        );

        global $wp_query;
        $current_page = max(1, get_query_var('paged') ? (int) get_query_var('paged') : 1);
        $max_pages    = (int) $wp_query->max_num_pages;

        wp_localize_script('infinite-posts', 'InfinitePosts', [
            'restUrl'    => esc_url_raw( rest_url('my/v1/infinite-posts') ),
            'nextPaged'  => ($current_page < $max_pages) ? $current_page + 1 : null,
            'maxPages'   => $max_pages,
            'container'  => '.news .row',   // onde inserir os novos posts
            'sentinel'   => '#infinite-sentinel', // alvo do IntersectionObserver
        ]);
    }
});



// Helpers que o seu content-social.php usa (definidos só se não existirem)
if (!function_exists('ratio_to_padding')) {
  function ratio_to_padding($ratio_str, $fallback = '56.25') {
    if (!$ratio_str || strpos($ratio_str, ':') === false) return $fallback;
    list($w, $h) = array_map('floatval', explode(':', $ratio_str));
    if ($w <= 0 || $h <= 0) return $fallback;
    return number_format(($h / $w) * 100, 4, '.', '');
  }
}
if (!function_exists('map_flex_justify')) {
  function map_flex_justify($pos) {
    $pos = strtolower((string)$pos);
    return $pos === 'right' ? 'flex-end' : ($pos === 'center' ? 'center' : 'flex-start');
  }
}

// Endpoint REST só desta página (mantém seus args/layout)
add_action('rest_api_init', function () {
  register_rest_route('my/v1', '/infinite-socials', [
    'methods'  => 'GET',
    'callback' => function (\WP_REST_Request $req) {
      $paged = max(1, absint($req->get_param('paged')));

      // Mesmos args do seu template, só que com paginação real
      $args = [
        'post_type'      => 'socials',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
        'fields'         => 'ids',
        'paged'          => $paged,
        'no_found_rows'  => false, // precisamos do max_num_pages
      ];

      $q = new WP_Query($args);

      // Render: reusa seu template que espera $post_id
      ob_start();
      foreach ($q->posts as $post_id) {
        include locate_template('/template-parts/content-social.php');
      }
      $html = ob_get_clean();

      return new \WP_REST_Response([
        'html'       => $html,
        'paged'      => $paged,
        'max_pages'  => (int) $q->max_num_pages,
        'next_paged' => ($paged < $q->max_num_pages) ? $paged + 1 : null,
        'count'      => (int) $q->post_count,
      ]);
    },
    'permission_callback' => '__return_true',
    'args' => [
      'paged' => ['type' => 'integer', 'required' => true],
    ],
  ]);
});




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function station19_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'station19_content_width', 640 );
}
add_action( 'after_setup_theme', 'station19_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function station19_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'station19' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'station19' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'station19_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery-core');
        wp_register_script('jquery-core', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', false, '3.7.1');
        wp_enqueue_script('jquery-core');
    }
}
add_action('init', 'modify_jquery');

function station19_scripts() {
	wp_enqueue_style( 'station19-style', get_stylesheet_uri(), false, '4.0.2');

	wp_enqueue_script( 'station19-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'station19_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

