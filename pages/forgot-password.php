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
                    <img src="../logo.png" alt="logo">
                </div>
            </div>
            <div id="content">
                <b>Forgot your password?</b>
                <br>
                <p>No worries! Enter your email address below and we'll send you instructions on how to reset your password.</p>
            </div>

            <form action="password-reset.php"> <!--Sends the inputs of the form to the current executing script-->
                <div>
                    <input id= "inputted" type="text" placeholder="Email address *" required>
                </div>

                <input id = "button" value="Send Request" type="submit"><!--Submit Button-->
            </form>
            <br>

            <a href="password-reset.php"><button type="button">I have a confirmation code.</button></a>

        </div>
        
        
    </body>
</html>