<?php
error_reporting(1);
session_start();

include_once("view/page/includeClass.php");

include_once("view/layout/header.php");

$p = "home";

if (isset($_GET["p"]))
    $p = $_GET["p"];
else
    $p = "home";

if ($p != "home")
    include_once("view/page/" . $p . "/index.php");
else
    include_once("view/page/home/index.php");

include_once("view/layout/footer.php");
?>