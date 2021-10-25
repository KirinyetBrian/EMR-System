<?php

session_start();
//if user is not logged in
//if( !$_SESSION['loggedInUser']) {
    
    //send them to the login page
   // header("Location: login.php");
//} 

//$clientId = $_GET['id'];
$id = $_SESSION['loggedInId'];

include('connection.php');

include('functions.php');


$query = "SELECT * FROM laboratorist WHERE id ='$id'";
$result = mysqli_query( $conn, $query );

if( mysqli_num_rows($result) > 0 ) {
    
    while( $row = mysqli_fetch_assoc($result) ) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $id = $row['id'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    }
} else {
    $alertMessage = "<div class=''>Nothing to see here<a href='receptionist.php'>Head back</a></div>";
}

 if( isset( $_POST['update'] ) ) {
    
    $firstname = validateFormData( $_POST["firstname"] );
    $lastname = validateFormData( $_POST["lastname"] );
    $email = validateFormData( $_POST["email"] );
    $phone = validateFormData( $_POST["phone"] );
    $address = validateFormData( $_POST["address"] );
    $query = "UPDATE laboratorist
             SET firstname='$firstname',
             lastname='$lastname',
             email='$email',
             phone='$phone',
             address='$address'
             WHERE id='$id'";
    
    $result = mysqli_query( $conn, $query );
    
    if( $result ) {
        $loginError = "<div class='alert alert-danger'>Your profile has been updated successfully</div>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>laikipia emr</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo" ></a>
          <a class="navbar-brand" href="#">HOSPITAL MANAGEMENT SYSTEM</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="lab.php">Profile</a></li>
            <li><a href="diagnosis.php">Patient</a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
        <div class="page-header">
            <h1>laboratorist Profile</h1>
        </div>
        <div class="box">

	<div class="box-header">

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					manage profile

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">
                    <?php echo @$loginError ?>
                             <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?Id=<?php echo $Id;?>"  method="POST">

                                <div class="form-group">

                                    <label for="formName">First Name</label>
                                
                                        <input type="text" id="formName" name="firstname" class="form-control" value="<?php echo $firstname; ?>"/>
                                </div>
                                 
                                 <div class="form-group">

                                    <label for="formLast">Last Name</label>
                                    
                                        <input type="text" id="formLast" name="lastname" class="form-control" value="<?php echo $lastname; ?>"/>
                                </div>
                             
                                <div class="form-group">

                                    <label for="formEmail">email</label>

                                        <input type="text" id="formEmail" name="email" class="form-control" value="<?php echo $email; ?>"/>

                                </div>
                        
                                <div class="form-group">

                                    <label for="formAddress">Address</label>

                                        <input type="text" id="formAddress" name="address" class="form-control" value="<?php echo $address; ?>"/>
                                </div>
                             
                                <div class="form-group">

                                    <label for="formPhone">phone</label>

                                        <input type="text" id="formPhone" name="phone" class="form-control" value="<?php echo $phone; ?>"/>
                                </div>
                             
                                <div class="form-actions">
                            		<button type="submit" class="btn btn-danger" name="update">update profile</button>
                        		</div>
                     </form>

                </div>

			</div>

            <!----EDITING FORM ENDS--->

		</div>

	</div>

</div>
        
     
    </div><!-- /.container -->
    
      <footer class="footer">
      <div class="container">
        <p class="text-muted">laikipia medical records.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
