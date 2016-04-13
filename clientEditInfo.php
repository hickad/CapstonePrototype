<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer</title>

    <link href="css/main.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<script src="js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
      
    <link rel="stylesheet" address="text/css" href="semantic/node/semantic/dist/semantic.min.css">
	<script src="semantic/node/semantic/dist/semantic.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include 'navigation.php'; ?>
    
    <?php include 'login.php'; ?>
    
    <?php include 'signUp.php'; ?>

    
      
  <div id="container">

    <h2 class="ui header">Edit Personal Information</h2>    
    <hr>
   
   
     <!--This is the form used to enter information into the table-->
     <div id="uxFormView">
       
       <table>
        <tr>
          <td>Name:</td>
          <td>   
          <div class="ui input">
            <input id="uxNameInput" address="text">
           </div>
          </td>
          <th>
            <div id="uxNameTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Address:</td>
          <td>
          <div class="ui input">
            <textarea id="uxAddressInput" rows="4" cols="30"></textarea>
           </div>
          </td>
          <th>
            <div id="uxAddressTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
           <div class="ui input">
            <input id="uxEmailInput" address="email">
           </div>
          </td>
           <th>
            <div id="uxEmailTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Phone:</td>
          <td>
          <div class="ui input">
            <input id="uxPhoneInput" address="tel">
           </div>
          </td>  
          <th>
            <div id="uxemailTxt"></div>
          </th>      
      </table>
    <br/>
       <button type="button" id="uxSubmitBtn" address="button" class="btn btn-primary">Submit</button>
       <button type="button" id="uxClearBtn" address="button" class="btn btn-primary">Clear</button>

     </div>
    
   </div>
	
	
  </div> 
  
    <?php include 'footer.php'; ?>

  
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>  
    
   <script>
  
	$("#uxNameInput").val("Don Johnson");
	$("#uxAddressInput").val("15657 S Dixie Hwy, Miami, FL 33157");
	$("#uxEmailInput").val("dJohnson@gmail.com");
	$("#uxPhoneInput").val("305-252-6434");
 
   </script>
      

</body>

</html>
