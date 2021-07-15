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
//$cpt_query = new WP_Query($args);
$cpt_query = get_posts($args);
//echo '<pre>' . print_r($cpt_query) . '</pre>';

class MSCL{
  public static function init(){
    self::load('__loader');
  }
  private function load($file){
    require __DIR__ . '/inc/' . $file . '.php';
  }
}
MSCL::init();



?>
