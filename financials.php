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

    <title>Financials</title>

    <link href="css/main.css" rel="stylesheet">
   
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
	<script src="js/main.js"></script>   
	
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

    <h2 class="ui header">Financials</h2>  
   
	<hr>
   
	<div id="container">

    <!--This is the donor table and the add donor button.-->
      <div id="uxTableView">  
   
         <table id="donationTable" class="ui celled table" style="width:90%;padding: 15px;">
          <thead>
           <tr>
             <th></th>
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
     
     <!--This is the form used to enter information into the table-->
     <div id="uxFormView">
       
       
       <table>
        <tr>
          <td>Member:</td>
          <td>
           <div class="ui input">
            <input id="uxMemberInput" type="text">
           </div>
          </td>
          <th>
            <div id="uxMemberTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Pledge:</td>
          <td>
          <div class="ui input">
            <input id="uxPledgeInput"  type="text">
           </div>
          </td>
          <th>
            <div id="uxPledgeTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Donation Date:</td>
          <td>
           <div class="ui input">
            <input id="uxDonationDateInput" type="text">
           </div>
          </td>
           <th>
            <div id="uxDonationDateTxt"></div>
          </th>
        </tr>
        <tr>
          <td>Amount:</td>
          <td>
          <div class="ui input">
            <input id="uxAmountInput" type="text">
           </div>
          </td>  
          <th>
            <div id="uxAmountTxt"></div>
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
var dt = [{name:"Tim Smith", pledgeAmount: 5000, date:"4/02/2016", amount: 1000},
          {name:"Annie McCormic", pledgeAmount: 1000, date:"2/12/2016", amount: 200},
          {name:"Jeremy Levine", pledgeAmount: 4000, date:"4/23/2016", amount: 1500},
          {name:"Barbara Renolds", pledgeAmount: 900, date:"6/02/2015", amount: 200},
          {name:"Margaret Thatcher", pledgeAmount: 500, date:"1/30/2013", amount: 220},
          {name:"Ronald McDonald", pledgeAmount: 2000, date:"3/22/2014", amount:1000},
          {name:"Joe Shmoe", pledgeAmount: 1000, date:"5/22/2015", amount: 500},
          {name:"Herb Hover", pledgeAmount: 4000, date:"3/23/2016", amount: 2500}];

  $('#uxFormView').hide();
  $('#uxTableView').show();
  
	dataBind(dt);
	
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
      var memberValue = $.trim($("#uxMemberInput").val());
      var pledgeValue = $.trim($("#uxPledgeInput").val());
      var dateValue = $.trim($("#uxDonationDateInput").val());
      var amountValue = $.trim($("#uxAmountInput").val());
      
      clearErrors();
      
      if( memberValue.length <= 0 ){ $("#uxMemberTxt").text("Please enter a member name."); return };
      if( pledgeValue.length <= 0 ){ $("#uxPledgeTxt").text("Please enter a pledge amount."); return };
      if( dateValue.length <= 0 ){ $("#uxDonationDateTxt").text("Please enter a donation date."); return };
      if( amountValue.length <= 0 ){ $("#uxAmountTxt").text("Please enter a donation amount."); return };

       
      if( editMode )
      {
        dt[dataId].name = memberValue;
        dt[dataId].pledgeAmount = pledgeValue;
        dt[dataId].date = dateValue;
        dt[dataId].amount = amountValue;
      }
      else
      {
        dt.push({name: memberValue, 
                pledgeAmount: pledgeValue, 
                date: dateValue, 
                amount: amountValue });
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



function editButtons(id)
{
      editMode = true;
      dataId = id;
      $('#uxTableView').hide();
      $('#uxFormView').show();

      //Populate the textfields in the form.
      $("#uxMemberInput").val(dt[id].name);
      $("#uxPledgeInput").val(dt[id].pledgeAmount);
      $("#uxDonationDateInput").val(dt[id].date);
      $("#uxAmountInput").val(dt[id].amount);   
}
 
 
 // FUNCTIONS ------------------------------------
 //
 // Adds a new row to the donor grid.
 //
 function addDonorRow(id,name,pledgeAmount,date,amount)
 {
     var row = "<tr>"
         row += "<th>"
         row += "<button id='uxEditBtn' class='btn btn-secondary' role='button' onclick='javascript:editButtons("+id+");'>Edit</button> "
         row += "<button id='uxEditBtn'class='btn btn-secondary' role='button' onclick='javascript:removeDonorRow("+id+");'>Delete</button>"
         row += "</th>"
         row += "<td>"+ name +"</td>"
         row += "<td>Pledge of "+ toDollarAmount(pledgeAmount) +" from "+ name.split(" ")[0] +"</td>"
         row += "<td>"+ date +"</td>"
         row += "<td>"+ toDollarAmount(amount) +"</td></tr>";
      
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
                  dataSource[i].name,
                  dataSource[i].pledgeAmount,
                  dataSource[i].date,
                  dataSource[i].amount);
    }
    
 }
  
  //
  //Clears the donor entry form.
  //
 function clear()
 {
    $("#uxMemberInput").val(""); 
    $("#uxPledgeInput").val(""); 
    $("#uxDonationDateInput").val(""); 
    $("#uxAmountInput").val("");
 }
 
 //
 //Clear error output
 //
 function clearErrors()
 {
    $("#uxMemberTxt").text("");
    $("#uxPledgeTxt").text("");
    $("#uxDonationDateTxt").text("");
    $("#uxAmountTxt").text("");
 }



 </script>
   

  
</body>

</html>
