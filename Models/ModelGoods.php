<?php //ModelGoods
include_once "ModelFactory.php";

class ModelGoods extends ModelFactory{
	public function getGoods($partyGoodID, $brandID){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->prepare("SELECT * FROM `goods` g 
									JOIN brands b ON g.brand_id = b.id
									JOIN tos_party_goods p on b.party_goods_id = p.id 
									WHERE p.id = :partyGoodID AND b.id = :brandID");
		$query->bindParam(':partyGoodID', $partyGoodID, PDO::PARAM_INT);
		$query->bindParam(':brandID', $brandID, PDO::PARAM_INT);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $query->fetch()){
			
			$arrayGoods[] = $row['goods_name'] . '|' . $row['goods_price'] . '|' . $row['goods_putting_date'] . '|' . $row['brand_name'] . '|' . $row['party_goods_name'];
		}
		return $arrayGoods;
	}
}