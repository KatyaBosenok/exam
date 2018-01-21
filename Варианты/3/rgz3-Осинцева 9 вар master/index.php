<html>
	<head>
		<title>Вывести дату последнего понедельника текущего месяца.</title>
	</head>
	<body>
		<h2>Вывести дату последнего понедельника текущего месяца.</h2>
		
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
		<form action="index.php" method="GET">
		<label>Текущая дата: </label>
			<input type="date" name="value" value="<?php
			if(isset($Date)){
				echo htmlspecialchars($Date-> Format('Y-m-d'));
			}
			?>">
			<input type="submit" name="result" value="Результат">
		</form>
	    <?php
			if(isset($Date) && isset($_GET['result'])){
				$month = $Date -> Format('m');
				$year = $Date -> Format('Y');
				$day = $Date -> Format('d');
				$firstdaynextmonth =  new DateTime;
				$firstdaynextmonth -> setDate($year, $month+1, 1);
				$currentday = $firstdaynextmonth -> Format('d');
				$currentmonth = $firstdaynextmonth -> Format('m');
				$currentyear = $firstdaynextmonth -> Format('Y');
				for ($i=1; $i<=7; $i++) {
					$currentday = $currentday-1;
					$Datelastmon = $firstdaynextmonth -> setDate($currentyear, $currentmonth, $currentday);
					$dayOfWeek = $Datelastmon -> Format('D');
					if($dayOfWeek == 'Mon') {
						echo "Дата последнего понедельника текущего месяца: ";
						echo $Datelastmon ->Format('d.m.Y');
						break;
					}
				}
			}
		?>
	</body>
</html>
