<?php

    // connect to database
    // Might have different username/password
    $conn = mysqli_connect('localhost', 'shaun', 'test1234', 'prescription_platform');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Stores the primary key to know who is who (DI PA NI COMLETE)
    $patientID = 1234;

    // write query for all data in patient info
    $sql = "SELECT * FROM patient_info WHERE patientID = {$patientID}";

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $patient_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

?>

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
        <?php 
        // loops through the array
        foreach($patient_info as $info){ ?>
            <div class="top">
                <img src="../../assets/images/profile.png">
                <p id="name">JOHN RAY CLEMENTZ A. SERVO</p>
            </div>

            <div class="column">
                    <div class="info">
                        <p>Address:</p>
                        <?php echo htmlspecialchars($info['patientAddress']) ?>
                    </div>
                    <div class="info">
                        <p>Age:</p>
                        <p>20</p>
                    </div>
                    <div class="info">
                        <p>Sex:</p>
                        <?php 
                            if (htmlspecialchars($info['sex']) == 'M') {
                                echo 'Male';
                            }
                            else {
                                echo 'Female';
                            }
                        ?>
                    </div>
                    <div class="info">
                        <p>Birthday:</p>
                        <?php 
                            echo htmlspecialchars(0 . $info['birthMonth'] . '/' . 
                                $info['birthDay'] . '/' . $info['birthYear']);
                        ?>
                    </div>
            </div>
        <?php } ?>
        
        <div class="changepass">
            <form>
                <a href="patient-changepass.php">
                    <input type="button" value="Change Password">
                </a>
            </form>
        </div>
        
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