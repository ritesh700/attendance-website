<?php
	$conn = new mysqli('127.0.0.1','root','','attendance');
	
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
	echo "Connected successfully ";
	$roll = $_GET['rno'];
	$did = $_GET['did'];
	$sub = $_GET['sub'];
	$cls = $_GET['cls'];
	$lec = 1;
	$ts1 = $_GET['ts'];
	$ts2 = time();

	if ($ts2-$ts1 <= 60)
	{
		$sql = "INSERT INTO stud_attend(std_rollno,std_class,std_subject,android_id,lec_count) VALUES ('$roll','$cls','$sub','$did',$lec)";
		
		if($conn->query($sql) === TRUE)
		{
			echo "Inserted";
		}
		else
			echo "Not Inserted";
	}
	else
	{
		echo "Timeout";
	}
	$conn->close();

?>