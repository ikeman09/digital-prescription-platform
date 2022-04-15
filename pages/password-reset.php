<html>
    <head>
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/forgot-password.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="box">
            <p id="back"><a href="log-in.php"><u>Back</u></a></p>
            <div id="bar">
                <div id="logo">
                    <img src="../assets/images/prescription-logo.png" alt="logo">
                </div>
            </div>
            <div id="content">
                <b>Password reset</b>
                <br>
                <p>Please check your email for the confirmation code.</p>
            </div>

            <form>
                <div>
                    <input id= "inputted" type="text" placeholder="Email address *" required>
                    <input id= "inputted" type="text" placeholder="Confirmation Code *" required>
                    <input id= "inputted" type="text" placeholder="New Password *" required>
                    <input id= "inputted" type="text" placeholder="Confirm Password *" required>
                </div>

                <input id = "button" value="Reset Password" type="submit">
            </form>
            <br>

            <a href="forgot-password.php"><button type="button">Request new code.</button></a>

        </div>
        
        
    </body>
</html>