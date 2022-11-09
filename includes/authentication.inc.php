<?php
session_start();
include_once 'db.inc.php';
if(!isset($_SESSION["username"]))
{
    header("location: index.php");
    exit();
}