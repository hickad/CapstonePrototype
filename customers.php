<?php
session_start();
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<script src="js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
      
    <link rel="stylesheet" address="text/css" href="semantic/node/semantic/dist/semantic.min.css">
	<script src="semantic/node/semantic/dist/semantic.min.js"></script>
	<link href="css/main.css" rel="stylesheet">

	
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

    <h2 class="ui header">Customers</h2>    
    <hr>
   
   
    <!--This is the customer table and the add customer button.-->
      <div id="uxTableView">  
   
        <div id="uxAddCustomerBtn" class="ui left small primary labeled icon button">
          <i class="user icon"></i> Add Customers
        </div>
      
         <table id="customerTable" class="ui celled table" style="width:90%;padding: 15px;">
          <thead>
           <tr>
             <th></th>
             <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
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
       <button type="button" id="uxBackBtn" address="button" class="btn btn-primary">Back</button>

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
  
 //
 // INITIAL CONDITION
 //  
 
 
var dt = [{name:"James Smith", address:"555 Orange Lane, Jacksonville, Fl. 32085",email:"smith@gmail.com",phone:"555-904-6778"},
		  {name:"Herb O'Reilly", address:"456 Pink Lane, Jacksonville, Fl. 32085",email:"Herb@gmail.com",phone:"555-703-4566"},
		  {name:"Annie Ford", address:"789 Red Lane, Jacksonville, Fl. 32085",email:"Ford@gmail.com",phone:"555-906-2367"},
		  {name:"Rob Michaels", address:"234 Blue Lane, Jacksonville, Fl. 32085",email:"Michaels@gmail.com",phone:"555-907-4589"},
		  {name:"Greg Porter", address:"678 Violet Lane, Jacksonville, Fl. 32085",email:"Porter@gmail.com",phone:"555-904-4568"}];
		  
  dataBind(dt);
  $('#uxFormView').hide();
  $('#uxTableView').show();


// PROPERTIES ------------------------------------
// The id of the edit button selected in the table.
var dataId;

//Defines if the customer entry form is for editing existing data or entering new data.
var editMode; 

// DDNOR FORM ------------------------------------
//
//
//  This is the submit button on the customer entry form.
//
$("#uxSubmitBtn").click(function() 
{ 
  	try
    {
      var nameValue = $.trim($("#uxNameInput").val());
      var addressValue = $("#uxAddressInput").val();
      var emailValue = $.trim($("#uxEmailInput").val());
      var phoneValue = $.trim($("#uxPhoneInput").val());
      
      clearErrors();
       
      if( editMode )
      {
        dt[dataId].name = nameValue;
        dt[dataId].address = addressValue;
        dt[dataId].phone = phoneValue;
        dt[dataId].email = emailValue;
      }
      else
      {
        dt.push({name: nameValue, 
                address: addressValue, 
                email: emailValue, 
                phone: phoneValue });
      }
       
      $('#uxFormView').hide();   
      $('#uxTableView').show();
      //Clear the table before repopulating it.
	  clear();
      $('#customerTable tbody').empty();

      dataBind(dt);
	  
    }
    catch(error)
    {
      throw(error.message);
    }
  
});


$("#uxClearBtn").click(function() 
{         
  clear();
});

$("#uxBackBtn").click(function() 
{         
  $('#uxTableView').show();
  $('#uxFormView').hide();
});



 
// CUSTOMER TABLE ---------------------------

$('#uxAddCustomerBtn').click(function() 
{ 
  $('#uxTableView').hide();
  $('#uxFormView').show();
  clear();
  editMode = false;
});



function editButtons(id)
{
      editMode = true;
      dataId = id;
      $('#uxTableView').hide();
      $('#uxFormView').show();

      //Populate the textfields in the form.
      $("#uxNameInput").val(dt[id].name);
      $("#uxAddressInput").val(dt[id].address);
      $("#uxPhoneInput").val(dt[id].phone);
      $("#uxEmailInput").val(dt[id].email);  
}
 
 
 // FUNCTIONS ------------------------------------
 //
 // Adds a new row to the customer grid.
 //
 function addRow(id,name,address,email, phone)
 {
     var row = "<tr>"
         row += "<th>"
         row += "<button id='uxEditBtn' class='btn btn-secondary' role='button' onclick='javascript:editButtons("+id+");'>Edit</button> "
         row += "<button id='uxEditBtn'class='btn btn-secondary' role='button' onclick='javascript:removeRow("+id+");'>Delete</button>"
         row += "</th>"
         row += "<td>"+ name +"</td>"
         row += "<td><div style='wordwrap:break-word;width:180px'>"+ address +"</div></td>"
         row += "<td>"+ email +"</td>"
         row += "<td>"+ phone +"</td></tr>";
      
     $('#customerTable tbody').append(row);
 }
 
 function removeRow(id)
 {
    //Clear the table before repopulating it.
    $('#customerTable tbody').empty();
    delete dt[id];
    dataBind(dt);
 }
 

 //
 // Populate the table with data.
 //
 function dataBind(dataSource)
 {
    for( var i in dataSource)
    {
      addRow(i,
                  dataSource[i].name,
                  dataSource[i].address,
                  dataSource[i].email,
                  dataSource[i].phone);
    }	
 }
 
  //
  //Clears the customer entry form.
  //
 function clear()
 {
    $("#uxNameInput").val("");
	$("#uxAddressInput").val("");	
    $("#uxEmailInput").val(""); 
    $("#uxPhoneInput").val("");
 }
 
 //
 //Clear error output
 //
 function clearErrors()
 {
    $("#uxNameTxt").text("");
    $("#uxAddressTxt").text("");
    $("#uxEmailTxt").text("");
    $("#uxPhoneTxt").text("");
 }

 

 </script>
      

</body>

</html>
