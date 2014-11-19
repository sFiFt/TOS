<?

function getUrl(){
		  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
		  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
		  $url .= $_SERVER["REQUEST_URI"];
		  return $url;
};

$thisPage = getUrl();
$count = substr_count($thisPage, '/');
if($count == 4){
	function __autoload($className){
		include "$_SERVER[DOCUMENT_ROOT]/classes/$className.class.php";
	}
}else{
	function __autoload($className){
		include "$_SERVER[DOCUMENT_ROOT]/classes/$className.class.php";
	}
}

	$menu = new Menu();
	$titleName = $menu->getTitleName();
?>		
	

<head>
        <meta charset="UTF-8">
		<script type="text/javascript" src="http://seo-serfing.ru/TOS/js/jquery.js"></script>
		<script type="text/javascript" src="http://seo-serfing.ru/TOS/js/myScripts.js"></script>
		<link href="http://seo-serfing.ru/TOS/style/style.css" rel="stylesheet" type="text/css">
        <title><?= $titleName ?></title>
</head>