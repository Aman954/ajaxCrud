<?php 
require_once("in/dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    ajaxCrud
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS only -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

</head>
<body>
   
   <div class="notification-success" id="succ" >
   </div>
   <div class="notification-error" id="err" >
   </div>

   <div id="set">
   
   </div>


    <div class="containeer">
    <div class="innerdiv1">
    <h2 class="heading">CRUD APPLICATION</h2>
    <input type="text" class="search" placeholder="search.." id="search">
    </div>
    <div class="innerdiv2">
    <form id="trp">
    <input type="text" class="fname form" placeholder="First Name" id="fname">
    <input type="text" class="lname form" placeholder="Last Name" id="lname" >
    <input type="submit" id="submit" value="submit">
    </form>
    </div>
    <div class="record">
     
    <div id="getRecord">
    </div>
    
</div>







<!-- JavaScript and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="index.js"></script>
</body>
</html>