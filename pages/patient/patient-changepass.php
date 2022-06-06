<?php
    // connect to database
    // Might have different username/password
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Stores the primary key to know who is who (DI PA NI COMLETE)
    $patientID = 1234;

    // write query for all data in patient info
    $sql = "SELECT * FROM patient_login WHERE id = {$patientID}";

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $patientLogin = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);


    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];


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
                <input type="submit" name="submit" value="Change password">
            </div>
        </form>

        <div class="cp-output">
            <?php
                if(isset($_POST['submit'])) {
                    foreach($patientLogin as $info) {
                        if($oldPassword == "" and $newPassword == "" and $confirmNewPassword == "") echo "Please fill out the form";
                        else if($oldPassword == "") echo "Please enter your old password.";
                        else if($newPassword == "") echo "Please enter your new password.";
                        else if($confirmNewPassword == "") echo "Please confirm your new password";
                        else if($oldPassword != $info['password']) echo "Please re-enter your old password.";
                        else if($oldPassword == $newPassword) echo "Please enter a new password.";
                        else if($newPassword != $confirmNewPassword) echo "New password and confirm password do not match. (pls edit grammar lmao)";
                        else {
                            $updatePassword = "UPDATE `patient_login` SET `id`='{$info['id']}',`email`='{$info['email']}',`password`='{$newPassword}' WHERE `id`='{$info['id']}'";
                            
                            $update = mysqli_query($conn, $updatePassword);

                            echo "<p style=\"color: #808080\"> Password changed successfully! </p>";
                        }
                    }

                    $oldPassword = "";
                    $newPassword = "";
                    $confirmNewPassword = "";

                }
            ?>
        </div>
    </div>
    
    <nav class="footer">
        <ul>
            <a href="patient-toclaim.php">
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