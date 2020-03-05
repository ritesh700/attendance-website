<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "success";
}

$sql = "SELECT lecture_count FROM lecture_c where subject='CSS'";
$result = mysqli_query($conn,$sql);  
$lec = mysqli_fetch_array($result)[0];
$cls="D12B";
$sub="CSS";



if(!empty($_POST['vehicle1'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['vehicle1'] as $selected){
	$did=strval($selected)."_manual";
 $sql = "INSERT INTO stud_attend(std_rollno,std_class,std_subject,android_id,lec_count) VALUES ('$selected','$cls','$sub','$did',$lec)";
		
		if($conn->query($sql) === TRUE)
		{
			echo "Inserted";
		}
		else
			echo "Not Inserted";
}

 }

    
 ?>