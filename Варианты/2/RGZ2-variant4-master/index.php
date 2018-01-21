<html>
	<head>
		<title>Перевод из полярных координат в декартовые</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php
			$length = '';
			$angle = '';
			if (isset($_GET['length'])) {
				$length = $_GET['length'];
			}
			if (isset($_GET['angle'])) {
				$angle = $_GET['angle'];
			}
		?>
		<form action="index.php" method="GET" width="700">
		<h2>Перевод из полярных координат в декартовые</h2>
			Длина вектора: <input <?php if($length!='' && (!is_numeric($length) || $length<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="length" value="<?= htmlspecialchars($length)?>"><br><br>
			Угол между вектором и осью координат: <input <?php if($angle!='' && (!is_numeric($angle) || $angle<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="angle" value="<?= htmlspecialchars($angle)?>"><br><br>
			<input type="submit" value="Выполнить перевод"><br>
			<img src="formula.png">
		</form>
		<?php
			if ($length != '' && $angle != '') 
			{
					if (!is_numeric($length) || $length<=0) {
						echo "Ошибка при вводе длины вектора!";
					}
					else if (!is_numeric($angle) || $angle<=0){
						echo "Ошибка при вводе угла!";
					}
					else
					{
						$x=$length*cos($angle);
						$y=$length*sin($angle);
						$formatedx = number_format($x, 2, ',', ' ');
						$formatedy = number_format($y, 2, ',', ' ');
						echo '<p>'."Координаты в декартовой системе:".'</p>';
						echo '<p>'.'x: '. htmlspecialchars($formatedx).'</p>';
						echo '<p>'.'y: '. htmlspecialchars($formatedy).'</p>';
					}
			}
			else if ($length != '')
			{
				echo "Введите длину вектора!";
			}
			else if ($angle != '')
			{
				echo "Введите угол между вектором и осью координат!";
			}
		?>
	</body>
</html>
