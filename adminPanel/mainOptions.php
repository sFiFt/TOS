<!DOCTYPE html>
<html>
	<? include "../head.php"; ?>
    <body>	
		<? include "../header.php" ?>
		<div id="article">

		<?
		$menu->getMenu();
		session_start();
		?>

			<div id = "selection">
				<div class="adminTitle" style = "margin-left:275px; width:250px"><h2>Основные настройки</h2></div><br>
				<form class="adminForm" action = "../Controllers/adminController.php" method = "POST" id = "checkForm">
					<div class="adminFormTitle">Название сайта (страничка)</div>
					<input class="adminFormField" type="text" name="siteName" value = "<?= $siteName ?>" id = "checkFieldOne"/><br />
					<div class="adminFormTitle">Название сайта (закладка)</div>
					<input class="adminFormField" type="text" name="titleName" value = "<?= $titleName ?>" id = "checkFieldTwo"/><br />
					<div class="adminButtonContainer">
						<input class="adminButton" type="submit" value="Сохранить" name = "saveMainOptions"/>
					</div>
					<div class="adminButtonContainer" id = "errorContainer">
						<?= $_SESSION['siteError']; ?>
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