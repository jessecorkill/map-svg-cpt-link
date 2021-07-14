<?php
/*
Plugin Name: Map SVG CPT Link
description: This plugin connects a custom post type that you have created and updates or creates a MapSVG item for each custom post. Database must be MySQL.
Version: 0.0.1
Author: Jesse Corkill
*/
$CPT_name = 'floorplan';
$args = array(
  'post_type' => $CPT_name
);
$cpt_query = new WP_Query($args);

$cpt_data = array();


// Add reference point of each post to the cpt_data array
if ( $cpt_query->have_posts() ) {
    while ( $cpt_query->have_posts() ) {
        $cpt_query->the_post();
        $cpt_data[get_the_ID()] = get_the_ID();
    }
} else {
    // no posts found
}

// Add the rest of relevant data to $cpt_data array with our newly added IDs
if($cpt_data){
  foreach($cpt_data as $post){
    $id = $post[0]
    array_push($cpt_data[$id], get_the_title());
  }
}

class MSCL{
  init(){
    self::load('__loader');
  }
  private function load($file){
    require __DIR__ . '/inc' . $file '.php';
  }
}
MSCL::init();



?>
