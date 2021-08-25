
<?php 
    // process the input data which come frome signUp page.

    class Account {

        private $link;
        private $errorArray = array();

        public function __construct($link) {

            $this->link = $link;
        }

        public function register ($fn, $ln, $un, $em, $em2, $pw, $pw2, $user_type) {

            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUsername($un);
            $this->validateEmail($em, $em2);
            $this->validatePassword($pw, $pw2);

            if(empty($this->errorArray)) {
                // free from error.
                return $this->insertUserDetail($fn, $ln, $un, $em, $pw, $user_type);
            }
            else {
                return false;
            }
        
        }

        // check login 

        public function login($us, $pw) {

            $pw = hash("sha512" , $pw);

            $query = $this->link->prepare("SELECT * FROM users WHERE username = :un AND password = :pw");
            $query->bindParam(":un", $us);
            $query->bindParam(":pw", $pw);

            $query->execute();

            if($query->rowCount() == 1){
                return true;
            }
            else {
                array_push($this->errorArray, Constants::$notLoggedIn);
                return false;
            }
        }

        private function validateFirstName($fn) {
            
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacter);
            }
        }

        private function validateLastName($ln) {
            
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacter);
            }
        }

        private function validateUsername($un) {

            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacter);
            }

            $query = $this->link->prepare("SELECT username FROM users WHERE username = :un ");

            $query->bindParam(":un", $un);
            $query->execute();

            if($query->rowCount() != 0) {
                array_push($this->errorArray, Constants::$existUsername);
            }
        }

        private function validateEmail($em, $em2) {

            if($em != $em2) {
                array_push($this->errorArray, Constants::$notMatchEmail);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                // error
                array_push($this->errorArray, Constants::$inValidEmail);
                return;
            }

            $query=$this->link->prepare("SELECT email FROM users WHERE email = :email");
            $query->bindParam(":email", $em);
            $query->execute();

            if($query->rowCount() != 0){
                array_push($this->errorArray, Constants::$takenEmail);
            }

        }

        private function validateNewEmail($em, $un) {

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                // error
                array_push($this->errorArray, Constants::$inValidEmail);
                return;
            }

            $query=$this->link->prepare("SELECT email FROM users WHERE email = :email AND username != :un");
            $query->bindParam(":email", $em);
            $query->bindParam(":un", $un);
            $query->execute();

            if($query->rowCount() != 0){
                array_push($this->errorArray, Constants::$takenEmail);
            }

        }

        public function validatePassword($pw, $pw2) {

            if($pw != $pw2 ){
                array_push($this->errorArray, Constants::$notMatchPassword);
                return;
            }

            if(preg_match("/[^A-Za-z0-9]/", $pw)) {
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($pw) > 35 || strlen($pw) <6 ) {
                array_push($this->errorArray, Constants::$passwordLength);
            }
        }

        public function getError($error) {
            if(in_array($error, $this->errorArray)) {
                return "<span class='errorMessage'>$error</span>";
            }
        }

         public function insertUserDetail($fn, $ln, $un, $em, $pw, $user_type) {

            $pw = hash("sha512", $pw );
            $profilePicture = "assets/images/profilePictures/default.png";

            $query = $this->link->prepare("INSERT INTO users (first_name, last_name, username,user_type, email, password, profilePic )
                                          VALUES(:fn, :ln, :un, :user_type, :em, :pw, :pic)" );
            $query->bindParam(":fn", $fn);
            $query->bindParam(":ln", $ln);
            $query->bindParam(":un", $un);
            $query->bindParam(":user_type", $user_type);
            $query->bindParam(":em", $em);
            $query->bindParam(":pw", $pw);
            $query->bindParam(":pic", $profilePicture);
            if($res = $query->execute()){
                return $res;
            }else{
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $query->errorInfo();
                print_r($arr);
            }
         }

         public function updateUserDetailProfile($fn, $ln, $un, $em) {
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateNewEmail($em, $un);

            if(empty($this->errorArray)) {
                $query = $this->link->prepare("UPDATE users SET first_name=:fn, last_name=:ln, email=:em WHERE username=:un");
                $query->bindParam(":fn", $fn);
                $query->bindParam(":ln", $ln);
                $query->bindParam(":em", $em);
                $query->bindParam(":un", $un);

               return $query->execute();
            }
            else {
                return false;
            }
        }

        

        public function updatePassword($currentPW, $newPW, $confirmPW, $un) {

            $this->validateOldPassword($currentPW, $un);
            $this->validatePassword($newPW, $confirmPW);

            if(empty($this->errorArray)) {
                $pw = hash("sha512", $confirmPW);
                $query = $this->link->prepare("UPDATE users SET password=:password WHERE username=:username");
                $query->bindParam(":password", $pw);
                $query->bindParam(":username", $un);

                return $query->execute();
            }
            else {
                return false;
            }

        }
        public function getFirstError() {
            if(!empty($this->errorArray)) {
                return $this->errorArray[0];
            }
            else {
                return "";
            }
        }

        public function validateOldPassword($cPW, $un) {
            $pw = hash("sha512" , $cPW);

            $query = $this->link->prepare("SELECT * FROM users WHERE username = :un AND password = :pw");
            $query->bindParam(":un", $un);
            $query->bindParam(":pw", $pw);

            $query->execute();

            if($query->rowCount() == 0){
                array_push($this->errorArray, Constants::$incorrectPassword);
            }
        }
    }

?>