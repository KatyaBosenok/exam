<html>
	<head>
		<title>Вывод количества дней, прошедших с первого мая текущего года</title>
	</head>
	<body>
		<h2 align=center>Вывод количества дней, прошедших с первого мая текущего года</h2>
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
				$firstOfMay =  new DateTime;
				$firstOfMay -> setDate($year, 5, 1);
				$dayFromMay = $firstOfMay -> Format('d');
				$monthFromMay = $firstOfMay -> Format('m');
				for ($i=1; $i<=244; $i++) {
					$dayFromMay =$dayFromMay+1;
					$NewDate = $firstOfMay -> setDate($year, $monthFromMay, $dayFromMay);
					$NewDate -> Format('d.m.Y');
					$newday = $NewDate -> Format('d');
					$newmonth = $NewDate -> Format('m');
					if($newmonth==$month && $newday == $day) {
						echo "<center>С 1 мая $year года прошло $i дней.</center>";
						break;
					}
					if ($i==244) {
						echo "<center>В $year году 1 мая еще не наступило.</center>";
					}
				}
			}
		?>
	</body>
</html>
