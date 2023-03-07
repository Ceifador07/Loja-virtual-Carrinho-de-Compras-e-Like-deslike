<?php
session_start();
if(!isset($_SESSION['Admin'])){
    header("location: ../index.html");
}
?>