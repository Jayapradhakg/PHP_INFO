<?php 

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
