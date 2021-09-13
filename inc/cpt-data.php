<?
global $cpt_data;
$CPT_name = get_field('cpt_slug' , 'options');
$args = array(
  'post_type' => $CPT_name
);
//$cpt_query = new WP_Query($args);
$cpt_data = get_posts($args);
