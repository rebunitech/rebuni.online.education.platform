


<div class="signUp-form">
    
    <form class="modal-content form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
             <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
    
                <label for="fname"><b>First Name</b></label>
                <input type="text" class="form-control" placeholder="First Name" name="fname">
    
                <label for="lname"><b>Last Name</b></label>
                <input type="text" class="form-control" placeholder="Last Name" name="lname">
    
                <label for="email"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
    
                <label for="email"><b>Confirm Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Confirm Email" name="email2">
    
                <label for="uname"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Username" name="uname">
    
                <label for="psw"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
    
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
    
                  <h2>Select your role</h2> <br>
                    
                    <input type="radio" id="for-school" name="us_type" value="school">
                     <label for="for-school">School</label>  
                      &nbsp; &nbsp;&nbsp;  
                    <input type="radio" id="for-users" name="us_type" value="user">
                    <label for="for-users">User </label>
                    
               <br><br>
                <div class="clearfix">
                   <button type="submit" class="signupbtn">Sign Up </button>
    
                </div> <br>
                   <a href="../view/logIn.php" class="signInMessage"> Already have an account? Sign in here!</a>
             </div> <br> <br> <br>
             <p style="margin-left:20px">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> <br>
          </form>
        </div>