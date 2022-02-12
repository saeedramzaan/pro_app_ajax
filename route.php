<?php




try {

define('BASEPATH', true); //access connection script if you omit this line file will be blank
require 'db.php'; //require connection script

  include 'managers.php';
  $managerObj = new Employee();

   if(isset($_GET['insert'])) {
   $managerObj->insertData($_POST);
   }

   if(isset($_GET['id'])) {
    $managerObj->updateRecord($_POST);
   }
}
catch (\Throwable $t) {
  echo "caught!\n";

  echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
}



?>