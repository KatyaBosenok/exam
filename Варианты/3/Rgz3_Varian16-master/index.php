<html>
	<head>
		<title>Найти дату</title>
	</head>
	<body>
		<?php	
		if (isset($_GET['value'])) {
			$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
		}
		?>
		<form metod="GET" action="index.php" >
			<input type="date" name="value" value="<?php 
			if (isset($myDate)){
				echo htmlspecialchars($myDate->format('Y-m-d'));
			}
			else{
				echo date('Y-m-d');
			}
			?>">
			<input type="submit" value="Вперед">
		</form>
		<?php
			if (isset($myDate)){
				$month=$myDate -> format('m');
				$year=$myDate -> format('Y');
				$day=$myDate -> format('d');
				$myDate->setDate((int)$year,(int)$month+1,(int)$day-3);
				$dayofWeek=$myDate->format('d.m.Y');
				echo "<p>Дата за 3 до числа, которое ровно будет ровно через месяц ".$dayofWeek; 
			}	
		?>
	
	</body>
</html>
