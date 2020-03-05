<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scan a QR code</title>
  <script src="https://dmla.github.io/jsqrcode/src/qr_packed.js"></script>
  <script src="device-uuid.min.js" type="text/javascript"></script>
</head>
<style>
  body, input {font-size:14pt}
  input, label {vertical-align:middle}
  .qrcode-text {padding-right:1.7em; margin-right:0}
  .qrcode-text-btn {display:inline-block; background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
  .qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}
</style>
<body>

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
          res += "&did="+uuid+"&rno=2"
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