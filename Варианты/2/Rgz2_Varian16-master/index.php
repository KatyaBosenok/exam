<html>
	<head>
		<title>Определение площади самой большой стены в прямоугольной комнате</title>
	</head>
		<body>
		<img src="0.png"  id="room"> 
			<?php
			$value1 = '';
			$value2 = '';
			$value3 = '';
			if (isset($_GET['value1'])) {
				$value1 = $_GET['value1'];
			} 
			if (isset($_GET['value2'])) {
				$value2 = $_GET['value2'];
			} 
			if (isset($_GET['value3'])) {
				$value3 = $_GET['value3'];
			} 
			?>
		<form method="GET" action="index.php">
			<h2>Введите данные комнаты</h2>
			<p>Высота, H :   <input type="text" name="value1" value="<?= htmlspecialchars($value1) ?>"> м </p>          
			<p>Ширина, A : <input type="text" name="value2" value="<?= htmlspecialchars($value2) ?>"> м</p> 
			<p>Длина, B : <input type="text" name="value3" value="<?= htmlspecialchars($value3) ?>"> м</p> 
			<input type="submit" name="operation" value="Анализ">
		</form>
			 <?php
				if (isset($_GET['operation']) && $value1 != '' && $value2 != '' && $value3 != '') {
					if (!(INT)($value1) || $value1<=0  || !(INT)($value2) || $value2<=0 || !(INT)($value3) || $value3<=0 ) {
						echo "Ошибка при вводе данных!";
					}
					else{
						$s1 = number_format($value1 * $value2, 2, ',', ' ');
						$s2 = number_format($value1 * $value3, 2, ',', ' ');
						if ($s1 > $s2) {
							$result = $s1;
							$comment='под номером 3,4!';
						} else if ($s2 > $s1) {
							$result = $s2;
							$comment='под номером 1,2!';
						}
						else {
							$result = $s1; 
							$comment='Комната квадратная, все стены равны!';
						}
						echo "<p>"."Площадь наибольшей стены = ".htmlspecialchars($result)."  "." м.кв. "."  ".htmlspecialchars($comment)."</p>";
					}
				}
				else if ($value1 != '' || $value2 != '' || $value3 != '') {
					echo "Не все поля заполнены!";
				}
			?>
		</body>
</html>