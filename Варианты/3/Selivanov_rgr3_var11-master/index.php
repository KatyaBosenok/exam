<?php header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('UTC');
echo "<p>Сейчас ".date('Y-m-d H:i:s')."</p><p>";
var_dump(new DateTime);?>

<html>
	<head>
		<title>Дни недели</title>
	</head>
	<body>
	<h1>Дни недели по датам в прошлом месяце:</h1>
		<?php
		$weeker = array (
		0 => 'воскресенье',
		1 => 'понедельник',
		2 => 'вторник',
		3 => 'среда',
		4 => 'четверг',
		5 => 'пятница',
		6 => 'суббота',
		);
		
		if(isset($_GET['value'])){
			$myDate = DateTime::createFromFormat(
				'Y-m-d',
				$_GET['value']
			);
		}
		
		?>
		
		
		
		<form action="index.php" method="GET">
			<input type="date" name="value" value="<?php
			if(isset($myDate)){
				echo htmlspecialchars($myDate-> Format('Y-m-d'));
			}
			else
			{
				echo date('Y-m-d');
			}
			?>">
			<input type="submit" name="button" value="Рассчитать">
		</form>
		
		<?php
		if(isset($myDate)){
			$year = $myDate-> Format('Y');
			$month = $myDate-> Format('m');
			$myDate-> setDate($year, $month, 1);
			$Days = array();
			$i = 0;
			while ($i <= 6) {
				$myDate-> sub(new DateInterval('P1D'));
				$Weekday = $myDate-> Format('w');
				$Day = $myDate-> Format('d');
				$Days[$Weekday] = $Day;
				$i++;
			}
			ksort($Days);

			$i = 1;
			while ($i <= 6) {
				$myDate-> setDate($year, $month, $Days[$i]);
				if ($i == 1 or $i == 2 or $i == 4){
					echo "<p>Последний ".$weeker[$i]." прошлого месяца был ".$Days[$i]."-ого числа.</p>";
				};
				if ($i == 3 or $i == 5 or $i == 6){
					echo "<p>Последняя ".$weeker[$i]." прошлого месяца была ".$Days[$i]."-ого числа.</p>";
				};
				$i++;
			}
			$i = 0;
			echo "<p>Последнее ".$weeker[$i]." прошлого месяца было ".$Days[$i]."-ого числа.</p>";
		}
		?>
	</body>
</html>