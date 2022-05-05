<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-profile.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>
    </div>

    <div class="main">
        <div class="top">
            <img src="../../assets/images/profile.png">
            <p id="name">JOHN RAY CLEMENTZ A. SERVO</p>
        </div>

        <div class="column">
            <div class="info">
                <p>Address:</p>
                <p>Bolong subd. Kidapawan City</p>
            </div>
            <div class="info">
                <p>Age:</p>
                <p>20</p>
            </div>
            <div class="info">
                <p>Sex:</p>
                <p>Male</p>
            </div>
            <div class="info">
                <p>Birthday:</p>
                <p>02/17/2002</p>
            </div>
        </div>

        
        <div class="changepass">
            <form>
                <a href="doctor-changepass.php">
                    <input type="button" value="Change Password">
                </a>
            </form>
        </div>
        
    </div>

    <nav class="footer">
        <ul>
            <a href="patient-toclaim-empty.php">
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