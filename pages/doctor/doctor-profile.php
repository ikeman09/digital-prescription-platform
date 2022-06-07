<?php
    session_start();
    // connect to database
    // Might have different username/password
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // Stores the primary key to know who is who (DI PA NI COMLETE)
    $doctorID = $_SESSION['doctorID'];

    // write query for all data in patient info
    $sql = "SELECT * FROM doctor_info INNER JOIN doctor_specialization
        ON doctor_info.prcRegNumber = doctor_specialization.prcRegNumber
        WHERE doctor_info.uniqueID = {$doctorID}";

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $doctor_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/doctor_styles/doctor-profile.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <img src="../../assets/images/prescription-logo.png" alt="logo">
        <a href="../log-in.php" name="logout">Log-out</a>
    </div>

    <div class="content">
    <?php 
        // loops through the array
        foreach($doctor_info as $info){ ?>
            <div class="top">
                <img src="../../assets/images/profile.png">
                <p id="name">
                    <?php 
                        echo htmlspecialchars(strtoupper($info['doctorFirstName'])) . ' ';
                        echo htmlspecialchars(strtoupper($info['doctorMiddleName'])) . ' ';
                        echo htmlspecialchars(strtoupper($info['doctorLastName']));
                    ?>
                </p>
            </div>

            <div class="column">
                <div class="info">
                    <p>PRC Registration Number:</p>
                    <?php echo htmlspecialchars($info['prcRegNumber']) ?>
                </div>
                <div class="info">
                    <p>Specialization:</p>
                    <?php echo htmlspecialchars($info['specialization']) ?>
                </div>
            </div>
        <?php } ?>

        
        <div class="changepass">
            <form>
                <a href="doctor-changepass.php">
                    <input type="button" value="Change Password">
                </a>
            </form>
        </div>
        
    </div>

    <nav class="footer">
        <ul>
            <a href="doctor-scan.php">
                <li id="prescribe">
                    <img src="../../assets/images/Circle_(grey).png">
                    <p>Prescribe</p>
                </li>
            </a>
            <a href="doctor-profile.php">
                <li id="profile">
                    <img src="../../assets/images/Circle_(indigo).png">
                    <p>Profile</p>
                </li>
            </a>
        </ul>
    </nav>
    

</body>
</html>