<?php
   include('student_session.php');
?>
<html>
   
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>1 min attendance</title>
    <script src="https://dmla.github.io/jsqrcode/src/qr_packed.js"></script>
  <script src="device-uuid.min.js" type="text/javascript"></script>
  
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
                <a class="nav-link" href="logout.php">logout</a>
              </li>
          </ul>
        </div>
    </nav>
  
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h1>Welcome <?php echo $login_session_rollno; ?></h1> 
      <label for="files" class="btn"><h1>Scan QR</h1></label>
  <!-- <input id="files" style="visibility:hidden;" type="file"> -->

  <input id="files" style="visibility:hidden;" type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);"  tabindex=-1>
   </body>
   <script>
  var uuid = new DeviceUUID().get();
  function openQRCamera(node) {
    var reader = new FileReader();
    reader.onload = function() {
      node.value = "";
      qrcode.callback = function(res) {
        if(res instanceof Error) {
          alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
        } else {
          res += "&did="+uuid+"&rno="+'<?php echo $login_session_rollno; ?>'
          alert(httpGet(res));
          node.parentNode.previousElementSibling.value = res;
        }
      };
      qrcode.decode(reader.result);
    };
    reader.readAsDataURL(node.files[0]);
  }

  function showQRIntro() {
    return confirm("Use your camera to take a picture of a QR code.");
  }

  function httpGet(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
            xmlHttp.send( null );
            return xmlHttp.responseText;
            alert();
        }
</script>
</html>