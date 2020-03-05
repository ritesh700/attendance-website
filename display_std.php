
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

$sql = "SELECT rollno, full_name, AOA_marks,COA_marks,CG_marks FROM 2017_d7b_oral_prac ORDER BY rollno";
$result = mysqli_query($conn,$sql);  
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
          .card{
            /* height: 500px; */
            /* margin-top: 50px; */
            color: white;
            margin-bottom: auto;
            /* width: 400px; */
            background-color:rgba(0,0,0,0.7) !important;
            }
            table{
                color:white;
            }
            th{
                color:yellow;
            }
            .sub_btn{
            color: black;
            background-color: #FFC312;
            width: 90px;
            margin-top: 10px;
            }
            
            .sub_btn:hover{
            color: black;
            background-color: white;
            }

            input[type="checkbox"]{
  width: 40px; /*Desired width*/
  height: 40px; /*Desired height*/
}

.paging-nav,
#tableData {
  width: 400px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}


.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 10px 20px;
  background: #9b870c;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #000000;
  font-weight: bold;
}

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>DISPLAY</title>

    <!-- Scripts -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    
    <script src="http://localhost:8000/js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/ee8f29eb14.js"></script>
    
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="app.css" rel="stylesheet">

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
<!--
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
-->
<!--
              <li class="nav-item">
                <a class="nav-link" href="teacherlogin.php">Teacher Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="studentlogin.php">Student login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="teacherregister.php">Teacher Signup</a>
              </li>
-->
              <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>
          </ul>
        </div>
    </nav>            <div class="container">
            <div class="col-12">
        <div class="card" style="margin-top:20px">
            <div class="card-body">
         <div class="row ">
                                <div class="col-md-12 text-md-left">
                                    <h4 >MANUAL ATTENDANCE</h4>
                                   <hr style="border:1px solid #FFC312"> 
                                </div>
                            </div>
                <div class="table-responsive">
                        <form method="post" action = "check.php">
                        <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>manual</th>
                        </tr>
                        </thead>
                        <?php 

                           while($row = mysqli_fetch_array($result))
                            {
                            echo "<tr>";
                            echo "<td>" . $row['rollno'] . "</td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>" . "<input type='checkbox' id='vehicle1' name='vehicle1[]' value='" . $row["rollno"] . "'/>" . "</td>";
                            echo "</tr>";
                            }
     // echo "<input type='hidden' name='id' value= '". $row["id"] ."'/>";
                         ?>
                       
                </table>
                <button type ="submit" value="submit" class ="btn sub_btn" >Submit<i class="fas fa-paper-plane"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="paging.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#zero_config').paging({limit:20});
            });
        </script>
</body>
</html>
