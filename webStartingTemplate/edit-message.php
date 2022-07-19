<?php

$server= "localhost";
$username="root";
$password="";
$database="zalego";

$conn= mysqli_connect($server, $username,$password,$database);
$queryMessage=mysqli_query($conn, "SELECT * FROM contactus WHERE number='".$_GET['id']."' ");


while($fetchMessage = mysqli_fetch_array($queryMessage))
{
    $id=$fetchMessage['number'];
    $firstname=$fetchMessage['firstname'];
    $lastname=$fetchMessage['lastname'];
    $email=$fetchMessage['email'];
    $phonenumber=$fetchMessage['phonenumber'];
    $message=$fetchMessage['message'];
    $created_at=$fetchMessage['created_at'];
}
if(isset($_POST['updateRecords']))
{
    
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $phonenumber= $_POST['phonenumber'];
    $message= $_POST['message'];
    

    
    $updateQuery=mysqli_query($conn,
    "UPDATE contactus SET firstname='$firstname',lastname='$lastname',email='$email' phonenumber='$phonenumber', message='$message'
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
                        </div>
                        <div class="card-body">
                                <form action="edit-message.php?id=<?php echo $id ?>" method="post">
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
                                                 <textarea cols="30" rows="10" class="form-control"value="<?php  echo $message ?>" name="message"></textarea>
                                                         
                                            
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