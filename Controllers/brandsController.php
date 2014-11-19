<?php //brandsController
include "../Models/ModelBrand.php";
$brands = new ModelBrand();
	session_start();
		$allPartyGoods = $brands->getAllPartyGoods();
		$_SESSION['allPartyGoods'] = $allPartyGoods;

	if (isset($_POST['partyGoodDB'])){
		$partyGoodDB = $_POST['partyGoodDB'];
		$allPartyGoods = $brands->getAllPartyGoods($partyGoodDB);
		$allBrands = $brands->getAllBrands($partyGoodDB);
		$_SESSION['allBrands'] = $allBrands;
		$_SESSION['condition'] = "style = 'display:block'";
		$_SESSION['defaultPartyGoodsName'] = $brands->getDefaultPartyGoods($partyGoodDB);
		$_SESSION['defaultPartyGoodsID'] = $partyGoodDB;
		$_SESSION['allPartyGoods'] = $allPartyGoods;
	}

	$_SESSION['counter'] = 1;
	header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');

if(isset($_POST['insertNewBrand'])){
	$partyGoodID = $_POST['partyGood'];
	$partyGoodID = trim($partyGoodID);
	$newBrand = $_POST['brand'];
	$newBrand = trim($newBrand);
	if(empty($partyGoodID)){
		session_start();
		$_SESSION['siteError'] = "Идентификатор выбранной вами категории не обнаружен";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}else if(empty($newBrand)){
		session_start();
		$_SESSION['siteError'] = "Поле \"Название бренда\" не может быть пустым";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}else{
		session_start();
		$_SESSION['siteError'] = "<p style='color:green'>Бренд успешно добавлен</p>";
		$brands->newBrand($partyGoodID, $newBrand);
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}
}

if(isset($_POST['deletePartyGoods'])){
	$brandID = $_POST['brandBD'];
	$brandID = trim($brandID);
	$partyGoodID = $_POST['partyGoodDB'];
	$partyGoodID = trim($partyGoodID);
	if(empty($partyGoodID)){
		session_start();
		$_SESSION['siteErrorDelete'] = "Идентификатор выбранной вами категории не обнаружен";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}else if(empty($brandID)){
		session_start();
		$_SESSION['siteErrorDelete'] = "Идентификатор выбранного вами бренда не обнаружен";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}else{
		session_start();
		$brands->deleteBrands($brandID, $partyGoodID);
		$_SESSION['siteErrorDelete'] = "<p style='color:green'>Бренд успешно удален</p>";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/brands.php');
	}
}