<?
  require_once "../includes/config.php";
//   require_once "../includes/header.php";
   require_once "../includes/classes/Account.php";
   require_once "../includes/classes/FormSanitizer.php";
   require_once "../includes/classes/Constants.php";

   $account = new Account($link);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

       
      $firstName = FormSanitizer::santizeFormString($_POST['fname']);
      $lastName  = FormSanitizer::santizeFormString($_POST['lname']);

      $username = FormSanitizer::santizeFormUsername($_POST['uname']);

      $email = FormSanitizer::santizeFormEmail($_POST['email']);
      $confirmEmail = FormSanitizer::santizeFormEmail($_POST['email2']);

      $password = FormSanitizer::santizerFormPassword($_POST['psw']);  
      $confirmPassword = FormSanitizer::santizerFormPassword($_POST['psw-repeat']);

      $user_type = $_POST['user_type'];

      $wasSuccessful = $account->register($firstName,$lastName,$username, $email, $confirmEmail, $password, $confirmPassword, $user_type);
      
      if($wasSuccessful) {
         // success
         global $username;
          $_SESSION['userLoggedIn'] = $username;          
          header("Location: ../index.php");

      }
   }

    function getinputValue($name) {
      if(isset($_POST[$name])) {
          echo $_POST[$name];
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <link rel="stylesheet" href="../assets/style/style.css">

   
</head>
<body>
    
<div class="signInContainer">
        
        <div class="column">
        
            <div class="header">

                <h3>Sign Up</h3>
                <span>to continue to videoTube</span>
            </div>

            <div class="loginForm form-group">

                <form action="signUp.php" method="POST">
               
                    <?php echo $account->getError(Constants::$firstNameCharacter); ?>
                    <input type="text" name="fname" class="form-control" placeholder="First name" value="<?php getinputValue('firstName');   ?>"
                     autocomplete="off" required>

                    <?php echo $account->getError(Constants::$lastNameCharacter); ?>
                    <input type="text" name="lname" placeholder="Last name" class="form-control" value="<?php getInputValue('lastName');   ?>"
                     autocomplete="off" required>

                    <?php echo $account->getError(Constants::$usernameCharacter); ?>
                    <?php  echo $account->getError(Constants::$existUsername);    ?>
                    <input type="text" name="uname" placeholder="Username" class="form-control" value="<?php getInputValue('username'); ?>"
                     autocomplete="off" required>

                    <?php echo $account->getError(Constants::$notMatchEmail); ?>
                    <?php echo $account->getError(Constants::$inValidEmail);  ?>
                    <?php echo $account->getError(Constants::$takenEmail);     ?>
                    <input type="email" name="email" placeholder="Email" class="form-control" value="<?php  getInputValue('email'); ?>"
                     autocomplete="off" required>
                    <input type="email" name="email2" placeholder="Confirm email" class="form-control" value="<?php  getInputvalue('email2'); ?>"
                    autocomplete="off" required>

                    <?php echo $account->getError(Constants::$notMatchPassword); ?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>
                    <input type="password" name="psw" placeholder="Password" class="form-control"  autocomplete="off" required>

                    <input type="password" name="psw-repeat" placeholder="Confirm password" class="form-control"  autocomplete="off" required>

                      <div class="typeTitle">
                          <h3>Select your type</h3>
                      </div>
                      <div class='form-group'>
                        <select class='form-control' name="user_type" required>
                          <option value="user">Users</option>
                          <option value="school">School</option>
                        </select>
                      </div>
                    <input type="submit" name="submitButton" value="SUBMIT">


                 </form>


            </div>

            <a href="signIn.php" class="signInMessage"> Already have an account? Sign in here!</a>
         </div>
    </div>
</body>
</html>

<!--   
<input type="radio" id="for-school" name="us_type" value="school">
                 <label for="for-school">School</label>  
                  &nbsp; &nbsp;&nbsp;  
                <input type="radio" id="for-users" name="us_type" value="user">
                <label for="for-users">User </label> -->