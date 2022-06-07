<?php
    session_start();
    $conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription_2');

    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    $sql = 'SELECT * FROM patient_login UNION SELECT * FROM pharmacy_login';

    $result = mysqli_query($conn, $sql);

    $pharma = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = 'SELECT * FROM doctor_login';

    $result = mysqli_query($conn, $sql);

    $doctor = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = 'SELECT * FROM patient_login';

    $result = mysqli_query($conn, $sql);

    $patient = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);

?>

<html>
    <head>
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/log-in.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="box">
            <p id="back"></p>
            <div id="bar">
                <div id="logo">
                    <img src="../assets/images/prescription-logo.png" alt="logo">
                </div>
            </div>
            <div id="content">
                The place of trusted digital medical prescriptions
                <br>
                <p><b>Sign in</b></p>
            </div>

            <form id="myForm" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div>
                    <input id= "inputted" name="usName" type="text" placeholder="Email address *" required>
                    <input id= "inputted" name="pwd" type="password" placeholder="Password *" required>
                </div>

                <input id = "button" value="Log in" type="submit">

                <?php
                    $name = $pass = "";
                    if ($_SERVER["REQUEST_METHOD"]== "POST")
                    {
                        // Collects the values of the input field
                        $state = false;
                        $name= $_REQUEST["usName"]; //username
                        $pass = $_REQUEST["pwd"]; //password

                        foreach($pharma as $data)
                        {
                            if($name == $data['email'] && $pass == $data['password'])
                            {
                                $state = true;
                                $id= $data['id'];
                                $_SESSION['pharmaID'] = $id;
                                $_SESSION['patientID'] = $id; // kailangan pa icombine later
                                header('Location: pharmacy-inventory.php');
                                break;
                            }
                        }

                        foreach($doctor as $data)
                        {
                            if($name == $data['email'] && $pass == $data['password'])
                            {
                                $state = true;
                                $id= $data['id'];
                                $_SESSION['prcRegNumber'] = $id;
                                header('Location: ../pages/doctor/doctor-prescribe.php');
                                break;
                            }
                        }

                        foreach($patient as $data)
                        {
                            if($name == $data['email'] && $pass == $data['password'])
                            {
                                $state = true;
                                $id= $data['id'];
                                $_SESSION['patientID'] = $id;
                                header('Location: ../pages/patient/patient-toclaim.php');
                                break;
                            }
                        }

                    }
                ?>
            </form>
            <br>

            <div id="forgot-pwd">
                <a href="forgot-password.php">Forgot your password?</a>
            </div>

            <div id="sign-up">
                If you do not have an account,<br>
                <p id="sign-up-here"><a href="sign-up.php">Sign up here</a></p>  
            </div>

            <p id="copyright">               
                Copyright © DMPP 2022.
            </p>

        </div>
        
        
    </body>
</html>