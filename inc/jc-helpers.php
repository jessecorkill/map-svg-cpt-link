<?
function show_array($ar){
  echo "<pre>" . print_r($ar) . "</pre>";
}
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
function verify_variable($var){
  if($var){
    return $var;
  }
}
