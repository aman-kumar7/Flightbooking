
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booked Flights</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Booked Flight</h3>
     <br />
            <br />
           

            <div class="row input-daterange">
               <div class="col-md-3"></div>
                <div class="col-md-4">
                    <input type="text" name="date" id="date" class="form-control" placeholder="Date of Journey" readonly />
                </div>
                
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="booked_table">
           <thead>
            <tr>
               
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date Of Journey</th>
                <th>From City</th>
                <th>From Country</th>
                <th>To City</th>
                <th>To Country</th>
                
            </tr>
           </thead>
       </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });

 load_data();

 function load_data(date = '')
 {
  $('#booked_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'<?php echo e(route("daterange.index")); ?>',
    data:{date:date}
   },
   columns: [
    {
     data:'first_name',
     name:'first_name',
    },
    {data:'last_name',
     name:'last_name'},
    {
     data:'email',
     name:'email'
    },
    {
     data:'date',
     name:'date'
    },
    {
     data:'from_city',
     name:'from_city'
    },
    {
     data:'from_country',
     name:'from_country'
    },
    {
     data:'to_city',
     name:'to_city'
    },
    {
     data:'to_country',
     name:'to_country'
    }
   ]
  });
 }

 $('#filter').click(function(){
  var date = $('#date').val();
  
  if(date != '')
  {
   $('#booked_table').DataTable().destroy();
   load_data(date);
  }
  else
  {
   alert('Please Enter Date of Journey');
  }
 });

 $('#refresh').click(function(){
  $('#date').val('');

  $('#booked_table').DataTable().destroy();
  load_data();
 });

});
</script>
<?php /**PATH C:\xampp\htdocs\Booking\resources\views/daterange.blade.php ENDPATH**/ ?>