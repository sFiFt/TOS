<?php //goodsController
include_once "../Models/ModelFactory.php";
$factory = new ModelFactory();
$goods = $factory->getInstance('good');

if(isset($_GET['partyGoodID']) && isset($_GET['brandID'])){
	$partyGoodID = $_GET['partyGoodID'];
	$partyGoodID = (int)$partyGoodID;

	$brandID = $_GET['brandID'];
	$brandID = (int)$brandID;

	$arrayGood = $goods->getGoods($partyGoodID, $brandID);
	
	session_start();
	$_SESSION['good'] = $arrayGood;
	header ('Location: http://seo-serfing.ru/TOS/index.php');
}