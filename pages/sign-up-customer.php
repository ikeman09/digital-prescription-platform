<?php
session_start();
$conn = mysqli_connect('localhost', 'RJC', '123456', 'digital_medical_prescription');

if(!$conn)
{
  echo "Connection error".mysqli_connect_error();
}

?>
<html>
<head>
  <title>DMPP</title>
  <link rel="stylesheet" href="../css/sign-up-customer.css">
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
    <p id="bold">Welcome to a place of trusted digital medical perscriptions!</p>
    Create a new account by entering your name and email
    <p id="smaller">You will be then sent an email for verification purposes</p>
    <p id="bold2">Signing up is FREE!</p>
  </div>

  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    <div>
      <input class= "inputted" type="text" name="email" placeholder="Email address *" required>
      <input class= "inputted" type="password" name="password" placeholder="Password *" required>
      <input class= "inputted" type="text" name="fName" placeholder="First Name *" required>
      <input class= "inputted" type="text" name="mName"placeholder="Middle Name *" required>
      <input class= "inputted" type="text" name="lName" placeholder="Last Name *" required>
      <input class= "inputted" type="text" name="address" placeholder="Address *" required>
      <input class= "inputted" type="number" min="1" max="12" name="birthMonth" placeholder="Birth Month (mm) *" required>
      <input class= "inputted" type="number" min="1" max="31" name="birthDay" placeholder="Birth Day (dd) *" required>
      <input class= "inputted" type="number" min="1900" max="2022" name="birthYear" placeholder="Birth Year (yyyy) *" required>
      <span>Sex: </span>
      <input type="radio" name="sex" value="M" required>Male
      <input type="radio" name="sex" value="F" required>Female
    </div>
    <br />
    <input id = "button" value="Submit" type="submit">

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $customerEmail = $_POST["email"];
      $customerPassword = $_POST["password"];
      $customerFName = $_POST["fName"];
      $customerMName = $_POST["mName"];
      $customerLName = $_POST["lName"];
      $address = $_POST["address"];
      $birthMonth = $_POST["birthMonth"];
      $birthDay = $_POST["birthDay"];
      $birthYear = $_POST["birthYear"];
      $sex = $_POST["sex"];

      $sqlLogin = "INSERT INTO patient_login (email, password) VALUES ('$customerEmail', '$customerPassword');";
      $sqlInfo = "INSERT INTO patient_info (patientID, patientFirstName, patientMiddleName, patientLastName, 
						patientAddress, birthMonth, birthDay, birthYear, sex) VALUES (LAST_INSERT_ID(), '$customerFName', '$customerMName','$customerLName',
							'$address', '$birthMonth', '$birthDay', '$birthYear', '$sex');";

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
    Already have an account?
    <p id="reg-as-pharma"><a href="log-in.php">Log in</a></p>
  </div>

  <div id="txt-bottom">
    Are you a <b><i>pharmacy</i></b> ?
    <p id="reg-as-pharma"><a href="sign-up-pharmacy.php">Register as a Pharmacy</a></p>
    <br>
  </div>

  <p id="copyright">
    Copyright © DMPP 2022.
  </p>
  <br>

</div>


</body>
</html>