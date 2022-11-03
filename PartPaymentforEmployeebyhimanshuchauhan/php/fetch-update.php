<?php
$mysqli = new mysqli("localhost","root","","employeepartpaysep2022") or die("Connection Failed.");

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

	if($decode['Id'])
	{
		$id = $decode["Id"];
		$fname = $decode["fname"];
		$totalamount = $decode["totalamount"];
		$paid = $decode["paid"];
		$due = $decode["due"];
		$amountToBePaid = $decode["sum"];
         
		if($due==0 || $amountToBePaid==0 || $amountToBePaid<0 || $amountToBePaid > $due || $amountToBePaid=='')
		{
			echo json_encode(array('update' => 'failed'));
			exit;
		}
		
		$due = $due - $amountToBePaid;
		$paid = $paid + $amountToBePaid;
		
	$sql = "UPDATE employeemaster SET FirstName='{$fname}',TotalAmount={$totalamount},PaidAmount={$paid},DueAmount={$due} WHERE Id = {$id};";
    	 
	if($mysqli -> multi_query($sql)){
		echo json_encode(array('update' => 'success'));	
	}else{
			echo json_encode(array('update' => 'failed'));
	}

}

?>