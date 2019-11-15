<?php
/*
Developed by Mr Kamod Kumar(Software Engineer)
Hello bro i am develop in CRUD operation with using multiple tools like that 1:- core php (xampp,apache server,php version 7.3.10) 2:- mongodb Database 3:- bootstrap 4 4:- html
*/

 if(extension_loaded("mongodb"))
 {
	 try
	 {
		 $connect= new MongoDB\Driver\Manager("mongodb://localhost:27017");
		 
		/* success, error messages to be displayed */

		 $msg = array(
						  1=>'Record deleted successfully',
						  2=>'Error occurred. Please try again', 
						  3=>'Record saved successfully',
						  4=>'Record updated successfully', 
						  5=>'All fields are required' 
						); 
		 // $query = new MongoDB\Driver\Query([]);
		 
		 // $data = $connect->executeQuery("test_db.users", $query);
		 
		 // foreach($data as $data)
		 // {
			 // print_r($data);
		 // }
		 		 
	 }
	 catch (MongoConnectionException $e)
	 {
		 var_dump($e);
	 }
 }

