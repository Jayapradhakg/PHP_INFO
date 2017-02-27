<?php

/**
 * Program to Sort a string which takes 2 parameters
 * - keep string as is( in this case lower and upper case string is treated different and User Input is preserved without changes)
 * Sorted Order : A-Za-z0-9 (  characters other than the given list are not processed)
 * or all characters to UpperCase. In this case, (A-Z0-9) is considered.
 * - allow duplicates or not in the sorted string
 * Eg:
Input String: [Hello World]
Sorted String: [HWdellloor ] - with use_asis_input = [1], allow_duplicates = [1]

Input String: [Hello World]
Sorted String: [HWdelor ] - with use_asis_input = [1], allow_duplicates = []

Input String: [Hello World]
Sorted String: [DEHLLLOORW ] - with use_asis_input = [], allow_duplicates = [1]

Input String: [Hello World]
Sorted String: [DEHLORW ] - with use_asis_input = [], allow_duplicates = []

Input String: [       ]
String is Empty or with spaces. Can't Sort
 */

echo sortedString("Hello World", $use_asis_input = true, $allow_duplicates = true);
echo sortedString("Hello World", $use_asis_input = true, $allow_duplicates = false);
echo sortedString("Hello World", $use_asis_input = false, $allow_duplicates = true);
echo sortedString("Hello World", $use_asis_input = false, $allow_duplicates = false);
echo sortedString("       ");

function sortedString($str, $use_asis_input = true, $allow_duplicates = true){
    $length = mb_strlen($str, 'UTF-8'); // Instead of strlen, multi-byte characters are treated as 1 byte length.
    $sort_str= array();
    $output = '';

    /*
     * State the facts
     */
    echo " Input String: [" . $str . "] \n"; // String concatenation is highly efficient than value substitution.

    /*
     * Validation Section
     */
    if(empty(trim($str))) {
        echo " String is Empty or with spaces. Can't Sort \n";
        return;
    }
    /*
     * Initialize the Output string
     */
    for($i = '0'; $i < '9'; $i++) { // '0' - 48 => '9' - 57
        $sort_str[$i] = 0;
    }
    for($i = 'A'; $i < 'Z'; $i++) { // 'A' - 65 => 'Z' - 90
        $sort_str[$i] = 0;
    }
    /*
     * Main Algorithm - Uses no PHP builtin Functionality
     * Intention is to optimize the Complexity.
     */
    if(!$use_asis_input) {
        $str = strtoupper($str);
    } else {
        for($i = 'a'; $i < 'z'; $i++) { // 'a' - 97 => 'z' - 122
            $sort_str[$i] = 0;
        }
    }

    for($i = 0 ; $i < $length; $i++) {
        /*
         * Case: allow_duplicates = false
         */
        $allow_duplicates? $sort_str[$str[$i]]++:$sort_str[$str[$i]] = 1;
    }

    /*
     * Output String section.
     */
    foreach($sort_str as $key => $value) {
        if($value) {
            $output .= str_repeat($key, $value);
        }
    }

    echo " Sorted String: [" . $output . "] - with use_asis_input = [" . $use_asis_input . "], allow_duplicates = [". $allow_duplicates ."]\n\n"; // String concatenation is highly efficient than value substitution.

}

?>