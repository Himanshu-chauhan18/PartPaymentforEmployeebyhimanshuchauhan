<?php

include 'config.php';

$sql = "SELECT Id,FirstName,LastName,TotalAmount,PaidAmount,DueAmount FROM employeemaster";
$result = mysqli_query($conn, $sql) or die("SQL Failed");


$output = [];

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output[] = $row;
  }
}
else{
    $output['empty'] = ['empty'];
}

mysqli_close($conn);

echo json_encode($output);


?>