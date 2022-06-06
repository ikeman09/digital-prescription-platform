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


    // Joins 3 tables - prescription, prescription_medicine and prescription_status
    // Only takes in the columns w/ a prescription status of 'claimed'/1
    $sql = 'SELECT * FROM prescription INNER JOIN prescription_status
        ON prescription.prescriptionID = prescription_status.prescriptionID
        INNER JOIN prescription_medicine ON prescription.medicineID = prescription_medicine.id
        WHERE prescription_status.claimedStatus = 0';

    $result = mysqli_query($conn, $sql);

    $prescription = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

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

    </div>

    <nav class="footer">
        <ul>
            <a href="patient-toclaim.php">
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
    

    <!-- lets javascript access the array in php -->
    <script> let phpArray = <?php echo json_encode($prescription); ?>;</script>
    <!-- script -->
    <script src="../../javascript/patient_scripts/patient-toclaim.js"></script>
</body>
</html>