<?php
  session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    $sql = 'SELECT * FROM inventory INNER JOIN prescription_medicine ON inventory.medicineID = prescription_medicine.id';

    $result = mysqli_query($conn, $sql);

    $dig = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="../css/pharmacy-inventory.css">
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
                    <div id="image">
                        <img src="../assets/images/meds.png" alt="medicine">
                    </div>
                    <div id="text">
                        <?php 
                            print htmlspecialchars($digi['genericName_dosage']) . "<br>";
                            print htmlspecialchars($digi['brandName_dosage'])."<br>";
                            print "<div id=quantity>". htmlspecialchars($digi['quantityLeft'])."</div>";
                        ?>
                        <p>pieces left</p>
                        
                    </div>
                </div>
            <?php }}?>
        </div>

        <div id="navbar" class="container">
            <div id="inventory" class="item">
                <img src="../assets/images/Circle_(indigo).png" alt="circle">
                <p>Inventory</p>
            </div> 

            <div id="other" class="item">
                <a href="pharmacy-scan.php">
                    <img src="../assets/images/qrcode-small.png" alt="qr code">
                    <p>Scan Prescriptions</p>
                </a>
            </div>
            
            <div id="other" class="item">
                <a href="pharmacy-history.php">
                    <img src="../assets/images/circle.png" alt="circle">
                    <p>History</p>
                </a>
            </div>
        </div>
        
    </body>
</html>