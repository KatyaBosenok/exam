<html>
	<head>
		<title>Калькулятор</title>
		<link rel="stylesheet" href="calc.css"/>
	</head>
	<body>
		<?php
			if (isset($_GET['$a'])) {
				$a = $_GET['$a'];
			} else {
				$a = '';
			}
			if (isset($_GET['$b'])) {
				$b = $_GET['$b'];
			} else {
				$b = '';
			}
			
			if (isset($_GET['$c'])) {
				$c = $_GET['$c'];
			} else {
				$c = '';
			}
		
		?> 
		<h2>Поиск площади треугольника (по формуле Герона):</h2>
		
		<form method="GET" action="index.php">
			<h3>Длины сторон треугольника:</h3>
			<p>
			<img src="scalene-triangle1.jpg"  alt='треугольник'/>
			<p>
			Длина стороны a =  <input type="text" name="$a" value="<?= htmlspecialchars($a) ?>"> (см)
			<p>
			Длина стороны b =  <input type="text" name="$b" value="<?= htmlspecialchars($b) ?>"> (см)
			<p>
			Длина стороны c =  <input type="text" name="$c" value="<?= htmlspecialchars($c) ?>"> (см)
			<p>
			<input type="submit" value="Найти">
			
		</form>
		
		<?php
			$a=str_replace(",",".",$a);
			$b=str_replace(",",".",$b);
			$c=str_replace(",",".",$c);
			if ($a != '' && $b != '' && $c != ''  && is_numeric($a) && is_numeric($b) && is_numeric($c)) {
				$p=($a+$b+$c)/2;
				$s=sqrt($p*($p-$a)*($p-$b)*($p-$c));
				$S=round($s,2);
				$S=str_replace(".",",",$S);
				echo "Площадь треугольника S = $S  (см в кв.)";
			}
			elseif (!is_numeric($a) || !is_numeric($b) || !is_numeric($c) || $a<=0 || $b<=0 || $c<=0){
				$result='Допустимо вводить только числовые значения больше нуля!';
					echo "Ошибка: $result";
			}
			
			
		?>
	</body>
</html>