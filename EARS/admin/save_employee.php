<?php
	include 'db_connect.php';
		extract($_POST);
		if(empty($id)){
				$i= 1;
				while($i == 1){
				$e_num=date('Y') .'-'. mt_rand(1,9999);
					$chk  = $conn->query("SELECT * FROM employee where employee_no = '$e_num' ")->num_rows;
					if($chk <= 0){
						$i = 0;
					}
				}
				$save=$conn->query("INSERT INTO `employee` VALUES('', '$e_num','$name', '$department', '$position')") or die(mysqli_error());
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Saved"));
				}		
		}else{
			$save=$conn->query("UPDATE `employee` set name='$name',position='$position',department='$department' where id = $id ") or die(mysqli_error());
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
				}
		}	

$conn->close();