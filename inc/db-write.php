<?
$table_name = 'wp_mapsvg_database35';
global $wpdb;
if($cpt_data){
  foreach($cpt_data as $post){
    echo '<pre>' . print_r($post) . '</pre>';
    $wpdb->insert($table_name, array('title' => $post['post_title']));
  }
}
