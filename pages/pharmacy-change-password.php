<?php
    $conn = mysqli_connect('localhost', 'sample', '12345', 'prescription_platform');

    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $test_user_id = 1;

    $sql = 'SELECT password FROM pharmacy_login WHERE id = ' . $test_user_id;

    $result = mysqli_query($conn, $sql);

    $pharmacy_login = mysqli_fetch_row($result);

    if($_POST && $_POST["oldPassword"] == $pharmacy_login[0] && $_POST["newPassword"] == $_POST["confirmNewPassword"]) 
    {
        mysqli_query($conn, "UPDATE pharmacy_login set password='" . $_POST["newPassword"] . "' WHERE id = " . $test_user_id);
        $message = "Password changed sucessfully!";
    } 
    else {
        $message = "Password is incorrect!";
    }

    mysqli_free_result($result);

    mysqli_close($conn);
?>


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
            
            <?php if(isset($message)) { echo $message; } ?>
            <form action='pharmacy-change-password.php' method='POST'>
                <div>
                    <p><b>Old password: </p></b>
                    <input id= "inputted" name="oldPassword" type="password">
                    <p><b>New password: </p></b>
                    <input id= "inputted" name="newPassword" type="password">
                    <p><b>Confirm new password: </p><b>
                    <input id= "inputted" name="confirmNewPassword" type="password">
                </div>

                <p id="confirmation"> *A confirmation email will be sent to your email address </p>

                <input id="button" name="submit" value="Change Password" type="submit">
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