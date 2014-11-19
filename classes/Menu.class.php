<?
header('Content-Type: text/html; charset=utf-8');

class Menu{
	
	private $DB;
	
	public function __construct(){
		$this->DB = DB::getDB();
	}
	
	public function getMenu(){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->query("SELECT * FROM `tos_party_goods`");
		
		echo "<ul class='nav'>";
		
		$query->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $query->fetch()) {  
   	 		echo "<li><a href='#'>" . $row['party_goods_name'] . "</a>";
			$party_goods_id = $row['id'];
			$newUl = $this->DB->query("SELECT * FROM `brands` WHERE `party_goods_id` = $party_goods_id");
			$newUl->setFetchMode(PDO::FETCH_ASSOC);
			echo "<ul>";
			while($rowNewUl = $newUl->fetch()) {
				echo "<li><a href='http://seo-serfing.ru/TOS/Controllers/goodsController.php?partyGoodID=$row[id]&brandID=$rowNewUl[id]'>" . $rowNewUl['brand_name'] . "</a></li>";
			}
			echo "</ul></li>";
		}
		
		echo "</ul>";

	}
	
	public function getStoreName(){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->query("SELECT * FROM `mainOptions`");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$row = $query->fetch();
		return $row['storeName'];
	}
	
	public function getTitleName(){
		$query = $this->DB->query("SET NAMES utf8");
		$query = $this->DB->query("SELECT * FROM `mainOptions`");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$row = $query->fetch();
		return $row['titleName'];
	}
}
?>