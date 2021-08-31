<?php
session_start();
$mysqli= new mysqli("localhost", "root", "", "vaila-banco");

if ($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_errno);
	exit();
}else{};
?>