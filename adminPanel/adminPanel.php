<!DOCTYPE html>
<html>
	<? include "../head.php"; ?>
    <body>
		<? include "../header.php" ?>
		<div id="article">

		<?
		$menu->getMenu();
		?>
			
			<div id = "selection">
			<table id = "adminMenuTable" >
				<caption>Настройки</caption>
				<tr>		
					<td id = "adminTD1"><a href = "mainOptions.php">Основные настройки</a></td>
					<td id = "adminTD2"><a href = #>Пользователи</a></td>
					<td id = "adminTD3"><a href = #>Пункт 3</a></td>
				</tr>
				<tr>
					<td id = "adminTD4"><a href = "partyGoods.php">Категории</a></td>
					<td id = "adminTD5"><a href = "brands.php">Бренды</a></td>
					<td id = "adminTD6"><a href = "goods.php">Товары</a></td>
				</tr>
			</table>
			</div>
		
		
		<div id="buffer"></div>
		</div>
		<? include "../footer.php"; ?>  
    </body>
</html>