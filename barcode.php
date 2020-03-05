<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
</head>
<body>
    <lable>Branch :</lable>
    <input id="branch" type="text" /><br /><br />
    <lable>Class :</lable>
    <input id="cls" type="text" /><br /><br />
    <lable>Subject :</lable>
    <input id="sub" type="text" /><br /><br />
    <input type="Submit" onclick=makeCode();>
    <div id="qrcode" align="center"  style="pointer-events: none"></div>
</body>

<script>
    // var qrcode = new QRCode("qrcode");
    // function makeCode () {      
    // var cls = document.getElementById("cls");
    // var sub = document.getElementById("sub");
    // var elText = "https://65f3aea5.ngrok.io/syrus2.0/response.php"+"?"+"cls="+cls.value+"&"+"sub="+sub.value;
    //     if (!elText) {
    //         alert("Input a text");
    //         elText.focus();
    //         return;
    //     }
        
    //     qrcode.makeCode(elText);
    // }
function makeCode(){
    var ts = Date.now()/1000;
    
    var cls = document.getElementById("cls");
    var sub = document.getElementById("sub");
    var elText = "http://08f42ff3.ngrok.io/syrus2.0/response.php"+"?"+"cls="+cls.value+"&"+"sub="+sub.value+"&ts="+ts;
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