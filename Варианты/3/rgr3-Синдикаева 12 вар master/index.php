<html>
	<head>
		<title>Вывод недели в году</title>
		<div class="data">
		<h1 align=center>Вывод недели в году, к которой относится последний вторник предыдущего месяца!</h1>
		</div>
		<link rel="stylesheet" href="calc.css"/>
	</head>
	<body>
		
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
		
		<div class= "calcul">
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
				$lastTuesday =  new DateTime;
				$lastTuesday -> setDate($year, $month, 1);
				$dayOfTuesday = $lastTuesday -> Format('d');
				$monthOfTuesday = $lastTuesday -> Format('m');
				for ($i=1; $i<=7; $i++) {
					$dayOfTuesday =$dayOfTuesday-1;
					$NewDate = $lastTuesday -> setDate($year, $monthOfTuesday, $dayOfTuesday);
					$NewDate -> Format('d.m.Y');
					$dayOfWeek = $NewDate -> Format('D');
					if($dayOfWeek == 'Tue') {
						echo "<center>Последний вторник предыдущего месяца относится к  ";
						echo $NewDate ->Format('W');
						echo " недели!</center>";
						break;
						
					}
				}
			}
		?>

		<p><img width="500" height="300" src="pic1.png"/> </p>
		
	</body>
</html>
