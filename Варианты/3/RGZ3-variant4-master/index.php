<html>
	<head>
		<title>Вывод последнего високосного года</title>
	</head>
	<body>
		<h2 align=center>Вывод последнего високосного года</h2>
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
		?>
		<form align=center action="index.php" method="GET">
			<input type="date" name="value" value="<?php
			if(isset($Date)){
				echo htmlspecialchars($Date-> Format('Y-m-d'));
			}
			?>">
			<input type="submit" name="result" value="Узнать результат">
		</form>
	    <?php
			if(isset($Date) && isset($_GET['result'])){
				$month = $Date -> Format('m');
				$year = $Date -> Format('Y');
				$day = $Date -> Format('d');
				$leapYear =  new DateTime;
				$leapYear -> setDate($year-1, $month, $day);
				$yearOfLeapYear = $leapYear -> Format('Y');
				for ($i=1; $i<=4; $i++) {
					if (checkdate(2, 29, $yearOfLeapYear)) {
						$NewDate = $leapYear -> setDate($yearOfLeapYear, $month, $day);
						$NewDate -> Format('d.m.Y');
						$newyear = $NewDate -> Format('Y');
						echo "<center>Последний високосный год - $newyear.</center>";
						break;
					}
					$yearOfLeapYear=$yearOfLeapYear-1;
				}
			}
		?>
	</body>
</html>
