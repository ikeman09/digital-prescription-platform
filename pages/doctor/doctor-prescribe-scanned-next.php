<?php
    session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    //$docID = $_SESSION['doctorID'];
    $docID = 789456;
    $patientID = $_SESSION['patientID'];

    $sql = "SELECT patientFirstName, patientMiddleName, patientLastName FROM patient_info WHERE patient_info.patientID = '".$patientID."'";

    $result = mysqli_query($conn, $sql);

    $patientData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT doctorFirstName, doctorMiddleName, doctorLastName FROM doctor_info WHERE doctor_info.uniqueID = '".$docID."'";

    $result = mysqli_query($conn, $sql);

    $doctorData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //mysqli_free_result($result);

    //mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prescribe</title>
        <link rel="stylesheet" href="../../css/doctor_styles/doctor-prescribe-scanned-next.css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    </head>
    
    <body>
        <div id="bar" class="container">
            <div id="logo" class="item">
                <img src="../../assets/images/prescription-logo.png" alt="logo">
            </div>
            <div class="logout">
                <div class="logout-wrapper">
                <a href="./log-in.php">Logout</a>
            </div>
        </div>
        </div>

        <div id="box" class="container">
            <div id="info" class="item">
                <?php
                    foreach($patientData as $patient)
                    {
                        print "Patient Name: ".htmlspecialchars($patient['patientFirstName'])." ".htmlspecialchars($patient['patientMiddleName'])." ".htmlspecialchars($patient['patientLastName']);
                        print "<br>Patient ID: ".htmlspecialchars($patientID);
                    }

                    foreach($doctorData as $doctor)
                    {
                        print "<br><br>Doctor Name: ".htmlspecialchars($doctor['doctorFirstName'])." ".htmlspecialchars($doctor['doctorMiddleName'])." ".htmlspecialchars($doctor['doctorLastName']);
                    }
                ?>
            </div>
            <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <p>Patient ID: </p>
                <input class="input" name="patID" type="number" required>
                <p>Diagnosis:</p>
                <input class="input" name="diagnosis" type="text" required>
                <p>Medicine Generic Name: </p>
                <input class="input" name="genericName" type="text" required>
                <p>Medicine Brand Name: </p>
                <input class="input" name="brandName" type="text" required>
                <p>No. of Tablets/Capsules/Pieces: </p>
                <input class="input" name="pieces" type="number" required>
                <p>Date prescribed: </p>
                <input class="input" name="date" type="date" required>
                <p>Doctor Notes: </p>
                <input class="input" name="notes" type="text" required>

                
                <input id="button" type="submit" value="Prescribe">

                <?php
                if ($_SERVER["REQUEST_METHOD"]== "POST")
                {
                    $patID= $_REQUEST["patID"];
                    $diagnosis = $_REQUEST["diagnosis"]; 
                    $genericName = $_REQUEST["genericName"]; 
                    $brandName = $_REQUEST["brandName"];
                    $pieces = $_REQUEST["pieces"];
                    $datePrescribed = $_REQUEST["date"];
                    $doctorNotes = $_REQUEST["notes"];

                    $sql = "SELECT id FROM prescription_medicine WHERE genericName_dosage = '$genericName' AND  brandName_dosage = '$brandName'";

                    $result = mysqli_query($conn, $sql);

                    $medID = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if(empty($medID))
                    {
                        echo "<script>alert(\"Medicine not found!\");</script>";
                    }
                    else
                    {
                        foreach($medID as $id)
                        {
                            $meds = $id['id'];
                            $sql = "INSERT INTO prescription (medicineID, diagnosis, datePrescribed, doctorNotes, pieces, patientID)
                            VALUES ('$meds', '$diagnosis', '$datePrescribed', '$doctorNotes', '$pieces', '$patID')";
                            mysqli_query($conn, $sql);

                            $last_id = $conn->insert_id;

                            $sql = "INSERT INTO prescription_status (prescriptionID, claimedStatus)
                            VALUES ('$last_id', '0')";
                            mysqli_query($conn, $sql);

                            echo "<script>alert(\"Medicine prescribed!\");</script>";

                        }
                    }
                }
            ?>
            </form>
        </div>

        <div id="navbar" class="container">
            <div id="scan" class="item">
                <img src="../../assets/images/qrcode-small.png" alt="qr code">
                <p>Scan Patient ID</p>
            </div>
            
            <div id="other" class="item">
                <a href="pharmacy-history.php">
                    <img src="../../assets/images/circle.png" alt="circle">
                    <p>Profile</p>
                </a>
            </div>
        </div>
    </body>
</html>
