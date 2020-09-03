<?php
require_once("in/dbcon.php");

$getdid=$_POST["di"];

try
{
$qry="DELETE FROM crud WHERE id=?";
$qg=$conn->prepare($qry);
$qg->execute(array($getdid));
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo 1;
}
catch(PDOException $e)
{
 echo $e->getMessage();
}

?>