<?php
 class DBHandler {
  public static function create(){
    return new static();
  }
  public function get() {
  }
 }
 
 class MySQLHandler extends DBHandler {
  // 这里一个create
  //改写了get
  public function get() {
   echo "MySQL get()";
  }
 }
 
 class MemcachedHandler extends DBHandler {
  // 这里又有一个create
  public function get() {
   echo "Memcached get";
  }
 }
 
function sss(DBHandler $handler){
  $handler->get();
}


class A{
  public static function who(){
    echo __CLASS__;
  }

  public static function test(){
    static::who();//self::who()
  }
}

class B extends A{
  public static function who(){
    echo __CLASS__;
  }
}

A::who();


?>