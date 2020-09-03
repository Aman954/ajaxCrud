<?php 
require_once("in/dbcon.php");
$fname=$_POST["fname"];
$lname=$_POST["lname"];
try 
{
$query="INSERT INTO crud(fname,lname) VALUES('$fname','$lname')";
$ss=$conn->prepare($query);
if($ss->execute())
{
    echo 1;
}
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{    
    echo $e->getMessage();
}

?>