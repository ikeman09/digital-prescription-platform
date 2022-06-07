<?php
    session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    $pid = $_SESSION['pharmaID'];

    $sql = 'SELECT password FROM pharmacy_login WHERE id = '".$pid.";

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
        <title>Change Password</title>
        <link rel="stylesheet" href="../css/pharmacy-change-password.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="bar" class="container">
            <div id="logo" class="item">
                <img src="../assets/images/prescription-logo.png" alt="logo">
            </div>
        </div>
            
        <div id="box" class="container">
            <form action='pharmacy-change-password.php' method='POST'>
                <p id="text"><b>Old password: </p></b>
                <input id= "inputted" name="oldPassword" type="password">
                <p id="text"><b>New password: </p></b>
                <input id= "inputted" name="newPassword" type="password">
                <p id="text"><b>Confirm new password: </p><b>
                <input id= "inputted" name="confirmNewPassword" type="password">

                <p id="confirmation"> *A confirmation email will be sent to your email address </p>

                <input id="button" name="submit" value="Change Password" type="submit"><br><br>
            </form>

            <div id="result">
                <?php   
                    if(isset($_POST['submit'])) { echo $message; } 
                ?> 
            </div>
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
                
                <div id="other" class="item">
                    <a href="pharmacy-history.php">
                        <img src="../assets/images/circle.png" alt="circle">
                        <p>History</p>
                    </a>
                </div>
            </div>
    </body>
</html>