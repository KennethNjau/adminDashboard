<?php

require_once('logics/dbconnection.php');



if(isset($_POST['submitRecords']))
{
    //fetch form data
    $fullname= $_POST['fullname'];
    $phonenumber= $_POST['phonenumber'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $course= $_POST['course'];

    $insertData =mysqli_query($conn, "INSERT INTO enrollment(fullname, phonenumber, email, gender, course)VALUES('$fullname', '$phonenumber', '$email', '$gender', '$course')");

    if($insertData)
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
                            <h4>Add Student:</h4>
                            
                        </div>
                        <div class="card-body">
                <form action="newrecord.php" method="post">
                           <div class="card">
                             <div class="card-body">

                                <div class="row">
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="fullname" class="form-lebel">Full Name:</label>
                                      <input type="text" class="form-control"  name="fullname" placeholder="Enter Your Full Name">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="phonenumber" class="form-lebel">Phone Number:</label>
                                      <input type="tel" class="form-control" name="phonenumber" placeholder="+2547...">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="email" class="form-lebel">Email Address:</label>
                                      <input type="email" class="form-control" name="email" placeholder="Please enter your email">
                                 </div>
                                 <div class="mb-3 col-lg-12 col-md-12 col-sm-12 ">
                                      <label for="gender" class="form-lebel">What's your gender:</label>
                                      <select name="gender" class="form-select" aria-label="default select example">
                                        
                                         <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                      </select>
                            
                                 </div>
                                     
                                 <div class="mb-3 col-lg-12 ">
                                     <select name="course" class="form-control multiplchose_questiontypes" id="selector">
                                         
                                         <option value="web design">web design</option>
                                         <option value="cyber security">cyber security</option>
                                         <option value="Android development">Android development</option>
         
                                     </select>
                                 </div>
                                 
                               
                        

                      
                             </div>
                           </div>

                           <button type="submit" name="submitRecords" class="btn btn-primary">submit application</button>

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