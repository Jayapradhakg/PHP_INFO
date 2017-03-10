<?php 
/*
Program to Expand the list of IP address range in the given input file. 
Sort the list, find the duplicate IPS
Uses PHP script to expand the IP ranges and getthe list of the IP address ( each per line in output)
Then sort the list and find duplicates in the given list
=> Once the Output file is got with the list of IP addresses, 
php expand_ips.php > output_ips.txt
Then use either of these options: 
1. sort input_ips.txt | uniq -c | grep -v " ^ *1"
2. List of only repeated or duplicate ips
sort input_ips.txt | uniq -d > repeated_ip.txt 
sort input_ips.txt | uniq -d  | wc -l => count

Improvement/ Phase 2: 
1. php code to write the output into file, with sorted list and another list with duplicates.
*/

$ips = file_get_contents('./ips.txt', true);

$ip = explode("\n", $ips);
$count = 0;
echo " Here is the expanded list of IP's:\n";
foreach($ip as $value) {
	if(strpos($value, "-")){
		$split_ips = split("-",$value);
		$ip1 = ip2long($split_ips[0]);
		$ip2 = ip2long($split_ips[1]);
		for ($i = $ip1; $i <= $ip2;$i++) {
			echo  long2ip($i) . "\n";
			$count++;
		}			
	}else {
		$count++;
		echo $value . "\n";
	}
}
// echo " count = " . $count . " \n"; 
?>
