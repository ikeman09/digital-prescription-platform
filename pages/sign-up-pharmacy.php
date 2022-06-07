<?php
session_start();
$conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_med_prescription');

if(!$conn)
{
  echo "Connection error".mysqli_connect_error();
}

?>
<html>
<head>
  <title>DMPP</title>
  <link rel="stylesheet" href="../css/sign-up-pharmacy.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="box">
  <p id="back"><a href="sign-up.php"><u>Back</u></a></p>
  <div id="bar">
    <div id="logo">
      <img src="../assets/images/prescription-logo.png" alt="logo">
    </div>
  </div>

  <div id="content">
    <img src="../assets/images/shake-hands.jpg" id="shake-hands" alt="shake-hands">
    <p id="bold"><br>All in one digital prescription platform!</b></p>

    <a href="#inter">
      <button type="button"><p id="button">Register here <br>for <b>FREE</b></p></button>
    </a><br>

    <p id="bold2">Why use <span id="blue2">DPP?</span></p>
  </div>

  <p id="good">Good for <span id="blue">Doctors</span></p>

  <p id="smaller">Advocates paperless prescriptions</p>
  <p id="smaller">Prescribes with one press of a button</p>

  <p id="good">Good for <span id="blue">Patients</span></p>

  <p id="smaller">Track your medical history</p>
  <p id="smaller">Get help with one press of a button</p>

  <p id="good">Good for <span id="blue">Pharmacy Insitutions</span></p>

  <p id="smaller">Track your inventory</p>
  <p id="smaller">Good for publicity</p>

  <p id="inter">Signing up is FREE!</p>


  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>

    <div>
      <input id= "inputted" type="text" name="pharmacyEmail" placeholder="Email address *" required>
      <input id= "inputted" type="password" name="pharmacyPassword" placeholder="Password *" required>
      <input id= "inputted" type="text" name="pharmacyName" placeholder="Pharmacy Name *" required>
      <input id= "inputted" type="text" name="location" placeholder="Pharmacy Location *" required>
    </div>

    <input id = "button" value="Submit" type="submit">

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $pharmacyEmail = $_POST["pharmacyEmail"];
      $pharmacyPassword = $_POST["pharmacyPassword"];
      $pharmacyName = $_POST["pharmacyName"];
      $location = $_POST["location"];

      $sqlLogin = "INSERT INTO pharmacy_login (email, password) VALUES ('$pharmacyEmail', '$pharmacyPassword');";
      $sqlInfo = "INSERT INTO pharmacy_info (pharmacyID, pharmacyName, location) VALUES (LAST_INSERT_ID(), '$pharmacyName', '$location');";

      try{
        $login = mysqli_query($conn, $sqlLogin);
        if(!$login) throw mysqli_errno($conn);

        $info = mysqli_query($conn, $sqlInfo);
        if(!$info) throw $info;
        else header('Location: log-in.php');

      }catch(mysqli_sql_exception $err){
        if($err->getCode() == 1062){
          echo "Email already exists.";
        }else {
          echo $err;
        }

      }finally{
        mysqli_close($conn);
      }
    }
    ?>

  </form>

  <p id="agree">By clicking “Submit", you agree to our Terms of Use and Privacy Policy</p>

  <div id="txt-bottom">
    <br><br>
    <p id="reg-as-pharma">Already have a pharmacy account? <a href="log-in.php">Log in</a></p>
    <br><br>
    <p id="reg-as-pharma">If you are not registering a business, <a href="sign-up-customer.php">Sign up here</a></p>
    <br>
  </div>

  <p id="copyright">
    Copyright © DMPP 2022.
  </p>
  <br>
</div>
</body>
</html>