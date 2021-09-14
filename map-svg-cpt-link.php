<?php
/*
Plugin Name: Map SVG CPT Link
description: This plugin connects a custom post type that you have created and updates or creates a MapSVG item for each custom post. Database must be MySQL.
Version: 1.0.0
Author: Jesse Corkill
*/
//Globals
$cpt_data;
//End Globals

//ACF SETUP START
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/** Start: Detect ACF Pro plugin. Include if not present. */
if ( !class_exists('acf') ) { // if ACF Pro plugin does not currently exist
  /** Start: Customize ACF path */
  add_filter('acf/settings/path', 'cysp_acf_settings_path');
  function cysp_acf_settings_path( $path ) {
    $path = plugin_dir_path( __FILE__ ) . '/inc/acf-incs/acf/';
    return $path;
  }
  /** End: Customize ACF path */
  /** Start: Customize ACF dir */
  add_filter('acf/settings/dir', 'cysp_acf_settings_dir');
  function cysp_acf_settings_dir( $path ) {
    $dir = plugin_dir_url( __FILE__ ) . '/inc/acf-incs/acf/';
    return $dir;
  }
  /** End: Customize ACF path */
  /** Start: Hide ACF field group menu item */
  add_filter('acf/settings/show_admin', '__return_false');
  /** End: Hide ACF field group menu item */
  /** Start: Include ACF */
  include_once( plugin_dir_path( __FILE__ ) . '/inc/acf-incs/acf/acf.php' );
  /** End: Include ACF */
  /** Start: Create JSON save point */
  add_filter('acf/settings/save_json', 'cysp_acf_json_save_point');
  function cysp_acf_json_save_point( $path ) {
    $path = plugin_dir_path( __FILE__ ) . '/inc/acf-incs/acf-json/';
    return $path;
  }
  /** End: Create JSON save point */
  /** Start: Create JSON load point */
  add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
  /** End: Create JSON load point */
  /** Start: Stop ACF upgrade notifications */
  add_filter( 'site_transient_update_plugins', 'cysp_stop_acf_update_notifications', 11 );
  function cysp_stop_acf_update_notifications( $value ) {
    unset( $value->response[ plugin_dir_path( __FILE__ ) . '/inc/acf-incs/acf/acf.php' ] );
    return $value;
  }
  /** End: Stop ACF upgrade notifications */
} else { // else ACF Pro plugin does exist
  /** Start: Create JSON load point */
  add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
  /** End: Create JSON load point */
} // end-if ACF Pro plugin does not currently exist
/** End: Detect ACF Pro plugin. Include if not present. */
/** Start: Function to create JSON load point */
function cysp_acf_json_load_point( $paths ) {
  $paths[] = plugin_dir_path( __FILE__ ) . '/inc/acf-incs/acf-json-load';
  return $paths;
}
/** End: Function to create JSON load point */
//ACF SETUP END


class MSCL{
  public static function init(){
    self::load('__loader');
  }
  private function load($file){
    require __DIR__ . '/inc/' . $file . '.php';
  }
}
MSCL::init();

$table_name = 'wp_mapsvg_database_84';
global $wpdb;

//echo esc_html(show_array(wp_get_post_categories('83')));

<<<<<<< Updated upstream
if($cpt_data){
  foreach($cpt_data as $post){
=======
//Create Index Array of Available Categories
$cat_args = array(
  'taxonomy' => 'category',
  'hide_empty' => false,
);
$cats = get_terms($cat_args);
$cat_indx = [];
$i = 0;
foreach($cats as $cat){
	$cat_indx[$i] = $cat->name;
	$i = $i + 1;
}
console_log($cat_indx);

if($cpt_data){
  foreach($cpt_data as $post){
	  //Get Categories of Post & Parse
	  $post_cats = get_the_category($post->ID);
	  $the_term = "";
	  foreach($post_cats as $post_cat){
		  if($post_cat->name != "Veranda" && $post_cat->name != "Villa"){
        $the_term = $post_cat->name;

		  }
	  }
>>>>>>> Stashed changes
    $db_fields = array(
      'title' => $post->post_title,
      'description' => $post->post_content,
      'link' => $post->guid,
      'post_id' => $post->ID,
<<<<<<< Updated upstream
      'location_address' => get_field('address', $post->ID)
=======
      'location_address' => verify_variable(get_field('address', $post->ID)),
      'featured_image' => verify_variable(get_the_post_thumbnail_url( $post->ID, 'post-thumbnail')),
      'category_text' => $the_term,
      //'category' => array_keys($cat_indx, $the_term),
      'category' => array_search($the_term, $cat_indx) + 1,
>>>>>>> Stashed changes
    );
    // KEY: %d interger (whole numbers only) %s string %f float
    $db_format = array(
      '%s',
      '%s',
      '%s',
      '%d',
<<<<<<< Updated upstream
      '%s'
=======
      '%s',
	  '%s',
	  '%s',
    '%d',
>>>>>>> Stashed changes
    );
    $db_where = array(
      'post_id' => $post->ID
    );
    //console_log($post->ID);


    //Add new identifier column to DB table.
    $col_query = $wpdb->get_row("SELECT * FROM " . $table_name . " WHERE post_id IS NOT NULL");
    //Add column if not present.
    if(!isset($col_query->post_id)){
      $wpdb->query("ALTER TABLE " . $table_name . " ADD post_id INT(11)");
      //console_log('Table altered!');
    }



    //Check if post already exists in table..
    $row = $wpdb->get_row("SELECT * FROM " . $table_name . " WHERE post_id = " . "'". $post->ID."'", OBJECT);
    //Post does NOT exist, so add a new row.
    if(!$row){
      $wpdb->insert($table_name, $db_fields,  $db_format);
    }
    //Post does exist in table, so update row's values
    else{
      array_push($db_format, '%s');

      $wpdb->update($table_name, $db_fields, $db_where, $db_format);
    }
    //$wpdb->show_errors();
  }
}
?>
