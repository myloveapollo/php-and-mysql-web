<?php
//�������ݿ�
function db_connect() {
  //���������û��������룬databases
   $result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');//δ�����Ϸ���fasle
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
