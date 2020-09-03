<?php
require_once("in/dbcon.php");
$ser=$_POST["getv"];

$per_page=5;

if(isset($_POST['page']))
{
$page=$_POST['page'];
}
else 
{
 $page=1;
}
$offset=($page-1)*$per_page;
$q="SELECT * FROM crud WHERE fname like ? OR lname like ?";
$getq=$conn->prepare($q);
$getq->execute(array("%$ser%","%$ser%"));

if($getq->rowCount()>0)
{
    $output='<table class="table table-bordered table-striped border-dark table-hover newt" >
    <thead class="table-primary border-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Full Name</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
   </thead>
   <tbody>';
   
   while($row=$getq->fetch(PDO::FETCH_ASSOC))
   {
   
   
   $output.='<tr>
   <th scope="row">'.$row['id'].'</th>
   <td>'.$row['fname'].'&nbsp;'.$row['lname'].'</td>
   <input type="hidden" class="idr" value="'.$row['id'].'">
   <td><a class="del btn btn-danger" href="" data-did="'.$row['id'].'" >Delete</a></td>
   <td><a class="ed btn btn-success" href=""  data-id="'.$row['id'].'" >Edit</a></td>
   </tr>';
   
   
   }
   
   $output.='</tbody></table>';
   
   
   
   echo $output;
}
else{
    echo "<td><h4 style='color:black;'>No records found!</h4></td>";
}






?>