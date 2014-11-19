<?php //ModelAdmin
include_once "ModelFactory.php";

class ModelAdmin extends ModelFactory {
	
	public function saveSiteName($siteName){ // Метод изменения имени сайта
		$siteName = trim($siteName);
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("UPDATE `mainOptions` SET `storeName`= :siteName");
		$query->bindParam(':siteName', $siteName, PDO::PARAM_STR);
		$query->execute();
	}
	
	public function saveTitleName($titleName){ // Метод изменения закладки сайта
		$titleName = trim($titleName);
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("UPDATE `mainOptions` SET `titleName`= :titleName");
		$query->bindParam(':titleName', $titleName, PDO::PARAM_STR);
		$query->execute();
	}
}