<?php
//连接数据库
function db_connect() {
  //主机名，用户名，密码，databases
   $result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');//未连接上返回fasle
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
