<?php

    $x = $_POST["oldPassword"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-changepass.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>
    </div>

    <div class="main">
        <div class="back">
            <a href="patient-profile.php" id="back">Back</a>
        </div>
        <form action="?" method="post">
            <div class="form-container">
                <p>Old password: </p>
                <input type="password" name="oldPassword">
                <p>New password: </p>
                <input type="password" name="newPassword">
                <p>Confirm new password: </p>
                <input type="password" name="confirmNewPassword">
                <p id="confirmation">*A confirmation email will be sent to your email address</p>
            </div>

            <div class="changepass">
                <input type="submit" value="Change password">
            </div>

        </form>
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
                    <img src="../../assets/images/Circle_(indigo).png">
                    <p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>
</body>
</html>