<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
				<button id="uxDonorBtn" class="mainMenuButtons" data-toggle="dropdown" >
					 Donor
					<span class="caret"></span>
				  </button>
                    <ul class="dropdown-menu">
						<li><a href="donorEditInfo.php">Edit Personal Information</a></li>
						<li><a href="donorItems.php">Review and Edit Items Donated</a></li>
						<li><a href="taxInfo.php">Tax Information</a></li>
					</ul>
				<li>
                <li>
				<button id="uxClientBtn" class="mainMenuButtons" data-toggle="dropdown" >
					 Client
					<span class="caret"></span>
				  </button>
                    <ul class="dropdown-menu">
						<li><a href="mentorFeedback.php">MentorFeedback</a></li>
						<li><a href="clientEditInfo.php">Edit Personal Information</a></li>
						<li><a href="clientItems.php">Review and Edit Items Requested</a></li>
					  </ul>
				<li>
                <li>
				<button id="uxAdministratorsBtn" class="mainMenuButtons" data-toggle="dropdown" >
					 Administrators
					<span class="caret"></span>
				  </button>
                    <ul class="dropdown-menu">
						<li><a href="Admincustomers.php">Customers</a></li>
						<li><a href="Admindonors.php">Donors</a></li>
						<li><a href="datalookup.php">Data Lookup</a></li>
						<li><a href="reports.php">Reports</a></li>
						<li><a href="financials.php">Financials</a></li>
					  </ul>
				<li>
                    <a href="communityPartners.php">Community Partners</a>
                </li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
              <li><a href="#" id="uxSignUpBtn" data-toggle="modal" data-target="#signup-modal"><span class="glyphicon glyphicon-log-in"></span> Sign Up</a></li>
              <li>
				<a href="#" id="uxLoginBtn" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<a href="index.php?userRole=Public" id="uxLoginOutBtn"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
			  </li>
			  <li>
				<div class="mainMenuButtons" id="uxUserRoleTxt"></div>
			  </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div style="padding-bottom:50px;"></div>

<?php

		try{
			if(isset($_GET['userRole']))
			{
				$_SESSION["userRole"] = $_GET['userRole'];
			}
			
			if(isset($_SESSION['userRole']))
			{
				// This creates a hidden input field that stores the session variable.	
				echo "<input type='hidden' id='userRole' value='".$_SESSION['userRole']."'/>";
			}
			else
			{
				echo "<input type='hidden' id='userRole' value='Public'/>";
			}
			
		}
		catch(Exception $e)
		{
			debug_to_console( $e->getMessage() );
		}
		
		
				
		//
		// Used to output to console
		//
		function debug_to_console( $data ) 
		{
			if ( is_array( $data ) )
				$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
			else
				$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

			echo $output;
		}
					
?>



<script>

	var userRole = $('#userRole').val();
	
	console.log("message: " + userRole);
	
	//
	// When the user initially enters the site.
	//
	if( userRole == "" )
	{
		userRole = "Public";
	}
	
	//
	//Grabs the session variable and pushes it into a div for display.
	//
	$('#uxUserRoleTxt').append(" <span class='glyphicon glyphicon-user'></span> Role: " + userRole );

	//
	// Hide all the menu items requiring authentication.
	//
	$('#uxDonorBtn').hide();
	$('#uxClientBtn').hide();
	$('#uxAdministratorsBtn').hide();
	
	//
	// If someone is logged in hide the Login and Signup buttons
	// and show the logout button.
	//
	
	if(userRole == "Public")
	{
		$('#uxLoginOutBtn').hide();
		$('#uxSignUpBtn').show();
		$('#uxLoginBtn').show();
	}
	else 
	{
		$('#uxLoginOutBtn').show();
		$('#uxSignUpBtn').hide();
		$('#uxLoginBtn').hide();
	}
	
	

	$("#uxLoginOutBtn").click(function() 
	{         
		$('#uxSignUpBtn').show();
		$('#uxLoginBtn').show();
		$('#uxLoginOutBtn').hide();
	});
	
	
	switch(userRole)
	{
		case "Donor":
			$('#uxDonorBtn').show();
			$('#uxClientBtn').hide();
			$('#uxAdministratorsBtn').hide();
		break;
		case "Client":
			$('#uxDonorBtn').hide();
			$('#uxClientBtn').show();
			$('#uxAdministratorsBtn').hide();		
		break;
		case "Administrator":
			$('#uxDonorBtn').show();
			$('#uxClientBtn').show();
			$('#uxAdministratorsBtn').show();		
		break;
		case "Public":
			$('#uxDonorBtn').hide();
			$('#uxClientBtn').hide();
			$('#uxAdministratorsBtn').hide();		
		break;
	}
	
	

	
</script>





