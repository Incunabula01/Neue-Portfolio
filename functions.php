<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );

/* Font Awesome Icons */

function enqueue_font_awesome() {
 
wp_enqueue_style( 'font-awesome', '/wp-content/themes/Neue-Portfolio/library/css/font-awesome.min.css' );
 
}

add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-400', 450, 250, true);
add_image_size( 'bones-thumb-300', 300, 250, true );
add_image_size( 'portfolio-post', 1362, 300, true);
add_image_size( 'gallery-thumb' , 250, 350, true);


add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-400' => __('450px by 250px'),
        'bones-thumb-300' => __('300px by 150px'),
        'portfolio-post' => __('1280px by 300px'),
        'gallery-thumb' => __('280px by 380px')
    ) );
}

function neueportfolio_image_sizes_attr( $sizes, $size){

  $width = $size[0];

  840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

  if ( 'page' === get_post_type() ){
    840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  } else {
    840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 62vw, 840px';
    600 > $width && $sizes = '(max-width: ' . $width . 'px';
  }
   return $sizes;
}

add_filter( 'wp_calculate_image_sizes', 'neueportfolio_image_sizes_attr', 10 , 2 );
/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	));

  register_sidebar(array(
    'id' => 'Footer-Menu-1',
    'name' => __( 'Footer1', 'bonestheme' ),
    'description' => __( 'Footer Menu Left', 'bonestheme' ),
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'id' => 'Footer-Menu-2',
    'name' => __( 'Footer2', 'bonestheme' ),
    'description' => __( 'Footer Menu Middle', 'bonestheme' ),
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'id' => 'Footer-Menu-3',
    'name' => __( 'Footer3', 'bonestheme' ),
    'description' => __( 'Footer Menu Right', 'bonestheme' ),
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

	
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/************* Sticky Navs *********************/

function wayPoints_js() {
wp_register_script('jqueryWayPoints_js', get_template_directory_uri() . '/library/js/libs/waypoints.min.js', 'jQuery' , '1.1', true);
wp_register_script('stickyWayPoints_js', get_template_directory_uri() . '/library/js/libs/waypoints-sticky.min.js', 'jQuery' , '1.1', true);
wp_enqueue_script('jqueryWayPoints_js');
wp_enqueue_script('stickyWayPoints_js');
}

add_action( 'wp_enqueue_scripts', 'wayPoints_js' );

/*********** JS Charts ************************/

function charts_js() {
wp_register_script('chart_js', 'http://d3js.org/d3.v3.min.js','jQuery', 1.1, true);
wp_enqueue_script('chart_js');
}

add_action( 'wp_enqueue_scripts', 'charts_js' );


/************* Masonry Gallery *********************/

function masonryGallery_js() {
wp_register_script('imageLoaded_js', get_template_directory_uri() . '/library/js/libs/imagesloaded.pkgd.min.js', 'jQuery','1.1', true);
wp_register_script('isotope_js', get_template_directory_uri() . '/library/js/libs/isotope.pkgd.min.js', 'jQuery','1.1', true);
wp_register_script('packery_js', get_template_directory_uri() . '/library/js/libs/packery-mode.pkgd.min.js', 'jQuery', '1.1', true);
wp_enqueue_script('imageLoaded_js');
wp_enqueue_script('masonry');
wp_enqueue_script('isotope_js');
wp_enqueue_script('packery_js');
}

add_action( 'wp_enqueue_scripts', 'masonryGallery_js' ); 

/************* Contact Form Validation *********************/

function contactFormValidation(){
wp_register_script('jqueryValidate_js', get_template_directory_uri() . '/library/js/libs/jquery.validate.min.js', 'jQuery','2.1', true);
wp_enqueue_script('jqueryValidate_js');
}

add_action( 'wp_enqueue_scripts', 'contactFormValidation');

function onePageNav(){
wp_register_script('jqueryScrollTo_js', get_template_directory_uri() . '/library/js/libs/jquery.scrollTo.min.js', 'JQuery', '2.1', true);
wp_register_script('jqueryOnePageNav_js', get_template_directory_uri() . '/library/js/libs/jquery.nav.js', 'jQuery' , '2.1', true);
wp_enqueue_script('jqueryScrollTo_js');
wp_enqueue_script('jqueryOnePageNav_js');
}

add_action( 'wp_enqueue_scripts', 'onePageNav' );

/* DON'T DELETE THIS CLOSING TAG */ ?>
