<?php
require_once("in/dbcon.php");
$cid=$_POST['eid'];
$out="";
try 
{
$quer="SELECT * FROM crud WHERE id=?";
$hl=$conn->prepare($quer);
$hl->execute(array($cid));

if($hl->rowCount()>0)
{
    $rw=$hl->fetch(PDO::FETCH_ASSOC);
    $out='<!-- Modal -->
    <div class="over">
    
    <div class="mode">
    <div class="close">
    &#10006;
    </div>
    <div class="headi">
    <h4>Update Record</h4>
    </div>
    <hr>
    <div class="pd">
    <div class="mb-3">
    <input type="text" class="form-control" id="ufname"  value="'.$rw['fname'].'"  >
    </div>
    <div class="mb-3">
    <input type="text" class="form-control" id="ulname" value="'.$rw['lname'].'">
    </div>
    <div class="mb-3">
    <input type="submit" class="btn btn-primary" id="update" value="update" data-vid="'.$rw['id'].'">
    </div>
    </div>
    
    </div>
    
    </div>
    
    <!--Modal close-->
    ';

    echo $out;
}

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>