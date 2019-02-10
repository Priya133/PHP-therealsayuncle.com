<?php
//ini_set('display_errors', 0);
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

$fName	= trim(htmlspecialchars($_REQUEST["fName"]));
$lName	= trim(htmlspecialchars($_REQUEST["lName"]));
$email	= trim(htmlspecialchars($_REQUEST["email"]));

$pfileName	= "mails.txt";
$MyFile 	= fopen($pfileName, "a");
$nline="$fName".","." "."$lName".","." "."$email".";"."\r\n";
fwrite($MyFile, $nline);
fclose($MyFile);
die;
?>