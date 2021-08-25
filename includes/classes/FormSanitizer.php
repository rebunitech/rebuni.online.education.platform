
<?php
    class FormSanitizer {

       public static function santizeFormString ($inputText) {     // this santize the input file before use them

            $inputText = strip_tags($inputText);  // remove script from input
            $inputText = str_replace(" ","", $inputText);  // remove space by empty space
            $inputText = strtolower($inputText); // change all input to lowercase
            $inputText = ucfirst($inputText); // capitalize 

            return $inputText;
       }
       
       public static function santizeFormUsername($inputText) {
           $inputText = strip_tags($inputText);
           $inputText = str_replace(" ", "", $inputText);
           return $inputText;
       }

       public static function santizeFormEmail($inputText) {
           $inputText = strip_tags($inputText);
           $inputText = str_replace(" ", "", $inputText);
           return $inputText;
       }

       public static function santizerFormPassword($inputText) {
           $inputText = strip_tags($inputText);
           return $inputText;
       }
    }

?>