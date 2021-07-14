<?
class MSCLLoader{
  init(){
    self::load('db-transfer');
  }
  private function load($file){
    require __DIR__ . '/' . $file . '.php';
  }
}
MSCLLoader::init();
