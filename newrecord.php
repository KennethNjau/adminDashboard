<?php

require_once('logics/dbconnection.php');


//update user records
if(isset($_POST['updateRecords']))
{
    //fetch form data
    $fullname= $_POST['fullname'];
    $phonenumber= $_POST['phonenumber'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $course= $_POST['course'];

    $conn=mysqli_query($conn, "INSERT INTO enrollment(fullname, phonenumber,email, gender, course)VALUES('$fullname','$phonenumber','$email','$gender','$course') ");

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
                            <h4>Edit Student:</h4>
                            <span><?php echo $message ?></span>
                        </div>
                        <div class="card-body">
                <form action="edit-enrollment.php?id=<?php echo $id ?>" method="post">
                           <div class="card">
                             <div class="card-body">

                                <div class="row">
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="fullname" class="form-lebel">Full Name:</label>
                                      <input type="text" class="form-control" value="<?php  echo $fullname ?>" name="fullname" placeholder="Enter Your Full Name">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="phonenumber" class="form-lebel">Phone Number:</label>
                                      <input type="tel" class="form-control" value="<?php  echo $phonenumber ?>" name="phonenumber" placeholder="+2547...">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="email" class="form-lebel">Email Address:</label>
                                      <input type="email" class="form-control" value="<?php  echo $email ?>" name="email" placeholder="Please enter your email">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="gender" class="form-lebel">What's your gender:</label>
                                      <select name="gender" class="form-select" aria-label="default select example">
                                         <option ><?php  echo $gender ?></option>
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                      </select>
                            
                                 </div>
                                     
                                 <div class="mb-3 col-lg-12 ">
                                     <select name="course" class="form-control multiplchose_questiontypes" id="selector">
                                         <option value=""  ><?php  echo $course ?></option>
                                         <option value="web design">web design</option>
                                         <option value="cyber security">cyber security</option>
                                         <option value="Android development">Android development</option>
         
                                     </select>
                                 </div>
                                 
                                 <input type="checkbox" name="Agree terms and condition">Agree terms and condition. </input>
                        

                      
                             </div>
                           </div>

                           <button type="submit" name="updateRecords" class="btn btn-primary">submit application</button>

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