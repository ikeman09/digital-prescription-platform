<?php
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
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/pharmacy-inventory.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="bar">
            <div id="logo">
                <img src="../assets/images/prescription-logo.png" alt="logo">
                <a class="navbar__button" href="pharmacy-change-password.php">Change Password</a>
            </div>
        </div>
        <div id="box">
            
            <?php foreach($dig as $digi) {?>
                <div class="medicine">
                    <div id="image">
                        <img src="../assets/images/paracetamol.jpg" alt="medicine">
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
            <?php }?>
             

            <div class="navbar">
                <div class="inventory">
                    <img src="../assets/images/Circle_(indigo).png" alt="circle">
                    <p>Inventory</p>
                </div>
                
                <a href="pharmacy-scan.php">
                  <div class="scan">
                    <img src="../assets/images/qrcode-small.png" alt="qr code">
                    <p>Scan Prescriptions</p>
                </div>
                </a>

                <a href="pharmacy-history.php">
                    <div class="history">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>History</p>
                    </div>
                </a>
            </div>
        </div>     
    </body>
</html>