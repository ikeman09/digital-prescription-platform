<?php
    include "../../php_libraries/phpqrcode/qrlib.php";
    $location = "../../assets/images/generated_qr".rand().".png";
    $text = "TEST";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-qr.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>
    </div>

    <div class="main">
        <img src="../../assets/images/qrcode-grey-background.png" alt="qr code">
        <h3>Patient Code: 1234567890</h3>
    </div>

    <nav class="footer">
        <ul>
            <a href="patient-toclaim-empty.php">
                <li id="prescriptions">
                    <img src="../../assets/images/Circle_(grey).png">
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