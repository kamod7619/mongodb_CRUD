<?php
/*
Developed by Mr Kamod Kumar(Software Engineer)
Hello bro i am develop in CRUD operation with using multiple tools like that 1:- core php (xampp,apache server,php version 7.3.10) 2:- mongodb Database 3:- bootstrap 4 4:- html
*/
require_once('config.php');
$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';
if($flag){
 $message = $msg[$flag];
}
$filter = [];
$options = [
    'sort' => ['_id' => -1],
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $connect->executeQuery('test_db.users', $query);
?>

<html>
	<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container pt-4">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 pt-4">
					<?php 
						if(!empty($flag==3) || !empty($flag==4)) {
					?>
					<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?php echo $message; ?></strong>
					</div>					
						<?php } elseif(!empty($flag==1) || !empty($flag==2) || !empty($flag==5)) {?>
						<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?php echo $message; ?></strong>
					</div>
						<?php } else {  }?>
				
					<h3 class="p-2">Fetch MongoDB All Data</h3>
					<div class="form-group text-right">
					<a href="add_record.php" class="btn btn-primary text-right">Add Record</a>
					</div>
					<table class='table table-bordered'>
					   <thead>
						  <tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								 <th>Mobile</th>
								 <th>City</th>
						
								<th>Action</th>
						  </tr>
					  
					   </thead>
						<?php 
						$i =1; 
						foreach ($cursor as $document) { ?>
						  <tr>
						  <td><?php echo $i; ?></td>
						  <td><?php echo $document->name;?></td>
						  <td><?php if(!empty($document->email)){ echo $document->email;} else {  } ?></td>        						
						 <td><?php echo $document->mobile;?></td>
						 <td><?php if(!empty($document->city)){ echo $document->city;} else {  } ?></td>
						  
						 <td><a 
								 href='edit_record.php?id=<?php echo $document->_id;?>'>Edit</a> |
							<a onClick ='return confirm("Do you want to remove this
										 record?");' 
							href='delete_record.php?id=<?php echo $document->_id;?>'>Delete</td>
						  </tr>
						 <?php $i++;  
					  } 
					  ?>
					</table>
				</div>
				<div class="col-sm-2"></div>
			
			</div>
		</div>
	</body>
</html>