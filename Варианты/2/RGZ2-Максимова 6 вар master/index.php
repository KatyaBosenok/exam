<html>
	<head>
		<title>Калькулятор</title>
		<h1>Вычисление гипотенузы прямоугольного треугольника</h1>
		<link rel="stylesheet" href="calc.css"/>
	</head>
	<body>
		<?php
			if (isset($_GET['katet1'])) {
				$katet1 = $_GET['katet1'];
			} else {
				$katet1 = '';
			}
			if (isset($_GET['katet2'])) {
				$katet2 = $_GET['katet2'];
			} else {
				$katet2 = '';
			}
		?>
		
		<div class= "calcul">
		<form method="GET" action="index.php">
			<input type="text" name="katet1"  placeholder="Введите значение катета 1" value="<?= htmlspecialchars($katet1) ?>">
			 <input type="text" name="katet2" placeholder="Введите значение катета 2" value="<?= htmlspecialchars($katet2) ?>">
			<input type="submit" value="Вычислить">
		</form>
		
		<?php	
			if ( $katet1 != '' && $katet2 != '') {
				if (!(INT)($katet1) || !(INT)($katet2)){
					echo '<div class="error">';
					$result='Допустимо вводить только числовые значения!!';
					echo "Ошибка: $result";
					echo '</div>';
				}elseif ($katet1 <=0 || $katet2 <=0){
					echo '<div class="error">';
					$result='Катет не может быть отрицательным или равным нулю!!';
					echo  "Ошибка: $result";
					echo '</div>';
				}elseif((INT)($katet1) && (INT)($katet2) >0){
					$result = sqrt($katet1*$katet1 + $katet2*$katet2);
					echo  'Гипотенуза='. number_format($result,1,',',' ');
				}	
			}
		?>
			<p><img width="500" height="300" src="pic1.png"/> </p>
	</body>
</html>