<html>
	<body>
		<?php	
			$daysOfWeek=require('day.php');
			if (isset($_GET['value'])) {
				$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
			}
		?>
		<form metod="GET" action="index.php" >
			<input type="date" name="value" value="<?php 
			
			if (isset($myDate)){
				echo htmlspecialchars($myDate->format('Y-m-d'));
			}else{
				echo htmlspecialchars(date('Y-m-d'));
			}?>">
			<input type="submit" value="Узнать день недели">
		</form>
		<?php
			if (isset($myDate)){
				$dayOfWeek=$myDate->format('D');
				echo $daysOfWeek[$dayOfWeek];
				$day=$myDate -> format('d');
				if($day<=7){
					Echo "  (первый раз в этом месяце)";
				} elseif($day<=14){
					Echo "  (второй раз в этом месяце)";
				}elseif($day<=21){
					Echo "  (третий раз в этом месяце)";
				} elseif($day<=28){
					Echo "  (четвертый раз в этом месяце)";
				}else {
					Echo "  (пятый раз в этом месяце)";
				}
			}
		
		?>
	
	</body>
</html>