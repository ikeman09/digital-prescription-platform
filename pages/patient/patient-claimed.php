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

    // query for selecting prescriptions with a claimed status of 1
    $status = "SELECT * FROM prescription_status WHERE claimedStatus = 1";
    // make query & get result
    $status_query = mysqli_query($conn, $status);
    // fetch the resulting rows as an array
    $status_result = mysqli_fetch_all($status_query, MYSQLI_ASSOC);


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
            <a href="./patient-toclaim-empty.php">
                <p id="to-claim"> To Claim </p>
            </a>
            <a href="./patient-claimed.php">
                <p id="claim"> Claimed </p>
            </a>
        </div>
    </div>

    <div class="main">
        <div id="items" class="grid-container">
            <!-- <div class="item">
                <img src="../../assets/images/colace.jpeg">
                <div class="item-info">
                    <p>Colace 100gm</p>
                    <p>Sig: Twice a day</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/ascorbic.jpeg">
                <div class="item-info">
                    <p>Ascorbic Acid Sig #30</p>
                    <p>Once a day</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/zofran.jpeg">
                <div class="item-info">
                    <p>Zofran 4mg</p>
                    <p>Sig: A.D.</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/metformin.jpeg">
                <div class="item-info">
                    <p>Metformin</p>
                    <p>1 tab</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/paracetamol.jpeg">
                <div class="item-info">
                    <p>Paracetamol Tab #30</p>
                    <p>Sig: A.D.</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/amoxicillin.jpeg">
                <div class="item-info">
                    <p>Amoxicillin #30</p>
                    <p>Sig: Once a week</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/kaopectate.jpeg">
                <div class="item-info">
                    <p>Kaopectate</p>
                    <p>Sig: A.D.</p>
                </div>
            </div>
            <div class="item">
                <img src="../../assets/images/kaopectate.jpeg">
                <div class="item-info">
                    <p>Kaopectate</p>
                    <p>Sig: A.D.</p>
                </div>
            </div> -->
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
    

    <script src="../../javascript/patient_scripts/patient-claimed.js"></script>
</body>
</html>