<?php
$message="";

$server= "localhost";
$username="root";
$password="";
$database="zalego";

$conn= mysqli_connect($server, $username,$password,$database);
$queryUser=mysqli_query($conn, "SELECT * FROM contactus WHERE number='".$_GET['id']."' ");


while($fetchUser = mysqli_fetch_array($queryUser))
{
    $id=$fetchUser['number'];
    $firstname=$fetchUser['firstname'];
    $lastname=$fetchUser['lastname'];
    $email=$fetchUser['email'];
    $phonenumber=$fetchUser['phonenumber'];
    $message=$fetchUser['message'];
}


//update user records
if(isset($_POST['updateRecords']))
{
    //fetch form data
    $namefirst= $_POST['firstname'];
    $namelast= $_POST['lastname'];
    $emailAddress= $_POST['email'];
    $phone= $_POST['phonenumber'];
    $sendmessage= $_POST['message'];
    

    //updating records
    $updateQuery=mysqli_query($conn,
    "UPDATE enrollment SET  firstname='$namefirst',lastname='$namelast',email='$emailAddress' phonenumber='$phone', message='$sendmessage'
    WHERE number='".$_GET['id']."' ");

    if($updateQuery)
    {
        $message="update successful";
    }
    else
    {
        $message="error";
    }
}

?>
<!DOCTYPE html>
<html>
<?php require_once('includes/headers.php')?> 
<body>
	<!-- All our code. write here   -->
	<?php require_once('includes/navbar.php')?>
	<div class="sidebar">
	<?php require_once('includes/sidebar.php')?>
		

	</div>
	<div class="main-content">
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <h4>Edit Message:</h4>
                            <span><?php echo $message ?></span>
                        </div>
                        <div class="card-body">
                <form action="edit-enrollment.php?id=<?php echo $id ?>" method="post">
                           <div class="card">
                             <div class="card-body">

                                <div class="row">
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="firstname" class="form-lebel">First Name:</label>
                                      <input type="text" class="form-control" value="<?php  echo $firstname ?>" name="firstname" placeholder="Enter Your First Name">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="lastname" class="form-lebel">Last Name:</label>
                                      <input type="text" class="form-control" value="<?php  echo $lastname ?>" name="lastname" placeholder="Enter Your Last Name">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="email" class="form-lebel">Email Address:</label>
                                      <input type="email" class="form-control" value="<?php  echo $email ?>" name="email" placeholder="Please enter your email">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="phonenumber" class="form-lebel">Phone Number:</label>
                                      <input type="tel" class="form-control" value="<?php  echo $phonenumber ?>" name="phonenumber" placeholder="+2547...">
                                 </div>
                                
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                 <label for="message" class="form-label">Message</label>
                                 <textarea cols="30" rows="10" class="form-control" name="message"></textarea>
                                         
                            
                                 </div>
                                     
                                 
                             </div>
                           </div>

                           <button type="submit" name="updateRecords" class="btn btn-primary">submit Updates</button>

                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
	</div>
	
    <?php require_once('includes/scripts.php')?>
</body>
</html>