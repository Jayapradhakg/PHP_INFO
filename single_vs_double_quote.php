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
