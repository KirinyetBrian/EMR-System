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
            <li class="active"><a href="nurse.php">Profile</a></li>
            <li><a href="patient.php">Patient</a></li>
            <li><a href="index.php">Logout</a></li>
            <li><a href="blood.php">Blood bank</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container">
        <div class="page-header">
            <h1>Blood Bank List</h1>
        </div>
        <div class="box">

	<div class="box-header">

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					Blood Bank List

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

                    		<th>#</th>

                    		<th>Blood Group</th>

                    		<th>Available</th>

						</tr>

					</thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>A+</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>A-</td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>B+</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>B-</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>AB+</td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>AB-</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>O+</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td>O-</td>
                        <td>0</td>
                      </tr>
                    </tbody>
                        
                        </table>
                    
                    </div>     

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
