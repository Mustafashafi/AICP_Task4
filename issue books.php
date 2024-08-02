<?php
require_once("connection.php");
$query = "SELECT * FROM issued_books";
if($result = mysqli_query($con, $query)){

}else{
    echo "Query failed";
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Table 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body style="font-family: cursive;background-image: url('images/meet-staff-bg.jpg');">
	<section class="ftco-section">
		<div class="container">
			
			<div class="row">
			
				<div class="col-md-12">
					<h3 class="text-center" style="font-family: math;color: white;margin-top: -50px;font-size:40px;font-weight:bold">Books Record</h3>
					<div class="table-wrap">
						<table class="table">
						
					    <thead class="thead-primary">
					      <tr>
					        <th>Book Id</th>
					        <th>Registration Id</th>
					        <th>Issuer Name</th>
					        <th>Semester</th>
					        <th>Department</th>
					        <th></th>
					      </tr>
					    </thead>
						
					    <tbody>
						<?php
                foreach($result as $row){ ?>
					      <tr>
					        <th scope="row" class="scope" ><?php echo $row['book_id']; ?></th>
					        <td><?php echo $row['Reg_id']; ?></td>
					        <td><?php echo $row['Issuer_Name']; ?></td>
					        <td><?php echo $row['Semester']; ?></td>
					        <td><?php echo $row['Department']; ?></td>
					      </tr>
					      <?php } ?> 
					     
					    </tbody>
					  </table>
					</div>
				</div>
			</div>	
		</div>
		<a href="project.php" class="btn btn-primary my-4" style="margin-left: 550px;">Back to Home Page</a>
	</section>
	

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

