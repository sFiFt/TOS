<!DOCTYPE html>
<html>
	<? include "../head.php"; ?>
    <body>	
		<? include "../header.php" ?>
		<div id="article">

		<?
		$menu->getMenu();
		session_start();
		if ($_SESSION['counter'] != 1){
			header ('Location: ../Controllers/partyGoodsController.php');
		}
		?>

			<div id = "selection">
				
				<div class="adminTitle" style = "margin-left:272px; width:250px"><h2>Категории</h2></div><br>
				
				<form class="adminForm" action = "../Controllers/partyGoodsController.php" method = "POST" id = "checkForm">
					<div class="adminFormTitle">Добавить новую категорию</div>
					<input class="adminFormField" type="text" name="newPartyGoods" id = "checkFieldOne"/><br />
					<div class="adminButtonContainer">
						<input class="adminButton" type="submit" value="Сохранить" name = "insertNewPartyGoods"/>
					</div>
					<div class="adminButtonContainer" id = "errorContainer" >
						<?= $_SESSION['siteError']; ?>
					</div>
				</form>	
				
				<br>
				
				<form class="adminForm" action = "../Controllers/partyGoodsController.php"  method = "POST" id = "checkForm">
				<div class="adminFormTitle">Удалить категорию</div>
					<select class="selectFormField" name = "partyGood">
						<?php
							foreach ($_SESSION['allPartyGoods'] as $row){
								echo $row;
							}
						?>
					</select>
				<div class="adminButtonContainer">
						<input class="adminButton" type="submit" value="Удалить" name = "deletePartyGoods" />
				</div>
				<div class="adminButtonContainer" id = "errorContainer" >
						<?= $_SESSION['siteErrorDelete']; ?>
				</div>
				</form>			
			
			</div>
		
		
		<div id="buffer"></div>
		</div>
			<? 
				session_destroy();
				include "../footer.php"; 
			?>  
    </body>
</html>