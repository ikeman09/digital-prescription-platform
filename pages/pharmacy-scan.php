<!DOCTYPE html>
<html>
    <head>
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/pharmacy-scan.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="box">
            <div id="bar">
                <div id="logo">
                    <img src="../assets/images/prescription-logo.png" alt="logo">
                    <a class="navbar__button" href="pharmacy-change-password.php">Change Password</a>
                </div>
            </div>
            
            <div class="qr">
                <img src="../assets/images/square.png" alt="qr code">
            </div>

            <p>Trouble scanning? Enter the code below: </p>

            <form>
                <div>
                    <input id="inputted" type="text">
                </div>

                <input id="button" value="Enter" type="submit">
            </form>

            <div class="navbar">
                <a href="pharmacy-inventory.php">
                    <div class="inventory">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>Inventory</p>
                </a>
                <div class="scan">
                    <img src="../assets/images/qr.png" alt="qr code">
                    <p>Scan Prescriptions</p>
                </div>
                <a href="pharmacy-history.php">
                    <div class="history">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>History</p>
                </a>
            </div>

        </div>     
    </body>
</html>