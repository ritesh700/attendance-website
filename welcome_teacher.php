<?php
   include('teacher_session.php');
?>
<html>
   
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>1 min attendance</title>
  </head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
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
                <a class="nav-link" href="display_std.php">manual</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>
          </ul>
        </div>
    </nav>
      <h1>Welcome <?php echo $login_session_teacher; ?></h1> 
      <lable>Branch :</lable>
    <input id="branch" type="text" /><br /><br />
    <lable>Class :</lable>
    <input id="cls" type="text" /><br /><br />
    <lable>Subject :</lable>
    <input id="sub" type="text" /><br /><br />
    <input type="Submit" onclick=makeCode();>
    <div id="qrcode" align="center"  style="pointer-events: none"></div>
    <br><br>
   </body>
   <script>
function makeCode(){
    var ts = Date.now()/1000;
    
    var cls = document.getElementById("cls");
    var sub = document.getElementById("sub");
    var elText = "http://002f4708.ngrok.io/syrus/response.php"+"?"+"cls="+cls.value+"&"+"sub="+sub.value+"&ts="+ts;
    var qrcode = new QRCode("qrcode", {
        text: elText,
        width: 500,
        height: 500,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
    
    }
</script>
</html>