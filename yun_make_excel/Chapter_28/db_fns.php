<?php
//�������ݿ�
function db_connect() {
  //���������û��������룬databases
   $result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');//δ�����Ϸ���fasle
   if (!$result) {
     throw new Exception('�������ݿ�ʧ�ܣ�');
   } else {
     return $result;
   }
}

?>
