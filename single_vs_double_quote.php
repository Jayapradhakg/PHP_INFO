<?php

$single_q = '';
$double_q = "";
$success = "string match \n"; 
$failure = "string dont match \n"; 

echo " != comparison of 2 strings '' and  \"\" \n";
if($single_q != $double_q) { 
  echo $failure;
} else {
  echo $success;
} 

echo " !== comparison of 2 strings '' and  \"\" \n";
if($single_q !== $double_q) { 
  echo $failure;
} else {
  echo $success;
} 


$input = readline("\n Please enter the string \n");
echo " vardump of input" . var_dump($input);
echo " vardump of single_q" . var_dump($single_q);
echo " vardump of double_q" . var_dump($double_q);

echo " != comparison of input string and \"\" \n";
if($input != $double_q) { 
  echo $failure ;
} else {
  echo $success; 
}

echo " != comparison of input string and '' \n";
if($input != $single_q) { 
  echo $failure ;
} else {
  echo $success ;
}

echo " !== comparison of input string and \"\"\n";
if($input !== $double_q) { 
  echo $failure ;
} else {
  echo $success;
}

echo " != comparison of input string and '' \n";
if($input !== $single_q) { 
  echo $failure;
} else {
  echo $success;
}

echo "\n is_string() function return values check \n";
$values = array(false, true, null, 'abc', '23', 23, '23.5', 23.5, '',"", ' ', '0', 0, $input);
foreach ($values as $value) {
    echo "is_string(";
    var_export($value);
    echo ") = ";
    echo var_dump(is_string($value));
}

?>

/**
jkodihalli@jayamac ~/tmp (42) {master} % php single_vs_double_quote.php 
 != comparison of 2 strings '' and  "" 
string match 
 !== comparison of 2 strings '' and  "" 
string match 

 Please enter the string 

string(0) ""
 vardump of inputstring(0) ""
 vardump of single_qstring(0) ""
 vardump of double_q != comparison of input string and "" 
string match 
 != comparison of input string and '' 
string match 
 !== comparison of input string and ""
string match 
 != comparison of input string and '' 
string match 

 is_string() function return values check 
is_string(false) = bool(false)
is_string(true) = bool(false)
is_string(NULL) = bool(false)
is_string('abc') = bool(true)
is_string('23') = bool(true)
is_string(23) = bool(false)
is_string('23.5') = bool(true)
is_string(23.5) = bool(false)
is_string('') = bool(true)
is_string('') = bool(true)
is_string(' ') = bool(true)
is_string('0') = bool(true)
is_string(0) = bool(false)
is_string('') = bool(true)
jkodihalli@jayamac ~/tmp (43) {master} % php single_vs_double_quote.php 
 != comparison of 2 strings '' and  "" 
string match 
 !== comparison of 2 strings '' and  "" 
string match 

 Please enter the string 
jaya
string(4) "jaya"
 vardump of inputstring(0) ""
 vardump of single_qstring(0) ""
 vardump of double_q != comparison of input string and "" 
string dont match 
 != comparison of input string and '' 
string dont match 
 !== comparison of input string and ""
string dont match 
 != comparison of input string and '' 
string dont match 

 is_string() function return values check 
is_string(false) = bool(false)
is_string(true) = bool(false)
is_string(NULL) = bool(false)
is_string('abc') = bool(true)
is_string('23') = bool(true)
is_string(23) = bool(false)
is_string('23.5') = bool(true)
is_string(23.5) = bool(false)
is_string('') = bool(true)
is_string('') = bool(true)
is_string(' ') = bool(true)
is_string('0') = bool(true)
is_string(0) = bool(false)
is_string('jaya') = bool(true)
**/
