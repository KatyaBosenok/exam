<html>
	<head>
		<title>Вывод месяца последнего воскресенья</title>
	</head>
	<body>
		<h2>Вывод месяца последнего воскресенья</h2>
		<?php
			if(isset($_GET['value'])){
				$Date = DateTime::createFromFormat(
					'Y-m-d',
					$_GET['value']
				);
			}
			else{
				$Date=new DateTime;
			}
			$monthsOfYear = require('months.php');
		?>
		<form action="index.php" method="GET">
			<input type="date" name="value" value="<?php
			if(isset($Date)){
				echo htmlspecialchars($Date-> Format('Y-m-d'));
			}
			?>">
			<input type="submit" name="result" value="Узнать месяц последнего воскресенья">
		</form>
	    <?php
			if(isset($Date) && isset($_GET['result'])){
				$year = $Date -> Format('Y');
				$month = $Date -> Format('m');
				$day = $Date -> Format('d');
				for ($i=1; $i<=7; $i++) {
					$day =$day-1;
					$SunDate = $Date -> setDate($year, $month, $day);
					$SunDate -> Format('d.m.Y');
					$Sunday = $SunDate -> Format('D');
					if($Sunday == 'Sun') {
						$monthOfYear = $SunDate -> Format('m');
						echo "Последнее воскресенье относится к ";
						echo $monthsOfYear[$monthOfYear].".";
						break;
					}
				}
			}
		?>
	</body>
</html>
