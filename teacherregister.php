<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>1 min attendance</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/attendance.png" width="30" height="30" alt="">&nbsp;&nbsp;1 Minute Attendance
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
          </ul>
        </div>
    </nav>
    <div class="container">
    <form method="post">
        <fieldset>
        <legend>Enter details</legend>
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="leInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="name" id="Name" required>
        </div>
<!--
        <div class="form-group">
            <label for="Roll No">Roll No</label>
            <input type="number" class="form-control" id="rollno" required>
        </div>
-->
        <div class="form-group">
            <label for="Class">Class</label> <br>
            <input type="checkbox" id="class1" name="class[]" value="D12A">
            <label for="vehicle1"> D12A</label><br>
            <input type="checkbox" id="class2" name="class[]" value="D12B">
            <label for="vehicle2"> D12B</label><br>
            <input type="checkbox" id="class3" name="class[]" value="D12C">
            <label for="vehicle3"> D12C</label>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" id="Password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">SignUp</button>
        </fieldset>
    </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

if(isset($_POST['submit']))
{

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!empty($_POST['class'])){
foreach($_POST['class'] as $selected){
$name=$_POST['name'];
$email=$_POST['email'];
$class=$selected;
$password=$_POST['pass'];

$sql = "INSERT INTO teacher_register(email, name, class, password)
VALUES ('$email','$name','$class','$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
mysqli_close($conn);
header("location: index.php");
exit;
}

?>