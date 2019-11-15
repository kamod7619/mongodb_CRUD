 <?php
 /*
Developed by Mr Kamod Kumar(Software Engineer)
Hello bro i am develop in CRUD operation with using multiple tools like that 1:- core php (xampp,apache server,php version 7.3.10) 2:- mongodb Database 3:- bootstrap 4 4:- html
*/
	require_once('config.php');
	$id = $_GET['id'];
	
	if($id){
	  $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
	  $options = [];
	  $query = new MongoDB\Driver\Query($filter,$options);
	  $cursor = $connect->executeQuery('test_db.users', $query); 
	}
	
	if(isset($_POST['submit']))
	{
      $name  = $_POST['name'];
      $email  = $_POST['email'];
      $mobile = $_POST['mobile'];
      $city = $_POST['city'];
      if(!$name || !$email || !$mobile || !$city){  
        $flag = 5;
      }else{
         
           $insRec = new MongoDB\Driver\BulkWrite;
		   $insRec->update(['_id'=>new MongoDB\BSON\ObjectID($id)],['$set' =>['name' =>$name, 'email'=>$email, 'mobile'=>$mobile, 'city'=>$city]],['multi' => false, 'upsert' => false]);
          
           $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
         
             $result = $connect->executeBulkWrite('test_db.users', $insRec, $writeConcern);
          if($result->getModifiedCount()){
			  
            $flag = 4;
			echo ("<script>window.location.href='index.php?flag=$flag';</script>");
          }else{
            $flag = 2;
          }
      }
  }
	
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Record</h2>
  <form method="POST" action="">
  <?php foreach($cursor as $data) {?>
	<div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?php echo $data->name;?>" placeholder="Enter Name" name="name">
    </div>
	
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $data->email;?>" placeholder="Enter email" name="email">
    </div>
	
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="number" class="form-control" id="mobile" value="<?php echo $data->mobile;?>" placeholder="Enter Mobile" name="mobile">
    </div>
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" value="<?php echo $data->city;?>" placeholder="Enter City" name="city">
    </div>
  <?php }?>
    <input type="submit" name="submit" class="btn btn-primary">
  </form>
</div>

</body>
</html>
