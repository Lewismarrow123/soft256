<?php
include_once ("DBConnection.php");
class Editor extends Author {

}
$fnameform = $_POST['fname'];
$snameform = $_POST['sname'];
$emailform= $_POST['email'];
$usernameform= $_POST['username'];
$passwordform=$_POST['password'];
$worker= Author::CreateAuthor($fnameform, $snameform, $emailform, $usernameform, $passwordform, $conn);