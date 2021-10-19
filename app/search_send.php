<?php

$form_name = $_POST["name"];
$form_lastname = $_POST["last-name"];
$form_age = $_POST["age"];
$form_phone = $_POST["phone"];


if(isset($_POST["search"])){
    header("search.php");
} 
if (isset($_POST["send"])){
    include "send.php";
    include "validation.php";
}

