<?php //ModelFactory
include_once "../classes/DB.class.php";
include_once "../Models/ModelAdmin.php";
include_once "../Models/ModelGoods.php";
include_once "../Models/ModelPartyGoods.php";
include_once "../Models/ModelBrands.php";



class ModelFactory{
	protected $DB;
	
	public function __construct(){
		$this->DB = DB::getDB();
	}
	
	public function getInstance($model){
		switch($model){
			case 'mainOptions':
			return new ModelAdmin();
			break;
			
			case 'partyGood':
			return new ModelPartyGoods();
			break;
			
			case 'brand':
			return new ModelBrand();
			break;
			
			case 'good':
			return new ModelGoods();
			break;
		}
	}
	
	public function getAllPartyGoods($selectedPartyGood){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->query("SELECT * FROM `tos_party_goods`");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $query->fetch()){
			if($selectedPartyGood == $row['id']){
				continue;
			}
			$allPartyGoods[] ="
					<option value = '$row[id]'> $row[party_goods_name] </option>
					    	  ";
		}
		return $allPartyGoods;
	}
	
	public function getAllBrands($partyGoodsID){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("SELECT * FROM `brands` where `party_goods_id` = :partyGoodsID");
		$query->bindParam(':partyGoodsID', $partyGoodsID, PDO::PARAM_INT);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $query->fetch()){
			$brands[] ="
				<option value = '$row[id]'> $row[brand_name] </option>
			";
		}
		return $brands;
	}
	
	public function getDefaultPartyGoods($defaultPartyGoodsID){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("SELECT * FROM `tos_party_goods` where `id` = :id");
		$query->bindParam(':id', $defaultPartyGoodsID, PDO::PARAM_INT);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$row = $query->fetch();
		return $row['party_goods_name'];
	}
	
	public function getDefaultBrand($defaultBrandID){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("SELECT * FROM `brands` where `id` = :id");
		$query->bindParam(':id', $defaultBrandID, PDO::PARAM_INT);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$row = $query->fetch();
		return $row['brand_name'];
	}
}