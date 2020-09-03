<?php
$hb="mysql:host=localhost;dbname=ajaxcrud";
$user="root";
$pass="";

try 
{
$conn=new PDO($hb,$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e)
{
  echo $e->getMessage();
}

?>