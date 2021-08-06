<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$is_admin=0;
	$is_medic=0;
	$is_active=1;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	if(isset($_POST["is_medic"])){$is_medic=1;}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->is_medic=$is_medic;
	$user->is_active=$is_active;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>