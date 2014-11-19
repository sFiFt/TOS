<?php //ModelBrand
include_once "ModelFactory.php";

class ModelBrand extends ModelFactory {
	
	public function newBrand($partyGoodsID, $brand){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("INSERT INTO `brands`(`brand_name`, `party_goods_id`) VALUES ( :brand, :partyGoodsID )");
		$query->bindParam(':partyGoodsID', $partyGoodsID, PDO::PARAM_INT);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->execute();
	}
	

	
	public function deleteBrands($idBrand, $partyGoodsID){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("DELETE FROM `brands` WHERE id = :idBrand and party_goods_id = :idPartyGood");
		$query->bindParam(':idBrand', $idBrand, PDO::PARAM_INT);
		$query->bindParam(':idPartyGood', $partyGoodsID, PDO::PARAM_INT);
		$query->execute();
	}
	

}