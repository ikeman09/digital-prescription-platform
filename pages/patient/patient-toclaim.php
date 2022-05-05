<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-toclaim.css">
    <title>Document</title>
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>

        <div class="section">
            <a href="#">
                <p id="to-claim"> To Claim </p>
            </a>
            <a href="./patient-claimed.php">
                <p id="claim"> Claimed </p>
            </a>
        </div>

    </div>
    

    <div class="main">
        <div class="grid-container">
            <div class="item">
                <div class="item-info">
                    <img src="../../assets/images/paracetamol.jpeg">
                    <div class="item-paragraph">
                        <p>Paracetamol Tab #30</p>
                        <p>Sig: A.D.</p>
                    </div>
                </div>
                <div class="qrcode">
                    <img src="../../assets/images/qrcode-small.png">
                    <p> Check QR </p>
                </div>
            </div>
            <div class="item">
                <div class="item-info">
                    <img src="../../assets/images/ascorbic.jpeg">
                    <div class="item-paragraph">
                        <p>Ascorbic Acid #30</p>
                        <p>Sig: Once a day.</p>
                    </div>
                </div>
                <div class="qrcode">
                    <img src="../../assets/images/qrcode-small.png">
                    <p> Check QR </p>
                </div>
            </div>
            
        </div>
    </div>

    <nav class="footer">
        <ul>
            <a href="doctor-prescribe.php">
                <li id="prescriptions">
                    <img src="../../assets/images/Circle_(indigo).png">
                    <p>My prescriptions</p>
                </li>
            </a>
            <a href="patient-qr.php">
                <li id="myqr">
                    <img src="../../assets/images/qrcode-small.png">
                    <p>My QR</p>
                </li>
            </a>
            <a href="patient-profile.php">
                <li id="profile">
                    <img src="../../assets/images/Circle_(grey).png">
                    <p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>
    

</body>
</html>