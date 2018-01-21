<html>
	<head>
		<title>Вычисление площади правильного многоугольника</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php
			$n = '';
			$a = '';
			if (isset($_GET['n'])) {
				$n = $_GET['n'];
			}
			if (isset($_GET['a'])) {
				$a = $_GET['a'];
			}
		?>
		<form action="index.php" method="GET" width="700">
		<h2>Вычисление площади правильного многоугольника</h2>
			Количество сторон: <input <?php if($n!='' && (!is_numeric($n) || $n<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="n" value="<?= htmlspecialchars($n)?>"><br><br>
			Длина сторон (a): <input <?php if($a!='' && (!is_numeric($a) || $a<=0)) {
				echo 'class="invalid"';
			} ?> type="text" name="a" value="<?= htmlspecialchars($a)?>"><br><br>
			<input type="submit" value="Вычислить площадь"><br>
			<img src="regular-polygon.jpg" width="180" height="180">
		</form>
		<?php
			if ($n != '' && $a != '') 
			{
					if (!is_numeric($n) || $n<=0) {
						echo "Ошибка при вводе количества сторон!";
					}
					else if (!is_numeric($a) || $a<=0){
						echo "Ошибка при вводе длины сторон!";
					}
					else
					{
						$result=($n*pow($a,2))/(4*tan(deg2rad(180)/$n));
						$formatedresult = number_format($result, 2, ',', ' ');
						echo 'Площадь равна:'. htmlspecialchars($formatedresult);
					}
			}
			else if ($n != '')
			{
				echo "Введите длину сторон!";
			}
			else if ($a != '')
			{
				echo "Введите количество сторон!";
			}
		?>
	</body>
</html>
