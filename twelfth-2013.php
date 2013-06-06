<?php

$url = "cbseresults.nic.in/class12/cbse122013.asp";
$referer = "http://cbseresults.nic.in/class12/cbse122013.htm";
$useragent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0";
// $remove variable jo h ye part remove kerna h hume.. jsa $remove1 initial part remove ker rha h// okk?
$remove1 = "<html>
<head>
<title>CBSE 12 Results </title>
<style type=\"text/css\" media=\"print\">
.dontprintme { display: none; }
</style>
<script language=javascript>
<!--
function visitSite(url){
mywin=window.open(\"\",\"goidisplaywin\",\"width=600,height=350,screenX=100,screenY=0,scrollbars=yes,menubar=yes,resizable=yes,status=yes,toolbar=yes,directories=no,location=yes\");
mywin.location.href=url;
mywin.focus();
}
//-->
</script>

<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
</head>
<body bgcolor=\"#ffffff\" text=\"#000000\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" link=\"#3333cc\" vlink=\"#3333cc\" alink=\"#3333cc\">
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#373abe\">
  <tr align=\"left\" valign=\"top\"> 
    <td width=\"5%\"><IMG height=69 src=\"../images/cbse1.gif\" width=67></td>
    <td width=\"95%\" valign=\"center\"> 
      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
        <tr align=\"right\" valign=\"bottom\"> 
          <td><font size=\"2\" face=\"Arial, Helvetica, sans-serif\" color=\"#ffffff\"><b>
<font size=\"3\">http://cbseresults.nic.in</font></b></font></td>
        </tr>
        <tr> 
          <td><IMG height=31 src=\"../images/cbse2.gif\" width=263></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#373abe\" height=\"30\">
  <tr> 
    <td><IMG height=26 src=\"../images/cbse3.gif\" width=408><font size=\"3\" face=\"Arial, Helvetica, sans-serif\"><font color=\"#ffffff\"><b><font size=\"4\"> 
      </font></b></font> </font></td>
    <td> 
      <div align=\"right\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\"><font color=\"#ffffff\"><b><font size=\"4\"> 
        Examination Results 2013</font></b></font> </font></div>
    </td>
  </tr>
</table><div align=right><STRONG>&nbsp;
Brought to you by <A href=\"javascript:visitSite('http://home.nic.in')\">National Informatics Centre<br><br></A></STRONG></div>

<br>



</STRONG></A>


<CENTER>
  <font color=\"#3333CC\" size=\"3\" face=\"Arial, Helvetica, sans-serif\"><B>Senior School Certificate Examination (Class XII) Results 2013</B>
</font></CENTER>
<BR>
<div align=\"center\">
<table width=75% align=center><tr><td align=right>
<!--<a href=\"#\" onclick=\"javascript:window.print();return false\" class=\"dontprintme\">Print this page
</a> -->
<Input type=button Name=\"Print\" Value=\"Print\" onClick=\"javascript:window.print();return false\" class=\"dontprintme\">
</td></tr></table>


<table width=\"75%\" align=center>
<tr>
<td><STRONG><font face=\"Arial\" size=2>Roll No:</font></STRONG></td>
<td><font face=\"Arial\" size=2> 1600001</font></td>
</tr>
<tr>
<td><FONT size=2><STRONG><font face=\"Arial\">Name:</font><br></STRONG></FONT></td>
<td><font face=\"Arial\" size=2> <b>";
// same
$remove2 = "</b></font></td>
</tr>
<tr>
<td><STRONG><font face=\"Arial\" size=2 
     >Mother's Name:</font></STRONG></td>
<td><font face=\"Arial\" size=2>";
//same
$remove3 = "</font></td>
</tr>
<tr>
<td><STRONG><font face=\"Arial\" size=2 >Father's Name:</font></STRONG></td>
<td><font face=\"Arial\" size=2>";
// need more removals
//$error isliye h ki koi result 
$error = "Result Not Found";
$namestring = "size=2> <b>";
function outputName($index,$result)
{
    for($i=0;$result[$i+$index]!="<";$i++)
    {
        $name[$i] = $result[$i+$index];
    }
	echo implode($name).'<br>';
    unset($name); 
    return $i+$index;
}
function updatePointer($index,$result)
{
    for($i=0;$result[$i+$index]!="<";$i++);
    return $i+$index;
}
function outputSubCode($index,$result)
{
    for($i=0;$result[$i+$index]!="<";$i++)
    {
        $name[$i] = $result[$i+$index];
    }
	echo implode($name).'<br>';
    unset($name);
    return $i+$index;
}
function outputSubName($index,$result)
{
    for($i=0;$result[$i+$index]!="<";$i++)
    {
        $name[$i] = $result[$i+$index];
    }
	echo implode($name).'<br>';
    unset($name); 
    return $i+$index;
}
function outputMarks($index,$result)
{
    for($i=0;$i<3;$i++)
    {
        $marks[$i] = $result[$i+$index];
    }    
	echo implode($marks).'<br>';
    unset($marks); 
    return updatePointer($index, $result);
}
for ($rollno = 1600001; $rollno < 1600100; ++$rollno) {  // from which roll no to which roll no 
	
	$logindata = array(
			'regno' => $rollno,
			'B1' => 'Submit'
		);
	$handle = curl_init();
	// ye sb script h . inme kuch zarurat nhi h kerne ki.. okk? bus ye for loop hi main h. or kuch ni program me
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_POST, true);
	curl_setopt($handle, CURLOPT_POSTFIELDS, "regno=".$rollno."&B1=Submit");
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_REFERER, $referer);
	curl_setopt($handle, CURLOPT_USERAGENT, $useragent); 
	//$result contains complete source code of result. Mining isme kerni h !!
	$result = curl_exec($handle);
	$index = 2840;
	$index = outputName($index,$result)+145;    //Student name
    $index = outputName($index,$result)+133;    //Father Name
    $index = outputName($index,$result)+708;    //Mother Name
    //agar kisi info ko output nahi karna hai toh usko updatePointer se replace karde
    

    //Subcode , Subname and marks of each subject
    $index = outputSubCode($index,$result)+62;
    $index = outputSubName($index,$result)+62;
    $index = outputMarks($index,$result)+166;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+165;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+165;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+165;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+165;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+167;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result)+168;
    $index = outputSubCode($index,$result)+61;
    $index = outputSubName($index,$result)+61;
    $index = outputMarks($index,$result);
    
    curl_close($handle);
}

?>
