<?php
include'connection.php';
if( isset( $_GET["submit"] ) ) {
    
    function validateFormData( $formData ) {
       $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    
    switch($_GET['usertype']){
        case '1':
            $table = 'doctor';
            break;
        case '2':
            $table = 'nurse';
            break;
        case '3':
            $table = 'receptionist';
            break;
        case '4':
            $table = 'pharmacist';
            break;
        case '5':
            $table = 'laboratorist';
            break;
    }
    
    //set all variables to empty by default
     $firstname = $lastname = $email = $password = $address = $phone = "";
    
    
   
    $firstname = validateFormData( $_GET["firstname"] );
    $lastname = validateFormData( $_GET["lastname"] );
    $email= validateFormData( $_GET["email"] );
    $password = validateFormData( $_GET["password"] );
    $phone = validateFormData( $_GET["phone"] );
    $address = validateFormData( $_GET["address"] );
   
    
    // check to see if each variable has data
    if( $firstname && $lastname && $email && $password && $phone && $address) {
        $query = "INSERT INTO {$table} (id, firstname,lastname, email, password, address, phone)
               VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$address', '$phone')";
        
        if( mysqli_query( $conn, $query ) ) {
           echo "<script language='javascript' type='text/javascript'>
                    window.alert('Your registration was successful PLEASE LOGIN TO ACCESS YOUR ACCOUNT');
                    window.location.href='index.php';
                    </script>";
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">

      <div class="page-header">
          <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="get">
           <h2 class="form-signin-heading">Please sign up</h2>
            <div class="form-group">
              <label for="formFirst">First name</label>
              <input type="text" id="formFirst" name="firstname" class="form-control">  
            </div>
            <div class="form-group">
              <label for="formLast">Last name</label>
              <input type="text" id="formLast" name="lastname" class="form-control">  
            </div>
            <div class="form-group">
              <label for="formEmail">Email address</label>
              <input type="email" id="formEmail" name="email" class="form-control">  
            </div>
            <div class="form-group">
              <label for="formTel">Tel No:</label>
              <input type="text" id="formTel" name="phone" class="form-control">  
            </div>
            <div class="form-group">
              <label for="formPostal">Postal address</label>
              <input type="text" id="formPostal" name="address" class="form-control">  
            </div>
            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" id="pwd" name="password" class="form-control">  
            </div>
              
            <div class="form-group">
                <label for="formUser">User type</label>
                <select name="usertype" id="formUser" class="form-control">
                   <option value="1">Doctor</option>
                   <option value="2">Nurse</option>
                   <option value="3">Receptionist</option>
                   <option value="4">Pharmacists</option>
                   <option value="5">Laboratorist</option>
                </select> 
            </div>
              
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Sign up</button>
              
          </form>
        </div>
      </div>
    
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
