var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
      scanner.addListener('scan', function (content) {
        document.getElementById("demo").innerHTML = "QR Scan Successful!";
        document.getElementById("inputted").value = content;
        scanner.pause();
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