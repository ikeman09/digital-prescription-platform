<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-toclaim-empty.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>
    </div>

    <div class="section">
        <h3 id="toclaim"> To Claim </h3>
        <a href="./patient-claimed.php">
            <h3 id="claimed"> Claimed </h3>
        </a>
    </div>

    <div class="main">
        <h1> You have no prescriptions! </h1>
        <p> You may get one from any of our registered doctors. </p>
    </div>

    <div class="footer">
        <div class="prescriptions">
            <img src="../../assets/images/Circle_(indigo).png" alt="circle">
            <p>My prescriptions</p>
        </div>
        <a href="patient-qr.php">
            <div class="myqr">
                <img src="../../assets/images/qrcode-small.png" alt="qr code">
                <p>My QR</p>
            </div>
        </a>
        <a href="patient-profile.php">
            <div class="profile">
                    <img src="../../assets/images/Circle_(grey).png" alt="circle">
                    <p>Profile</p>
            </div>
        </a>
    </div>

    <nav class="footer">
        <ul>
            <a href="doctor-prescribe.php">
                <li id="prescriptions">
                    <img src="../../assets/images/Circle_(grey).png">
                    <p>Prescribe</p>
                </li>
            </a>
            <a href="patient-qr.php">
                <li id="myqr">
                    <img src="../../assets/images/Circle_(grey).png">
                    <p>My QR</p>
                </li>
            </a>
            <a href="patient-profile.php">
                <li id="profile">
                    <img src="../../assets/images/Circle_(indigo).png">
                    <p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>
    
    

</body>
</html>