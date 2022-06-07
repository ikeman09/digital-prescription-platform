<?php
  session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    $pid = $_SESSION['pharmaID'];

    $sql = "SELECT * FROM history INNER JOIN prescription ON history.prescriptionID = prescription.prescriptionID 
    WHERE history.pharmacyID = '".$pid."'";

    $result = mysqli_query($conn, $sql);

    $dig = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT pharmacyName from pharmacy_info WHERE pharmacyID = '".$pid."'";

    $result = mysqli_query($conn, $sql);

    $name = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //mysqli_free_result($result);

    //mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="bar" class="container">
            <div id="logo" class="item">
                <img src="../assets/images/prescription-logo.png" alt="logo">
            </div>
            <div id="changePass" class="item">
                <a href="pharmacy-change-password.php">
                    <input id="button" value="Change Password" type="submit">
                </a>
            </div>
        </div>

        <div id="header">
            <?php 
            foreach($name as $pharmaName)
            {
                print htmlspecialchars($pharmaName['pharmacyName'])." Inventory";
            }?>
        </div>

        <div id="box" class="container">
            <?php foreach($dig as $digi) {?>
                <div class="medicine">
                    <div id="image">
                        <img src="../assets/images/meds.png" alt="medicine">
                    </div>
                    <div id="text">
                        <?php
                            $medID = $digi['medicineID'];
                            $presID = $digi['prescriptionID'];
                            $sql2 = "SELECT * FROM prescription_medicine WHERE prescription_medicine.id = '".$medID."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $medName = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                            $sql3 = "SELECT price FROM inventory WHERE inventory.pharmacyID = '".$pid."'AND inventory.medicineID = ".$medID."";
                            $result3 = mysqli_query($conn, $sql3);
                            $price = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            print "Prescription ID: " . htmlspecialchars($digi['prescriptionID']) . "<br>";
                            foreach($medName as $name)
                            {
                                print "Medicine Prescribed: ".htmlspecialchars($name['genericName_dosage'])." ".htmlspecialchars($name['brandName_dosage'])."<br>";
                            }
                            print "Pieces Purchased: " . htmlspecialchars($digi['pieces']) . "<br>";
                            foreach($price as $amount)
                            {
                                print "<div id=quantity> TOTAL: PHP ". $amount['price']*$digi['pieces']."</div>";
                            }
                        ?>
                        <!--<p>pieces left</p>-->
                        
                    </div>
                </div>
            <?php }?>
        </div>

        <div id="navbar" class="container">
            <div id="other" class="item">
                <img src="../assets/images/circle.png" alt="circle">
                <p>Inventory</p>
            </div> 

            <div id="other" class="item">
                <a href="pharmacy-scan.php">
                    <img src="../assets/images/qrcode-small.png" alt="qr code">
                    <p>Scan Prescriptions</p>
                </a>
            </div>
            
            <div id="history" class="item">
                <a href="pharmacy-history.php">
                    <img src="../assets/images/Circle_(indigo).png" alt="circle">
                    <p>History</p>
                </a>
            </div>
        </div>
        
    </body>
</html>