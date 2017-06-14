<?php
  //server domain
  $server="";
  //your user to access
  $user="";
  //your password to access
  $password="";
  //db's name
  $db="";
  $connect=mysqli_connect($server,$user,$password,$db);
  if (mysqli_connect_errno()) {
      throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
  }
  $resultByDays=mysqli_query($connect,"select * from couriers ORDER BY average");
  $resultForRegister=mysqli_query($connect,"select * from couriers");
  $resultByStates=mysqli_query($connect,"select * from states ORDER BY state ASC");

?>
