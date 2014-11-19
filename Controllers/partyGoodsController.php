<?php //partyGoodsController
include_once "../Models/ModelFactory.php"; //Подключаем фабрику
$factory = new ModelFactory();
$partyGoods = $factory->getInstance('partyGood'); // Получаем экземпляр модели категорий

	session_start();
	$allPartyGoods = $factory->getAllPartyGoods(); // Получаем весь список категорий
	$_SESSION['allPartyGoods'] = $allPartyGoods; // Пихаем список категорий в сессию
	$_SESSION['buttonHiddenStyle'] = "style = 'display:none;'";
	$_SESSION['counter'] = 1; // Увеличиваем счетчик во избежания бесконечной переадресации 
	header ('Location: http://seo-serfing.ru/TOS/adminPanel/partyGoods.php'); // Прыгаем на вьюшку


if(isset($_POST['insertNewPartyGoods'])){ //Добавляем новую категорию
	$newPartyGood = $_POST['newPartyGoods'];
	$newPartyGood = trim($newPartyGood);
	if(empty($newPartyGood)){
		session_start();
		$_SESSION['siteError'] = "Поле \"Название категории\" не может быть пустым";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/partyGoods.php');
	}else{
		session_start();
		$_SESSION['siteError'] = "<p style='color:green'>Категория успешно добавлена</p>";
		$partyGoods->newPartyGoods($newPartyGood);
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/partyGoods.php');
	}
}

if (isset($_POST['deletePartyGoods'])){ //Удаляем категорию
	$partyGoodID = $_POST['partyGood'];
	$partyGoodID = (int)$partyGoodID;
	if(empty($partyGoodID)){
		session_start();
		$_SESSION['siteErrorDelete'] = "Данной категории не существует";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/partyGoods.php');
	}else{
		session_start();
		$_SESSION['siteErrorDelete'] = "<p style='color:green'>Категория успешно удалена</p>";
		$partyGoods->deletePartyGoods($partyGoodID);
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/partyGoods.php');
	}
}