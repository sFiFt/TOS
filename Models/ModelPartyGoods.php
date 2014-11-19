<?php //ModelPartyGoods
include_once "ModelFactory.php";

class ModelPartyGoods extends ModelFactory{

	public function newPartyGoods($partyGoods){ //Метод добавления новой категории
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("INSERT INTO `tos_party_goods`(`party_goods_name`) VALUES (:partyGoods)");
		$query->bindParam(':partyGoods', $partyGoods, PDO::PARAM_STR);
		$query->execute();
	}
	
	public function deletePartyGoods($partyGoodID){ //Метод удаления категории
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("DELETE FROM `tos_party_goods` WHERE id = :id");
		$query->bindParam(':id', $partyGoodID, PDO::PARAM_INT);
		$query->execute();
	}
	

	
}