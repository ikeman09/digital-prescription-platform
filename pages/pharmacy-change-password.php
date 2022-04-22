<!DOCTYPE html>
<html>
    <head>
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/pharmacy-change-password.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="box">
            <div id="bar">
                <div id="logo">
                    <img src="../assets/images/prescription-logo.png" alt="logo">
                </div>
            </div>

            <form>
                <div>
                    <p><b>Old password: </p></b>
                    <input id= "inputted" type="password">
                    <p><b>New password: </p></b>
                    <input id= "inputted" type="password">
                    <p><b>Confirm new password: </p><b>
                    <input id= "inputted" type="password">
                </div>

                <p id="confirmation"> *A confirmation email will be sent to your email address </p>

                <input id="button" value="Change Password" type="submit">
            </form>

            <div class="navbar">
                <a href="pharmacy-inventory.php">
                    <div class="inventory">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>Inventory</p>
                </a>
                <a href="pharmacy-scan.php">
                    <div class="scan">
                        <img src="../assets/images/qr.png" alt="qr code">
                        <p>Scan Prescriptions</p>
                    </div>
                </a>
                <a href="pharmacy-history.php">
                    <div class="history">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>History</p>
                </a>
            </div>

        </div>     
    </body>
</html>