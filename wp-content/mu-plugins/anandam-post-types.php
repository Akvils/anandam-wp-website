<?php
function anandam_post_types(){
  //Campus post type
    register_post_type('campus', array(
      'rewrite' => array('slug' => 'campus'),
      'supports' => array('title', 'editor', 'excerpt'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Campus',
        'add_new_item' => 'Add New Campus',
        'edit_item' => 'Edit Campus',
        'all_items' => 'All Campuses',
        'singular_name' => 'Campus'
      ),
      'menu_icon' =>  'dashicons-location-alt'
    ));

//Event post type
  register_post_type('event', array(
    'capability_type' => 'event',
    'map_meta_cap' => true,
    'rewrite' => array('slug' => 'events'),
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' =>  'dashicons-calendar'
  ));

  //Program post type
    register_post_type('program', array(
      'rewrite' => array('slug' => 'programs'),
      'supports' => array('title', 'editor'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Programs',
        'add_new_item' => 'Add New Program',
        'edit_item' => 'Edit Program',
        'all_items' => 'All Programs',
        'singular_name' => 'Program'
      ),
      'menu_icon' =>  'dashicons-awards'
    ));

    //People post type
      register_post_type('people', array(
        'capability_type' => 'people',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'people'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
          'name' => 'People',
          'add_new_item' => 'Add New People',
          'edit_item' => 'Edit People',
          'all_items' => 'All People',
          'singular_name' => 'People'
        ),
        'menu_icon' =>  'dashicons-groups'
      ));
}

add_action('init', 'anandam_post_types');
 ?>
