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
        <a href="patient-profile.php" id="back">Back</a>
        <form>
            <p>Old password: </p>
            <input type="password">
            <p>New password: </p>
            <input type="password">
            <p>Confirm new password: </p>
            <input type="password">
        </form>
        <p id="confirmation">*A confirmation email will be sent to your email address</p>

        <div class="changepass">
            <p> Change password </p>
        </div>
        
    </div>

    <div class="footer">
        <a href="patient-toclaim-empty.php">
            <div class="prescriptions">
                <img src="../../assets/images/Circle_(grey).png" alt="circle">
                <p>My prescriptions</p>
            </div>
        </a>
        <a href="patient-qr.php">
            <div class="myqr">
                <img src="../../assets/images/qrcode-small.png" alt="qr code">
                <p>My QR</p>
            </div>
        </a>
        <div class="profile">
            <img src="../../assets/images/Circle_(indigo).png" alt="circle">
            <p>Profile</p>
        </div>
    </div>

</body>
</html>