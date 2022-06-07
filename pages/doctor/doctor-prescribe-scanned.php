<?php
    session_start();
    // connect to database
    // Might have different username/password
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription_2');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Stores the primary key to know who is who (DI PA NI COMLETE)
    $patientID = 4567;
    
    // write query for all data in patient info
    $sql = "SELECT * FROM patient_info WHERE patientID = {$patientID}";

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $patient_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Joins 3 tables - prescription, prescription_medicine and prescription_status
    // Only takes in the columns w/ a prescription status of 'claimed'/1
    $sql = "SELECT * FROM prescription INNER JOIN prescription_status
        ON prescription.prescriptionID = prescription_status.prescriptionID
        INNER JOIN prescription_medicine ON prescription.medicineID = prescription_medicine.id
        WHERE prescription.patientID = {$patientID} AND prescription_status.claimedStatus = 1";

    $result = mysqli_query($conn, $sql);

    $claimed = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT * FROM prescription INNER JOIN prescription_status
        ON prescription.prescriptionID = prescription_status.prescriptionID
        INNER JOIN prescription_medicine ON prescription.medicineID = prescription_medicine.id
        WHERE prescription.patientID = {$patientID} AND prescription_status.claimedStatus = 0";

    $result = mysqli_query($conn, $sql);

    $toClaim = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/doctor_styles/doctor-prescribe-scanned.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <img src="../../assets/images/prescription-logo.png" alt="logo">
        <a href="./doctor-prescribe-scanned-next.php">
            <button>
                Next
            </button>
        </a>
    </div>

    <div class="content">
        <div class="info">
            <div class="info-wrapper">
                <?php 
                    // loops through the array
                    foreach($patient_info as $info){ ?>
                        <div class="name">
                            <h1><?php 
                        echo htmlspecialchars(strtoupper($info['patientFirstName'])) . ' ';
                        echo htmlspecialchars(strtoupper($info['patientMiddleName'])) . ' ';
                        echo htmlspecialchars(strtoupper($info['patientLastName']));
                            ?></h1>
                        </div>
                        <div class="other-info">
                            <p class="up">Address</p>
                            <p><?php echo htmlspecialchars($info['patientAddress']) ?></p>
                            <p class="up">Age</p>
                            <p><?php 
                            // Stores the birthday in "-" format
                            $birthday = htmlspecialchars($info['birthYear'] . '-' . $info['birthMonth'].  '-' . $info['birthDay']);

                            // Calculates age
                            $age = floor((time() - strtotime($birthday)) / 31556926);

                            echo $age;
                        ?></p> 
                            <p class="up">Sex</p>
                            <p><?php 
                            // Calculates sex
                            if (htmlspecialchars($info['sex']) == 'M') {
                                echo 'Male';
                            }
                            else {
                                echo 'Female';
                            }
                        ?></p>
                            <p class="up">Date</p>
                            <p><?php
                            // Prints the birthday in "/" format
                            echo htmlspecialchars($info['birthMonth'] . '/' .
                                $info['birthDay'] . '/' . $info['birthYear']);
                        ?></p>
                        </div>
                <?php } ?>
            </div>
        </div>

        <div class="container to-claim">
            <div class="container-wrapper">
                <p id="to-claim-header">To claim</p>
                <div id="toClaimI" class="flex-container">
                    <!-- <div class="item">
                        <img src="../../assets/images/meds.png">
                        <div class="item-info">
                            <p>Paracetamol Tab #30</p>
                            <p>Sig: A.D.</p>
                        </div>
                    </div>
                    <<div class="item">
                        <img src="../../assets/images/ascorbic.jpeg">
                        <div class="item-info">
                            <p>Ascorbic Acid #30</p>
                            <p>Sig: Once a day.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        
        <div class="container claim">
            <div class="container-wrapper">
                <p id="claim-header">Claimed</p>
                <div id="claimedI" class="flex-container">
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
        </div>

    </div>
    
    <nav class="footer">
        <div class="footer-wrapper">
            <ul>
                <a href="doctor-prescribe.php">
                    <li id="prescribe">
                        <img src="../../assets/images/Circle_(indigo).png">
                        <p>Prescribe</p>
                    </li>
                </a>
                <a href="doctor-profile.php">
                    <li id="profile">
                    <img src="../../assets/images/Circle_(grey).png">
                        <p>Profile</p>
                    </li>
                </a>
            </ul>
        </div>
    </nav>

    <!-- lets javascript access the array in php -->
    <script> 
        let claimed = <?php echo json_encode($claimed); ?>;
        let toClaim = <?php echo json_encode($toClaim); ?>;
    </script>
    <!-- script -->
    <script src="../../javascript/doctor_scripts/doctor-prescribed-scanned.js"></script>
</body>
</html>