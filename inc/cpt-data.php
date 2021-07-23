<?
global $cpt_data;
$CPT_name = 'floorplan';
$args = array(
  'post_type' => $CPT_name
);
//$cpt_query = new WP_Query($args);
$cpt_data = get_posts($args);
