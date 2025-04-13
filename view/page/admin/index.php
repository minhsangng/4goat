<?php
error_reporting(1);
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mLogin.php");
include_once("../../../model/mOrder.php");
include_once("../../../model/mPost.php");

include_once("../../../controller/cLogin.php");
include_once("../../../controller/cOrder.php");
include_once("../../../controller/cPost.php");

$ctrlLogin = new cLogin();
$ctrlOrder = new cOrder();
$ctrlPost = new cPost();

if ($ctrlLogin->cConfirmLogin($_SESSION["user"][0], $_SESSION["user"][1]) != 1)
echo "<script>window.location.href='../login/';</script>";

include_once("header.php");

if (isset($_GET["p"]))
    $p = $_GET["p"];
else
    $p = "home";

if (file_exists($p . ".php"))
    include_once($p . ".php");
else
    include_once("home.php");

include_once("footer.php");

?>