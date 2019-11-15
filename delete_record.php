<?php
/*
Developed by Mr Kamod Kumar(Software Engineer)
Hello bro i am develop in CRUD operation with using multiple tools like that 1:- core php (xampp,apache server,php version 7.3.10) 2:- mongodb Database 3:- bootstrap 4 4:- html
*/
  require_once('config.php'); 
  $id   = $_GET['id'];
  $flag = 0;
  if($id){
    $delRec = new MongoDB\Driver\BulkWrite;
    $delRec->delete(['_id' =>new MongoDB\BSON\ObjectID($id)], ['limit' => 1]);
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result       = $connect->executeBulkWrite('test_db.users', $delRec, $writeConcern);
    if($result->getDeletedCount()){
      $flag = 1;
	  echo ("<script>window.location.href='index.php?flag=$flag';</script>");
    }else{
      $flag = 2;
    }
   
  }