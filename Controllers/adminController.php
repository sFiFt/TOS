<?php
include_once "../Models/ModelFactory.php"; //Подключаем фабрику
$factory = new ModelFactory();
$mainOptions = $factory->getInstance('mainOptions'); //Получаем экземпляр общих настроек
if ($_SERVER['REQUEST_METHOD'] == "POST"){ //Проверяем получение данных
	$siteName = $_POST['siteName']; //Получаем название сайта
	$siteName = trim($siteName);
	$titleName = $_POST['titleName']; //Получаем название закладки
	$titleName = trim($titleName);
	if(empty($siteName)){ //Проверяем на пустоту название сайта
		session_start();
		$_SESSION['siteError'] = "Поле \"Название сайта(страничка)\" не может быть пустым";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/mainOptions.php'); //Если пустое, переходим обратно с ошибкой
	}else if(empty($titleName)){ //Проверяем на пустоту название закладки
		session_start();
		$_SESSION['siteError'] = "Поле \"Название сайта(закладка)\" не может быть пустым";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/mainOptions.php'); //Если пустое, переходим обратно с ошибкой
	}else { //Если все ОК, передаем значения на модельку
		$mainOptions->saveSiteName($siteName);
		$mainOptions->saveTitleName($titleName);
		session_start();
		$_SESSION['siteError'] = "<p style='color:green'>Настройки успешно изменены</p>";	
		header ('Location: http://seo-serfing.ru/TOS/adminPanel/mainOptions.php'); //После того, как все сделали - прыгаем обратно
	} 
}