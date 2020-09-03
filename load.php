<?php 
require_once("in/dbcon.php");

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




try 
{
 $query="SELECT * FROM crud ORDER BY id DESC LIMIT $offset,$per_page ";
 $nr=$conn->prepare($query);   
 $nr->execute();
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    echo $e->getMessage();
}

if($nr->rowCount()>0)
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

while($row=$nr->fetch(PDO::FETCH_ASSOC))
{


$output.='<tr>
<th scope="row">'.$row['id'].'</th>
<td>'.$row['fname'].'&nbsp;'.$row['lname'].'</td>
<input type="hidden" class="idr" value="'.$row['id'].'">
<td><a class="del btn btn-danger" href="" data-did="'.$row['id'].'" >Delete</a></td>
<td><a class="ed btn btn-success" href=""  data-id="'.$row['id'].'" >Edit</a></td>
</tr>';


}

$output.='</tbody></table>

<nav aria-label="...">
  <ul class="pagination justify-content-center">';
if($page>1)
{
  $newpr=$page-1;
  $output.= '<li class="page-item">
      <a class="page-link go" data-page="'.$newpr.'" href="">Previous</a>
    </li>
    ';

}   
    try 
    {
     $query1="SELECT * FROM crud ORDER BY id DESC";
     $nr1=$conn->prepare($query1);   
     $nr1->execute();
     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $count=$nr1->rowCount();
    }
    
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $total_page=ceil($count/$per_page);

    for($i=1;$i<=$total_page;$i++)
    {
    $output.='<li class="page-item';if($i==$page){$output.=' active';}$output.='" ><a class="page-link go" href="#" data-page='.$i.'>'.$i.'</a></li>';
    }
    if($page<$total_page)
    {
      $newpg=$page+1;
    $output.='<li class="page-item">
      <a class="page-link go" href="#" data-page="'.$newpg.'">Next</a>
    </li>';
    }
  $output.='</ul>
</nav>';

echo $output;
}
else 
{
    echo "<td><h2 style='color:black;'>No Records Found</h2></td>";
}


?>