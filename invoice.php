<?php
session_start();
include'connection.php';
if( isset( $_POST["submit"] ) ) {
    
    function validateFormData( $formData ) {
       $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    
    
    //set all variables to empty by default
     $patientname = $status = $amount = $description = $date_added = $id = $age = $email = $address = $phone = $gender ="";
    
    
   
    $patientname = validateFormData( $_POST["patientname"] );
    $status = validateFormData( $_POST["status"] );
    $amount = validateFormData( $_POST["amount"] );
    $description = validateFormData( $_POST["description"] );
    $date_added = validateFormData( $_POST["date_added"] );
    $id = validateFormData( $_POST["id"] );
    $phone = validateFormData( $_POST["phone"] );
    $address = validateFormData( $_POST["address"] );
    $age = validateFormData( $_POST["age"] );
    $gender = validateFormData( $_POST["gender"] );
    $email = validateFormData( $_POST["email"] );
   
    
    // check to see if each variable has data
    if( $patientname && $status && $amount && $description && $date_added && $id && $age && $gender && $email && $phone && $address) {
        $query = "INSERT INTO patient (patientname, status, amount, description, date_added, id, age, gender, email, phone, address)
               VALUES ('$patientname', '$status', '$amount', '$description', '$date_added', '$id', '$age', '$gender', '$email', '$phone', '$address')";
        
        if( mysqli_query( $conn, $query ) ) {
           echo "<script language='javascript' type='text/javascript'>
                    window.alert('The patient has been added successfully');
                    window.location.href='invoice.php';
                    </script>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
}

if($_SESSION['loggedInId']) {

$id = $_SESSION['loggedInId'];
    
$query = "SELECT * FROM patient";

$result = mysqli_query( $conn, $query );
    
}

mysqli_close($conn);

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
            <li class="active"><a href="receptionist.php">Profile</a></li>
            <li><a href="invoice.php">Patient</a></li>
            <li><a href="index.php">logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
        <div class="page-header">
            <h1>Invoice</h1>
        </div>
        <div class="box">

	<div class="box-header">

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					patient List

                    	</a></li>
            <li class="">

            	<a href="#add" data-toggle="tab"><i class="icon-align-justify"></i> 

					Add Patient

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING TABLE STARTS---->
            

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">
                    
                    <div class="tab-pane box" id="list">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                          <thead>

                		<tr>

                    		<th>Id Number</th>

                    		<th>Patient Name</th>

                    		<th>Amount Paid</th>

                    		<th>Description</th>

                    		<th>Payment Status</th>

                    		<th>Date Added</th>
                            
                            <th>Email</th>
                            
                            <th>Postal Address</th>
                            
                            <th>Phone Number</th>
                            
                            <th>Gender</th>
                            
                            <th>Age</th>

                    		<th>Options</th>

						</tr>

					</thead>
                    <tbody>
                    <?php
                    if( mysqli_num_rows($result) > 0 ){

                       while( $row = mysqli_fetch_assoc($result) ) {
                           echo "<tr>";

                           echo "<td>" . @$row['id'] . "</td><td>" . @$row['patientname'] . "</td><td>" . @$row['amount'] . "</td><td>" . @$row['description'] . "</td><td>" . @$row['status'] . "</td><td>" . @$row['date_added'] . "</td><td>" . @$row['email'] . "</td><td>" . @$row['address'] . "</td><td>" . @$row['phone'] . "</td><td>" . @$row['gender'] . "</td><td>" . @$row['age'] . "</td>";
                            echo '<td><a href="recepedit.php?id=' . $row['id'] . '" type="button" class=btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span>Edit</a></td>';
                           echo "</tr>";
                           
                           //echo "<tr>"; 
                           //echo '<th </th>';
                           //echo "</tr>";
                       }
                   } else {
                     echo "you have no clients";
                   }
                    @mysqli_close($conn);
                ?>
                        </tbody>
                        </table>
                    
                    </div>     

                </div>

			</div>

            <!----EDITING FORM ENDS--->
            
            <!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="add" style="padding: 5px">

                <div class="box-content padded">
                    
                             <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?Id=<?php echo $Id;?>"  method="POST">

                                <div class="form-group">

                                    <label for="formName">Patient Name</label>
                                
                                        <input type="text" id="formName" name="patientname" class="form-control"/>
                                </div>
                                
                                 
                                <div class="form-group">

                                    <label for="formId">Id number</label>
                                
                                        <input type="text" id="formId" name="id" class="form-control"/>
                                </div>
                             
                                <div class="form-group">

                                    <label for="formAmount">Amount</label>

                                        <input type="text" id="formAmount" name="amount" class="form-control"/>

                                </div>
                        
                                <div class="form-group">

                                    <label for="formDesc">Description</label>

                                        <textarea class="form-control" id="formDesc" name="description"></textarea>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="formStatus">Status</label>
                                    <select name="status" id="formStatus" class="form-control">
                                       <option value="paid">Paid</option>
                                       <option value="unpaid">Unpaid</option>
                                    </select> 
                                </div>
                                 
                                <div class="form-group">

                                    <label for="formDate">Date</label>

                                        <input type="date" id="formDate" name="date_added" class="form-control"/>
                                </div>
                                <div class="form-group">

                                    <label for="formEmail">email</label>

                                        <input type="text" id="formEmail" name="email" class="form-control"/>

                                </div>
                        
                                <div class="form-group">

                                    <label for="formAddress">Address</label>

                                        <input type="text" id="formAddress" name="address" class="form-control"/>
                                </div>
                             
                                <div class="form-group">

                                    <label for="formPhone">phone</label>

                                        <input type="text" id="formPhone" name="phone" class="form-control"/>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="formSex">Gender</label>
                                    <select name="gender" id="formSex" class="form-control">
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                    </select> 
                                </div>
                                <div class="form-group">

                                    <label for="formAge">Age</label>

                                        <input type="text" id="formAge" name="age" class="form-control"/>
                                </div>
                             
                                <div class="form-actions">
                            		<button type="submit" class="btn btn-danger" name="submit">Add Invoice</button>
                        		</div>
                     </form>

                </div>

			</div>


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
