
<?php require_once("../includes/config.php"); 
      require_once("../includes/classes/Account.php");
      require_once("../includes/classes/Constants.php");
      require_once("../includes/classes/FormSanitizer.php");

    function getInputValue($username) {
        if(isset($_POST[$username])) {
            echo $_POST[$username];
        }
    }

    echo "am here";
    $account= new Account($link);

    if(isset($_POST['submit'])) {
        echo 12;

        $username = FormSanitizer::santizeFormUsername($_POST['username']);
        $password = FormSanitizer::santizerFormPassword($_POST['password']);

        $wasSuccessful = $account->login($username, $password);


        if($wasSuccessful) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: ../index.php");
            echo 123456;
        }   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Rebuni</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/style/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

</head>
<body>

    <div class="signInContainer">
        
        <div class="column">
        
            <div class="header">
               
                <h3>Sign In </h3>
                <span>to continue to Rebuni</span>
            </div>

            <div class="loginForm form-group">
                <form action="logIn.php" method="POST" >
                 
                <?php  echo $account->getError(Constants::$notLoggedIn); ?>
                <input type="text" placeholder="Username" name="username" class="form-control" value="<?php  getInputValue('username'); ?>" required autocomplete="off">
               <input type="password" placeholder="Password" name="password" class="form-control"  autocomplete="off" required>
               <input type="submit" value="SUBMIT" name="submit">
               
                </form>
            
            
            </div>

            <a href="../control/signUp.php" class="signInMessage"> Need an account? Sign up here!</a>
        </div>
       
    </div>

</body>
</html>