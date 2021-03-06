<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports</title>
	
    

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="semantic/node/semantic/dist/semantic.min.css">
	<script src="semantic/node/semantic/dist/semantic.min.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<link href="css/main.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <?php include 'login.php'; ?>
    
    <?php include 'signUp.php'; ?>
	
	<?php include 'navigation.php'; ?>
	

    <div id="container">

    <h2 class="ui header">Reports</h2>   
         
    <hr>
      
      <button class="ui button">Print</button>
  
        <div class="row">
            <div class="col-sm-4">
                <img class="img-responsive img-center" src="../images/pledgeDonations.jpg" alt="Pledge Donations Pie Chart">
            </div>
            <div class="col-sm-4">
                <img class="img-responsive img-center" src="../images/pledgeDonationsBarChart.jpg" alt="Pledge Donations Bar Chart">
            </div>

    </div>
        
    <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->



</body>

</html>
