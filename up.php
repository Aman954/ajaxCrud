<?php
require_once("in/dbcon.php");

$uf=$_POST["uf"];
$ul=$_POST["ul"];
$cd=$_POST["cd"];
try 
{
$qr="UPDATE crud SET fname=?,lname=? WHERE id=?";
$sr=$conn->prepare($qr);
$sr->execute(array($uf,$ul,$cd));
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo 1;
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


?>