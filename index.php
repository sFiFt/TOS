<!DOCTYPE html>
<html>
	<? include "head.php"; ?>
    <body>
		<? include "header.php" ?>
		<div id="article">

		<?
		$menu->getMenu();
		session_start();
		?>
			
			<div id = "selection">	
				
				<?
					foreach($_SESSION['good'] as $goods){
						$goods = explode('|', $goods);
						$goods[2] = DB::convertDate($goods[2]); 
						echo "Name: $goods[0]<br>Price: $goods[1]<br>Date: $goods[2]<br>Brand: $goods[3]<br>PartyGood: $goods[4]<hr>";
					}
				?>
				
			</div>
		
		
		<div id="buffer"></div>
		</div>
		<? include "footer.php"; ?>  
    </body>
</html>