<?
class MSCLLoader{
  public static function init(){
    //self::load('db-transfer');
    self::load('jc-helpers');
    self::load('acf');
    self::load('cpt-data');
    //self::load('db-write');

  }
  private function load($file){
    require __DIR__ . '/' . $file . '.php';
  }
}
MSCLLoader::init();
