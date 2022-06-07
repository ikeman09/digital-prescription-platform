<?php
  session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

    if(!$conn) {
      echo "Connection error: " . mysqli_connect_error();
    }

    $pid = $_SESSION['pharmaID'];

    $sql = 'SELECT * FROM history h INNER JOIN prescription p ON h.prescriptionID = p.prescriptionID INNER JOIN prescription_medicine m ON p.medicineID = m.id WHERE h.pharmacyID = '".$pid.";

    $result = mysqli_query($conn, $sql);

    $dig = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>History</title>
        <link rel="stylesheet" href="../css/pharmacy-history.css">
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

        <div id="box" class="container">
            <?php foreach($dig as $digi) {
                if($digi['pharmacyID'] == $_SESSION['pharmaID'])
                {
                
                ?>
                <div class="medicine">
                    <div id="text">
                        <?php 
                            echo "Prescription number: ";
                            print htmlspecialchars($digi['prescriptionID']) . "<br>" . "<br>";
                            print htmlspecialchars($digi['genericName_dosage']) . "<br>";
                            print htmlspecialchars($digi['brandName_dosage']) . "<br>";
                            print htmlspecialchars($digi['pieces']);
                            echo " pieces";
                        ?>
                    </div>
                </div>
            <?php }}?>
        </div>

            <div id="navbar" class="container">
              <div id="other" class="item">
                <a href="pharmacy-inventory.php">
                  <img src="../assets/images/circle.png" alt="circle">
                  <p>Inventory</p>
                </a>
              </div> 

              <div id="other" class="item">
                  <a href="pharmacy-scan.php">
                    <img src="../assets/images/qrcode-small.png" alt="qr code">
                    <p>Scan Prescriptions</p>
                  </a>
              </div>
              
              <div id="inventory" class="item">
                  <img src="../assets/images/Circle_(indigo).png" alt="circle">
                  <p>History</p>
              </div>
            </div>
    </body>
</html>