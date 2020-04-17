
<form method="post">
    <lable for="string">Given a string, determine if it is a palindrome</lable>
    <input type="text" id="string" name="string" placeholder="Enter string">

    <br>
    <br>

    <lable for="number">Enter number to check if it is ugly or not</lable>
    <input type="number" id="number" name="number" placeholder="Enter Number">
    <br>
    <br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php

if (isset($_POST['submit'])) {
    if(isset($_POST['number'])) {
        echo findUglyNumber($_POST['number']);
    }

    if(isset($_POST['string'])) {
        isPalindrome($_POST['string']);
    }
}
/**
 * Given a string, determine if it is a palindrome, considering only alphanumeric characters and ignoring cases.
 * @param $string
 * @return bool
 */
function isPalindrome($string) {
    $string = preg_replace("/[^A-Za-z0-9 ]/", '', $string);
    $newString = str_replace(' ', '',strtolower($string));
    $revString = strrev($newString);
    if ($newString == $revString) {
        echo "palindrome";
        return true;
    } else {
        echo "not palindrome";
        return false;
    }
}

/**
 * Ugly numbers are positive numbers whose prime factors only include 2, 3, 5.
 */
function findUglyNumber($number)
{
    if ($number <= 1690) {
        $otherNumber = 0;
        $incNum = 0;
        do {
            $incNum++;
            if (isNumberUgly($incNum) === true) {
                $otherNumber++;
            }
        } while ($otherNumber < $number);

        echo "The $incNum is the $number ugly number.";
        return true;
    } else {
        echo "Please enter the number which is less than 1690.";
    }
}

/**
 * @param $num
 * @return bool|float|int
 */
function isNumberUgly($num)
{
    if($num) {
        $primeFactor = [2, 3, 5];

        foreach ($primeFactor as $pf) {
            while(!($num % $pf)) {
                $num = $num/$pf;
            }

            if ($num == 1) {
                return true;
            }
        }
    } else {
        return false;
    }
}