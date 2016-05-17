<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Propertys
  
     $labels = array(
	'name' => _x('Properties', 'post type general name'),
    'singular_name' => _x('Property', 'post type singular name'),
    'add_new' => _x('Add New', 'Property'),
    'add_new_item' => __('Add New Property'),
    'edit_item' => __('Edit Property'),
    'new_item' => __('New Property'),
    'view_item' => __('View Property'),
    'search_items' => __('Search Property'),
    'not_found' =>  __('No Property found'),
    'not_found_in_trash' => __('No Property found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Properties'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('property',$args); // name used in query

    // Register the Homepage Propertys
  
  $labels = array(
  'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team'),
    'add_new_item' => __('Add New Team'),
    'edit_item' => __('Edit Team'),
    'new_item' => __('New Team'),
    'view_item' => __('View Team'),
    'search_items' => __('Search Team'),
    'not_found' =>  __('No Team found'),
    'not_found_in_trash' => __('No Team found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('team',$args); // name used in query


$labels = array(
  'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonial'),
    'not_found' =>  __('No Testimonial found'),
    'not_found_in_trash' => __('No Testimonial found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('testimonial',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type


/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'property_type', 'property',
   array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Property Type', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'property-type' ),
      '_builtin' => true
      ) );

    register_taxonomy( 'team_type', 'team',
   array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Team Member Type', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'team-type' ),
      '_builtin' => true
      ) );
  
} // End build taxonomies