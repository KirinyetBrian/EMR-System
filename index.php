<?php


if( isset( $_GET["submit"] ) ) {
    
    //function that validates data
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
    
    $formEmail = validateFormData( $_GET['email'] );
    $formPass = validateFormData( $_GET['password'] );
    
    include('connection.php');
    
    $query = "SELECT email, id, password FROM {$table} WHERE email='$formEmail'";
    
    $result = mysqli_query( $conn, $query );
    
    if( mysqli_num_rows($result) > 0 ) {
        
        while( $row = mysqli_fetch_assoc($result) ) {
            $email     = $row['email'];
            $password     = $row['password'];
            $id     = $row['id'];
        }
        
        if( $formPass==$password && $formEmail==$email  ) {
            
           session_start();
            
            $_SESSION['loggedInUser'] = $email;
            $_SESSION['loggedInId'] = $id;
            
            switch($_GET['usertype']){
        case '1':
            header("Location:doctor.php");
            break;
        case '2':
            header("Location:nurse.php");
            break;
        case '3':
            header("Location:receptionist.php");
            break;
        case '4':
            header("Location:pharmacist.php");
            break;
        case '5':
            header("Location:lab.php");
            break;
    }
         
            
        } else {
            
            $loginError = "wrong username / password combination";
        } 
    } else {
        
        $loginError = "No such user in database. please try again";
    }
    
 mysqli_close($conn);   
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	  
          
          <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="1" class=""></li>
             <li data-target="#myCarousel" data-slide-to="2" ></li>
          </ol>
          
          <div class="carousel-inner" role="listbox">
              
              <div class="item active">
                
                  <img class="first-slide" src="images/emr.png" width="1260" height="490">
                  <div class="carousel-caption">
                  <h4>Welcome to carousel</h4>
                  </div>
              </div>
              <div class="item">
                
                  <img class="second-slide" src="images/emr2.png" width="1260" height="500">
                  <div class="carousel-caption">
                  <h4>carousel 2</h4>
                  </div>
              </div>
              <div class="item">
                
                  <img class="third-slide" src="images/emr3.png" width="1260" height="530">
                  <div class="carousel-caption">
                  <h4>carousel 3</h4>
                  </div>
              </div>
          
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">previous</span></a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>
	  </div>
	  <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Mission</h2>
          <p>To improve communication between doctors, diatitians, pharmacists, patients and other health care professionals, to support productivity and positively impact health outcomes and patient safety.</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>About</h2>
          <p>Our main purpose is to provide better health care by improving all aspects of patient care, including safety, effectiveness, patient-centeredness, communication, education, timeliness, efficiency and equity.</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>Login here</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
            <div class="form-group">
                <label for="FormUser">User type</label>
                <select name="usertype" class="form-control">
                   <option value="1">Doctor</option>
                   <option value="2">Nurse</option>
                   <option value="3">Receptionist</option>
                   <option value="4">Pharmacist</option>
                   <option value="5">Laboratorist</option>
                </select> 
            </div>
            <div class="form-group">
              <input type="email" placeholder="Email address" name="email" class="form-control">  
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" class="form-control">  
            </div>
              
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Login</button><br/>
            <a href="register.php">Register</a>
          </form>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
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
