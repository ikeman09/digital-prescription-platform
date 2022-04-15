<html>
    <head>
        <title>DMPP</title>
        <link rel="stylesheet" href="../css/log-in.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div id="box">
            <p id="back"><a href="">Back</a></p>
            <div id="bar">
                <div id="logo">
                    <img src="../logo.png" alt="logo">
                </div>
            </div>
            <div id="content">
                The place of trusted digital medical prescriptions
                <br>
                <p><b>Sign in</b></p>
            </div>

            <form> <!--Sends the inputs of the form to the current executing script-->
                <div>
                    <input id= "inputted" type="text" placeholder="Email address *" required>
                    <input id= "inputted" type="password" placeholder="Password *" required>
                </div>

                <input id = "button" value="Log in" type="submit"><!--Submit Button-->
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