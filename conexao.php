<?php
session_start();
$mysqli= new mysqli("localhost", "root", "", "valia-banco");

if ($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_errno);
	exit();
}else{};
?>