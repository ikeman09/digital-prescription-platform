<?php
    session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    $pid = $_SESSION['pharmaID'];

    $sql = 'SELECT * FROM prescription INNER JOIN prescription_status ON prescription.prescriptionID = prescription_status.prescriptionID';

    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $inventory = "SELECT medicineID, quantityLeft FROM inventory WHERE pharmacyID ='".$pid."'";

    $result2 = mysqli_query($conn, $inventory);
    
    $data2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    //mysqli_free_result($result);

    //mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>2</title>
        <link rel="stylesheet" href="../css/pharmacy-scan.css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
        <script src="../javascript/instascan.min.js"></script>
    </head>
    
    <body>
        <div id="bar" class="container">
            <div id="logo" class="item">
                <img src="../assets/images/prescription-logo.png" alt="logo">
            </div>
            <div id="changePass" class="item">
                <a href="pharmacy-change-password.php">
                    <input id="button1" value="Change Password" type="submit">
                </a>
            </div>
        </div>

        <div id="box" class="container">
            <div id="qr">
                <video id="preview" autoplay="autoplay"></video>
            </div>

            <img id="status" src="../assets/images/qr_success.png">
            <p id="demo"></p>

            <p id="enter">Trouble scanning? Enter the code below: </p>

            <form id="myForm" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div>
                    <input id="inputted" type="text" name="qr" required>
                </div>

                <input id="button2" value="Enter" type="submit">
            </form>

            <a href="2.php">
                <input id="button3" value="Scan Again" type="submit">
            </a>

            <?php
                if ($_SERVER["REQUEST_METHOD"]== "POST")
                {
                    $quantity = 0;
                    $mid = "";
                    $pcs = 0;
                    $qr = $_REQUEST["qr"];
                    $state = false;
                    $bought = false;
                    $sufficient = false;

                    foreach($data as $prescription)
                    {
                        if($qr == $prescription['prescriptionID'])
                        {
                            $state = true;
                            if($prescription['claimedStatus'] == 1)
                            {
                                $bought = true;
                                break;
                            }
                            $mid = $prescription['medicineID'];
                            $pcs = $prescription['pieces'];
                            break;
                        }
                    }
            
                    foreach($data2 as $medicine)
                    {
                        if($medicine['medicineID'] == $mid && $medicine['quantityLeft'] >= $pcs)
                        {
                            $sufficient = true;
                            $quantity = $medicine['quantityLeft'] - $pcs;
                            echo $quantity;
                            break;
                        }
                    }

                    if($state == true && $bought == false)
                    {
                        if($sufficient == true)
                        {
                            $insert = "INSERT INTO history (pharmacyID, prescriptionID) VALUES ('$pid', '$qr')";
                            mysqli_query($conn, $insert);

                            $update = "UPDATE prescription_status, inventory SET prescription_status.claimedStatus = 1, inventory.quantityLeft = $quantity 
                            WHERE prescription_status.prescriptionID = '$qr'AND (inventory.pharmacyID = '$pid' AND inventory.medicineID = '$mid')";
                            mysqli_query($conn, $update);

                            echo "
                            <script>
                                document.getElementById(\"enter\").innerHTML = \"Prescription in the database!\";
                                document.getElementById(\"button2\").value = \"Scan Again\";
                                document.getElementById(\"preview\").style.display = \"none\";
                                document.getElementById(\"status\").style.display = \"block\";
                                document.getElementById(\"status\").style.width = \"50%\";
                                document.getElementById(\"myForm\").style.visibility = \"hidden\";
                                document.getElementById(\"button3\").style.visibility = \"visible\";
                            </script>";
                        }
                        else
                        {
                            echo "
                            <script>
                                document.getElementById(\"enter\").innerHTML = \"Pharmacy has insufficient stock!\";
                                document.getElementById(\"button2\").value = \"Scan Again\";
                                document.getElementById(\"preview\").style.display = \"none\";
                                document.getElementById(\"status\").src = \"../assets/images/qr_failure.png\";
                                document.getElementById(\"status\").style.display = \"block\";
                                document.getElementById(\"status\").style.width = \"50%\";
                                document.getElementById(\"myForm\").style.visibility = \"hidden\";
                                document.getElementById(\"button3\").style.visibility = \"visible\";
                            </script>";
                        }
                    }
                    else
                    {
                        echo "<script>
                        document.getElementById(\"button2\").value = \"Scan Again\";
                        document.getElementById(\"preview\").style.display = \"none\";
                        document.getElementById(\"status\").src = \"../assets/images/qr_failure.png\";
                        document.getElementById(\"status\").style.display = \"block\";
                        document.getElementById(\"status\").style.width = \"50%\";
                        document.getElementById(\"myForm\").style.visibility = \"hidden\";
                        document.getElementById(\"button3\").style.visibility = \"visible\";
                        </script>";

                        if($state == true && $bought == true)
                        {
                            echo "<script>
                            document.getElementById(\"enter\").innerHTML = \"Prescription already claimed!\";</script>";
                        }
                        else
                        {
                            echo "<script>
                            document.getElementById(\"enter\").innerHTML = \"Prescription not in the database!\";</script>";
                        }

                    }
                }
            ?>
        </div>

        <div id="navbar" class="container">
            <div id="other" class="item">
                <a href="pharmacy-inventory.php">
                    <img src="../assets/images/circle.png" alt="circle">
                    <p>Inventory</p>
                </a>
            </div> 

            <div id="inventory" class="item">
                <img src="../assets/images/qrcode-small.png" alt="qr code">
                <p>Scan Prescriptions</p>
            </div>
            
            <div id="other" class="item">
                <a href="pharmacy-history.php">
                    <img src="../assets/images/circle.png" alt="circle">
                    <p>History</p>
                </a>
            </div>
        </div>
        <script src="../javascript/pharmacy-scan.js"></script> 
    </body>
</html>