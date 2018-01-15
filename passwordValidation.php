<?php
    //This file validates the input password format::
     /*
        Explanation of the use of regular expression::
        $ = beginning/end of string
        \S* = any set of characters
        (?=\S{8,}) = of at least length 8
        (?=\S*[a-z]) = containing at least one lowercase letter
        (?=\S*[A-Z]) = and at least one uppercase letter
        (?=\S*[\d]) = and at least one number
     */

    //The variable '$password' is assigned from the input password string from the file it is called

    //If color of the messages turns into red where problem is found error flag '$errFlag' is set to high::
    if (!preg_match('/^[a-zA-Z0-9_]*$/', $password) & $password != "") { //Check if the password input contains any special characters or not [only numbers, letters and (_) allowed]

        $pass_char_spe = "<div style='color: red;'>*Only numbers, letters and (_) allowed!</div>";
        $errFlag = 1;
    
    }


    //If the password input does not contain any special characters::
    if($password != ""){ //If password field is not empty [for first time load of the page]

        if (!preg_match_all('$\S*(?=\S{8,})\S*$', $password)) { //Check if the password contains atleast 8 characters
            $pass_size = "<div style='color: red;'>*Password should be atleast 8 characters!</div>";
            $errFlag = 1;
        }
        if (!preg_match_all('$\S*(?=[a-z])\S*$', $password)) { //Check if the password contains atleast one lowercase characters
            $pass_char_lower = "<div style='color: red;'>*Password should contain atleast one lowercase character!</div>";
            $errFlag = 1;
        }
        if(!preg_match_all('$\S*(?=[A-Z])\S*$', $password)) { //Check if the password contains atleast one uppercase characters
            $pass_char_upper = "<div style='color: red;'>*Password should contain atleast one uppercase character!</div>";
            $errFlag = 1;
        }
        if (!preg_match_all('$\S*(?=[0-9])\S*$', $password)) { //Check if the password contains atleast one number
            $pass_char_num = "<div style='color: red;'>*Password should contain atleast one number!</div>";
            $errFlag = 1;
        }
    
    }

?>
