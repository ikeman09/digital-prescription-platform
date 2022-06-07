<?php
    session_start();
    // connect to database
    // Might have different username/password
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Stores the primary key to know who is who (DI PA NI COMLETE)
    $patientID = $_SESSION['patientID'];


    // Joins 3 tables - prescription, prescription_medicine and prescription_status
    // Only takes in the columns w/ a prescription status of 'claimed'/1
    $sql = "SELECT * FROM prescription INNER JOIN prescription_status
        ON prescription.prescriptionID = prescription_status.prescriptionID
        INNER JOIN prescription_medicine ON prescription.medicineID = prescription_medicine.id
        WHERE prescription.patientID = {$patientID} AND prescription_status.claimedStatus = 1";

    $result = mysqli_query($conn, $sql);

    $prescription = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/patient_styles/patient-claimed.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../../assets/images/prescription-logo.png" alt="logo">
        </div>

        <div class="section">
            <a href="./patient-toclaim.php">
                <p id="to-claim"> To Claim </p>
            </a>
            <a href="./patient-claimed.php">
                <p id="claim"> Claimed </p>
            </a>
        </div>
    </div>

    <div class="main">
        <div id="items" class="grid-container">
            

        </div>
    </div>

    <nav class="footer">
        <ul>
            <a href="patient-claimed.php">
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
    <script> let phpArray = <?php echo json_encode($prescription); ?>; </script>
    <!-- script -->
    <script src="../../javascript/patient_scripts/patient-claimed.js"></script>
</body>
</html>