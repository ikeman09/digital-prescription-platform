<?php
    session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    $pid = $_SESSION['doctorID'];

    $sql = 'SELECT patientID FROM patient_info';

    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //mysqli_free_result($result);

    //mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>2</title>
        <link rel="stylesheet" href="../../css/doctor_styles/doctor-scan.css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
        <script src="../../javascript/instascan.min.js"></script>
    </head>
    
    <body>
        <div id="bar" class="container">
            <div id="logo" class="item">
                <img src="../../assets/images/prescription-logo.png" alt="logo">
            </div>
            <div class="logout">
                <div class="logout-wrapper">
                <a href="log-in.php">Logout</a>
            </div>
        </div>
        </div>

        <div id="box" class="container">
            <div id="qr">
                <video id="preview" autoplay="autoplay"></video>
            </div>

            <img id="status" src="../../assets/images/qr_success.png">
            <p id="demo"></p>

            <p id="enter">Trouble scanning? Enter the code below: </p>

            <form id="myForm" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div>
                    <input id="inputted" type="text" name="qr" required>
                </div>

                <input id="button2" value="Enter" type="submit">
            </form>

            <a id="result_scan_button" href="../doctor/doctor-scan.php">
                <input id="button3" value="Scan Again" type="submit">
            </a>

            <?php
                if ($_SERVER["REQUEST_METHOD"]== "POST")
                {
                    $qr = $_REQUEST["qr"];
                    $state = false;

                    foreach($data as $patient)
                    {
                        if($qr == $patient['patientID'])
                        {
                            $_SESSION['patientID'] = $qr;
                            $state = true;
                            break;
                        }
                    }

                    if($state == true)
                    {
                        echo "
                            <script>
                                document.getElementById(\"enter\").innerHTML = \"Patient ID exists!\";
                                document.getElementById(\"preview\").style.display = \"none\";
                                document.getElementById(\"status\").style.display = \"block\";
                                document.getElementById(\"status\").style.width = \"50%\";
                                document.getElementById(\"myForm\").style.visibility = \"hidden\";
                                document.getElementById(\"button3\").value = \"Proceed to Patient Info\";
                                document.getElementById(\"button3\").style.visibility = \"visible\";
                                document.getElementById(\"result_scan_button\").href = \"../doctor/doctor-prescribe-scanned.php\";
                            </script>";
                    }
                    else
                    {
                        echo "<script>
                        document.getElementById(\"enter\").innerHTML = \"Invalid Patient ID!\";
                        document.getElementById(\"preview\").style.display = \"none\";
                        document.getElementById(\"status\").src = \"../../assets/images/qr_failure.png\";
                        document.getElementById(\"status\").style.display = \"block\";
                        document.getElementById(\"status\").style.width = \"50%\";
                        document.getElementById(\"myForm\").style.visibility = \"hidden\";
                        document.getElementById(\"button3\").style.visibility = \"visible\";
                        </script>";
                    }
                }
            ?>

            
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
        <script src="../../javascript/pharmacy-scan.js"></script> 
    </body>
</html>