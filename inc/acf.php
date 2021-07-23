<?
//This file loads all files in 'acf' folder. These files build the ACF assets needed for this plugin.
class MSCLACF{
  public function init(){
    self::load('options-page');
    self::load('options-fields');
  }
  private function load($file){
    require __DIR__ . '/acf/' . $file . '.php';
  }
}
MSCLACF::init();
