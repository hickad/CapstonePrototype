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

    <title>Data Lookup</title>

    <link href="css/main.css" rel="stylesheet">
    <link href="css/dropdown.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/main.js"></script>
	<script src="js/dropdown.min.js"></script>
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

    <h2 class="ui header">Data Lookup</h2>  
   
	<hr>
   
		
		<button type="button" id="uxSearchBtn" address="button" class="btn btn-primary">Search</button>
		
		<div class="ui input">
		  <input id="uxSearchInput" type="text" placeholder="Search by Name">
		</div>

		<select id=uxDataLookupDD class="ui dropdown">
		  <option value="">Select</option>
		  <option value="0">Donors</option>
		  <option value="1">Customers</option>
		</select>
		
   
         <table id="donationTable" class="ui celled table" style="width:90%;padding: 15px;">
          <thead>
           <tr>
             <th>Member</th>
            <th>Pledge</th>
            <th>Donation Date</th>
            <th>Amount</th>
          </tr></thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr><th colspan="5">
              <div class="ui right floated pagination menu">
                <a class="icon item">
                  <i class="left chevron icon"></i>
                </a>
                <a class="item">1</a>
                <a class="item">2</a>
                <a class="item">3</a>
                <a class="item">4</a>
                <a class="item">5</a>
                <a class="icon item">
                  <i class="right chevron icon"></i>
                </a>
              </div>
        
            </th>
          </tr></tfoot>
        </table>
      
  	 </div>
     
        
    <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->
	

   <script>
     
 //
 // INITIAL CONDITION
 //
var donorData = [{name:"Tim Smith", pledgeAmount: 5000, date:"4/02/2016", amount: 1000},
				  {name:"Annie McCormic", pledgeAmount: 1000, date:"2/12/2016", amount: 200},
				  {name:"Jeremy Levine", pledgeAmount: 4000, date:"4/23/2016", amount: 1500},
				  {name:"Barbara Renolds", pledgeAmount: 900, date:"6/02/2015", amount: 200},
				  {name:"Margaret Thatcher", pledgeAmount: 500, date:"1/30/2013", amount: 220},
				  {name:"Ronald McDonald", pledgeAmount: 2000, date:"3/22/2014", amount:1000},
				  {name:"Joe Shmoe", pledgeAmount: 1000, date:"5/22/2015", amount: 500},
				  {name:"Herb Hover", pledgeAmount: 4000, date:"3/23/2016", amount: 2500}];


var customerData = [{name:"James Smith", address:"555 Orange Lane, Jacksonville, Fl. 32085",email:"smith@gmail.com",phone:"555-904-6778"},
					{name:"Herb O'Reilly", address:"456 Pink Lane, Jacksonville, Fl. 32085",email:"Herb@gmail.com",phone:"555-703-4566"},
					{name:"Annie Ford", address:"789 Red Lane, Jacksonville, Fl. 32085",email:"Ford@gmail.com",phone:"555-906-2367"},
					{name:"Rob Michaels", address:"234 Blue Lane, Jacksonville, Fl. 32085",email:"Michaels@gmail.com",phone:"555-907-4589"},
					{name:"Greg Porter", address:"678 Violet Lane, Jacksonville, Fl. 32085",email:"Porter@gmail.com",phone:"555-904-4568"}];		  


 

$("#uxSearchBtn").click(function() 
{ 
	$('#donationTable tbody').empty();

	var userName = $('#uxSearchInput').val().trim();
	
	if(userName == "")
	{
		if($('#uxDataLookupDD').val() === "0")
			dataBindDonor(donorData);
		else if($('#uxDataLookupDD').val() === "1")
			dataBindCustomer(customerData);
	}
	else
	{
		if($('#uxDataLookupDD').val() === "0")
		{
			for(var i in donorData)
			{
				if(donorData[i].name == userName)
					dataBindDonor([donorData[i]]);
			}
		}
		else if($('#uxDataLookupDD').val() === "1")
		{
			for(var i in customerData)
			{
				if(customerData[i].name == userName)
					dataBindDonor([customerData[i]]);
			}
			
		}

	}
			
});



 // FUNCTIONS ------------------------------------
 //
 // Adds a new row to the donor grid.
 //
 function addDonorRow(id,name,pledgeAmount,date,amount)
 {
	 var row = "";
		 row = "<tr>"
		 row += "<td>"+ name +"</td>"
		 row += "<td>Pledge of "+ toDollarAmount(pledgeAmount) +" from "+ name.split(" ")[0] +"</td>"
		 row += "<td>"+ date +"</td>"
		 row += "<td>"+ toDollarAmount(amount) +"</td></tr>";
		 
     $('#donationTable tbody').append(row);
 }
 
 
 function addCustomerRow(id,name,address,email, phone)
 {	
     var row = "<tr>"
         row += "<td>"+ name +"</td>"
         row += "<td><div style='wordwrap:break-word;width:180px'>"+ address +"</div></td>"
         row += "<td>"+ email +"</td>"
         row += "<td>"+ phone +"</td></tr>";
      
     $('#donationTable tbody').append(row);
 }
 

 
 
 //
 // Populate the table with data.
 //
 function dataBindDonor(dataSource)
 {
    for( var i in dataSource)
    {
      addDonorRow(i,
			  dataSource[i].name,
			  dataSource[i].pledgeAmount,
			  dataSource[i].date,
			  dataSource[i].amount);
    }
    
 }
 
 
  function dataBindCustomer(dataSource)
 {
    for( var i in dataSource)
    {
      addCustomerRow(i,
                  dataSource[i].name,
                  dataSource[i].address,
                  dataSource[i].email,
                  dataSource[i].phone);
    }	
 }
 
  


 </script>
   

  
</body>

</html>
