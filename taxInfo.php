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

    <title>Tax Information</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<script src="js/bootstrap.min.js"></script>
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
    <script src="js/main.js"></script>    
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

    <h2 class="ui header">Tax Information</h2>    
    <hr>
   
   
    <!--This is the donor table and the add donor button.-->
      <div id="uxTableView">  
   
        <div>
          This information is for your convenience only, not for tax purposes. 
        </div>
      
         <table id="donationTable" class="ui celled table" style="width:90%;padding: 15px;">
          <thead>
           <tr>
             <th></th>
             <th>Tax Year</th>
            <th>Total Donations</th>
            <th>Date</th>
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
          <td>Tax Year:</td>
          <td>   
		   <div class="ui input">
			  <div class="input-group spinner">
				<input id="uxNumberOfItemsInput" type="text" class="form-control">
				<div class="input-group-btn-vertical">
				  <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
				  <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
				</div>
			  </div>
			</div>
          </td>
          <th>
            <div id="uxNumberOfItemsTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Amount:</td>
          <td>
           <div class="ui input">
            <input id="uxValueInput" type="text">
           </div>
          </td>
           <th>
            <div id="uxValueTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Date:</td>
          <td>
          <div class="ui input">
            <input id="uxDateInput" type="date">
           </div>
          </td>  
          <th>
            <div id="uxDateTxt"></div>
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

    </div>
    <!-- /.container -->

	
   <script>
     
 //
 // INITIAL CONDITION
 //  
var dt = [{numberItems:2015,totalValue:200,date:"1/25/2016"},
		  {numberItems:2014,totalValue:750,date:"2/02/2015"},
		  {numberItems:2013,totalValue:625,date:"1/23/2014"},
		  {numberItems:2012,totalValue:1060,date:"1/02/2013"},
		  {numberItems:2011,totalValue:845,date:"1/30/2012"},
		  {numberItems:2010,totalValue:50.5,date:"1/23/2011"}];
		  
var typeOptions = ["dress shirt","pants","tie","shoes","belt","socks","blazers & sport coats"];
		  
  dataBind(dt);
  $('#uxFormView').hide();
  $('#uxTableView').show();


createDropDown('uxTypeInput', typeOptions)

// PROPERTIES ------------------------------------
// The id of the edit button selected in the table.
var dataId;

//Defines if the donor entry form is for editing existing data or entering new data.
var editMode; 

// DDNOR FORM ------------------------------------
//
//
//  This is the submit button on the donor entry form.
//
$("#uxSubmitBtn").click(function() 
{  
  	try
    {
      var numberOfItems = $.trim($("#uxNumberOfItemsInput").val());
      var itemValue = $.trim($("#uxValueInput").val());
      var date = $.trim($("#uxDateInput").val());
      
      clearErrors();
      
      if( numberOfItems.length <= 0 ){ $("#uxNumberOfItemsTxt").text("Please enter the priority."); return };
      if( itemValue.length <= 0 ){ $("#uxValueTxt").text("Please enter a comment."); return };
      if( date.length <= 0 ){ $("#uxDateTxt").text("Please enter a date."); return };

       
      if( editMode )
      {
        dt[dataId].numberItems = numberOfItems;
        dt[dataId].totalValue = itemValue;
        dt[dataId].date = date;
      }
      else
      {
        dt.push({numberItems: numberOfItems, totalValue: itemValue, date: date });
      }
       
      $('#uxFormView').hide();   
      $('#uxTableView').show();
     clear();
      //Clear the table before repopulating it.
      $('#donationTable tbody').empty();
      
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



 
// DONOR TABLE ---------------------------

$('#uxAddDonorBtn').click(function() 
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
      $("#uxNumberOfItemsInput").val(dt[id].numberItems);
      $("#uxValueInput").val(dt[id].totalValue);
      $("#uxDateInput").val(dt[id].date);  
}
 
 
 // FUNCTIONS ------------------------------------
 //
 // Adds a new row to the donor grid.
 //
 function addDonorRow(id,numberItems,totalValue,date)
 {
     var row = "<tr>"
         row += "<th>"
         row += "<button id='uxEditBtn' class='btn btn-secondary' role='button' ("+id+");'>Save</button> "
         row += "<button id='uxEditBtn'class='btn btn-secondary' role='button' onclick='javascript:removeDonorRow("+id+");'>Delete</button>"
         row += "</th>"
         row += "<td>"+ numberItems +"</td>"
         row += "<td>"+ toDollarAmount(totalValue) +"</td>"
         row += "<td>"+ date +"</td></tr>";
      
     $('#donationTable tbody').append(row);
 }
 
 

 
 function removeDonorRow(id)
 {
    //Clear the table before repopulating it.
    $('#donationTable tbody').empty();
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
      addDonorRow(i,
                  dataSource[i].numberItems,
                  dataSource[i].totalValue,
                  dataSource[i].date);
    }
 }
  
  //
  //Clears the donor entry form.
  //
 function clear()
 {
    $("#uxNumberOfItemsInput").val("0");	
    $("#uxValueInput").val(""); 
    $("#uxDateInput").val("");
 }
 
 //
 //Clear error output
 //
 function clearErrors()
 {
    $("#uxNumberOfItemsTxt").text("");
    $("#uxValueTxt").text("");
    $("#uxDateTxt").text("");
 }
 


 </script>
      

</body>

</html>
