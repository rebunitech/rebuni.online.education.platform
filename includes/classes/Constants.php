<?php

// in this class i try to do store errors 
    class Constants {
        public static $firstNameCharacter = "Your first name must be between 25 and 2 character length.";
        public static $lastNameCharacter = "Your last name must be between 25 and 2 character length.";
        public static $usernameCharacter = "Your username must be between 25 and 2 character length.";
        public static $existUsername = "Already used username, please enter an other.";
        public static $notMatchEmail = "email do not match.";
        public static $inValidEmail = "please enter valid email address.";
        public static $takenEmail = "This email is already in use.";
        public static $notMatchPassword = "password do not match. ";
        public static $passwordNotAlphanumeric = "Your password can only contain letters and numbers";
        public static $passwordLength = "Your password must be between 5 and 30 characters";

        public static $notLoggedIn = "Invalid username or password, please try again!";
        public static $incorrectPassword = "Incorrect password, plaese try again.";
        

    }

?>