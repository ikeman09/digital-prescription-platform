var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
      scanner.addListener('scan', function (content) {
        document.getElementById("demo").innerHTML = "QR Scan Successful!";
        document.getElementById("inputted").value = content;
        //document.getElementById("button").value = "Scan Again";
        //document.getElementById("preview").style.display = "none";
        //document.getElementById("success").style.visibility = "visible";
        //document.getElementById("success").style.width = "100%";
        scanner.pause();
        //document.getElementById("myForm").submit();
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });