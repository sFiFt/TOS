<?
class DB {
	const DRIVER = "mysql";
	const BASE = "****";
	const HOST = "****";
	const USER = "****";
	const PASS = "****";
	protected function __construct(){
		
	}
	
	public static function getDB() {
		try{
			return new PDO(self::DRIVER . ":host=" . self::HOST . ";dbname=" . self::BASE , self::USER, self::PASS);
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public static function convertDate($date){
		$date = explode('-', $date);
		$day = $date[2];
		$month = $date[1];
		switch($month){
			case 01: 
			$month = 'Январь';
			break;
			
			case 02: 
			$month = 'Февраль';
			break;
			
			case 03: 
			$month = 'Март';
			break;
			
			case 04: 
			$month = 'Апрель';
			break;
			
			case 05: 
			$month = 'Май';
			break;
			
			case 06: 
			$month = 'Июнь';
			break;
			
			case 07: 
			$month = 'Июль';
			break;
			
			case 08: 
			$month = 'Август';
			break;
			
			case 09: 
			$month = 'Сентябрь';
			break;
			
			case 10: 
			$month = 'Октябрь';
			break;
			
			case 11: 
			$month = 'Ноябрь';
			break;
			
			case 12: 
			$month = 'Декабрь';
			break;
		}
		$year = $date[0];
		$result = $day . '-' . $month . '-' . $year;
		return $result;
	} 
	
}
?>