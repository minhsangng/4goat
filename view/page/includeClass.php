<?php
/* Include Model */
include_once("model/connect.php");
include_once("model/message.php");
include_once("model/mProduct.php");
include_once("model/mWishList.php");
include_once("model/mLogin.php");
include_once("model/mCart.php");
include_once("model/mBrand.php");
include_once("model/mReview.php");
include_once("model/mCollection.php");

/* Include Controller */
include_once("controller/cProduct.php");
include_once("controller/cWishList.php");
include_once("controller/cLogin.php");
include_once("controller/cCart.php");
include_once("controller/cBrand.php");
include_once("controller/cReview.php");
include_once("controller/cCollection.php");

/* Khởi tạo biến ctrl */
$ctrlMessage = new message();
$ctrlProduct = new cProduct();
$ctrlWishList = new cWishList();
$ctrlCart = new cCart();
$ctrlLogin = new cLogin();
$ctrlBrand = new cBrand();
$ctrlReview = new cReview();
$ctrlCollection = new cCollection();
?>