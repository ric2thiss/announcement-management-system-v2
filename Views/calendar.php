<html>  
<head>  
    <title>Fullcalendar</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 
</head>
 <body>
  <h2><center>Javascript Fullcalendar</center></h2>
  <div class="container">
   <div id="calendar"></div>
  </div>
  <br>
</body>
</html>
<script>
   $(document).ready(function() {
   $('#calendar').fullCalendar();
});
</script>