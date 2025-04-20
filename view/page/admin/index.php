<?php
error_reporting(1);
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mLogin.php");
include_once("../../../model/mOrder.php");
include_once("../../../model/mProduct.php");
include_once("../../../model/mPost.php");
include_once("../../../model/mBrand.php");
include_once("../../../model/mCustomer.php");
include_once("../../../model/mCollection.php");

include_once("../../../controller/cLogin.php");
include_once("../../../controller/cOrder.php");
include_once("../../../controller/cproduct.php");
include_once("../../../controller/cPost.php");
include_once("../../../controller/cBrand.php");
include_once("../../../controller/cCustomer.php");
include_once("../../../controller/cCollection.php");

$ctrlLogin = new cLogin();
$ctrlOrder = new cOrder();
$ctrlProduct = new cProduct();
$ctrlPost = new cPost();
$ctrlBrand = new cBrand();
$ctrlCustomer = new cCustomer();
$ctrlCollection = new cCollection();

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