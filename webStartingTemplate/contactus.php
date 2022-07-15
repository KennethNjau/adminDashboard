<?php


$server= "localhost";
$username="root";
$password="";
$database="zalego";

$conn= mysqli_connect($server, $username,$password,$database);
$sqlQuery=mysqli_Query($conn, "SELECT * FROM contactus");

?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('includes/headers.php') ?>
</head>
<body>
	<!-- All our code. write here   -->
	<?php require_once('includes/navbar.php') ?>
	<div class="sidebar">
		<?php require_once('includes/sidebar.php') ?>

	</div>
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card-header bg-dark text-white text-center">
						<span>Messages</span>
					</div>
					<div class="card-body"></div>
					<div class="card-footer"></div>
                    <table class="table table-striped table-hover table-responsive" style="font-style: 12px;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Message</th>
								<th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while($fetchRecords=mysqli_fetch_array($sqlQuery)) { ?>
								<tr>
									<td><?php echo $fetchRecords['number'] ?></td>
									<td><?php echo $fetchRecords['firstname'] ?></td>
                                    <td><?php echo $fetchRecords['lastname'] ?></td>
									<td><?php echo $fetchRecords['phonenumber'] ?></td>
									<td><?php echo $fetchRecords['email'] ?></td>
									<td><?php echo $fetchRecords['message'] ?></td>
									<td><?php echo $fetchRecords['created_at'] ?></td>
								</tr>
							<?php } ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>

	</div>

	<?php require_once('includes/scripts.php') ?>
</body>
</html>