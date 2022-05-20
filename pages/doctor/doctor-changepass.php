<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/doctor_styles/doctor-changepass.css">
    <title>Document</title>
</head>
<body>

    <div class="header">
        <img src="../../assets/images/prescription-logo.png" alt="logo">
    </div>

    <div class="content">
        <div class="back">
            <a href="doctor-profile.php" id="back">Back</a>
        </div>

        <div class="form-container">
            <form>
                <p>Old password: </p>
                <input type="password">
                <p>New password: </p>
                <input type="password">
                <p>Confirm new password: </p>
                <input type="password">
            </form>
            <p>*A confirmation email will be sent to your email address</p>
        </div>

        <div class="changepass">
            <form>
                <input type="button" value="Change password">
            </form>
        </div>
        
    </div>

    <nav class="footer">
        <ul>
            <a href="doctor-prescribe.php">
                <li id="prescribe">
                    <img src="../../assets/images/Circle_(grey).png">
                    <p>Prescribe</p>
                </li>
            </a>
            <a href="doctor-profile.php">
                <li id="profile">
                    <img src="../../assets/images/Circle_(indigo).png">
                    <p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>

</body>
</html>