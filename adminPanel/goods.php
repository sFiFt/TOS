<!DOCTYPE html>
<html>
	<? include "../head.php"; ?>
    <body>	
		<? include "../header.php" ?>
		<div id="article">

		<?
			$menu->getMenu();
			session_start();
			$condition = "style = 'display:none";
			$defaultPartyGoodsName = "Выберите категорию";
			$defaultPartyGoodsID = 0;
	
			session_start();
			if ($_SESSION['counter'] != 1){
				header ('Location: ../Controllers/goodsController.php');
			}
			if(!empty($_SESSION['condition'])){
				$condition = $_SESSION['condition'];
				$defaultPartyGoodsName = $_SESSION['defaultPartyGoodsName'];
				$defaultPartyGoodsID = $_SESSION['defaultPartyGoodsID'];
			}
		?>

			<div id = "selection">
				
				<div class="adminTitle" style = "margin-left:272px; width:250px"><h2>Добавить новый товар</h2></div><br>
				
				<form class="adminForm" action = "../Controllers/goodsController.php" method = "POST" id = "formInsert">
					<div class="adminFormTitle">Выберите категорию</div>
					<select class="selectFormField" name = "partyGood">
						<option value = 0>Выберите категорию</option>
						<?php
							foreach ($_SESSION['allPartyGoods'] as $row){
								echo $row;
							}
						?>
					</select>
					
					<div class="adminFormTitle">Выберите бренд</div>
					<select class="selectFormField" name = "partyGood">
						<option value = 0>Выберите бренд</option>
						<?php
							foreach ($_SESSION['allPartyGoods'] as $row){
								echo $row;
							}
						?>
					</select>
					<div class="adminFormTitle">Название товара</div>
					<input class="adminFormField" type="text" name="brand" id = "checkFieldOne"/><br />
					<div class="adminButtonContainer">
						<input class="adminButton" type="submit" value="Сохранить" name = "insertNewBrand"  />
					</div>
					<div class="adminButtonContainer" id = "errorContainer" >
						<?= $_SESSION['siteError']; ?>
					</div>
				</form>	
				
				<br>
				
				<div class="adminTitle" style = "margin-left:272px; width:250px"><h2>Удалить бренд</h2></div><br>
				<form class="adminForm" action = "../Controllers/brandsController.php"  method = "POST" id = "formDelete">
				<div class="adminFormTitle">Выберите категорию</div>
					<select class="selectFormField" name = "partyGoodDB" id = "selectedPartyGoods">
					<option value = "<?= $defaultPartyGoodsID ?>"> <?= $defaultPartyGoodsName ?> </option>
						<?php
							
							foreach ($_SESSION['allPartyGoods'] as $row){
								echo $row;
							}
						?>
					</select>
				<div class="adminFormTitle" <?= $condition ?> >Выберите бренд</div>
					<select class="selectFormField" name = "brandBD" <?= $condition ?> >
						<?php
							foreach ($_SESSION['allBrands'] as $row){
								echo $row;
							}
						?>
					</select>
				<div class="adminButtonContainer">
						<input class="adminButton" type="submit" value="Удалить" name = "deletePartyGoods" <?= $condition ?>  />
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