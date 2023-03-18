<?php

  // link bootstrap 
function load_css(){
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0', 'all' );
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true );

}

add_action( 'wp_enqueue_scripts', 'load_css' );


 // link custom style
function enqueue_custom_styles() {
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/main.css', array(), '1.0', 'all' );
    // wp_enqueue_style('main');
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );


 // link manu 
 add_theme_support('menus');
 add_theme_support('post-thumbnails');

 add_theme_support('widgets');

 // register the menus


    register_nav_menus( array(
      'primary' => 'Primary Menu', 
      'footer' => 'Footer Menu', 
    ) );
 

    // image size

    add_image_size("blog-large",800,400,true);
    add_image_size("blog-small",300,200,true);

//   add_action( 'after_setup_theme', 'mytheme_register_menus' );


// register sidebar
// Widget Locations
function custom_theme_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Blog Sidebar', 'custom-theme' ),
      'id'            => 'blog-sidebar',
      'description'   => __( 'Widgets added here will appear on the left sidebar.', 'custom-theme' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
      'name'          => __( 'Page Sidebar', 'custom-theme' ),
      'id'            => 'page-sidebar',
      'description'   => __( 'Widgets added here will appear on the right sidebar.', 'custom-theme' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'custom_theme_widgets_init' );



// custom post type

function create_car_post_type() {
  $labels = array(
    'name' => 'Cars',
    'singular_name' => 'Car',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Car',
    'edit_item' => 'Edit Car',
    'new_item' => 'New Car',
    'view_item' => 'View Car',
    'search_items' => 'Search Cars',
    'not_found' => 'No cars found',
    'not_found_in_trash' => 'No cars found in trash',
    'parent_item_colon' => '',
    'menu_name' => 'Cars'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'rewrite' => array('slug' => 'car')
  );
  register_post_type('car', $args);
}
add_action('init', 'create_car_post_type');

// taxonomy
function create_car_taxonomy() {
  $labels = array(
    'name' => 'Car Categories',
    'singular_name' => 'Car Category',
    'search_items' => 'Search Car Categories',
    'all_items' => 'All Car Categories',
    'parent_item' => 'Parent Car Category',
    'parent_item_colon' => 'Parent Car Category:',
    'edit_item' => 'Edit Car Category',
    'update_item' => 'Update Car Category',
    'add_new_item' => 'Add New Car Category',
    'new_item_name' => 'New Car Category Name',
    'menu_name' => 'Car Categories',
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'rewrite' => array('slug' => 'car-category'),
  );
  register_taxonomy('car_category', 'car', $args);
}
add_action('init', 'create_car_taxonomy');



// form data

function my_ajax_endpoint() {

if(!wp_verify_nonce($_POST['nonce'],'ajax_nonce')){
  wp_send_json_error('nonce is inncorrect',401);
  die();
}

  // send the email
  $to = get_option('admin_email'); // Get the admin email address
  $subject = 'New form submission'; // Set the email subject
  $message = 'First Name: ' . $_POST['first_name'] . "\r\n";
  $message .= 'Last Name: ' . $_POST['last_name'] . "\r\n";
  $message .= 'Email: ' . $_POST['email'] . "\r\n";
  $message .= 'Phone: ' . $_POST['phone'] . "\r\n";
  $message .= 'Message: ' . $_POST['message'] . "\r\n";
  
  $headers = array('From: ' . $_POST['email']); // Set the email headers
  
  // Send the email
  try{
  if(wp_mail($to, $subject, $message, $headers)){
    wp_send_json_success($to);

  }else{
    wp_send_json_success('not sent');

  };
}catch(Exception $e){
  wp_send_json_success($e->getMessage());

     
}
  
  // Process the form data here
}
add_action('wp_ajax_my_ajax_endpoint', 'my_ajax_endpoint');
add_action('wp_ajax_nopriv_my_ajax_endpoint', 'my_ajax_endpoint');



// bootstrap navwalker

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );