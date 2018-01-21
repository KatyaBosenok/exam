<html>
	<head>
		<title>Калькулятор</title>
		<link rel="stylesheet" href="calc.css"/>
	</head>
	<body>
		<?php
			if (isset($_GET['val1'])) {
				$val1 = $_GET['val1'];
			} else {
				$val1 = '';
			}
			if (isset($_GET['val2'])) {
				$val2 = $_GET['val2'];
			} else {
				$val2 = '';
			}
		?>
		<form method="GET" action="index.php">
			<!--
			<input type="submit" name="operation" value="+">
			<input type="submit" name="operation" value="-">
			<input type="submit" name="operation" value="*">
			<input type="submit" name="operation" value="/">
			-->
			<input type="text" name="val1" value="<?= htmlspecialchars($val1) ?>">
			<input <?php if(isset($_GET['operation']) && $_GET['operation'] == '/' && $val2 == 0) {
				echo 'class="invalid"';
			} ?> type="text" name="val2" value="<?= htmlspecialchars($val2) ?>">
			<select name="operation">
				<?php
					if ($_GET['operation']) {
						$operation = $_GET['operation'];
					} else {
						$operation = '+';
					}
				?>
				<option value="+" <?php
					if ($operation == '+') {
						echo 'selected';
					} ?>>Сложить</option>
				<option value="-" <?php
					if ($operation == '-') {
						echo 'selected';
					} ?>>Вычесть</option>
				<option value="*" <?php
					if ($operation == '*') {
						echo 'selected';
					} ?>>Умножить</option>
				<option value="/" <?php
					if ($operation == '/') {
						echo 'selected';
					} ?>>Разделить</option>
			</select>
			<input type="submit" value="Посчитать">
		</form>
		<?php
			// http://localhost/index.php?val1=11&val2=22&operation=*
			if (isset($_GET['operation']) && $val1 != '' && $val2 != '') {
				switch ($_GET['operation']) {
					case "+":
						$result = $val1 + $val2;
					break;
					case "-":
						$result = $val1 - $val2;
					break;
					case "*":
						$result = $val1 * $val2;
					break;					
					case "/":
						if ($val2 == 0) {
							$result = 'Нельзя делить на ноль!';
						} else {
							$result = $val1 / $val2;
						}
					break;
					default:
						$result = 'Неизвестная операция';
				}
				echo "Результат: $result";
			}
		?>
	</body>
</html>