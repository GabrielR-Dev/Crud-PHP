<?php


$id = $_POST["id"];
$select = $_POST["Select"];
$name = $_POST["name"];
$lastname = $_POST["last-name"];
$age = $_POST["age"];
$phone = $_POST["phone"];

if($select == "Edit"){
    include "edit.php";
}
if($select == "Delete"){
    include "delete.php";
}
