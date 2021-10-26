<?php 
// PHP program to print a given  
// number in words. The  
// program handles numbers  
// from 0 to 9999  
  
// A function that prints 
// given number in words  
function convert_to_words($num) 
{ 
    // Get number of digits 
    // in given number 
    $len = strlen($num);  
  
    // Base cases  
    if ($len == 0)  
    { 
        echo "empty string\n"; 
        return; 
    } 
    if ($len > 4)  
    { 
        echo "Length more than 4 " .  
               "is not supported\n"; 
        return; 
    } 
  
    /* The first string is not used,  
    it is to make array indexing simple */
    $single_digits = array("zero", "one", "two",  
                           "three", "four", "five",  
                           "six", "seven", "eight",  
                                           "nine"); 
  
    /* The first string is not used,  
    it is to make array indexing simple */
    $two_digits = array("", "ten", "eleven", "twelve",  
                        "thirteen", "fourteen", "fifteen",  
                        "sixteen", "seventeen", "eighteen",  
                                               "nineteen"); 
  
    /* The first two string are not used, 
    they are to make array indexing simple*/
    $tens_multiple = array("", "", "twenty", "thirty",  
                           "forty", "fifty", "sixty",  
                           "seventy", "eighty", "ninety"); 
  
    $tens_power = array("hundred", "thousand"); 
  
    /* Used for debugging purpose only */
    echo $num.": "; 
  
    /* For single digit number */
    if ($len == 1)  
    { 
        echo $single_digits[$num[0] - '0'] . " \n"; 
        return; 
    } 
  
    /* Iterate while num 
        is not '\0' */
    $x = 0; 
    while ($x < strlen($num))  
    { 
  
        /* Code path for first 2 digits */
        if ($len >= 3) 
        { 
            if ($num[$x]-'0' != 0) 
            { 
                echo $single_digits[$num[$x] - '0'] . " "; 
                echo $tens_power[$len - 3] . " ";  
                // here len can be 3 or 4 
            } 
            --$len; 
        } 
  
        /* Code path for last 2 digits */
        else 
        { 
            /* Need to explicitly handle  
            10-19. Sum of the two digits 
            is used as index of "two_digits" 
            array of strings */
            if ($num[$x] - '0' == 1)  
            { 
                $sum = $num[$x] - '0' +  
                       $num[$x] - '0'; 
                echo $two_digits[$sum] . " \n"; 
                return; 
            } 
  
            /* Need to explicitely handle 20 */
            else if ($num[$x] - '0' == 2 &&  
                     $num[$x + 1] - '0' == 0) 
            { 
                echo "twenty\n"; 
                return; 
            } 
  
            /* Rest of the two digit  
            numbers i.e., 21 to 99 */
            else 
            { 
                $i = $num[$x] - '0'; 
                if($i > 0) 
                echo $tens_multiple[$i] . " "; 
                else
                echo ""; 
                ++$x; 
                if ($num[$x] - '0' != 0) 
                    echo $single_digits[$num[$x] -  
                                     '0'] . " \n"; 
            } 
        } 
        ++$x; 
    } 
} 